<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('datakelas') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <?= $subjudul ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    //echo '<pre>';
                    //var_dump($tp);
                    //var_dump(array_search('1', array_column($tp, 'active')));
                    //echo '</pre>';
                    $searchId = array_search('1', array_column($tp, 'active'));
                    //$idTpActive = $tp[$searchId];
                    $tpBefore = '';
                    if (isset($tp[$searchId - 1])) :
                        $tpBefore = $tp[$searchId - 1];
                        ?>
                        <div class="alert alert-default-info align-content-center" role="alert">
                            Fitur ini digunakan untuk menaikkan semua siswa dari TP: <b><?= $tpBefore->tahun ?></b> ke
                            TP:
                            <b><?= $tp_active->tahun ?></b>
                            <br>
                            <ul>
                                <li>
                                    Pilih kelas dari TP: <?= $tpBefore->tahun ?>
                                </li>
                                <li>
                                    Klik SIMPAN untuk menaikan siswa dalam kelas terpilih
                                </li>
                                <li>
                                    Siswa yang menurut rapor tidak naik maka otomatis tidak naik
                                </li>
                                <li>
                                    Untuk mengatur wali kelas baru gunakan menu <b>KELAS/ROMBEL</b>
                                </li>
                                <li>
                                    Untuk siswa kelas akhir diatur di menu <b>ALUMNI</b>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label>Kelas <?= $tpBefore->tahun ?></label>
                                <select name="kelas_lama" id="opsi-kelas1" class="form-control">
                                    <?php
                                    // PATCH: Fix missing classes by forcing correct Previous TP lookup
                                    // Logic: Find TP by Year (Current-1) instead of ID-1, avoiding ID gaps/mismatches.
                                    $ci = &get_instance();
                                    $actTp = $ci->db->get_where('master_tp', ['active' => 1])->row();
                                    if ($actTp) {
                                        $prevYear = explode('/', $actTp->tahun)[0] - 1;
                                        $realPrevTp = $ci->db->like('tahun', $prevYear . '/', 'after')->get('master_tp')->row();
                                        
                                        if ($realPrevTp) {
                                            $rawKls = $ci->db->where('id_tp', $realPrevTp->id_tp)->where('id_smt', 2)->order_by('nama_kelas')->get('master_kelas')->result();
                                            
                                            // Check if Smt 2 classes have students
                                            $hasStudents = false;
                                            if (!empty($rawKls)) {
                                                $ids = array_column($rawKls, 'id_kelas');
                                                $sCount = $ci->db->where_in('id_kelas', $ids)->count_all_results('kelas_siswa');
                                                if ($sCount > 0) $hasStudents = true;
                                            }

                                            // If Smt 2 empty or has no students, Fallback to Smt 1
                                            if (empty($rawKls) || !$hasStudents) {
                                                $rawKls = $ci->db->where('id_tp', $realPrevTp->id_tp)->where('id_smt', 1)->order_by('nama_kelas')->get('master_kelas')->result();
                                            }
                                            
                                            if (!empty($rawKls)) {
                                                $kelas_lama = [];
                                                foreach ($rawKls as $rk) $kelas_lama[$rk->id_kelas] = $rk->nama_kelas;
                                            }
                                        }
                                    }
                                    
                                    foreach ($kelas_lama as $key => $kls) :
                                        $selected = $key == $kelas_selected ? 'selected="selected"' : ''; ?>
                                        <option value="<?= $key ?>" <?= $selected ?>><?= $kls ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if (isset($siswas)) : ?>
                                <div class="col-md-9 mb-2 text-right">
                                    <label>Mode Pilihan</label>
                                    <br>
                                    <div id="selector" class="btn-group mb-4">
                                        <button type="button" class="btn active btn-success"><b>Naikkan Persiswa</b>
                                        </button>
                                        <button type="button" class="btn btn-outline-success"><b>Naikkan Semua</b>
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php 
                        // PATCH: Bypass Controller Empty Student Result
                        // If Controller returns empty siswas (likely because class ID belongs to Old TP and Controller filters by Active TP),
                        // We fetch students manually for the SELECTED Class.
                        if ((!isset($siswas) || empty($siswas)) && isset($kelas_selected) && !empty($kelas_selected)) {
                            $ci = &get_instance();
                            $siswas = $ci->db->select('master_siswa.*, kelas_siswa.id_kelas, master_kelas.nama_kelas')
                                ->from('kelas_siswa')
                                ->join('master_siswa', 'master_siswa.id_siswa = kelas_siswa.id_siswa')
                                ->join('master_kelas', 'master_kelas.id_kelas = kelas_siswa.id_kelas')
                                ->where('kelas_siswa.id_kelas', $kelas_selected)
                                ->get()->result();
                                
                            // Ensure $siswa_kelas_baru is distinct
                            if (!isset($siswa_kelas_baru)) {
                                $siswa_kelas_baru = [];
                            }
                        }
                        
                        if (isset($siswas) && !empty($siswas)) :
                        //echo '<pre>';
                        //var_dump($siswa_kelas_baru);
                        //echo '</pre>';
                        ?>
                        <div class="row">
                            <div class="col-12" id="persiswa">
                                <table class="table table-striped table-bordered table-hover" id="tbl-siswa">
                                    <thead>
                                    <tr>
                                        <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                                        <th class="text-center p-0 align-middle">N I S N</th>
                                        <th class="text-center p-0 align-middle">N I S</th>
                                        <th class="text-center p-0 align-middle p-0">Nama Siswa</th>
                                        <th class="text-center p-0 align-middle">Kelas Lama</th>
                                        <th class="text-center p-0 align-middle">Naik/Tdk. Naik</th>
                                        <th class="text-center p-0 align-middle">Kelas Baru</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($siswas as $siswa) :
                                        $siswa_di_kelas_baru = isset($siswa_kelas_baru[$siswa->id_siswa]) ? $siswa_kelas_baru[$siswa->id_siswa] : null;
                                        $kode_naik = $siswa->naik != null ? $siswa->naik : '1';
                                        ?>
                                        <tr>
                                            <td class="d-none id-siswa align-middle"><?= $siswa->id_siswa ?></td>
                                            <td class="d-none id-naik align-middle"><?= $kode_naik ?></td>
                                            <td class="text-center align-middle"><?= $no ?></td>
                                            <td class="text-center align-middle"><?= $siswa->nisn ?></td>
                                            <td class="text-center align-middle"><?= $siswa->nis ?></td>
                                            <td class="align-middle"><?= $siswa->nama ?></td>
                                            <td class="text-center align-middle"><?= $siswa->nama_kelas ?></td>
                                            <td class="text-center align-middle"><?= $siswa->naik != null && $siswa->naik == '0' ? 'Tdk Naik' : 'Naik' ?></td>
                                            <td>
                                                <?php
                                                if ($siswa_di_kelas_baru != null) : ?>
                                                    <select class="form-control" readonly="readonly"
                                                            data-name="kelas-baru">
                                                        <option value="0"><?= $siswa_di_kelas_baru->nama_kelas ?></option>
                                                    </select>
                                                <?php else:
                                                    if ($siswa->naik != null && $siswa->naik == '0') :?>
                                                        <select class="form-control" data-name="kelas-baru"
                                                                readonly="readonly">
                                                            <option value="<?= $siswa->id_kelas ?>">Tetap di
                                                                kelas <?= $siswa->nama_kelas ?></option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="form-control" data-name="kelas-baru">
                                                            <option value="0">Pilih Kelas Baru</option>
                                                            <?php foreach ($kelases as $key => $kls) : ?>
                                                                <option value="<?= $key ?>"><?= $kls ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 mb-2 d-none" id="perkelas">
                                <label>
                                    - Siswa yang naik kelas otomatis akan dipindahkan ke kelas baru terpilih
                                    <br>
                                    - Siswa yang tidak naik akan tetap tinggal di kelas lama
                                </label>
                                <select id="select-kelas" class="form-control">
                                    <option value="0">Pilih Kelas Baru</option>
                                    <?php foreach ($kelases as $key => $kls) : ?>
                                        <option value="<?= $key ?>" <?= $selected ?>><?= $kls ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?= form_open('', array('id' => 'naikkankelas')) ?>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span class="ml-1">Simpan</span>
                            </button>
                        </div>
                        <?= form_close(); ?>
                    <?php endif; ?>
                    <?php else: ?>
                        <div class="alert alert-default-warning align-content-center" role="alert">
                            Tidak ada kelas di tahun sebelumnya
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        Copy Data Per-Siswa
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Fitur ini digunakan untuk menyalin beberapa siswa TP:<?= $tp_active->tahun ?> dari semester ganjil ke semester genap
                        <br>
                        <ul>
                            <li>
                                Pilih kelas pada kolom SMT II untuk menyalin data siswa dari SMT I ke SMT II
                            </li>
                            <li>
                                Jangan lupa untuk menyimpan perubahan
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label>Kelas SMT I</label>
                            <?php
            echo form_dropdown(
                'kelas',
                $kelas,
                null,
                'id="opsi-kelas2" class="form-control"'
            ); ?>
                        </div>
                        <div class="col-md-9 mb-2">
                            <div id="info-pindah" class="alert alert-default-info align-content-center d-none" role="alert">
                            </div>
                        </div>
                    </div>
                    <div id="tsiswa"></div>
                    <div class="float-right">
                        <button id="submitkelas" class="btn btn-sm bg-primary text-white">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            -->
        </div>
    </section>
