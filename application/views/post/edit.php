<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('post') ?>">Manajemen Artikel</a></li>
                        <li class="breadcrumb-item active">Edit Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?= form_open_multipart('post/update', array('id' => 'formPost')) ?>
                    <input type="hidden" name="id_post" value="<?= $post->id_post ?>">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $subjudul ?></h3>
                            <div class="card-tools">
                                <a href="<?= base_url('post') ?>" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" name="judul" class="form-control form-control-lg" required value="<?= $post->judul ?>" placeholder="Masukkan judul berita...">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9">
                                     <div class="form-group">
                                        <label>Isi Berita</label>
                                        <textarea name="isi" id="summernote" class="form-control"><?= $post->isi ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Pengaturan</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Gambar Utama</label>
                                                <?php if(!empty($post->gambar)): ?>
                                                    <div class="mb-3 text-center">
                                                        <img id="preview" src="<?= base_url($post->gambar) ?>" class="img-fluid rounded border" style="max-height: 200px;">
                                                    </div>
                                                <?php else: ?>
                                                    <div class="mb-3 text-center">
                                                        <img id="preview" src="" class="img-fluid rounded border d-none" style="max-height: 200px;">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                                    <label class="custom-file-label" for="customFile">Ganti gambar</label>
                                                </div>
                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti.</small>
                                            </div>
                                             <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" <?= $post->status == 1 ? 'selected' : '' ?>>Publish</option>
                                                    <option value="0" <?= $post->status == 0 ? 'selected' : '' ?>>Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                             <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300
        });

        // Image Preview
        $('#customFile').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);

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
