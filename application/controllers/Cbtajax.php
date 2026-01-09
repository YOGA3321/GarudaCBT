<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbtajax extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth');
	}

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    // Helper to view log - REMOVED FOR SECURITY
    /*
    public function view_log() {
        $log_file = APPPATH . 'logs/debug_cbtajax.log';
        if (file_exists($log_file)) {
            echo file_get_contents($log_file);
        } else {
            echo "Log file not found.";
        }
    }
    */

    private function log_debug($msg) {
        $log_file = APPPATH . 'logs/debug_cbtajax.log';
        $entry = date('Y-m-d H:i:s') . " - " . print_r($msg, true) . "\n";
        @file_put_contents($log_file, $entry, FILE_APPEND);
    }

	public function getbankmapel($id_mapel) {
        $this->log_debug("Request received for Mapel ID: " . $id_mapel);

        try {
            if (!$this->ion_auth->logged_in()) {
                $this->output->set_status_header(401);
                $this->output_json(['error' => 'Not logged in']);
                return;
            }

            $user = $this->ion_auth->user()->row();
            $is_admin = $this->ion_auth->is_admin();
            
            // PREPARE GURU DATA FIRST (Before starting main Query Builder)
            $guru_id = null;
            if (!$is_admin) {
                // Use id_user not user_id
                $guru = $this->db->where('id_user', $user->id)->get('master_guru')->row();
                if ($guru) {
                    $guru_id = $guru->id_guru;
                    $this->log_debug("Guru ID found: " . $guru_id);
                } else {
                    $this->log_debug("Guru profile not found for user " . $user->id);
                }
            }

            // --- START MAIN QUERY ---
            $this->db->select('id_bank, bank_kode');
            $this->db->from('cbt_bank_soal');
            $this->db->where('bank_mapel_id', $id_mapel);
            $this->db->where('status', '1'); 
            
            if ($guru_id) {
                $this->db->where('bank_guru_id', $guru_id);
            }

            // Filter by Active TP and SMT
            // Filter by Active TP and SMT
            /*
            $this->load->model('Dashboard_model', 'dashboard');
            $tp = $this->dashboard->getTahunActive();
            $smt = $this->dashboard->getSemesterActive();
            
            if ($tp && isset($tp->id_tp)) {
                $this->db->where('id_tp', $tp->id_tp);
            }
            if ($smt && isset($smt->id_smt)) {
                $this->db->where('id_smt', $smt->id_smt);
            }
            */
            
            // Log what we are about to run
            // $compiled = $this->db->get_compiled_select('cbt_bank_soal', FALSE);
            // $this->log_debug("SQL To Run: " . $compiled);

            $query = $this->db->get();
            $result = $query->result();
            
            $this->log_debug("Query executed. Rows found: " . count($result));
            //$this->log_debug("Last Query: " . $this->db->last_query());

            $data = [];
            // Debug info
            $data['debug_info'] = [
                'received_mapel_id' => $id_mapel,
                'user_id' => $user->id,
                'is_admin' => $is_admin,
                'result_count' => count($result)
            ];

            foreach ($result as $row) {
                $data[$row->id_bank] = $row->bank_kode;
            }
            
            $this->output_json($data);

        } catch (Throwable $e) {
            $this->log_debug("CRITICAL ERROR: " . $e->getMessage());
            $this->output->set_status_header(500);
            $this->output_json(['error' => $e->getMessage()]);
        }
	}

	/*
    public function test_ruang() {
        $this->load->library('datatables');
        $this->datatables->select('*, (SELECT COUNT(id_sesi) FROM cbt_sesi) AS jum_sesi');
        $this->datatables->from('cbt_ruang');
        $result = $this->datatables->generate();
        echo $result;
    }
    */
}