</div>

<script>
    //var arrKelas = JSON.parse(JSON.stringify(<?= json_encode($kelas_baru)?>));
    var klsSelected = '<?= isset($kelas_selected) ? $kelas_selected : '';?>';
    $(document).ready(function () {
        //console.log(arrKelas);

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-success').removeClass('active btn-success');

            if (!$('#perkelas').is(':hidden')) {
                $('#perkelas').addClass('d-none');
                $('#persiswa').removeClass('d-none');
            } else {
                $('#perkelas').removeClass('d-none');
                $('#persiswa').addClass('d-none');
            }
        });

        var opsiKelas = $('#opsi-kelas1');
        var slctd = klsSelected == '' ? "selected='selected'" : "";
        opsiKelas.prepend("<option value='' " + slctd + " disabled='disabled'>Pilih Kelas</option>");

        opsiKelas.change(function () {
            //$('#kelas-baru').val($('#opsi-kelas1 option:selected').text());
            window.location.href = base_url + 'datakelas/kenaikan?kelas=' + $(this).val();
            //console.log(base_url + 'datakelas/kenaikan?kelas='+ $(this).val())
        });

        // PATCH: Auto-populate Target Dropdown from ALL HISTORICAL CLASSES (Distinct)
        // This ensures "Kelas 1" - "Kelas 6" are available even if they don't exist in Old TP
        // Using 'distinct' as keyword for TP ID in KelasAction
        $.getJSON(base_url + 'KelasAction/getClassesJSON/distinct/0', function(data) {
                var options = '<option value="0">Pilih Kelas Baru (Auto-Create)</option>';
                var count = 0;
                $.each(data, function(key, val) {
                    options += '<option value="' + key + '">' + val + '</option>';
                    count++;
                });
                
                if (count > 0) {
                    // FORCE UPDATE ALL DROPDOWNS
                    // Target: #select-kelas (Bulk) and select[data-name="kelas-baru"] (Per-student)
                    
                    $('#select-kelas').html(options);
                    $('select[data-name="kelas-baru"]').html(options);
                    
                    console.log('Patched Dropdowns forced with ' + count + ' DISTINCT historical classes.');
                }
        });

        $('#naikkankelas').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            const form = $('#naikkankelas').serialize();
            const $rows = $('#tbl-siswa').find('tr'), headers = $rows.splice(0, 1);
            let jsonKelas = [];

            let mode;
            if (!$('#perkelas').is(':hidden')) {
                mode = 'perkelas';
                const $kelasBaru = $('#select-kelas').val();

                $rows.each((i, row) => {
                    const $idSiswa = $(row).find(".id-siswa").text();
                    const $naik = $(row).find(".id-naik").text();

                    let item = {};
                    if ($naik == '1') {
                        item ["id_siswa"] = $idSiswa;
                        item ["kelas_baru"] = $kelasBaru;
                        jsonKelas.push(item);
                    } else {
                        const $colKelasBaru = $(row).find('select[data-name="kelas-baru"]');
                        if ($colKelasBaru.val() != '0') {
                            item ["id_siswa"] = $idSiswa;
                            item ["kelas_baru"] = $colKelasBaru.val();
                            jsonKelas.push(item);
                        }
                    }
                });

                if ($kelasBaru == '0') {
                    showInfoToast('Isi KELAS BARU terlebih dahulu');
                    return;
                }
            } else {
                //persiswa
                mode = 'persiswa';
                $rows.each((i, row) => {
                    const $idSiswa = $(row).find(".id-siswa").text();
                    const $colKelasBaru = $(row).find('select[data-name="kelas-baru"]');
                    const $kelasBaru = $colKelasBaru.val();

                    if ($kelasBaru != "0") {
                        let item = {};
                        item ["kelas_baru"] = $kelasBaru;
                        item ["id_siswa"] = $idSiswa;
                        jsonKelas.push(item);
                    }
                });
            }

            const dataPost = form + '&mode=' + mode + '&kelas=' + JSON.stringify(jsonKelas);
            console.log(dataPost);

            if (jsonKelas.length > 0) {
                $.ajax({
                    url: base_url + 'KelasAction/naikKelas',
                    type: "POST",
                    data: dataPost,
                    success: function (data) {
                        console.log('response', data);
                        if (data) {
                            swal.fire({
                                title: "Sukses",
                                text: "Data berhasil disimpan",
                                icon: "success",
                                showCancelButton: false,
                            }).then(result => {
                                window.location.href = base_url + 'datakelas/kenaikan?kelas=' + klsSelected;
                                //console.log(data);
                            });
                        } else {
                            swal.fire({
                                title: "ERROR",
                                text: "Data Tidak Tersimpan",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        showDangerToast('Tidak bisa mentimpan data')
                    }
                });
            } else {
                showInfoToast('Tidak ada data yg disimpan')
            }
        });
    });
</script>
