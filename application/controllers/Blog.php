<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->library('pagination');
        $this->load->library('ion_auth');
    }

    public function index() {
        // Pagination Config
        $config['base_url'] = base_url('blog/index');
        $config['total_rows'] = $this->db->where('status', 1)->count_all_results('posts');
        $config['per_page'] = 6;
        
        // Styling Pagination (Tailwind/Bootstrap compatible classes)
        $config['full_tag_open'] = '<ul class="flex justify-center gap-2 mt-8">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><span class="px-4 py-2 bg-emerald-600 text-white rounded-lg">';
        $config['cur_tag_close'] = '</span></li>';
        $config['attributes'] = array('class' => 'px-4 py-2 bg-white text-gray-700 border border-gray-200 rounded-lg hover:bg-emerald-50');

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $posts = $this->db->where('status', 1)
                          ->order_by('tanggal', 'DESC')
                          ->limit($config['per_page'], $page)
                          ->get('posts')
                          ->result();
        
        $setting = $this->dashboard->getSetting();

        $data = [
            'posts' => $posts,
            'links' => $this->pagination->create_links(),
            'setting' => $setting,
            'title' => 'Berita & Artikel - ' . ($setting->sekolah ?? 'School'),
            'recent_posts' => $this->db->where('status', 1)->order_by('tanggal', 'DESC')->limit(5)->get('posts')->result()
        ];

        $this->load->view('blog/index', $data); // To be created
    }

    public function read($slug) {
        $post = $this->db->get_where('posts', ['slug' => $slug])->row();
        if (!$post) {
            show_404();
        }

        // Update views
        $this->db->where('id_post', $post->id_post);
        $this->db->update('posts', ['views' => $post->views + 1]);

        $setting = $this->dashboard->getSetting();
        $author = $this->ion_auth->user($post->id_user)->row();

        $data = [
            'post' => $post,
            'setting' => $setting,
            'author' => $author,
            'title' => $post->judul . ' - ' . ($setting->sekolah ?? 'School'),
            'recent_posts' => $this->db->where('status', 1)->order_by('tanggal', 'DESC')->limit(5)->get('posts')->result(),
            'comments' => $this->dashboard->getComments($post->id_post),
            'recent_comments' => $this->dashboard->getRecentComments()
        ];

        $this->load->view('blog/read', $data);
    }

    public function post_comment() {
        $id_post = $this->input->post('id_post');
        $slug = $this->input->post('slug');
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $body = $this->input->post('body', true);

        if ($name && $body) {
            $data = [
                'id_post' => $id_post,
                'name' => $name,
                'email' => $email,
                'body' => $body,
                'status' => 1 // Auto approve for now, or 0 if moderation needed
            ];
            $this->db->insert('comments', $data);
            $this->session->set_flashdata('success', 'Komentar berhasil dikirim!');
        } else {
            $this->session->set_flashdata('error', 'Nama dan Komentar wajib diisi.');
        }
        redirect('blog/read/'.$slug);
    }
}
