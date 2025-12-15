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
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit Slider</h3>
                        </div>
                        <?= form_open_multipart('settings/updateSliderAction') ?>
                        <input type="hidden" name="id_slider" value="<?= $slider->id_slider ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Ganti Gambar (Opsional)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" accept="image/*">
                                    <label class="custom-file-label">Pilih file</label>
                                </div>
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                            </div>
                            <div class="form-group">
                                <img src="<?= base_url($slider->gambar) ?>" class="img-fluid rounded" style="max-height: 200px">
                            </div>
                            <div class="form-group">
                                <label>Caption</label>
                                <input type="text" class="form-control" name="caption" value="<?= $slider->caption ?>">
                            </div>
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" class="form-control" name="urutan" value="<?= $slider->urutan ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('settings/slider') ?>" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        </div>
                        <?= form_close() ?>
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
