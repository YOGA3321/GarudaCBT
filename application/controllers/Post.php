<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Admin yang boleh mengakses halaman ini', 403, 'Akses Dilarang');
        }
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function index() {
        $user = $this->ion_auth->user()->row();
        // Fetch all posts - quick query since we don't have a specific model method yet
        $posts = $this->db->get('posts')->result();

        $data = [
            'user' => $user,
            'setting' => $this->dashboard->getSetting(),
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'judul' => 'Manajemen Artikel',
            'subjudul' => 'Daftar Berita/Artikel',
            'posts' => $posts,
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];

        // We will create a simple view for listing posts
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('post/list', $data); // We need to create this view
        $this->load->view('_templates/dashboard/_footer');
    }

    public function add() {
        $user = $this->ion_auth->user()->row();
        $data = [
             'user' => $user,
            'setting' => $this->dashboard->getSetting(),
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'judul' => 'Tambah Artikel',
            'subjudul' => 'Tulis Berita Baru',
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('post/add', $data); // We need to create this view
        $this->load->view('_templates/dashboard/_footer');
    }

    public function save() {
        $judul = $this->input->post('judul', true);
        $isi = $this->input->post('isi', false); // Allow HTML
        $status = $this->input->post('status', true);
        $slug = url_title($judul, 'dash', true);

        // Upload Image
        $gambar = '';
        if(!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/posts/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'post_'.time();
            $this->load->library('upload', $config);
            
            if(!is_dir('./uploads/posts/')) mkdir('./uploads/posts/', 0777, true);

            if($this->upload->do_upload('gambar')){
                $uploadData = $this->upload->data();
                $gambar = 'uploads/posts/'.$uploadData['file_name'];
            }
        }

        $data = [
            'judul' => $judul,
            'slug' => $slug,
            'isi' => $isi,
            'gambar' => $gambar,
            'id_user' => $this->ion_auth->user()->row()->id,
            'status' => $status
        ];

        $this->db->insert('posts', $data);
        redirect('post');
    }

    public function edit($id) {
        $user = $this->ion_auth->user()->row();
        $post = $this->db->get_where('posts', ['id_post' => $id])->row();
        
        if(!$post) show_404();

        $data = [
             'user' => $user,
            'setting' => $this->dashboard->getSetting(),
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'judul' => 'Manajemen Artikel',
            'subjudul' => 'Edit Berita',
            'post' => $post,
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('post/edit', $data);
        $this->load->view('_templates/dashboard/_footer');
    }

    public function update() {
        $id_post = $this->input->post('id_post', true);
        $judul = $this->input->post('judul', true);
        $isi = $this->input->post('isi', false);
        $status = $this->input->post('status', true);
        $slug = url_title($judul, 'dash', true);

        $data = [
            'judul' => $judul,
            'slug' => $slug, // Update slug too? Maybe optional but good for SEO refresh
            'isi' => $isi,
            'status' => $status
        ];

        // Upload Image
        if(!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/posts/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'post_'.time();
            $this->load->library('upload', $config);
            
            if(!is_dir('./uploads/posts/')) mkdir('./uploads/posts/', 0777, true);

            if($this->upload->do_upload('gambar')){
                $uploadData = $this->upload->data();
                $data['gambar'] = 'uploads/posts/'.$uploadData['file_name'];
                
                // Remove old image? Ideally yes, but skipping for safety/simplicity now
            }
        }

        $this->db->where('id_post', $id_post);
        $this->db->update('posts', $data);
        redirect('post');
    }

    public function delete($id) {
        $this->db->where('id_post', $id);
        $this->db->delete('posts');
        redirect('post');
    }
}
