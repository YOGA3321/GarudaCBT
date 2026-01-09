<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasAction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Master_model', 'master');
        $this->load->model('Kelas_model', 'kelas');
        $this->load->model('Dashboard_model', 'dashboard');
    }

    public function naikKelas()
    {
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        $posts = json_decode($this->input->post('kelas', true));
        $mode = $this->input->post('mode', true); // 'persiswa' or 'semua'? not fully used in logic snippet but kept

        $siswakelas = [];
        // Group students by new destination class
        // $posts = [{id_siswa: 1, kelas_baru: ID_OLD_CLASS}, ...]
        // Wait, 'kelas_baru' in POST seems to be the ID of the OLD class that we want to promote INTO? 
        // OR is it the ID of the CLASS from PREVIOUS YEAR?
        
        // Let's look at naikkelas.php JS:
        // item ["kelas_baru"] = $(this).closest('tr').find('.select-kelas').val();
        // The dropdown contains classes from Previous Year? Or Current Year?
        // Logic in naikkelas.php:
        // $data['kelas_baru'] = $this->dropdown->getAllKelas($tp->id_tp, '1'); // Target TP
        // So `kelas_baru` IS the ID of an existing class in the NEW TP.
        // Wait, if users select "Kelas 2" (New TP), it has an ID.
        // BUT the user claims "Kenaikan Kelas Creates New Class".
        // If the dropdown allows selecting a "Name" that doesn't exist? No, it's a select option.
        
        // RE-READING LOGIC FROM DATAKELAS:
        // $idkelases[] = $d->kelas_baru;
        // foreach ($idkelases as $ik) { $kelas = $this->kelas->get_one($ik, $tp->id_tp - 1, '2'); }
        // Wait. $ik (kelas_baru from post) is used to fetch `get_one(..., tp-1, '2')` ??
        // This implies `kelas_baru` sent from JS is actually the **SOURCE** class ID or **DESTINATION**?
        
        // Let's check naikkelas.php dropdown values.
        // The dropdown is `$kelas_baru` ($this->dropdown->getAllKelas($tp->id_tp, '1')).
        // IF the class doesn't exist yet, the dropdown is empty.
        // THE USER said: "lihat kelasnya ... akan kosong ... naikkan kelas ... akan membuat kelas baru".
        // This implies the dropdown might contain "Names" relative to OLD classes?
        
        // Wait, `naikkelas.php` loop:
        // foreach ($kelases as $kls)
        // $kelases = getAllKelas($tp->id_tp - 1, '2', '> $lvlKls');
        // This `$kelases` is for the "Pilih Kelas Baru" dropdown?
        // NO.
        // Line 136: `foreach ($kelases as $key => $kls)`
        // `kelases` comes from controller `kenaikan`.
        // `naikkelas.php` controller method:
        // $data['kelases'] = $this->dropdown->getAllKelas($tp->id_tp - 1, '2', '=' . ($lvlKls->level_id + 1));
        
        // CRITICAL FINDING: The dropdown list contains classes from **PASSED YEAR** (TP-1).
        // It lists "Kelas 2" (from 2024).
        // User selects "Kelas 2" (ID from 2024).
        // The SYSTEM then looks for "Kelas 2" in 2025.
        // If not found, it CREATES it.
        
        // SO: `kelas_baru` param is the ID of the **TEMPLATE CLASS** from the previous year.
        
        $count = 0;
        $createdClasses = [];
        
        if ($posts) {
            // Convert to array
            foreach ($posts as $d) {
                // $d->kelas_baru is ID of the Reference Class (e.g. Kelas 2 from 2024)
                if (!isset($siswakelas[$d->kelas_baru])) {
                    $siswakelas[$d->kelas_baru] = [];
                }
                $siswakelas[$d->kelas_baru][] = $d->id_siswa;
            }

            foreach ($siswakelas as $refClassId => $siswaIds) {
                // 1. Get the Reference Class Data (from Old TP)
                // Fix: Fetch directly by Primary Key ID. Using (TP - 1) logic fails due to non-sequential IDs.
                $refClass = $this->db->get_where('master_kelas', ['id_kelas' => $refClassId])->row();
                
                if (!$refClass) {
                    log_message('error', "RefClass not found for ID: $refClassId");
                    continue;
                }

                // 2. Check if Class with same Name exists in Current TP
                $targetClass = $this->kelas->getKelasByNama($refClass->nama_kelas, $tp->id_tp, $smt->id_smt);
                
                $targetClassId = null;

                if ($targetClass) {
                    $targetClassId = $targetClass->id_kelas;
                } else {
                    // 3. Create New Class
                    $newCode = $this->generateKodeKelas($tp->tahun);
                    
                    $dataKelas = [
                       'nama_kelas' => $refClass->nama_kelas,
                       'kode_kelas' => $newCode, 
                       'jurusan_id' => $refClass->jurusan_id,
                       'id_tp'      => $tp->id_tp,
                       'id_smt'     => $smt->id_smt,
                       'level_id'   => $refClass->level_id,
                       'guru_id'    => $refClass->guru_id, 
                       'siswa_id'   => NULL, 
                       'jumlah_siswa' => serialize(array_map(function($id) { return ['id' => $id]; }, $siswaIds))
                    ];
                    
                    if (!$this->db->insert('master_kelas', $dataKelas)) {
                         log_message('error', 'Insert Class Failed: ' . json_encode($this->db->error()));
                    }
                    $targetClassId = $this->db->insert_id();
                    $createdClasses[] = $refClass->nama_kelas;
                }

                // 4. Insert Students into New Class
                foreach ($siswaIds as $idSiswa) {
                    $idKelasSiswa = $tp->id_tp . $smt->id_smt . $idSiswa;
                    $dataSiswa = [
                        'id_kelas_siswa' => $idKelasSiswa,
                        'id_tp' => $tp->id_tp,
                        'id_smt' => $smt->id_smt,
                        'id_kelas' => $targetClassId,
                        'id_siswa' => $idSiswa
                    ];
                    // Using replace
                    if (!$this->db->replace('kelas_siswa', $dataSiswa)) {
                        log_message('error', 'Replace Siswa Failed: ' . json_encode($this->db->error()));
                    } else {
                        log_message('error', "Replace Success for Siswa: $idSiswa into Class: $targetClassId");
                    }
                }

                // Update cache jumlah_siswa in master_kelas
                $allSiswa = $this->db->get_where('kelas_siswa', ['id_kelas' => $targetClassId])->result_array();
                $serialized = serialize(array_map(function($row) { return ['id' => $row['id_siswa']]; }, $allSiswa));
                $this->db->where('id_kelas', $targetClassId);
                $this->db->update('master_kelas', ['jumlah_siswa' => $serialized]);
            }
            
            $this->output_json(['status' => true, 'message' => 'Data berhasil disimpan. Kelas baru dibuat: ' . implode(', ', $createdClasses)]);
        } else {
            $this->output_json(['status' => false, 'message' => 'Tidak ada data siswa sent.']);
        }
    }



    public function manage() {
        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        
        // Ensure we are in Smt 2 target (or just copy Smt 1 -> Smt 2 logic generally)
        // Query Smt 1 classes for CURRENT TP
        $source_classes = $this->db->where('id_tp', $tp->id_tp)
                                   ->where('id_smt', 1)
                                   ->order_by('nama_kelas')
                                   ->get('master_kelas')
                                   ->result();
                                   
        $data = [
            'tp' => $tp,
            'smt' => $smt,
            'kelas_source' => $source_classes
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('master/kelas/copy_kelas_bypass', $data);
        $this->load->view('templates/footer');
    }

    public function doCopy() {
        $sourceId = $this->input->post('source_kelas_id', true);
        $tp = $this->dashboard->getTahunActive();
        
        if (!$sourceId) {
            redirect('KelasAction/manage');
        }
        
        // 1. Get Source Class
        $srcClass = $this->db->get_where('master_kelas', ['id_kelas' => $sourceId])->row();
        
        if ($srcClass) {
            // 0. AUTO-CLEANUP: Delete Ghost Classes (Same Name, Active TP, Smt 2, 0 Students)
            // This prevents duplicates if previous attempts failed.
            $ghostClasses = $this->db->where('id_tp', $tp->id_tp)
                                     ->where('id_smt', 2)
                                     ->group_start()
                                        ->where('nama_kelas', trim($srcClass->nama_kelas))
                                        ->or_where('kode_kelas', $srcClass->kode_kelas)
                                     ->group_end()
                                     ->where('jumlah_siswa', 0) // Only delete if empty
                                     ->get('master_kelas')
                                     ->result();
                                     
            foreach ($ghostClasses as $ghost) {
                $this->db->delete('master_kelas', ['id_kelas' => $ghost->id_kelas]);
                // log_message('error', "Deleted Ghost Class ID: " . $ghost->id_kelas);
            }

            // 2. Check/Create Target Class (Smt 2)
            $targetClass = $this->db->where('id_tp', $tp->id_tp)
                                    ->where('id_smt', 2)
                                    ->group_start()
                                        ->where('nama_kelas', trim($srcClass->nama_kelas))
                                        ->or_where('kode_kelas', $srcClass->kode_kelas)
                                    ->group_end()
                                    ->get('master_kelas')
                                    ->row();
                                    
            $targetId = 0;
            if ($targetClass) {
                $targetId = $targetClass->id_kelas;
            } else {
                // Create
                $newClass = [
                    'id_tp' => $tp->id_tp,
                    'id_smt' => 2,
                    'nama_kelas' => $srcClass->nama_kelas,
                    'kode_kelas' => $srcClass->kode_kelas, 
                    'jurusan_id' => $srcClass->jurusan_id,
                    'level_id' => $srcClass->level_id,
                    'guru_id' => $srcClass->guru_id, 
                    'siswa_id' => NULL,
                    'jumlah_siswa' => 0 
                ];
                $this->db->insert('master_kelas', $newClass);
                $targetId = $this->db->insert_id();
            }
            
            // 3. Copy Students
            $students = $this->db->get_where('kelas_siswa', ['id_kelas' => $sourceId])->result();
            $copiedCount = 0;
            $existingCount = 0;
            $studentIds = [];
            
            foreach ($students as $stu) {
                // Check redundancy
                $exists = $this->db->where('id_siswa', $stu->id_siswa)
                                   ->where('id_kelas', $targetId)
                                   ->count_all_results('kelas_siswa');
                if ($exists == 0) {
                    $newStu = [
                        'id_tp' => $tp->id_tp,
                        'id_smt' => 2,
                        'id_kelas' => $targetId,
                        'id_siswa' => $stu->id_siswa,
                        'id_jenis' => $stu->id_jenis
                    ];
                    $this->db->insert('kelas_siswa', $newStu);
                    $copiedCount++;
                } else {
                    $existingCount++;
                }
                $studentIds[] = ['id' => $stu->id_siswa];
            }
            
            // 4. Update Cache
            $this->db->where('id_kelas', $targetId)->update('master_kelas', [
                'jumlah_siswa' => serialize(array_map(function($id) { return ['id' => $id['id']]; }, $studentIds))
            ]);
            
            // Flash message manually injection script
            $msg = "Proses Selesai! Disalin: $copiedCount siswa. (Dilewati: $existingCount siswa karena sudah ada).";
            echo "<script>alert('$msg'); window.location.href='" . base_url('KelasAction/manage') . "';</script>";
            return;
        }
        
        echo "<script>alert('Gagal menyalin!'); window.location.href='" . base_url('KelasAction/manage') . "';</script>";
    }

    public function copyAll() {
        $tp = $this->dashboard->getTahunActive();
        // 1. Get All Source Classes (Smt 1)
        $srcClasses = $this->db->where('id_tp', $tp->id_tp)
                               ->where('id_smt', 1)
                               ->get('master_kelas')
                               ->result();
                               
        if (empty($srcClasses)) {
             echo "<script>alert('Tidak ada kelas di Semester 1!'); window.location.href='" . base_url('KelasAction/manage') . "';</script>";
             return;
        }
        
        $count = 0;
        foreach ($srcClasses as $srcClass) {
            $this->doCopyInternal($srcClass, $tp);
            $count++;
        }
        
        $msg = "Berhasil menyalin $count kelas secara massal ke Semester 2!";
        echo "<script>alert('$msg'); window.location.href='" . base_url('datakelas') . "';</script>";
    }
    
    private function doCopyInternal($srcClass, $tp) {
            // 0. AUTO-CLEANUP
            $ghostClasses = $this->db->where('id_tp', $tp->id_tp)
                                     ->where('id_smt', 2)
                                     ->group_start()
                                        ->where('nama_kelas', trim($srcClass->nama_kelas))
                                        ->or_where('kode_kelas', $srcClass->kode_kelas)
                                     ->group_end()
                                     ->where('jumlah_siswa', 0)
                                     ->get('master_kelas')
                                     ->result();
                                     
            foreach ($ghostClasses as $ghost) {
                $this->db->delete('master_kelas', ['id_kelas' => $ghost->id_kelas]);
            }

            // 2. Check/Create Target Class (Smt 2)
            $targetClass = $this->db->where('id_tp', $tp->id_tp)
                                    ->where('id_smt', 2)
                                    ->group_start()
                                        ->where('nama_kelas', trim($srcClass->nama_kelas))
                                        ->or_where('kode_kelas', $srcClass->kode_kelas)
                                    ->group_end()
                                    ->get('master_kelas')
                                    ->row();
                                    
            $targetId = 0;
            if ($targetClass) {
                $targetId = $targetClass->id_kelas;
            } else {
                // Create
                $newClass = [
                    'id_tp' => $tp->id_tp,
                    'id_smt' => 2,
                    'nama_kelas' => $srcClass->nama_kelas,
                    'kode_kelas' => $srcClass->kode_kelas, 
                    'jurusan_id' => $srcClass->jurusan_id,
                    'level_id' => $srcClass->level_id,
                    'guru_id' => $srcClass->guru_id, 
                    'siswa_id' => NULL,
                    'jumlah_siswa' => 0 
                ];
                $this->db->insert('master_kelas', $newClass);
                $targetId = $this->db->insert_id();
            }
            
            // 3. Copy Students
            $students = $this->db->get_where('kelas_siswa', ['id_kelas' => $srcClass->id_kelas])->result();
            $studentIds = [];
            
            foreach ($students as $stu) {
                $exists = $this->db->where('id_siswa', $stu->id_siswa)
                                   ->where('id_kelas', $targetId)
                                   ->count_all_results('kelas_siswa');
                if ($exists == 0) {
                    $newStu = [
                        'id_tp' => $tp->id_tp,
                        'id_smt' => 2,
                        'id_kelas' => $targetId,
                        'id_siswa' => $stu->id_siswa,
                        'id_jenis' => $stu->id_jenis
                    ];
                    $this->db->insert('kelas_siswa', $newStu);
                }
                $studentIds[] = ['id' => $stu->id_siswa];
            }
            
            // 4. Update Cache (Merged logic)
            // Note: Ideally we should re-query all students in targetId to get Full Count
            // But appending logic is simpler for now. 
            // Better: Re-count.
             $allStudents = $this->db->get_where('kelas_siswa', ['id_kelas' => $targetId])->result_array();
             $allIds = array_map(function($s) { return ['id' => $s['id_siswa']]; }, $allStudents);
             
             $this->db->where('id_kelas', $targetId)->update('master_kelas', [
                'jumlah_siswa' => serialize($allIds) // Standard serialization
             ]);
    }
    public function getClassesJSON($tpId, $smtId) {
        // Mode DISTINCT: Fetch unique class names from ALL history (for prototyped creation)
        if ($tpId === 'distinct') {
             $classes = $this->db->select('MIN(id_kelas) as id_kelas, nama_kelas')
                                 ->group_by('nama_kelas')
                                 ->order_by('nama_kelas', 'ASC') 
                                 ->get('master_kelas')
                                 ->result();
        } else {
            // Default Mode: Fetch by TP and SMT
            $classes = $this->db->where('id_tp', $tpId)
                                ->where('id_smt', $smtId)
                                ->get('master_kelas')
                                ->result();
        }
                            
        $data = [];
        foreach ($classes as $class) {
            $data[$class->id_kelas] = $class->nama_kelas;
        }
        
        echo json_encode($data);
    }

    public function luluskanSiswa() {
        $ids = $this->input->post('checked');
        if (empty($ids)) {
             $this->output_json(['status' => false, 'message' => 'Tidak ada siswa dipilih']);
             return;
        }

        $tp = $this->dashboard->getTahunActive();
        $smt = $this->dashboard->getSemesterActive();
        // Calc Year (e.g. 2024/2025 -> 2025).
        $parts = explode('/', $tp->tahun);
        $thnLulus = end($parts);
        if (!$thnLulus) $thnLulus = date('Y');
        
        $count = 0;
        foreach ($ids as $id) {
             // 1. Get Current Student Data
             $siswa = $this->master->getSiswaById($id);
             $kelasSiswa = $this->db->get_where('kelas_siswa', [
                 'id_siswa' => $id, 
                 'id_tp' => $tp->id_tp, 
                 'id_smt' => $smt->id_smt
             ])->row();
             
             $kelasAkhir = '-';
             if ($kelasSiswa) {
                 $kelasObj = $this->db->get_where('master_kelas', ['id_kelas' => $kelasSiswa->id_kelas])->row();
                 if ($kelasObj) $kelasAkhir = $kelasObj->nama_kelas;
             }
             
             // 2. Insert/Update buku_induk (This Defines Status)
             // DO NOT Update master_siswa status (it is a calculated field/view)

             // Check if exists
             $exist = $this->db->where('id_siswa', $id)->get('buku_induk')->row();
             $dataInduk = [
                 'status' => 2, // Lulus
                 'tahun_lulus' => trim($thnLulus),
                 'kelas_akhir' => $kelasAkhir
             ];
             
             // buku_induk likely only holds graduation info and relations. 
             // Metadata (nama, nis) stays in master_siswa.
             if (!$exist) {
                 $dataInduk['id_siswa'] = $id;
                 $dataInduk['no_ijazah'] = '-'; 
                 $this->db->insert('buku_induk', $dataInduk);
             } else {
                 $this->db->where('id_siswa', $id)->update('buku_induk', $dataInduk);
             }
             $count++;
        }
        
        $this->output_json(['status' => true, 'message' => "$count siswa berhasil diluluskan (Alumni)."]);
    }

    private function generateKodeKelas($tahunPel) {
        // Format: 2025/2026 -> 20252026 + Random(10,99)
        $cleanTp = preg_replace('/[^0-9]/', '', $tahunPel);
        if (strlen($cleanTp) < 8) $cleanTp = date('Ymd');
        $random = rand(10, 99);
        return $cleanTp . $random;
    }

    private function output_json($data) {
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
