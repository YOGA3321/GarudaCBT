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
                                    <input type="file" class="custom-file-input" id="customFile" name="gambar" required accept="image/*">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                <div class="mt-2 text-center">
                                    <img id="preview" src="" class="img-fluid rounded border d-none" style="max-height: 200px;">
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
                                <tbody id="sortable-slider" style="cursor: move;">
                                    <?php foreach($sliders as $s): ?>
                                    <tr data-id="<?= $s->id_slider ?>">
                                        <td><i class="fas fa-arrows-alt handle text-muted"></i></td>
                                        <td>
                                            <img src="<?= base_url($s->gambar) ?>" class="img-fluid rounded shadow-sm" style="height: 80px">
                                        </td>
                                        <td><?= $s->caption ?></td>
                                        <td class="urutan-text"><?= $s->urutan ?></td>
                                        <td>
                                            <a href="<?= base_url('settings/editSlider/'.$s->id_slider) ?>" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('settings/deleteSlider/'.$s->id_slider) ?>" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>
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

  // Image Preview
  $('#customFile').on('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);
        }
  });

  // Sortable Logic
  $("#sortable-slider").sortable({
      handle: '.handle',
      placeholder: 'highlight',
      update: function (event, ui) {
          let positions = [];
          
          $('#sortable-slider tr').each(function(index) {
             let id = $(this).data('id');
             let newOrder = index + 1;
             positions.push([id, newOrder]);
             
             // Update visual number
             $(this).find('.urutan-text').text(newOrder);
          });

          // CSRF Token
          let csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
          let csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
          let dataJson = { [csrfName]: csrfHash, positions: positions };

          // Send to server
          $.ajax({
              url: base_url + 'settings/updateSliderOrder',
              method: 'POST',
              dataType: 'json',
              data: dataJson,
              success: function(response) {
                  if(response.status) {
                      console.log('Order updated');
                      toastr.success('Urutan diperbarui');
                  } else {
                      toastr.error('Gagal memperbarui urutan');
                  }
              },
              error: function(xhr, status, error) {
                  console.error(error);
                  toastr.error('Terjadi kesalahan koneksi');
              }
          });
      }
  });
});
</script>
<style>
.highlight {
    background: #f4f6f9;
    height: 80px;
}
</style>
