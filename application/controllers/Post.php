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
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/posts/' . $new_file_name;

                // Image Compression & Conversion (Using Updated Image_lib)
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = $original_path;
                $config_resize['create_thumb'] = FALSE;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width']     = 800; // Resize width
                $config_resize['height']    = 800; // Resize height
                $config_resize['quality']   = '60%'; // Compression quality
                $config_resize['new_image'] = $new_path; // Save as WebP

                $this->load->library('image_lib', $config_resize);
                
                // Clear previous config if loaded
                $this->image_lib->clear();
                $this->image_lib->initialize($config_resize);

                if ($this->image_lib->resize()) {
                    // Success converting to WebP
                    $gambar = 'uploads/posts/' . $new_file_name;
                    // Delete original file (jpg/png) if it's not the same as new file
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        unlink($original_path); 
                    }
                } else {
                    // Fallback to original if compression fails
                    $error_msg = $this->image_lib->display_errors();
                    log_message('error', 'Image Lib Error (Save): ' . $error_msg);
                    // Also write to a direct file we can check easily
                    file_put_contents('./application/logs/image_debug.txt', date('Y-m-d H:i:s') . " - Save Error: " . $error_msg . "\n", FILE_APPEND);
                    
                    $gambar = 'uploads/posts/' . $uploadData['file_name'];
                }
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
        $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan');
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
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/posts/' . $new_file_name;

                // Image Compression & Conversion (Using Updated Image_lib)
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = $original_path;
                $config_resize['create_thumb'] = FALSE;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width']     = 800;
                $config_resize['height']    = 800;
                $config_resize['quality']   = '60%';
                $config_resize['new_image'] = $new_path;

                $this->load->library('image_lib', $config_resize);
                
                // Clear previous config and initialize
                $this->image_lib->clear();
                $this->image_lib->initialize($config_resize);

                if ($this->image_lib->resize()) {
                    $data['gambar'] = 'uploads/posts/' . $new_file_name;
                    
                    // Delete original uploaded file (the jpg/png)
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        unlink($original_path); 
                    }

                    // DELETE OLD IMAGE FROM DATABASE IF EXISTS
                    $old_post = $this->db->get_where('posts', ['id_post' => $id_post])->row();
                    if ($old_post && !empty($old_post->gambar)) {
                        $old_image_path = './' . $old_post->gambar;
                        if (file_exists($old_image_path)) {
                            unlink($old_image_path);
                        }
                    }

                } else {
                    // Fallback to original if compression fails, but log it
                    $error_msg = $this->image_lib->display_errors();
                    log_message('error', 'Image Lib Error (Update): ' . $error_msg);
                    file_put_contents('./application/logs/image_debug.txt', date('Y-m-d H:i:s') . " - Update Error: " . $error_msg . "\n", FILE_APPEND);

                    $data['gambar'] = 'uploads/posts/' . $uploadData['file_name'];
                    
                    // Logic delete old image even if compression fails (standard update)
                    $old_post = $this->db->get_where('posts', ['id_post' => $id_post])->row();
                    if ($old_post && !empty($old_post->gambar)) {
                        $old_image_path = './' . $old_post->gambar;
                        if (file_exists($old_image_path)) {
                            unlink($old_image_path);
                        }
                    }
                }
            }
        }

        $this->db->where('id_post', $id_post);
        $this->db->update('posts', $data);
        $this->session->set_flashdata('success', 'Artikel berhasil diperbarui');
        redirect('post');
    }

    public function delete($id) {
        $post = $this->db->get_where('posts', ['id_post' => $id])->row();
        if ($post && !empty($post->gambar)) {
            $path = './' . $post->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $this->db->where('id_post', $id);
        $this->db->delete('posts');
        $this->session->set_flashdata('success', 'Artikel berhasil dihapus');
        redirect('post');
    }
}
