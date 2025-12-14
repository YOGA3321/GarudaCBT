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
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><?= $subjudul ?></h3>
                            <div class="card-tools">
                                <a href="<?= base_url('post/add') ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Buat Berita Baru
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="postsTable">
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
                                                    <img src="<?= base_url($p->gambar) ?>" width="50" class="img-rounded">
                                                <?php else: ?>
                                                    <span class="text-muted text-xs">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <b><?= $p->judul ?></b>
                                                <br>
                                                <small class="text-muted"><?= base_url('blog/read/'.$p->slug) ?></small>
                                            </td>
                                            <td><span class="badge badge-info"><?= $p->kategori ?></span></td>
                                            <td><?= date('d M Y', strtotime($p->tanggal)) ?></td>
                                            <td>
                                                <?php if($p->status == 1): ?>
                                                    <span class="badge badge-success">Publish</span>
                                                <?php else: ?>
                                                    <span class="badge badge-warning">Draft</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('blog/read/'.$p->slug) ?>" target="_blank" class="btn btn-xs btn-default" title="Lihat"><i class="fas fa-eye"></i></a>
                                                <a href="<?= base_url('post/edit/'.$p->id_post) ?>" class="btn btn-xs btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('post/delete/'.$p->id_post) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Hapus berita ini?')" title="Hapus"><i class="fas fa-trash"></i></a>
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
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#postsTable').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
