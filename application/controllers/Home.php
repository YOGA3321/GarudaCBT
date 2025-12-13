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
		
		// Active Academic Year & Semester
		$tp = $this->dashboard->getTahunActive();
		$smt = $this->dashboard->getSemesterActive();

		// Teachers (Limited data for privacy: Name, Photo only)
		// Assuming getAllDataGuru returns necessary info. We might need to filter it in the view or here.
		$teachers = $this->master->getAllDataGuru($tp->id_tp, $smt->id_smt);
		
		// Extracurriculars
		$ekstras = $this->master->getAllEkstra();

		// Latest Posts (News)
		$news = $this->db->where('status', 1)
						 ->order_by('tanggal', 'DESC')
						 ->limit(3)
						 ->get('posts')
						 ->result();

		$data = [
			'setting' => $setting,
			'tp_active' => $tp,
			'smt_active' => $smt,
			'teachers' => $teachers,
			'ekstras' => $ekstras,
			'news' => $news,
			'title' => $setting->sekolah ?? 'School Profile'
		];

		$this->load->view('home', $data);
	}
}
