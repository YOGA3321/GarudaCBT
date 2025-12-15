<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function index() {
        $setting = $this->dashboard->getSetting();
        // Pagination for Gallery
        $this->load->library('pagination');

        $config['base_url'] = base_url('gallery/index');
        $config['total_rows'] = $this->db->count_all('master_gallery');
        $config['per_page'] = 12;
        
        // Use standard CodeIgniter pagination segment
        $config['full_tag_open'] = '<nav class="flex items-center gap-2 justify-center mt-12">';
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $gallery = $this->db->limit($config['per_page'], $page)
                            ->order_by('id_gallery', 'DESC')
                            ->get('master_gallery')
                            ->result();

        $data = [
            'setting' => $setting,
            'title' => 'Galeri Sekolah',
            'gallery' => $gallery,
            'pagination' => $this->pagination->create_links()
        ];

        $this->load->view('gallery/index', $data);
    }
}
