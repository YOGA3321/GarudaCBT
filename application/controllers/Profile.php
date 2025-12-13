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
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        // Pagination logic or simple list
        // Fetch students (limit 50 for demo)
        $students = $this->db->select('nama_siswa, nis, foto, nama_kelas')
                             ->from('master_siswa')
                             ->join('kelas_siswa', 'master_siswa.id_siswa = kelas_siswa.id_siswa', 'left')
                             ->join('master_kelas', 'kelas_siswa.id_kelas = master_kelas.id_kelas', 'left')
                             ->limit(24) // Grid 4x6
                             ->get()
                             ->result();
        
        $setting = $this->dashboard->getSetting();

        $data = [
            'setting' => $setting,
            'students' => $students,
            'title' => 'Direktori Peserta Didik'
        ];
        $this->load->view('profile/directory', $data);
    }
}
