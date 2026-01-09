<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Copy Kelas (Safe Mode)</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Copy Data Kelas ke SMT II</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Info!</h5>
                        Fitur ini digunakan untuk menyalin semua siswa TP: <b><?= $tp->tahun ?></b> dari semester I ke semester II.<br>
                        <ul>
                            <li>Pilih kelas dari semester I</li>
                            <li>Klik SIMPAN untuk menyalin semua data kelas dan siswa</li>
                        </ul>
                    </div>

                    <?= form_open('KelasAction/doCopy', array('id' => 'copy-kelas')) ?>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kelas SMT I</label>
                        <div class="col-md-9">
                            <select name="source_kelas_id" class="form-control" required>
                                <option value="">-- Pilih Kelas Smt 1 --</option>
                                <?php foreach ($kelas_source as $k) : ?>
                                    <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas ?> (<?= $k->kode_kelas ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Kelas SMT II (Otomatis)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" disabled value="Nama kelas akan disamakan dengan semester 1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan / Copy</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>
