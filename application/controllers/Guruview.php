<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Guruview extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Master_model', 'master');
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->library('upload');
        $this->load->library(['datatables', 'form_validation']);
        $this->form_validation->set_error_delimiters('', '');
    }

    public function output_json($data, $encode = true) {
        // Fix: Clean buffer to ensure valid JSON response
        ob_clean(); 
        if ($encode) {
            $data = json_encode($data);
        }
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index() {
        $user = $this->ion_auth->user()->row();
        
        // This relies on the fixed Dashboard_model::getDetailGuruByUserId using id_user logic
        $tp = $this->master->getTahunActive();
        $smt = $this->master->getSemesterActive();
        
        // Try primary lookup by id_user
        $guru = $this->dashboard->getDetailGuruByUserId($user->id, $tp->id_tp, $smt->id_smt);
        
        // Fallback: try lookup by username if id_user lookup fails
        if ($guru == null) {
            $guru = $this->dashboard->getDetailGuruByUsername($user->username, $tp->id_tp, $smt->id_smt);
        }

        if ($guru == null) {
            $guru = new stdClass();
            $guru->id_guru = null; // FIX: Don't use user_id as id_guru - this causes save to fail
            $guru->nama_guru = $user->first_name . ' ' . $user->last_name;
            $guru->foto = 'assets/img/user.jpg';
            $guru->nip = '-';
            $guru->email = $user->email;
            $guru->jenis_kelamin = null; // Important: Set null so "Pilih" placeholder works
            $guru->no_hp = isset($user->phone) ? $user->phone : '-'; // Populate from user if available
            $guru->agama = '-';
            $guru->no_ktp = '-';
            $guru->tempat_lahir = '-';
            $guru->tgl_lahir = '-';
            $guru->alamat_jalan = '-';
            $guru->kecamatan = '-';
            $guru->kabupaten = '-';
            $guru->provinsi = '-';
            $guru->kode_pos = '-';
            $guru->level = '-';
            $guru->nama_kelas = '-';
            $guru->wali_kelas = 0;
            $guru->kelas_id = 0;
            $guru->id_jabatan = 0;
            $guru->jabatan = '-';
            $guru->username = $user->username;
            $guru->password = null;
        }

        $data = [
            'user' => $user,
            'judul' => 'Profile',
            'subjudul' => 'Profile Saya',
            'setting' => $this->dashboard->getSetting(),
            'guru' => $guru,
            'tp' => $this->dashboard->getTahun(),
            'tp_active' => $tp,
            'smt' => $this->dashboard->getSemester(),
            'smt_active' => $smt
        ];

        // Define form inputs for view
        $inputsProfile = [
            ['label' => 'Nama Lengkap', 'name' => 'nama_guru', 'value' => $guru->nama_guru, 'icon' => 'far fa-user', 'type' => 'text'],
            ['label' => 'Email', 'name' => 'email', 'value' => $guru->email, 'icon' => 'far fa-envelope', 'type' => 'text'],
            ['label' => 'NIP / NUPTK', 'name' => 'nip', 'value' => $guru->nip, 'icon' => 'far fa-id-card', 'type' => 'text'],
            ['label' => 'Jenis Kelamin', 'name' => 'jenis_kelamin', 'value' => $guru->jenis_kelamin, 'icon' => 'fas fa-venus-mars', 'type' => 'text'],
            ['label' => 'No. Handphone', 'name' => 'no_hp', 'value' => $guru->no_hp, 'icon' => 'fa fa-phone', 'type' => 'number'],
            ['label' => 'Agama', 'name' => 'agama', 'value' => $guru->agama, 'icon' => 'far fa-user', 'type' => 'text']
        ];

        $inputsAlamat = [
            ['label' => 'NIK', 'name' => 'no_ktp', 'value' => $guru->no_ktp, 'icon' => 'far fa-id-card', 'type' => 'number'],
            ['label' => 'Tempat Lahir', 'name' => 'tempat_lahir', 'value' => $guru->tempat_lahir, 'icon' => 'fa fa-map-marker', 'type' => 'text'],
            ['label' => 'Tgl. Lahir', 'name' => 'tgl_lahir', 'value' => $guru->tgl_lahir, 'icon' => 'fa fa-calendar', 'type' => 'text'],
            ['label' => 'Alamat', 'name' => 'alamat_jalan', 'value' => $guru->alamat_jalan, 'icon' => 'fa fa-map-marker', 'type' => 'text'],
            ['label' => 'Kecamatan', 'name' => 'kecamatan', 'value' => $guru->kecamatan, 'icon' => 'fa fa-map-marker', 'type' => 'text'],
            ['label' => 'Kota/Kab.', 'name' => 'kabupaten', 'value' => $guru->kabupaten, 'icon' => 'fa fa-map-marker', 'type' => 'text'],
            ['label' => 'Provinsi', 'name' => 'provinsi', 'value' => $guru->provinsi, 'icon' => 'fa fa-map-marker', 'type' => 'text'],
            ['label' => 'Kode Pos', 'name' => 'kode_pos', 'value' => $guru->kode_pos, 'icon' => 'fa fa-envelope', 'type' => 'number']
        ];

        $data['input_profile'] = json_decode(json_encode($inputsProfile), FALSE);
        $data['input_alamat'] = json_decode(json_encode($inputsAlamat), FALSE);

        $this->load->view('members/guru/templates/header', $data);
        $this->load->view('members/guru/profile');
        $this->load->view('members/guru/templates/footer');
    }

    public function save() {
        $id_guru = $this->input->post('id_guru', true);
        $nip = $this->input->post('nip', true);
        $nama_guru = $this->input->post('nama_guru', true);
        $email = $this->input->post('email', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $no_hp = $this->input->post('no_hp', true);
        $agama = $this->input->post('agama', true);
        $no_ktp = $this->input->post('no_ktp', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $alamat_jalan = $this->input->post('alamat_jalan', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $provinsi = $this->input->post('provinsi', true);
        $kode_pos = $this->input->post('kode_pos', true);

        $tp = $this->master->getTahunActive();
        $smt = $this->master->getSemesterActive();
        
        $dbdata = $this->master->getGuruById($id_guru, $tp->id_tp, $smt->id_smt);
        
        // Ensure dbdata exists to avoid fatal error on nip check
        if (!$dbdata) {
             // Fallback if guru ID not found, though getDetailGuruByUserId fix should prevent this for valid logins
             $this->output_json(['status' => false, 'message' => 'Guru data not found in current semester']);
             return;
        }

        $u_nip = $dbdata->nip === $nip ? '' : '|is_unique[master_guru.nip]';
        
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|min_length[8]|max_length[30]' . $u_nip);
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim|min_length[1]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'status' => false,
                'errors' => [
                    'nip' => form_error('nip'),
                    'nama_guru' => form_error('nama_guru'),
                ]
            ];
            $this->output_json($data);
        } else {
            $input = [
                'nip' => $nip,
                'nama_guru' => $nama_guru,
                'email' => $email,
                'jenis_kelamin' => $jenis_kelamin,
                'no_hp' => $no_hp,
                'agama' => $agama,
                'no_ktp' => $no_ktp,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $this->strContains($tgl_lahir, '0000-') ? null : $tgl_lahir,
                'alamat_jalan' => $alamat_jalan,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'kode_pos' => $kode_pos,
                // Social Media Links
                'link_fb' => $this->input->post('link_fb', true),
                'link_ig' => $this->input->post('link_ig', true),
                'link_yt' => $this->input->post('link_yt', true),
                'link_linkedin' => $this->input->post('link_linkedin', true),
                'link_tiktok' => $this->input->post('link_tiktok', true)
            ];

            $action = $this->master->update('master_guru', $input, 'id_guru', $id_guru);

            if ($action) {
                $this->output_json(['status' => true]);
            } else {
                $this->output_json(['status' => false]);
            }
        }
    }

    private function strContains($string, $val) {
        return strpos($string, $val) !== false;
    }

    public function uploadFile($id_guru) {
        $guru = $this->master->getGuruById($id_guru);
        $data = ['status' => false, 'src' => '', 'filename' => '', 'type' => ''];

        if (isset($_FILES["foto"]["name"]) && !empty($_FILES["foto"]["name"])) {
            $config['upload_path'] = './uploads/profiles/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp'; 
            $config['overwrite'] = true;
            $config['file_name'] = $guru->nip . '_' . time();

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $data['src'] = $this->upload->display_errors();
            } else {
                $result = $this->upload->data();
                $file_path = $result['full_path'];

                $config_img['image_library'] = 'gd2';
                $config_img['source_image'] = $file_path;
                $config_img['maintain_ratio'] = TRUE;
                $config_img['width'] = 300;
                $config_img['quality'] = '80%';
                $config_img['new_image'] = './uploads/profiles/' . $guru->nip . '_' . time() . '.webp';
                
                $this->load->library('image_lib');
                $this->image_lib->initialize($config_img);
                
                if ($this->image_lib->resize()) {
                    $new_file = $this->image_lib->full_dst_path;
                    $final_filename = pathinfo($new_file, PATHINFO_BASENAME);
                    
                    if ($file_path != $new_file) {
                        @unlink($file_path);
                    }
                } else {
                    $final_filename = $result['file_name'];
                }
                
                $this->image_lib->clear();

                if (!empty($guru->foto) && file_exists(FCPATH . $guru->foto)) {
                    if (strpos($guru->foto, 'assets/img') === false) {
                         @unlink(FCPATH . $guru->foto);
                    }
                }

                $db_path = 'uploads/profiles/' . $final_filename;
                $this->db->set('foto', $db_path);
                $this->db->where('id_guru', $id_guru);
                $this->db->update('master_guru');

                $data['status'] = true;
                $data['src'] = base_url($db_path);
                $data['filename'] = pathinfo($final_filename, PATHINFO_FILENAME);
                $data['type'] = $result['file_type'];
            }
        }
        
        $this->output_json($data);
    }

    public function deleteFile($id_guru) {
        $guru = $this->master->getGuruById($id_guru);
        
        if (!empty($guru->foto)) {
            $file_path = FCPATH . $guru->foto;
            if (file_exists($file_path)) {
                if (strpos($guru->foto, 'assets/img') === false) {
                     @unlink($file_path);
                }
            }
        }

        $this->db->set('foto', NULL); 
        $this->db->where('id_guru', $id_guru);
        $this->db->update('master_guru');

        echo "File Delete Successfully";
    }
}
