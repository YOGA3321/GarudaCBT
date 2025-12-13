<div class="row">
    <div class="col-md-12">
        <?= form_open_multipart('post/update', array('id' => 'formPost')) ?>
        <input type="hidden" name="id_post" value="<?= $post->id_post ?>">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Berita</h3>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('post') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul" class="form-control" required value="<?= $post->judul ?>" placeholder="Masukkan judul berita...">
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                         <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea name="isi" id="summernote" class="form-control" rows="10"><?= $post->isi ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gambar Utama</label>
                            <?php if(!empty($post->gambar)): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url($post->gambar) ?>" class="img-responsive img-thumbnail" style="max-height: 200px">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar" class="form-control" accept="image/*">
                            <p class="help-block">Format: JPG/PNG, Max 2MB. Biarkan kosong jika tidak ingin mengganti gambar.</p>
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
        <?= form_close() ?>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300
        });
    });
</script>
