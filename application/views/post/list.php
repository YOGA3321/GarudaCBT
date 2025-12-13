<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Berita</h3>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('post/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Buat Berita Baru</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="postsTable">
                        <thead>
                            <tr>
                                <th width="50">No.</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($posts as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <?php if(!empty($p->gambar)): ?>
                                        <img src="<?= base_url($p->gambar) ?>" width="50">
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td><?= $p->judul ?></td>
                                <td><?= $p->kategori ?></td>
                                <td><?= date('d M Y', strtotime($p->tanggal)) ?></td>
                                <td>
                                    <?php if($p->status == 1): ?>
                                        <span class="label label-success">Posted</span>
                                    <?php else: ?>
                                        <span class="label label-warning">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('blog/read/'.$p->slug) ?>" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url('post/delete/'.$p->id_post) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Hapus berita ini?')"><i class="fa fa-trash"></i></a>
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

<script>
    $(document).ready(function() {
        $('#postsTable').DataTable();
    });
</script>
