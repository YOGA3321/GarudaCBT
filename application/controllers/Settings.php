<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } else if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Admin yang boleh mengakses halaman ini', 403, 'Akses Dilarang');
        }
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->model('Settings_model', 'settings');
        $this->load->model('Content_model', 'content');
        $this->load->helper('directory');
        $this->load->library('upload');
    }

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
        // Clean buffer to prevent PHP warnings breaking JSON
        if (ob_get_length()) ob_clean();
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Profile Sekolah',
            'subjudul' => '',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/data');
        $this->load->view('_templates/dashboard/_footer');
    }

    public function dbManager() { 
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Backup dan Restore',
            'subjudul' => 'Backup dan Restore',
            'setting' => $this->settings->getSetting(),
            'list' => directory_map('./backups/'),
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/db');
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveSetting() {
        // Collect Input
        $sekolah = $this->input->post('nama_sekolah', true);
        $nss = $this->input->post('nss', true);
        $npsn = $this->input->post('npsn', true);
        $jenjang = $this->input->post('jenjang', true);
        $satuan_pendidikan = $this->input->post('satuan_pendidikan', true);
        $alamat = $this->input->post('alamat', true);
        $desa = $this->input->post('desa', true);
        $kec = $this->input->post('kec', true);
        $kota = $this->input->post('kota', true);
        $kodepos = $this->input->post('kode_pos', true);
        $prov = $this->input->post('provinsi', true);
        $web = $this->input->post('web', true);
        $fax = $this->input->post('fax', true);
        $email = $this->input->post('email', true);
        $tlp = $this->input->post('tlp', true);
        $kepsek = $this->input->post('kepsek', true);
        $nip = $this->input->post('nip', true);
        $nama_aplikasi = $this->input->post('nama_aplikasi', true);
        $sambutan = $this->input->post('sambutan', true); 
        $motto = $this->input->post('motto', true);

        // Clean up file paths from base_url()
        $tanda_tangan = str_replace(base_url(), '', $this->input->post('tanda_tangan', true) ?? '');
        $logo_kanan = str_replace(base_url(), '', $this->input->post('logo_kanan', true) ?? '');
        $logo_kiri = str_replace(base_url(), '', $this->input->post('logo_kiri', true) ?? '');

        $insert = [
            'sekolah' => $sekolah,
            'nss' => $nss,
            'npsn' => $npsn,
            'jenjang' => $jenjang,
            'satuan_pendidikan' => $satuan_pendidikan,
            'alamat' => $alamat,
            'desa' => $desa,
            'kecamatan' => $kec,
            'kota' => $kota,
            'kode_pos' => $kodepos,
            'provinsi' => $prov,
            'web' => $web,
            'fax' => $fax,
            'email' => $email,
            'telp' => $tlp,
            'kepsek' => $kepsek,
            'nip' => $nip,
            'nama_aplikasi' => $nama_aplikasi,
            'sambutan' => $sambutan,
            'motto' => $motto,
            'tanda_tangan' => $tanda_tangan,
            'logo_kanan' => $logo_kanan,
            'logo_kiri' => $logo_kiri
        ];

        // Fetch old setting for cleanup
        $old = $this->db->get_where('setting', ['id_setting' => 1])->row();

        $this->db->where('id_setting', 1);
        $update = $this->db->update('setting', $insert);

        if ($update) {
            // Cleanup Old Files if changed
            if ($old->tanda_tangan !== $tanda_tangan && !empty($old->tanda_tangan)) {
                if (file_exists('./' . $old->tanda_tangan)) @unlink('./' . $old->tanda_tangan);
            }
            if ($old->logo_kanan !== $logo_kanan && !empty($old->logo_kanan)) {
                if (file_exists('./' . $old->logo_kanan)) @unlink('./' . $old->logo_kanan);
            }
            if ($old->logo_kiri !== $logo_kiri && !empty($old->logo_kiri)) {
                if (file_exists('./' . $old->logo_kiri)) @unlink('./' . $old->logo_kiri);
            }
        }
        $this->output_json($update);
    }

    public function uploadFile($name) {
        if(isset($_FILES['logo']['name'])){
            $config['upload_path'] = './uploads/settings/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['file_name'] = $name . '_' . time(); // Unique name to avoid cache and overwrite
            
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('logo')){
                $data['status'] = false;
                $data['src'] = $this->upload->display_errors();
            }else{
                $uploadData = $this->upload->data();
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/settings/' . $new_file_name;

                 // Image Compression & Conversion
                 $config_resize['image_library'] = 'gd2';
                 $config_resize['source_image'] = $original_path;
                 $config_resize['create_thumb'] = FALSE;
                 $config_resize['maintain_ratio'] = TRUE;
                 $config_resize['width']     = 800; // Logos usually small, but keep decent resolution
                 $config_resize['quality']   = '90%';
                 $config_resize['new_image'] = $new_path;

                 $this->load->library('image_lib', $config_resize);
                 $this->image_lib->clear();
                 $this->image_lib->initialize($config_resize);

                 if ($this->image_lib->resize()) {
                    $final_image_name = $new_file_name;
                    // Delete original if different (e.g. jpg -> webp)
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        @unlink($original_path); 
                    }
                 } else {
                    $final_image_name = $uploadData['file_name'];
                 }

                $data['src'] = base_url().'uploads/settings/'.$final_image_name;
                $data['filename'] = $final_image_name;
                $data['status'] = true;
            }
            $data['size'] = $_FILES['logo']['size'];
            $data['type'] = $_FILES['logo']['type'];
        }else{
             $data['src'] = '';
        }
        $this->output_json($data);
    }

    public function deleteFile() {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src ?? '');
        if (@unlink($file_name)) {
            echo "File Delete Successfully";
        }
    }

    public function school() {
        $this->index();
    }

    public function profile() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Profile Sekolah',
            'subjudul' => 'Sejarah, Visi Misi, & Struktur',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(), // This now includes profile data merged
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/profile'); // View to create
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveProfile() {
        $sejarah = $this->input->post('sejarah', false);
        $visi_misi = $this->input->post('visi_misi', false);
        $link_fb = $this->input->post('link_fb', true);
        $link_ig = $this->input->post('link_ig', true);
        $link_yt = $this->input->post('link_yt', true);
        $link_tiktok = $this->input->post('link_tiktok', true);
        
        $struktur_organisasi = $this->input->post('struktur_organisasi_old');

        // Handle Image Upload for Org Structure
        if(!empty($_FILES['struktur_organisasi']['name'])) {
            $config['upload_path'] = './uploads/settings/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['file_name'] = 'struktur_'.time();
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('struktur_organisasi')){
                $uploadData = $this->upload->data();
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/settings/' . $new_file_name;

                 // Image Compression & Conversion
                 $config_resize['image_library'] = 'gd2';
                 $config_resize['source_image'] = $original_path;
                 $config_resize['create_thumb'] = FALSE;
                 $config_resize['maintain_ratio'] = TRUE;
                 $config_resize['width']     = 1280; 
                 $config_resize['quality']   = '80%';
                 $config_resize['new_image'] = $new_path;

                 $this->load->library('image_lib', $config_resize);
                 $this->image_lib->clear();
                 $this->image_lib->initialize($config_resize);

                 if ($this->image_lib->resize()) {
                    $struktur_organisasi = 'uploads/settings/'.$new_file_name;
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        @unlink($original_path); 
                    }
                 } else {
                    $struktur_organisasi = 'uploads/settings/'.$uploadData['file_name'];
                 }
            }
        }

        $data = [
            'sejarah' => $sejarah,
            'visi_misi' => $visi_misi,
            'link_fb' => $link_fb,
            'link_ig' => $link_ig,
            'link_yt' => $link_yt,
            'link_tiktok' => $link_tiktok,
            'struktur_organisasi' => $struktur_organisasi
        ];

        // Ensure row exists
        $check = $this->db->get('school_profile');
        if($check->num_rows() > 0) {
            $old = $check->row();
            // Cleanup old file if replaced
            if ($old->struktur_organisasi !== $struktur_organisasi && !empty($old->struktur_organisasi)) {
                if (file_exists('./' . $old->struktur_organisasi)) @unlink('./' . $old->struktur_organisasi);
            }

            $this->db->where('id_profile', 1);
            $this->db->update('school_profile', $data);
        } else {
            $data['id_profile'] = 1;
            $this->db->insert('school_profile', $data);
        }

        redirect('settings/profile');
    }

    // --- SLIDER FUNCTIONS ---
    public function slider() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Kelola Slider',
            'subjudul' => 'Gambar Slider Halaman Utama',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'sliders' => $this->content->getSlider(),
            'next_urutan' => $this->db->count_all('master_slider') + 1,
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/slider');
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveSlider() {
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'slider_'.time();
            
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/slider/' . $new_file_name;

                // Image Compression & Conversion
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = $original_path;
                $config_resize['create_thumb'] = FALSE;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width']     = 1920; 
                $config_resize['quality']   = '80%';
                $config_resize['new_image'] = $new_path;

                $this->load->library('image_lib', $config_resize);
                $this->image_lib->clear();
                $this->image_lib->initialize($config_resize);

                if ($this->image_lib->resize()) {
                    $final_image = 'uploads/slider/' . $new_file_name;
                    // Delete original if different
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        unlink($original_path); 
                    }
                } else {
                    // Fallback
                    $final_image = 'uploads/slider/' . $uploadData['file_name'];
                }

                $data = [
                    'gambar' => $final_image,
                    'caption' => $this->input->post('caption'),
                    'urutan' => $this->input->post('urutan'),
                    'active' => 1
                ];
                $this->content->insertSlider($data);
                $this->session->set_flashdata('success', 'Slider berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }
        redirect('settings/slider');
    }

    public function editSlider($id) {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Edit Slider',
            'subjudul' => 'Edit Data Slider',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'slider' => $this->content->getSliderById($id)
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/slider_edit', $data);
        $this->load->view('_templates/dashboard/_footer');
    }

    public function updateSliderAction() {
        $id = $this->input->post('id_slider');
        
        $data = [
            'caption' => $this->input->post('caption')
        ];

        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'slider_'.time();

            if (!is_dir('./uploads/slider/')) mkdir('./uploads/slider/', 0777, true);

            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/slider/' . $new_file_name;

                 // Image Compression & Conversion
                 $config_resize['image_library'] = 'gd2';
                 $config_resize['source_image'] = $original_path;
                 $config_resize['create_thumb'] = FALSE;
                 $config_resize['maintain_ratio'] = TRUE;
                 $config_resize['width']     = 1920; 
                 $config_resize['quality']   = '80%';
                 $config_resize['new_image'] = $new_path;
 
                 $this->load->library('image_lib', $config_resize);
                 $this->image_lib->clear();
                 $this->image_lib->initialize($config_resize);

                 if ($this->image_lib->resize()) {
                    $data['gambar'] = 'uploads/slider/' . $new_file_name;
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        unlink($original_path); 
                    }
                 } else {
                    $data['gambar'] = 'uploads/slider/' . $uploadData['file_name'];
                 }
                
                // Remove old image
                $old = $this->content->getSliderById($id);
                if($old && file_exists('./' . $old->gambar)) {
                    unlink('./' . $old->gambar);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('settings/editSlider/'.$id);
                return;
            }
        }
        
        $this->content->updateSlider($id, $data);
        $this->session->set_flashdata('success', 'Slider berhasil diperbarui');
        redirect('settings/slider');
    }

    public function updateSliderOrder() {
        $positions = $this->input->post('positions');
        // positions is an array of [id => order]
        if ($positions) {
            foreach ($positions as $pos) {
                $this->db->where('id_slider', $pos[0]);
                $this->db->update('master_slider', ['urutan' => $pos[1]]);
            }
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteSlider($id) {
        $slider = $this->db->get_where('master_slider', ['id_slider' => $id])->row();
        if($slider) {
            if(file_exists('./' . $slider->gambar)) {
                unlink('./' . $slider->gambar);
            }
            $this->content->deleteSlider($id);
            $this->session->set_flashdata('success', 'Slider berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('settings/slider');
    }

    // --- QUOTES FUNCTIONS ---
    public function quotes() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Kelola Quotes',
            'subjudul' => 'Kata Mutiara & Testimoni',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'quotes' => $this->content->getQuotes(),
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/quotes', $data);
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveQuote() {
        $data = [
            'content' => $this->input->post('content'),
            'author' => $this->input->post('author'),
            'role' => $this->input->post('role')
        ];
        $this->content->insertQuote($data);
        redirect('settings/quotes');
    }

    public function deleteQuote($id) {
        $this->content->deleteQuote($id);
        redirect('settings/quotes');
    }

    public function updateQuote() {
        $id = $this->input->post('id_quote');
        $data = [
            'content' => $this->input->post('content'),
            'author' => $this->input->post('author'),
            'role' => $this->input->post('role')
        ];
        $this->content->updateQuote($id, $data);
        redirect('settings/quotes');
    }

    // --- GALLERY FUNCTIONS ---
    public function gallery() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Kelola Galeri',
            'subjudul' => 'Foto Kegiatan Sekolah',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'gallery' => $this->content->getGallery(),
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/gallery', $data);
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveGallery() {
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/gallery/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'gallery_'.time();
            
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload', $config);
            $this->upload->initialize($config); // Ensure init

            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/gallery/' . $new_file_name;

                 // Image Compression & Conversion
                 $config_resize['image_library'] = 'gd2';
                 $config_resize['source_image'] = $original_path;
                 $config_resize['create_thumb'] = FALSE;
                 $config_resize['maintain_ratio'] = TRUE;
                 $config_resize['width']     = 1280; // Reasonable HD size for gallery
                 $config_resize['quality']   = '80%';
                 $config_resize['new_image'] = $new_path;
 
                 $this->load->library('image_lib', $config_resize);
                 $this->image_lib->clear();
                 $this->image_lib->initialize($config_resize);

                 if ($this->image_lib->resize()) {
                    $final_image = 'uploads/gallery/' . $new_file_name;
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        unlink($original_path); 
                    }
                 } else {
                    $final_image = 'uploads/gallery/' . $uploadData['file_name'];
                 }

                $data = [
                    'gambar' => $final_image,
                    'judul' => $this->input->post('judul'),
                    'kategori' => $this->input->post('kategori'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->content->insertGallery($data);
                $this->session->set_flashdata('success', 'Foto berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }
        redirect('settings/gallery');
    }

    public function editGallery($id) {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Edit Galeri',
            'subjudul' => 'Edit Data Foto',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'gallery' => $this->content->getGalleryById($id)
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/gallery_edit', $data);
        $this->load->view('_templates/dashboard/_footer');
    }

    public function updateGallery() {
        $id = $this->input->post('id_gallery');
        $data = [
            'judul' => $this->input->post('judul'),
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/gallery/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'gallery_'.time();
            
            if (!is_dir('./uploads/gallery/')) mkdir('./uploads/gallery/', 0777, true);
            
            $this->load->library('upload', $config); // Reload library just in case
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $original_path = $uploadData['full_path'];
                $file_name_no_ext = $uploadData['raw_name'];
                $new_file_name = $file_name_no_ext . '.webp';
                $new_path = './uploads/gallery/' . $new_file_name;

                 // Image Compression & Conversion
                 $config_resize['image_library'] = 'gd2';
                 $config_resize['source_image'] = $original_path;
                 $config_resize['create_thumb'] = FALSE;
                 $config_resize['maintain_ratio'] = TRUE;
                 $config_resize['width']     = 1280; 
                 $config_resize['quality']   = '80%';
                 $config_resize['new_image'] = $new_path;
 
                 $this->load->library('image_lib', $config_resize);
                 $this->image_lib->clear();
                 $this->image_lib->initialize($config_resize);

                 if ($this->image_lib->resize()) {
                    $data['gambar'] = 'uploads/gallery/' . $new_file_name;
                    if ($original_path !== $new_path && file_exists($original_path)) {
                        unlink($original_path); 
                    }
                 } else {
                    $data['gambar'] = 'uploads/gallery/' . $uploadData['file_name'];
                 }
                
                // Remove old image
                $old = $this->content->getGalleryById($id);
                if($old && file_exists('./' . $old->gambar)) {
                    unlink('./' . $old->gambar);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('settings/editGallery/'.$id);
                return;
            }
        }

        $this->content->updateGallery($id, $data);
        $this->session->set_flashdata('success', 'Galeri berhasil diperbarui');
        redirect('settings/gallery');
    }

    public function deleteGallery($id) {
        $gallery = $this->content->getGalleryById($id);
        if($gallery && file_exists('./' . $gallery->gambar)) {
             unlink('./' . $gallery->gambar);
        }
        $this->content->deleteGallery($id);
        
        // Cek jika request dari AJAX (untuk SweetAlert2 jika diperlukan response json)
        // Tapi karena struktur view masih redirect, kita pakai flashdata
        $this->session->set_flashdata('success', 'Foto berhasil dihapus');
        redirect('settings/gallery');
    }

    // --- EXTERNAL LINKS FUNCTIONS ---
    public function links() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Tautan Luar',
            'subjudul' => 'Kelola Link Eksternal Footer',
            'profile' => $this->dashboard->getProfileAdmin($user->id),
            'setting' => $this->dashboard->getSetting(),
            'links' => $this->content->getLinks(),
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $this->dashboard->getTahunActive(),
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $this->dashboard->getSemesterActive()
        ];
        $this->load->view('_templates/dashboard/_header', $data);
        $this->load->view('setting/links', $data);
        $this->load->view('_templates/dashboard/_footer');
    }

    public function saveLink() {
        $data = [
            'judul' => $this->input->post('judul'),
            'url' => $this->input->post('url'),
            'target' => '_blank',
            'status' => 1
        ];
        $this->content->insertLink($data);
        redirect('settings/links');
    }

    public function deleteLink($id) {
        $this->content->deleteLink($id);
        redirect('settings/links');
    }

    public function updateLink() {
        $id = $this->input->post('id_link');
        $data = [
            'judul' => $this->input->post('judul'),
            'url' => $this->input->post('url')
        ];
        $this->content->updateLink($id, $data);
        redirect('settings/links');
    }
}
