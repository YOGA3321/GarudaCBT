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
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-slate-800 antialiased flex flex-col min-h-screen">

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
            
            <a href="<?= base_url() ?>" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-primary font-bold transition-all flex items-center gap-2">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>
    </nav>

    <!-- Header -->
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#059669 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Kabar Sekolah</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">Informasi terbaru, prestasi, dan kegiatan kami.</p>
        </div>
    </div>

    <div class="container mx-auto px-6 py-12 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(!empty($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 overflow-hidden group flex flex-col h-full">
                        <div class="h-56 overflow-hidden relative">
                             <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" 
                                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                             <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-emerald-600 shadow-sm uppercase tracking-wide">
                                <?= $post->kategori ?? 'Berita' ?>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 text-xs text-slate-400 font-bold mb-3 uppercase tracking-wider">
                                <span><i class="ri-calendar-line text-primary"></i> <?= date('d M Y', strtotime($post->tanggal)) ?></span>
                            </div>
                            <h2 class="text-xl font-bold text-slate-900 mb-4 leading-tight group-hover:text-emerald-600 transition-colors">
                                <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="line-clamp-2"><?= $post->judul ?></a>
                            </h2>
                            <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow"><?= strip_tags($post->isi) ?></p>
                            <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="inline-flex items-center gap-2 text-emerald-600 font-bold text-sm group/link">
                                Baca Selengkapnya <i class="ri-arrow-right-line transform group-hover/link:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200">
                    <i class="ri-article-line text-4xl text-slate-300 mb-4 block"></i>
                    <p class="text-slate-500 font-medium text-lg">Belum ada artikel yang diterbitkan.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-16 flex justify-center">
            <?= $links ?>
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
