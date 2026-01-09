<?php
/*   ________________________________________
    |                 GarudaCBT              |
    |    https://github.com/garudacbt/cbt    |
    |________________________________________|
*/
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Dashboard_model extends CI_Model { 	public function getSetting() {
        // AUTO-RESTORE: Check if school_profile exists
        if (!$this->db->table_exists('school_profile')) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `school_profile` (
              `id_school_profile` int(11) NOT NULL AUTO_INCREMENT,
              `nama_sekolah` varchar(255) NOT NULL DEFAULT 'Nama Sekolah',
              `alamat_sekolah` text,
              `logo_sekolah` varchar(255) DEFAULT 'uploads/settings/logo.png',
              `admin_name` varchar(255) DEFAULT 'Administrator',
              `admin_foto` varchar(255) DEFAULT 'uploads/settings/admin.jpg',
              `kepala_sekolah` varchar(255) DEFAULT 'Kepala Sekolah',
              `nip_kepala` varchar(50) DEFAULT '',
              `tanda_tangan` varchar(255) DEFAULT 'uploads/settings/ttd.png',
              PRIMARY KEY (`id_school_profile`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            
            $this->db->query("INSERT INTO `school_profile` (`nama_sekolah`, `alamat_sekolah`) VALUES ('Garuda CBT', 'Alamat Sekolah')");
        }

		$setting = $this->db->get("setting")->row();
		$profile = $this->db->get("school_profile")->row();
		
        // Jika setting kosong, buat object standar agar tidak error
        if (!$setting) {
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
            $setting->link_fb = '';
            $setting->link_ig = '';
            $setting->link_yt = '';
            $setting->link_tiktok = '';
        }

		if($profile) {
			// Merge attributes
			foreach($profile as $key => $value) {
				$setting->$key = $value;
			}
		}
		return $setting;
	}
 public function getRunningText() { return $this->db->get("running_text")->result(); } public function total($table, $where = null) { goto M1B3B; G0rW0: return $this->db->get($table)->num_rows(); goto mvU3F; lEwV_: Vg77N: goto G0rW0; M1B3B: if (!($where != null)) { goto Vg77N; } goto t4Wb8; t4Wb8: $this->db->where($where); goto lEwV_; mvU3F: } public function hapus($table, $data, $pk) { $this->db->where_in($pk, $data); return $this->db->delete($table); } public function getProfileAdmin($id_user) { goto h3eT4; FWOQ_: return $this->db->get()->row(); goto cm_Zr; CHKpp: $this->db->where("a.id", $id_user); goto FWOQ_; h3eT4: $this->db->select("b.*"); goto XP7HB; jdvpf: $this->db->join("users_profile b", "a.id=b.id_user", "left"); goto CHKpp; XP7HB: $this->db->from("users a"); goto jdvpf; cm_Zr: } public function totalWaliKelas($id_tp, $id_smt) { goto ciDqP; BFag9: $this->db->where("id_smt", $id_smt); goto otKwu; R8N39: $this->db->where("id_tp", $id_tp); goto BFag9; ciDqP: $this->db->where("id_jabatan", "4"); goto R8N39; otKwu: return $this->db->get("jabatan_guru")->num_rows(); goto F8_Pi; F8_Pi: } public function totalSiswaKelas($id_kelas, $id_tp, $id_smt) { goto Y2uMG; e8qV8: $this->db->where("a.id_smt", $id_smt); goto iziKt; nm4fl: return $this->db->get()->num_rows(); goto j3LoU; KZF0w: $this->db->from("kelas_siswa a"); goto ePrsI; ePrsI: $this->db->where("a.id_tp", $id_tp); goto e8qV8; iziKt: $this->db->where("a.id_kelas", $id_kelas); goto nm4fl; Y2uMG: $this->db->select("a.id_siswa"); goto KZF0w; j3LoU: } public function totalPengawas() { goto oizkN; oizkN: $this->db->select("*"); goto HQPdK; HQPdK: $this->db->where("id_jadwal !=", "a:0:{}"); goto Gs9wN; Gs9wN: return $this->db->get("cbt_pengawas")->num_rows(); goto R8F9z; R8F9z: } 	public function totalJadwal() {
		$this->db->select('*');
		return $this->db->get('cbt_jadwal')->num_rows();
	}

	public function totalSiswaAktif($id_tp, $id_smt) {
		$this->db->where('id_tp', $id_tp);
		$this->db->where('id_smt', $id_smt);
		$this->db->from('kelas_siswa');
		$count = $this->db->count_all_results();
        if($count == 0) {
            return $this->db->count_all('master_siswa');
        }
        return $count;
	}

	public function totalGuruAktif($id_tp, $id_smt) {
		$this->db->distinct();
		$this->db->select('id_guru');
		$this->db->where('id_tp', $id_tp);
		$this->db->where('id_smt', $id_smt);
		$count = $this->db->get('jabatan_guru')->num_rows();
        if($count == 0) {
            return $this->db->count_all('master_guru');
        }
        return $count;
	}

	public function totalEkstra() {
		return $this->db->count_all('master_ekstra');
	}

	public function totalPrestasi() {
		$this->db->where('status', 1);
		$this->db->like('kategori', 'Prestasi'); 
		$this->db->from('posts');
		$count = $this->db->count_all_results();
        if($count == 0) {
            // Fallback: Count all published posts if no specific 'Prestasi' category found
             $this->db->where('status', 1);
             $this->db->from('posts');
             return $this->db->count_all_results();
        }
        return $count;
	}

	public function getQuotes() {
		return $this->db->get('quotes')->result();
	}

	public function getComments($id_post) {
		return $this->db->where('id_post', $id_post)
						->where('status', 1)
						->order_by('created_at', 'DESC')
						->get('comments')
						->result();
	}

	public function getRecentComments($limit = 5) {
		return $this->db->select('comments.*, posts.judul as post_title, posts.slug')
						->from('comments')
						->join('posts', 'comments.id_post = posts.id_post')
						->where('comments.status', 1)
						->order_by('comments.created_at', 'DESC')
						->limit($limit)
						->get()
						->result();
	}
    // De-obfuscated and fixed functions
    public function getDataTahun() {
        $this->datatables->select("id_tp, tahun, active");
        $this->datatables->from("master_tp");
        return $this->datatables->generate();
    }

    public function getTahun() {
        $this->db->order_by("tahun", "ASC");
        return $this->db->get("master_tp")->result();
    }

    public function getTahunById($id) {
        return $this->db->get_where("master_tp", "id_tp=" . $id)->row();
    }

    public function getTahunByTahun($tahun) {
        return $this->db->get_where("master_tp", "tahun=" . "\"" . $tahun . "\"")->row();
    }

    public function getTahunActive() {
        $this->db->select("id_tp, tahun");
        $this->db->from("master_tp");
        $this->db->where("active", 1);
        return $this->db->get()->row();
    }

    public function getSemester() {
        $this->db->order_by("smt", "ASC");
        return $this->db->get("master_smt")->result();
    }

    public function getSemesterById($id) {
        return $this->db->get_where("master_smt", "id_smt=" . $id)->row();
    }

    public function getSemesterByNama($nama_smt) {
        return $this->db->get_where("master_smt", "nama_smt=" . "\"" . $nama_smt . "\"")->row();
    }

    public function getSemesterActive() {
        $this->db->select("id_smt, nama_smt, smt");
        $this->db->from("master_smt");
        $this->db->where("active", 1);
        return $this->db->get()->row();
    }

    public function getDataGuruByUserId($id_user, $id_tp, $id_smt) {
        $this->db->query("SET SQL_BIG_SELECTS=1");
        $this->db->select("a.id_guru, a.nama_guru, a.nip, a.id_user, a.foto, b.id_jabatan, b.id_kelas as wali_kelas, f.level_id, g.level");
        $this->db->from("master_guru a");
        $this->db->join("jabatan_guru b", "a.id_guru=b.id_guru AND b.id_tp=" . $id_tp . " AND b.id_smt=" . $id_smt, "left");
        $this->db->join("level_guru e", "b.id_jabatan=e.id_level", "left");
        $this->db->join("master_kelas f", "a.id_guru=f.guru_id AND f.id_tp=" . $id_tp . " AND f.id_smt=" . $id_smt, "left");
        $this->db->join("level_kelas g", "f.level_id=g.id_level", "left");
        $this->db->where("a.id_user", $id_user);
        return $this->db->get()->row();
    }

    public function getDataGuruById($id_guru, $id_tp, $id_smt) {
        $this->db->query("SET SQL_BIG_SELECTS=1");
        $this->db->select("a.id_guru, a.nama_guru, a.nip, a.id_user, a.foto, b.id_jabatan, b.id_kelas as wali_kelas, f.level_id, g.level");
        $this->db->from("master_guru a");
        $this->db->join("jabatan_guru b", "a.id_guru=b.id_guru AND b.id_tp=" . $id_tp . " AND b.id_smt=" . $id_smt, "left");
        $this->db->join("level_guru e", "b.id_jabatan=e.id_level", "left");
        $this->db->join("master_kelas f", "a.id_guru=f.guru_id AND f.id_tp=" . $id_tp . " AND f.id_smt=" . $id_smt, "left");
        $this->db->join("level_kelas g", "f.level_id=g.id_level", "left");
        $this->db->where("a.id_guru", $id_guru);
        return $this->db->get()->row();
    }

    public function getListGuruByUserId($id_tp, $id_smt) {
        $this->db->query("SET SQL_BIG_SELECTS=1");
        $this->db->select("a.id_guru, a.nama_guru, a.id_user, a.foto, b.id_jabatan, b.id_kelas as wali_kelas, f.level_id, g.level");
        $this->db->from("master_guru a");
        $this->db->join("jabatan_guru b", "a.id_guru=b.id_guru AND b.id_tp=" . $id_tp . " AND b.id_smt=" . $id_smt, "left");
        $this->db->join("level_guru e", "b.id_jabatan=e.id_level", "left");
        $this->db->join("master_kelas f", "a.id_guru=f.guru_id AND f.id_tp=" . $id_tp . " AND f.id_smt=" . $id_smt, "left");
        $this->db->join("level_kelas g", "f.level_id=g.id_level", "left");
        $query = $this->db->get()->result();
        $rest = [];
        foreach ($query as $guru) {
             $rest[$guru->id_guru] = $guru;
        }
        return $rest;
    }

    public function getDetailGuruByUserId($id_user, $id_tp, $id_smt) {
        // FIX: Changed where('a.id_guru') to where('a.id_user')
        $this->db->query("SET SQL_BIG_SELECTS=1");
        $this->db->select("*");
        $this->db->from("master_guru a");
        $this->db->join("jabatan_guru b", "a.id_guru=b.id_guru AND b.id_tp=" . $id_tp . " AND b.id_smt=" . $id_smt, "left");
        $this->db->join("level_guru e", "b.id_jabatan=e.id_level", "left");
        $this->db->join("master_kelas f", "a.id_guru=f.guru_id AND f.id_tp=" . $id_tp . " AND f.id_smt=" . $id_smt, "left");
        $this->db->join("level_kelas g", "f.level_id=g.id_level", "left");
        $this->db->where("a.id_user", $id_user);
        return $this->db->get()->row();
    }

    /**
     * Get guru detail by username (fallback when id_user is not set)
     * Joins with users table to match via username
     */
    public function getDetailGuruByUsername($username, $id_tp, $id_smt) {
        $this->db->query("SET SQL_BIG_SELECTS=1");
        $this->db->select("a.*, b.id_jabatan, e.level, f.nama_kelas, g.level as level_kelas");
        $this->db->from("master_guru a");
        $this->db->join("jabatan_guru b", "a.id_guru=b.id_guru AND b.id_tp=" . $id_tp . " AND b.id_smt=" . $id_smt, "left");
        $this->db->join("level_guru e", "b.id_jabatan=e.id_level", "left");
        $this->db->join("master_kelas f", "a.id_guru=f.guru_id AND f.id_tp=" . $id_tp . " AND f.id_smt=" . $id_smt, "left");
        $this->db->join("level_kelas g", "f.level_id=g.id_level", "left");
        $this->db->where("a.username", $username); // Direct lookup on master_guru.username
        return $this->db->get()->row();
    }

    public function getKelasByMapel($id_mapel = null) {
        $this->db->select('*');
        $this->db->from('master_kelas a');
        $this->db->join('master_mapel b', 'a.mapel_id=b.id_mapel', 'left');
        $this->db->join('level_guru d', 'a.level_id=d.id_level', 'left');
        return $this->db->get()->row();
    }

    public function get_where($table, $pk, $id, $join = null, $order = null) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($pk, $id);
        if ($join !== null) {
            foreach ($join as $table => $field) {
                $this->db->join($table, $field);
            }
        }
        if ($order !== null) {
            foreach ($order as $field => $sort) {
                $this->db->order_by($field, $sort);
            }
        }
        return $this->db->get();
    }

    public function create($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update($table, $data, $pk, $id = null, $batch = false) {
        if ($batch === false) {
            $insert = $this->db->update($table, $data, array($pk => $id));
        } else {
            $insert = $this->db->update_batch($table, $data, $pk);
        }
        return $insert;
    }

    public function getDataSiswa($username, $id_tp, $id_smt) {
        // Obfuscated code breakdown cleanup
        // SELECT * FROM master_sisw1 a (typo: master_siswa)
        // LEFT JOIN kelas_iswa b (typo: kelas_siswa) ON a.id_siswa=b.id_siswa (typo: 9d_siswa) AND b.id_tp=3 AND b.id_smt=2
        // LEFT JOIN master_kelas c ON b.id_kelas=c.id_kelas AND c.id_tp=3 AND c.id_smt=2
        // LEFT JOIN cbt_sesi_siswa d ON a.id_siswa=d.siswa_id WHERE username = 'kombon'
        
        $this->db->select('*');
        $this->db->from('master_siswa a');
        $this->db->join('kelas_siswa b', 'a.id_siswa=b.id_siswa AND b.id_tp=' . $id_tp . ' AND b.id_smt=' . $id_smt, 'left');
        $this->db->join('master_kelas c', 'b.id_kelas=c.id_kelas AND c.id_tp=' . $id_tp . ' AND c.id_smt=' . $id_smt, 'left');
        $this->db->join('cbt_sesi_siswa d', 'a.id_siswa=d.siswa_id', 'left');
        $this->db->where('username', $username);
        return $this->db->get()->row();
    }

    public function loadPengumuman($id_for) {
        $this->db->select('a.*, b.nama_guru, b.foto');
        $this->db->from('pengumuman a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->where('kepada', $id_for);
        return $this->db->get()->result();
    }

    public function loadJadwalHariIni($id_tp, $id_smt, $id_kelas = null, $id_hari = null) {
        $this->db->select('*');
        $this->db->from('kelas_jadwal_mapel a');
        $this->db->join('master_mapel b', 'b.id_mapel=a.id_mapel', 'left');
        $this->db->where('a.id_tp', $id_tp);
        $this->db->where('a.id_smt', $id_smt);
        if ($id_kelas != null) {
            $this->db->where('a.id_kelas', $id_kelas); // Correction from id_keas
        }
        if ($id_hari != null) {
            $this->db->where('a.id_hari', $id_hari);
        }
        return $this->db->get()->result();
    }

    public function getJadwalKbm($id_tp, $id_smt, $id_kelas = null) {
        $this->db->select('*');
        $this->db->from('kelas_jadwal_kbm');
        $this->db->where('id_tp', $id_tp);
        $this->db->where('id_smt', $id_smt);
        if ($id_kelas != null) {
            $this->db->where('id_kelas', $id_kelas);
            $query = $this->db->get()->row();
        } else {
            $query = $this->db->get()->result();
        }
        return $query;
    }
}
