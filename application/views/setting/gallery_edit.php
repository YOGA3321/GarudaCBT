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
                            <h3 class="card-title">Edit Foto Galeri</h3>
                        </div>
                        <?= form_open_multipart('settings/updateGallery') ?>
                        <input type="hidden" name="id_gallery" value="<?= $gallery->id_gallery ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Ganti Foto (Opsional)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                            </div>
                            <div class="form-group text-center">
                                <img id="preview" src="<?= base_url($gallery->gambar) ?>" class="img-fluid rounded" style="max-height: 200px">
                            </div>
                            <div class="form-group">
                                <label>Judul Kegiatan</label>
                                <input type="text" class="form-control" name="judul" value="<?= $gallery->judul ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value="Umum" <?= $gallery->kategori == 'Umum' ? 'selected' : '' ?>>Umum</option>
                                    <option value="Kegiatan" <?= $gallery->kategori == 'Kegiatan' ? 'selected' : '' ?>>Kegiatan</option>
                                    <option value="Prestasi" <?= $gallery->kategori == 'Prestasi' ? 'selected' : '' ?>>Prestasi</option>
                                    <option value="Fasilitas" <?= $gallery->kategori == 'Fasilitas' ? 'selected' : '' ?>>Fasilitas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Singkat</label>
                                <textarea class="form-control" name="deskripsi" rows="3"><?= $gallery->deskripsi ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('settings/gallery') ?>" class="btn btn-default">Batal</a>
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
  
  // Image Preview
  $('#customFile').on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
  });
});
</script>
