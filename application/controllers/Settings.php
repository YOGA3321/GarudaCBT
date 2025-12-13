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
        $this->load->helper('directory');
        $this->load->library('upload');
    }

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
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
        $sambutan = $this->input->post('sambutan', true); // New Field

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
            'tanda_tangan' => $tanda_tangan,
            'logo_kanan' => $logo_kanan,
            'logo_kiri' => $logo_kiri
        ];

        $this->db->where('id_setting', 1);
        $update = $this->db->update('setting', $insert);
        $this->output_json($update);
    }

    public function uploadFile($name) {
        if(isset($_FILES['logo']['name'])){
            $config['upload_path'] = './uploads/settings/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
            $config['overwrite'] = true;
            $config['file_name'] = $name;

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('logo')){
                $data['status'] = false;
                $data['src'] = $this->upload->display_errors();
            }else{
                $result = $this->upload->data();
                $data['src'] = base_url().'uploads/settings/'.$result['file_name'];
                $data['filename'] = pathinfo($result['file_name'], PATHINFO_FILENAME);
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
        if (unlink($file_name)) {
            echo "File Delete Successfully";
        }
    }

    public function profile() {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul' => 'Profile Sekolah',
            'subjudul' => 'Sejarah, Visi Misi, & Struktur',
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
        
        $struktur_organisasi = $this->input->post('struktur_organisasi_old');

        // Handle Image Upload for Org Structure
        if(!empty($_FILES['struktur_organisasi']['name'])) {
            $config['upload_path'] = './uploads/settings/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = 'struktur_'.time();
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('struktur_organisasi')){
                $uploadData = $this->upload->data();
                $struktur_organisasi = 'uploads/settings/'.$uploadData['file_name'];
            }
        }

        $data = [
            'sejarah' => $sejarah,
            'visi_misi' => $visi_misi,
            'link_fb' => $link_fb,
            'link_ig' => $link_ig,
            'link_yt' => $link_yt,
            'struktur_organisasi' => $struktur_organisasi
        ];

        // Ensure row exists
        $check = $this->db->get('school_profile');
        if($check->num_rows() > 0) {
            $this->db->where('id_profile', 1);
            $this->db->update('school_profile', $data);
        } else {
            $data['id_profile'] = 1;
            $this->db->insert('school_profile', $data);
        }

        redirect('settings/profile');
    }
}
