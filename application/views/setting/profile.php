<div class="row">
    <div class="col-md-12">
        <?= form_open_multipart('settings/saveProfile', array('id' => 'formProfile')) ?>
        <input type="hidden" name="struktur_organisasi_old" value="<?= $setting->struktur_organisasi ?? '' ?>">
        
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#sejarah" data-toggle="tab">Sejarah</a></li>
                <li><a href="#visimisi" data-toggle="tab">Visi & Misi</a></li>
                <li><a href="#struktur" data-toggle="tab">Struktur Organisasi</a></li>
                <li><a href="#sosmed" data-toggle="tab">Media Sosial</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="sejarah">
                    <textarea name="sejarah" class="summernote"><?= $setting->sejarah ?? '' ?></textarea>
                </div>
                
                <div class="tab-pane" id="visimisi">
                    <textarea name="visi_misi" class="summernote"><?= $setting->visi_misi ?? '' ?></textarea>
                </div>
                
                <div class="tab-pane" id="struktur">
                    <div class="form-group">
                        <label>Upload Gambar Struktur Organisasi</label>
                        <?php if(!empty($setting->struktur_organisasi)): ?>
                            <div class="mb-3">
                                <img src="<?= base_url($setting->struktur_organisasi) ?>" class="img-responsive img-thumbnail" style="max-height: 300px">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="struktur_organisasi" class="form-control" accept="image/*">
                    </div>
                </div>
                
                <div class="tab-pane" id="sosmed">
                    <div class="form-group">
                        <label><i class="fa fa-facebook-square"></i> Facebook URL</label>
                        <input type="text" name="link_fb" class="form-control" value="<?= $setting->link_fb ?? '' ?>" placeholder="https://facebook.com/...">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-instagram"></i> Instagram URL</label>
                        <input type="text" name="link_ig" class="form-control" value="<?= $setting->link_ig ?? '' ?>" placeholder="https://instagram.com/...">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-youtube-play"></i> Youtube URL</label>
                        <input type="text" name="link_yt" class="form-control" value="<?= $setting->link_yt ?? '' ?>" placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300
        });
    });
</script>
