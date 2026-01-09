<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang boleh mengakses halaman ini', 403, 'Akses Ditolak');
        }
    }

    public function clear_bank_dependency($bank_id) {
        if (!$bank_id) {
            $this->output->set_status_header(400);
            echo json_encode(['status' => false, 'message' => 'ID Bank tidak valid']);
            return;
        }

        // 1. Get all questions in this bank
        $soal_ids = $this->db->select('id_soal')->from('cbt_soal')->where('bank_id', $bank_id)->get()->result_array();
        
        if (empty($soal_ids)) {
            echo json_encode(['status' => true, 'message' => 'Bank soal kosong, tidak ada yang perlu dibersihkan.']);
            return;
        }

        $ids = array_column($soal_ids, 'id_soal');

        // 2. Delete dependent cbt_soal_siswa
        $this->db->where_in('id_soal', $ids);
        $deleted = $this->db->delete('cbt_soal_siswa');

        if ($deleted) {
             // 3. Optional: We don't delete cbt_soal here, the Import process will do it.
             // But we cleared the foreign key constraint blocker.
             echo json_encode(['status' => true, 'message' => 'Riwayat penggunaan soal berhasil dibersihkan. Silakan coba import lagi.']);
        } else {
             echo json_encode(['status' => false, 'message' => 'Gagal membersihkan data.']);
        }
    }
    // FORCE DELETE JADWAL (BYPASS REKAP CHECK)
    public function force_delete_jadwal($id_jadwal) {
        // Prevent errors if ID is missing
        if (!$id_jadwal) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'ID Jadwal tidak valid']));
            return;
        }

        // Tables to clean
        $tables = [
            'cbt_nilai', 
            'cbt_soal_siswa', 
            'cbt_durasi_siswa', 
            'cbt_pengawas', 
            'cbt_sesi_siswa',
            'log_ujian'
        ];

        $this->db->trans_start();
        
        try {
            // 1. Delete Dependencies
            foreach ($tables as $table) {
                if ($this->db->table_exists($table)) {
                    $this->db->where('id_jadwal', $id_jadwal);
                    $this->db->delete($table);
                }
            }

            // 2. Delete Jadwal
            if ($this->db->table_exists('cbt_jadwal')) {
                $this->db->where('id_jadwal', $id_jadwal);
                $this->db->delete('cbt_jadwal');
            }
            
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                // Get DB Error
                $db_error = $this->db->error();
                throw new \Exception("DB Transaction Failed: " . $db_error['message']);
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => true, 'message' => 'Jadwal dan semua data terkait berhasil dihapus paksa.']));

        } catch (\Exception $e) {
            $this->db->trans_rollback();
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => false, 'message' => 'Error: ' . $e->getMessage()]));
        }
    }
}
