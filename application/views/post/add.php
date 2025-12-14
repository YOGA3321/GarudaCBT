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
                        <li class="breadcrumb-item active">Buat Baru</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?= form_open_multipart('post/save', array('id' => 'formPost')) ?>
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
                                <input type="text" name="judul" class="form-control form-control-lg" required placeholder="Masukkan judul berita disini...">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9">
                                     <div class="form-group">
                                        <label>Isi Berita</label>
                                        <textarea name="isi" id="summernote" class="form-control" style="height: 300px"></textarea>
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
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                                    <label class="custom-file-label" for="customFile">Pilih gambar</label>
                                                </div>
                                                <small class="text-muted">Format: JPG/PNG, Max 2MB</small>
                                            </div>
                                             <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1">Publish</option>
                                                    <option value="0">Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                             <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan Berita</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Load Summernote if not already loaded in footer/header -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'Tulis isi berita disini...'
        });
    });
</script>
