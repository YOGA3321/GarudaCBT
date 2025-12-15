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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Slider</h3>
                        </div>
                        <?= form_open_multipart('settings/saveSlider') ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Upload Gambar (Landscape 1920x800)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" required accept="image/*">
                                    <label class="custom-file-label">Pilih file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Caption (Opsional)</label>
                                <input type="text" class="form-control" name="caption" placeholder="Teks caption slider">
                            </div>
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" class="form-control" name="urutan" value="<?= $next_urutan ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-upload"></i> Upload Slider</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Slider Aktif</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Gambar</th>
                                        <th>Caption</th>
                                        <th>Urutan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sliders as $s): ?>
                                    <tr>
                                        <td><?= $s->urutan ?></td>
                                        <td>
                                            <img src="<?= base_url($s->gambar) ?>" class="img-fluid rounded shadow-sm" style="height: 80px">
                                        </td>
                                        <td><?= $s->caption ?></td>
                                        <td><?= $s->urutan ?></td>
                                        <td>
                                            <a href="<?= base_url('settings/editSlider/'.$s->id_slider) ?>" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('settings/deleteSlider/'.$s->id_slider) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus slider ini?')"><i class="fas fa-trash"></i></a>
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

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
