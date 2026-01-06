<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->model('Master_model', 'master');
    }

    public function sejarah() {
        $setting = $this->dashboard->getSetting();
        $data = [
            'setting' => $setting,
            'title' => 'Sejarah Sekolah',
            'content' => $setting->sejarah ?? '<p class="text-gray-500 italic">Belum ada data sejarah.</p>',
            'page_title' => 'Sejarah Singkat'
        ];
        $this->load->view('profile/page', $data);
    }

    public function visimisi() {
        $setting = $this->dashboard->getSetting();
        $data = [
            'setting' => $setting,
            'title' => 'Visi & Misi',
            'content' => $setting->visi_misi ?? '<p class="text-gray-500 italic">Belum ada data visi misi.</p>',
            'page_title' => 'Visi & Misi'
        ];
        $this->load->view('profile/page', $data);
    }

    public function struktur() {
        $setting = $this->dashboard->getSetting();
        $data = [
            'setting' => $setting,
            'title' => 'Struktur Organisasi',
            'content' => isset($setting->struktur_organisasi) ? '<img src="'.base_url($setting->struktur_organisasi).'" class="w-full rounded-xl shadow-lg">' : '<p class="text-gray-500 italic">Belum ada struktur organisasi.</p>',
            'page_title' => 'Struktur Organisasi'
        ];
        $this->load->view('profile/page', $data);
    }

    public function direktori() {
        // 1. Load Library Pagination
        $this->load->library('pagination');
        
        // Fix duplicate/missing data: Filter by Active Year & Semester
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $id_tp = $tp->id_tp ?? 1;
        $id_smt = $smt->id_smt ?? 1;

        // 2. Ambil Query Pencarian dan Filter Kelas
        $search = $this->input->get('q', TRUE);
        $search = $search ? $this->security->xss_clean($search) : ''; // Security fix for PHP 8.1
        $id_kelas = $this->input->get('kelas', TRUE); // New: Class filter
        
        // Fetch list of classes for dropdown (filter by current TP/SMT to avoid duplicates)
        $classes = $this->db->select('id_kelas, nama_kelas')
                           ->from('master_kelas')
                           ->where('aktif', 1)
                           ->where('id_tp', $id_tp)
                           ->where('id_smt', $id_smt)
                           ->order_by('nama_kelas', 'ASC')
                           ->get()->result();
        
        // 3. Konfigurasi Pagination
        $config['base_url'] = base_url('direktori');
        
        // Count Total Rows (with search & active year filter)
        $this->db->select('count(DISTINCT master_siswa.id_siswa) as allcount');
        $this->db->from('master_siswa');
        // Join with specific TP/SMT to get current class
        $this->db->join('kelas_siswa', 'master_siswa.id_siswa = kelas_siswa.id_siswa AND kelas_siswa.id_tp = '.$id_tp.' AND kelas_siswa.id_smt = '.$id_smt, 'left');
        $this->db->join('master_kelas', 'kelas_siswa.id_kelas = master_kelas.id_kelas', 'left');
        // Join with users to filter only active students (those with active accounts)
        $this->db->join('users', 'users.username = master_siswa.username', 'inner');
        
        // Filter by class if selected
        if(!empty($id_kelas)) {
            $this->db->where('kelas_siswa.id_kelas', $id_kelas);
        }
        
        if(!empty($search)){
            $this->db->group_start();
            $this->db->like('master_siswa.nama', $search);
            $this->db->or_like('master_siswa.nis', $search);
            $this->db->or_like('master_kelas.nama_kelas', $search);
            $this->db->group_end();
        }

        $query = $this->db->get();
        $result = $query->result_array();
        $config['total_rows'] = $result[0]['allcount'];
        
        $config['per_page'] = 12; // 12 item per halaman
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['reuse_query_string'] = TRUE; // Keep search param
        
        // Styling Pagination (Tailwind/Bootstrap Friendly)
        $config['full_tag_open'] = '<nav class="flex items-center gap-2">';
        $config['full_tag_close'] = '</nav>';
        
        $config['first_link'] = '<i class="ri-skip-back-line"></i>';
        $config['first_tag_open'] = '<span class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-slate-500 border border-slate-200 hover:bg-slate-50 transition-colors">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = '<i class="ri-skip-forward-line"></i>';
        $config['last_tag_open'] = '<span class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-slate-500 border border-slate-200 hover:bg-slate-50 transition-colors">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = '<i class="ri-arrow-right-s-line"></i>';
        $config['next_tag_open'] = '<span class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = '<i class="ri-arrow-left-s-line"></i>';
        $config['prev_tag_open'] = '<span class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="w-10 h-10 flex items-center justify-center rounded-xl bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-500/30 ring-2 ring-emerald-100">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-slate-500 border border-slate-200 hover:bg-slate-50 transition-colors">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        $page = $this->input->get('p');
        
        // 4. Fetch Data Real - Include jenis_kelamin for default photo logic
        $this->db->select('master_siswa.nama, master_siswa.nis, master_siswa.foto, master_siswa.jenis_kelamin, master_kelas.nama_kelas');
        $this->db->from('master_siswa');
        // Filter by Active Year for Class Info
        $this->db->join('kelas_siswa', 'master_siswa.id_siswa = kelas_siswa.id_siswa AND kelas_siswa.id_tp = '.$id_tp.' AND kelas_siswa.id_smt = '.$id_smt, 'left');
        $this->db->join('master_kelas', 'kelas_siswa.id_kelas = master_kelas.id_kelas', 'left');
        // Join with users to filter only active students (those with active accounts)
        $this->db->join('users', 'users.username = master_siswa.username', 'inner');
        
        // Filter by class if selected
        if(!empty($id_kelas)) {
            $this->db->where('kelas_siswa.id_kelas', $id_kelas);
        }
        
        if(!empty($search)){
            $this->db->group_start();
            $this->db->like('master_siswa.nama', $search);
            $this->db->or_like('master_siswa.nis', $search);
            $this->db->or_like('master_kelas.nama_kelas', $search);
            $this->db->group_end();
        }
        
        $this->db->limit($config['per_page'], $page);
        $this->db->order_by('master_kelas.nama_kelas', 'ASC'); // Group by class first
        $this->db->order_by('master_siswa.nama', 'ASC'); 
        
        $students = $this->db->get()->result();
        $setting = $this->dashboard->getSetting();
        // Add profile data which was causing issues properly
        // Fetch Teacher Data - only active teachers (those with accounts in users table)
        $this->db->select('master_guru.id_guru, master_guru.nama_guru, master_guru.nip, master_guru.foto, level_guru.level');
        $this->db->from('master_guru');
        $this->db->join('jabatan_guru', 'jabatan_guru.id_guru = master_guru.id_guru AND jabatan_guru.id_tp = '.$id_tp.' AND jabatan_guru.id_smt = '.$id_smt, 'left');
        $this->db->join('level_guru', 'jabatan_guru.id_jabatan = level_guru.id_level', 'left');
        // Join with users to filter only active teachers (those with active accounts)
        $this->db->join('users', 'users.username = master_guru.username', 'inner');
        $this->db->order_by('master_guru.nama_guru', 'ASC');
        $teachers = $this->db->get()->result();
        
        $data = [
            'setting' => $setting,
            'students' => $students,
            'teachers' => $teachers,
            'classes' => $classes, // New: for dropdown
            'selected_kelas' => $id_kelas, // New: current selection
            'title' => 'Direktori Sekolah', // Changed from "Direktori Peserta Didik" to be more general
            'search' => $search,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows']
        ];
        $this->load->view('profile/directory', $data);
    }
    public function ekskul() {
        $setting = $this->dashboard->getSetting();
        $ekstras = $this->master->getAllEkstra();
        
        $data = [
            'setting' => $setting,
            'ekstras' => $ekstras,
            'title' => 'Ekstrakurikuler',
            'page_title' => 'Kegiatan Ekstrakurikuler'
        ];
        $this->load->view('profile/ekskul', $data);
    }

    /**
     * Alumni Verification Page
     */
    public function alumni() {
        $setting = $this->dashboard->getSetting();
        $data = [
            'setting' => $setting,
            'title' => 'Verifikasi Alumni',
            'page_title' => 'Cek Status Alumni'
        ];
        $this->load->view('profile/alumni', $data);
    }

    /**
     * AJAX endpoint for alumni lookup
     */
    public function alumni_lookup() {
        $this->output->set_content_type('application/json');
        
        $nisn = $this->input->post('nisn', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tahun_lulus = $this->input->post('tahun_lulus', TRUE);
        
        // Basic validation
        if (empty($nisn) || empty($nama)) {
            echo json_encode(['status' => false, 'message' => 'NISN dan Nama wajib diisi']);
            return;
        }
        
        // Secure lookup - require NISN + Name match
        $this->db->select('master_siswa.nama, master_siswa.nisn, master_siswa.foto, master_siswa.jenis_kelamin');
        $this->db->from('master_siswa');
        $this->db->where('master_siswa.nisn', $nisn);
        $this->db->like('master_siswa.nama', $nama, 'both');
        
        // Optionally filter by graduation year if provided
        // Note: Would need alumni/graduation table for accurate filtering
        
        $result = $this->db->get()->row();
        
        if ($result) {
            // Mask some data for privacy
            $masked_nama = $this->mask_name($result->nama);
            
            // Get photo or default
            if (!empty($result->foto) && file_exists('./uploads/foto_siswa/' . $result->foto)) {
                $foto = base_url('uploads/foto_siswa/' . $result->foto);
            } else {
                $gender = isset($result->jenis_kelamin) ? $result->jenis_kelamin : 'L';
                $foto = ($gender == 'L') 
                    ? base_url('assets/img/siswa-l.png') 
                    : base_url('assets/img/siswa-p.png');
            }
            
            echo json_encode([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => [
                    'nama' => $masked_nama,
                    'nisn' => substr($nisn, 0, 4) . '****' . substr($nisn, -2),
                    'foto' => $foto,
                    'verified' => true
                ]
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Data tidak ditemukan. Pastikan NISN dan Nama sudah benar.'
            ]);
        }
    }

    /**
     * Helper to mask name for privacy
     */
    private function mask_name($name) {
        $parts = explode(' ', $name);
        $masked = [];
        foreach ($parts as $part) {
            if (strlen($part) > 2) {
                $masked[] = substr($part, 0, 2) . str_repeat('*', strlen($part) - 2);
            } else {
                $masked[] = $part;
            }
        }
        return implode(' ', $masked);
    }
}
