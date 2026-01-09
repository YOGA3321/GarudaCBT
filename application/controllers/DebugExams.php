<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DebugExams extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Cbt_model', 'cbt');
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function index() {
        echo "<h1>Debug Exam Visibility</h1>";
        
        // Mock Student Data based on Screenshot
        // Student: kombon, Kelas 2
        // We need to find this student's ID and Level first.
        $username = 'kombon'; 
        
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        
        echo "Active TP: " . ($tp ? $tp->tahun : 'NULL') . " (ID: " . ($tp ? $tp->id_tp : 'NULL') . ")<br>";
        echo "Active SMT: " . ($smt ? $smt->nama_smt : 'NULL') . " (ID: " . ($smt ? $smt->id_smt : 'NULL') . ")<br>";
        
        // Get Student Info
        // Note: Cbt_model::getDataSiswa uses username
        // But getSiswaCbtInfo uses id_siswa.
        // Let's find ID first.
        $student = $this->db->get_where('master_siswa', ['username' => $username])->row();
        
        if (!$student) {
            die("Student 'kombon' not found in master_siswa.");
        }
        
        echo "Student Found: " . $student->nama . " (ID: " . $student->id_siswa . ")<br>";
        
        // Get Full Student Info (Level, Class)
        $siswa = $this->cbt->getDataSiswa($username, $tp->id_tp, $smt->id_smt);
        if (!$siswa) {
            echo "<b>Error:</b> Could not fetch detailed student data (getDataSiswa) for TP/SMT/User.<br>";
            // Fallback to check why
            return;
        }
        
        echo "Student Level: " . $siswa->level_id . "<br>";
        echo "Student Class ID: " . $siswa->id_kelas . "<br>";
        echo "Student Religion: " . $siswa->agama . "<br>";
        
        // Get CBT Info (Ruang, Sesi)
        $cbt_info = $this->cbt->getSiswaCbtInfo($siswa->id_siswa, $tp->id_tp, $smt->id_smt);
        echo "<h3>CBT Assignment Info (getSiswaCbtInfo)</h3>";
        if ($cbt_info) {
            echo "Class ID: " . $cbt_info->id_kelas . "<br>";
            echo "Ruang ID: " . $cbt_info->id_ruang . "<br>";
            echo "Sesi ID: " . $cbt_info->id_sesi . "<br>";
        } else {
            echo "<b>Warning:</b> cbt_info is NULL. Student might not be assigned to a Session/Ruang explicitly.<br>";
        }

        // Get Schedules
        echo "<h3>Checking Schedules (getJadwalCbtNew)</h3>";
        try {
            $cbt_jadwal = $this->cbt->getJadwalCbtNew($tp->id_tp, $smt->id_smt, $siswa->level_id);
        } catch (Exception $e) {
            echo "Error calling method: " . $e->getMessage();
            $cbt_jadwal = [];
        }
        
        if (empty($cbt_jadwal)) {
            echo "No schedules found in DB for this TP, SMT, and Level.<br>";
        }
        
        $today = strtotime(date('Y-m-d'));
        echo "Server Today (strtotime): " . $today . " (" . date('Y-m-d') . ")<br><br>";

        foreach ($cbt_jadwal as $jadwal) {
            echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
            echo "<b>Exam: " . $jadwal->nama_mapel . " (" . $jadwal->bank_kode . ")</b><br>";
            echo "Status: " . $jadwal->status . " (Must be 1)<br>";
            echo "Bank Status: " . $jadwal->status_soal . " (Must be 1)<br>";
            
            $mulai = strtotime($jadwal->tgl_mulai);
            $selesai = strtotime($jadwal->tgl_selesai);
            
            echo "Start Date: " . $jadwal->tgl_mulai . " (Timestamp: $mulai) ";
            if ($today >= $mulai) echo "<span style='color:green'>[STARTED]</span>"; else echo "<span style='color:red'>[NOT STARTED]</span>";
            echo "<br>";
            
            echo "End Date: " . $jadwal->tgl_selesai . " (Timestamp: $selesai) ";
            if ($today <= $selesai) echo "<span style='color:green'>[NOT EXPIRED]</span>"; else echo "<span style='color:red'>[EXPIRED]</span>";
            echo "<br>";
            
            // Replicate Logic
            $kk = unserialize($jadwal->bank_kelas ?? '');
            $arrKelasCbt = [];
            foreach ($kk as $k) { array_push($arrKelasCbt, $k['kelas_id']); }
            
            echo "Target Classes: " . implode(", ", $arrKelasCbt) . "<br>";
            
            $class_match = ($cbt_info != null && in_array($cbt_info->id_kelas, $arrKelasCbt));
            echo "Class Match: " . ($class_match ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";
            
            $status_match = ($jadwal->status === "1");
            echo "Status Match: " . ($status_match ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";
            
            $date_match = ($today >= $mulai && $today <= $selesai);
            echo "Date Match: " . ($date_match ? "<span style='color:green'>YES</span>" : "<span style='color:red'>NO</span>") . "<br>";
            
            if ($class_match && $status_match && $date_match) {
                echo "<b>Result: SHOULD APPEAR</b>";
            } else {
                echo "<b>Result: HIDDEN</b>";
            }
            echo "</div>";
        }
    }
}
