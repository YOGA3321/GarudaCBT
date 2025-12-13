<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-slate-800">

    <?php $this->load->view('_partials/public_navbar'); // Placeholder if we separate nav later, for now inline simple nav ?>
    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
             <a href="<?= base_url() ?>" class="font-bold text-xl text-emerald-600 flex items-center gap-2">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
            <span class="font-bold text-slate-800">Berita & Artikel</span>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-slate-900">Kabar Sekolah</h1>
            <p class="text-slate-500 mt-2">Informasi terbaru, prestasi, dan kegiatan sekolah.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(!empty($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all border border-gray-100 overflow-hidden group">
                        <div class="h-48 overflow-hidden relative">
                             <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" 
                                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                                <span><i class="ri-calendar-line"></i> <?= date('d M Y', strtotime($post->tanggal)) ?></span>
                                <span>&bull;</span>
                                <span><?= $post->kategori ?></span>
                            </div>
                            <h2 class="text-xl font-bold text-slate-800 mb-3 leading-tight group-hover:text-emerald-600 transition-colors">
                                <a href="<?= base_url('blog/read/'.$post->slug) ?>"><?= $post->judul ?></a>
                            </h2>
                            <p class="text-gray-500 text-sm line-clamp-2"><?= strip_tags($post->isi) ?></p>
                            <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="inline-block mt-4 text-emerald-600 font-semibold text-sm hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-20 text-gray-500">Belum ada artikel.</div>
            <?php endif; ?>
        </div>

        <div class="mt-12">
            <?= $links ?>
        </div>
    </div>

    <!-- Simple Footer -->
    <footer class="bg-white border-t border-gray-200 py-8 mt-12 text-center text-sm text-gray-500">
        &copy; <?= date('Y') ?> <?= $setting->sekolah ?? 'School Name' ?>. Powered by <b>Lopyta</b>.
    </footer>

</body>
</html>
