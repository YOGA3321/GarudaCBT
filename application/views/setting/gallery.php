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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Upload Foto Galeri</h3>
                        </div>
                        <?= form_open_multipart('settings/saveGallery') ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="gambar" required accept="image/*">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                <div class="mt-2 text-center">
                                    <img id="preview" src="" class="img-fluid rounded border d-none" style="max-height: 200px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Judul Kegiatan</label>
                                <input type="text" class="form-control" name="judul" required placeholder="Contoh: Upacara Bendera">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value="Umum">Umum</option>
                                    <option value="Kegiatan">Kegiatan</option>
                                    <option value="Prestasi">Prestasi</option>
                                    <option value="Fasilitas">Fasilitas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Singkat</label>
                                <textarea class="form-control" name="deskripsi" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-upload"></i> Upload</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Galeri Sekolah</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($gallery as $g): ?>
                                <div class="col-md-4 mb-3">
                                    <div class="position-relative">
                                        <img src="<?= base_url($g->gambar) ?>" class="img-fluid rounded shadow-sm w-100" style="height: 150px; object-fit: cover;">
                                        <div class="position-absolute" style="top: 5px; right: 5px;">
                                            <a href="<?= base_url('settings/editGallery/'.$g->id_gallery) ?>" class="btn btn-warning btn-xs mr-1"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('settings/deleteGallery/'.$g->id_gallery) ?>" class="btn btn-danger btn-xs btn-delete"><i class="fas fa-times"></i></a>
                                        </div>
                                        <div class="mt-1">
                                            <small class="font-weight-bold d-block text-truncate"><?= $g->judul ?></small>
                                            <span class="badge badge-info"><?= $g->kategori ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
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

  // Image Preview for Add
  $('#customFile').on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);
        }
  });
});
</script>
