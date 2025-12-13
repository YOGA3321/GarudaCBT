<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'], },
                    colors: { primary: '#059669', }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .prose h1, .prose h2, .prose h3 { color: #0f172a; font-weight: 800; }
        .prose p { color: #475569; line-height: 1.8; }
        .prose img { border-radius: 1rem; width: 100%; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); }
        .prose a { color: #059669; text-decoration: none; font-weight: 600; }
        .prose a:hover { text-decoration: underline; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="<?= base_url() ?>" class="flex items-center gap-3">
                 <?php if (!empty($setting->logo_kiri)): ?>
                    <img src="<?= base_url().$setting->logo_kiri ?>" alt="Logo" class="h-10 w-auto">
                <?php else: ?>
                    <div class="h-10 w-10 bg-gradient-to-br from-primary to-emerald-400 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                    </div>
                <?php endif; ?>
                <div class="hidden md:block leading-tight">
                    <h1 class="font-bold text-lg text-slate-900"><?= $setting->sekolah ?? 'School Name' ?></h1>
                    <p class="text-[10px] text-primary font-bold tracking-[0.2em] uppercase">Official Website</p>
                </div>
            </a>
            
            <a href="<?= base_url('blog') ?>" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-primary font-bold transition-all flex items-center gap-2">
                <i class="ri-arrow-left-line"></i> Kembali ke Blog
            </a>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12 flex-grow">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Main Content -->
            <div class="w-full lg:w-8/12">
                <article class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-12">
                    <header class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-lg text-xs font-black uppercase tracking-widest border border-emerald-100"><?= $post->kategori ?? 'Berita' ?></span>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight mb-6"><?= $post->judul ?></h1>
                        <div class="flex items-center justify-between border-b border-slate-100 pb-8">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i class="ri-user-smile-line text-xl"></i>
                                </div>
                                <div class="text-sm">
                                    <p class="font-bold text-slate-900"><?= $author->first_name ?? 'Admin' ?></p>
                                    <p class="text-slate-400"><?= date('d F Y', strtotime($post->tanggal)) ?></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-slate-400 text-sm font-bold">
                                <i class="ri-eye-line text-lg"></i>
                                <span><?= $post->views ?> Views</span>
                            </div>
                        </div>
                    </header>

                    <?php if(!empty($post->gambar)): ?>
                        <div class="mb-10 rounded-2xl overflow-hidden shadow-lg">
                            <img src="<?= base_url($post->gambar) ?>" alt="<?= $post->judul ?>" class="w-full h-auto object-cover">
                        </div>
                    <?php endif; ?>

                    <div class="prose max-w-none prose-lg">
                        <?= $post->isi ?>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-4/12 space-y-8">
                <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-8 sticky top-32">
                    <h3 class="font-black text-xl text-slate-900 mb-6 flex items-center gap-2">
                        <i class="ri-fire-line text-orange-500"></i> Berita Terbaru
                    </h3>
                    <div class="space-y-6">
                        <?php foreach($recent_posts as $recent): ?>
                            <a href="<?= base_url('blog/read/'.$recent->slug) ?>" class="flex gap-4 group items-start">
                                <div class="w-24 h-24 flex-shrink-0 rounded-xl overflow-hidden bg-slate-100 relative shadow-sm">
                                     <img src="<?= !empty($recent->gambar) ? base_url($recent->gambar) : 'https://via.placeholder.com/150' ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-slate-800 group-hover:text-emerald-600 line-clamp-2 leading-snug mb-2 transition-colors"><?= $recent->judul ?></h4>
                                    <span class="text-[10px] uppercase tracking-wide font-bold text-slate-400 block"><?= date('d M Y', strtotime($recent->tanggal)) ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-8 mt-auto">
        <div class="container mx-auto px-6 text-center text-slate-500 text-sm">
            &copy; <?= date('Y') ?> <span class="font-bold text-slate-800"><?= $setting->sekolah ?></span>. All rights reserved.
        </div>
    </footer>
</body>
</html>
