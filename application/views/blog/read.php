<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .prose img { border-radius: 0.75rem; margin-bottom: 2rem; width: 100%; }
        .prose h2 { font-size: 1.5rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #1e293b; }
        .prose p { margin-bottom: 1rem; line-height: 1.8; color: #475569; }
    </style>
</head>
<body class="bg-gray-50 text-slate-800">

    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
             <a href="<?= base_url() ?>" class="font-bold text-xl text-emerald-600 flex items-center gap-2">
                <i class="ri-home-4-line"></i> Home
            </a>
            <a href="<?= base_url('blog') ?>" class="font-medium text-slate-600 hover:text-emerald-600">Berita Lainnya</a>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Main Content -->
            <div class="w-full lg:w-8/12">
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <div class="mb-6">
                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide"><?= $post->kategori ?></span>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-4 leading-tight"><?= $post->judul ?></h1>
                        <div class="flex items-center gap-4 mt-4 text-sm text-gray-500 border-b border-gray-100 pb-6">
                            <span class="flex items-center gap-1"><i class="ri-user-line"></i> <?= $author->first_name ?? 'Admin' ?></span>
                            <span class="flex items-center gap-1"><i class="ri-calendar-line"></i> <?= date('d M Y, H:i', strtotime($post->tanggal)) ?></span>
                            <span class="flex items-center gap-1"><i class="ri-eye-line"></i> <?= $post->views ?> x</span>
                        </div>
                    </div>

                    <?php if(!empty($post->gambar)): ?>
                        <div class="mb-8 rounded-xl overflow-hidden shadow-sm">
                            <img src="<?= base_url($post->gambar) ?>" alt="<?= $post->judul ?>" class="w-full h-auto">
                        </div>
                    <?php endif; ?>

                    <div class="prose max-w-none">
                        <?= $post->isi ?>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-4/12 space-y-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h3 class="font-bold text-lg text-slate-900 mb-4 border-l-4 border-emerald-500 pl-3">Berita Terbaru</h3>
                    <div class="space-y-4">
                        <?php foreach($recent_posts as $recent): ?>
                            <a href="<?= base_url('blog/read/'.$recent->slug) ?>" class="flex gap-4 group">
                                <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-gray-200">
                                     <img src="<?= !empty($recent->gambar) ? base_url($recent->gambar) : 'https://via.placeholder.com/150' ?>" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-slate-800 group-hover:text-emerald-600 line-clamp-2 leading-snug"><?= $recent->judul ?></h4>
                                    <span class="text-xs text-gray-400 mt-1 block"><?= date('d M Y', strtotime($recent->tanggal)) ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="bg-white border-t border-gray-200 py-8 mt-12 text-center text-sm text-gray-500">
        &copy; <?= date('Y') ?> <?= $setting->sekolah ?? 'School Name' ?>. Powered by <b>Lopyta</b>.
    </footer>
</body>
</html>
