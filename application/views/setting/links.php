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
                            <h3 class="card-title">Tambah Link</h3>
                        </div>
                        <?= form_open('settings/saveLink') ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul Tautan</label>
                                <input type="text" class="form-control" name="judul" required placeholder="Contoh: Kemdikbud">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="url" class="form-control" name="url" required placeholder="https://...">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Link Eksternal</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Judul</th>
                                        <th>URL</th>
                                        <th>Target</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($links)): ?>
                                        <?php foreach($links as $index => $l): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $l->judul ?></td>
                                            <td><a href="<?= $l->url ?>" target="_blank"><?= $l->url ?></a></td>
                                            <td><span class="badge badge-info"><?= $l->target ?></span></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm edit-link" 
                                                    data-id="<?= $l->id_link ?>"
                                                    data-judul="<?= $l->judul ?>"
                                                    data-url="<?= $l->url ?>"
                                                    data-toggle="modal" data-target="#editLinkModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('settings/deleteLink/'.$l->id_link) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus link ini?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="5" class="text-center">Belum ada data link.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Edit Link Modal -->
<div class="modal fade" id="editLinkModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Tautan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('settings/updateLink') ?>
      <div class="modal-body">
         <input type="hidden" name="id_link" id="edit_id_link">
         <div class="form-group">
            <label>Judul Tautan</label>
            <input type="text" class="form-control" name="judul" id="edit_judul" required>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="url" class="form-control" name="url" id="edit_url" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('.edit-link').on('click', function() {
        $('#edit_id_link').val($(this).data('id'));
        $('#edit_judul').val($(this).data('judul'));
        $('#edit_url').val($(this).data('url'));
    });
});
</script>
