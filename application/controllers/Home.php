<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dashboard_model', 'dashboard');
		$this->load->model('Master_model', 'master');
		$this->load->model('Settings_model', 'settings');
	}

	public function index() {
		// School Settings (Name, Logo, Address, etc.)
		$setting = $this->dashboard->getSetting();
        
        // Defensive check: Ensure $setting is an object to prevent view errors
        if (!is_object($setting)) {
            $setting = new stdClass();
            $setting->sekolah = 'Nama Sekolah';
            $setting->motto = 'Motto Sekolah Belum Diatur';
            $setting->alamat = 'Alamat Belum Diatur';
            $setting->telp = '-';
            $setting->email = '-';
            $setting->logo = '';
            $setting->logo_kiri = '';
            $setting->tanda_tangan = '';
            $setting->kepsek = 'Kepala Sekolah';
            $setting->sambutan = 'Selamat Datang di Website Sekolah Kami.';
            $setting->link_fb = '';
            $setting->link_ig = '';
            $setting->link_yt = '';
            $setting->link_tiktok = '';
        }
		
		// Active Academic Year & Semester (with null safety)
		$tp = $this->dashboard->getTahunActive();
		$smt = $this->dashboard->getSemesterActive();

		// Get id_tp and id_smt safely with defaults
		$id_tp = isset($tp->id_tp) ? $tp->id_tp : 1;
		$id_smt = isset($smt->id_smt) ? $smt->id_smt : 1;

		// Teachers (Limited data for privacy: Name, Photo only)
		// Assuming getAllDataGuru returns necessary info. We might need to filter it in the view or here.
		$teachers = $this->master->getAllDataGuru($id_tp, $id_smt);
		
		// Extracurriculars
		$ekstras = $this->master->getAllEkstra();

		// Latest Posts (News)
		$news = $this->db->where('status', 1)
						 ->order_by('tanggal', 'DESC')
						 ->limit(3)
						 ->get('posts')
						 ->result();

		// Stats - Use direct counts from master tables as primary source for homepage
		$stats = [
			'guru' => $this->db->count_all('master_guru'),
			'siswa' => $this->db->count_all('master_siswa'),
			'ekstra' => $this->db->count_all('master_ekstra'),
			'prestasi' => $this->db->where('status', 1)->from('posts')->count_all_results()
		];

        // Content
        $this->load->model('Content_model', 'content');
        $slider = $this->content->getActiveSlider();
        $quotes = $this->content->getQuotes();
        $gallery = $this->content->getGallery(8); // Limit 8 photos

		$data = [
			'setting' => $setting,
			'tp_active' => $tp,
			'smt_active' => $smt,
			'teachers' => $teachers,
			'ekstras' => $ekstras,
			'news' => $news,
			'stats' => $stats,
            'slider' => $slider,
            'quotes' => $quotes,
            'gallery' => $gallery,
			'title' => $setting->sekolah ?? 'School Profile'
		];

		$this->load->view('home', $data);
	}
}
