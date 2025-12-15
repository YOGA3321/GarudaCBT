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
                <div class="col-md-12">
                    <?= form_open_multipart('settings/saveProfile', array('id' => 'formProfile')) ?>
                    <input type="hidden" name="struktur_organisasi_old" value="<?= $setting->struktur_organisasi ?? '' ?>">
                    
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-sejarah" data-toggle="pill" href="#sejarah" role="tab" aria-controls="sejarah" aria-selected="true">Sejarah</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-visimisi" data-toggle="pill" href="#visimisi" role="tab" aria-controls="visimisi" aria-selected="false">Visi & Misi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-struktur" data-toggle="pill" href="#struktur" role="tab" aria-controls="struktur" aria-selected="false">Struktur Organisasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-sosmed" data-toggle="pill" href="#sosmed" role="tab" aria-controls="sosmed" aria-selected="false">Media Sosial</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="tab-sejarah">
                                    <textarea name="sejarah" class="summernote"><?= $setting->sejarah ?? '' ?></textarea>
                                </div>
                                <div class="tab-pane fade" id="visimisi" role="tabpanel" aria-labelledby="tab-visimisi">
                                    <textarea name="visi_misi" class="summernote"><?= $setting->visi_misi ?? '' ?></textarea>
                                </div>
                                <div class="tab-pane fade" id="struktur" role="tabpanel" aria-labelledby="tab-struktur">
                                    <div class="form-group">
                                        <label>Upload Gambar Struktur Organisasi</label>
                                        <?php if(!empty($setting->struktur_organisasi)): ?>
                                            <div class="mb-3">
                                                <img src="<?= base_url($setting->struktur_organisasi) ?>" class="img-fluid rounded shadow-sm" style="max-height: 400px">
                                            </div>
                                        <?php endif; ?>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="strukFile" name="struktur_organisasi" accept="image/*">
                                            <label class="custom-file-label" for="strukFile">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sosmed" role="tabpanel" aria-labelledby="tab-sosmed">
                                    <div class="form-group">
                                        <label><i class="fab fa-facebook-square text-blue"></i> Facebook URL</label>
                                        <input type="text" name="link_fb" class="form-control" value="<?= $setting->link_fb ?? '' ?>" placeholder="https://facebook.com/...">
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fab fa-instagram text-pink"></i> Instagram URL</label>
                                        <input type="text" name="link_ig" class="form-control" value="<?= $setting->link_ig ?? '' ?>" placeholder="https://instagram.com/...">
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fab fa-youtube text-red"></i> Youtube URL</label>
                                        <input type="text" name="link_yt" class="form-control" value="<?= $setting->link_yt ?? '' ?>" placeholder="https://youtube.com/...">
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fab fa-tiktok text-dark"></i> TikTok URL</label>
                                        <input type="text" name="link_tiktok" class="form-control" value="<?= $setting->link_tiktok ?? '' ?>" placeholder="https://tiktok.com/@...">
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

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300
        });
    });
</script>
