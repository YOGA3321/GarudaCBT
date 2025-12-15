<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Quote</h3>
                        </div>
                        <?= form_open('settings/saveQuote') ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Isi Kutipan</label>
                                <textarea class="form-control" name="content" rows="4" required placeholder="Tulis kutipan inspiratif..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Penulis / Tokoh</label>
                                <input type="text" class="form-control" name="author" required placeholder="Contoh: Ki Hajar Dewantara">
                            </div>
                            <div class="form-group">
                                <label>Jabatan / Peran</label>
                                <input type="text" class="form-control" name="role" placeholder="Contoh: Pahlawan Nasional">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-save"></i> Simpan Quote</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Kutipan</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kutipan</th>
                                        <th>Oleh</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($quotes as $q): ?>
                                    <tr>
                                        <td>"<?= $q->content ?>"</td>
                                        <td>
                                            <strong><?= $q->author ?></strong><br>
                                            <small class="text-muted"><?= $q->role ?></small>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('settings/deleteQuote/'.$q->id_quote) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus quote ini?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
