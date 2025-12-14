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

                <!-- Share Section -->
                <div class="mt-8 mb-12">
                    <h3 class="font-bold text-slate-800 mb-4">Bagikan Artikel Ini:</h3>
                    <div class="flex flex-wrap gap-2">
                         <a href="https://wa.me/?text=<?= urlencode($post->judul . ' ' . current_url()) ?>" target="_blank" class="px-4 py-2 bg-green-500 text-white rounded-lg font-bold text-sm hover:opacity-90 transition flex items-center gap-2"><i class="ri-whatsapp-line"></i> WhatsApp</a>
                         <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-bold text-sm hover:opacity-90 transition flex items-center gap-2"><i class="ri-facebook-fill"></i> Facebook</a>
                         <a href="https://twitter.com/intent/tweet?text=<?= urlencode($post->judul) ?>&url=<?= urlencode(current_url()) ?>" target="_blank" class="px-4 py-2 bg-sky-500 text-white rounded-lg font-bold text-sm hover:opacity-90 transition flex items-center gap-2"><i class="ri-twitter-x-line"></i> Twitter</a>
                         <a href="https://t.me/share/url?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($post->judul) ?>" target="_blank" class="px-4 py-2 bg-blue-400 text-white rounded-lg font-bold text-sm hover:opacity-90 transition flex items-center gap-2"><i class="ri-telegram-fill"></i> Telegram</a>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-12 mb-12">
                     <h3 class="text-2xl font-black text-slate-900 mb-8 flex items-center gap-2"><i class="ri-chat-1-line text-emerald-600"></i> Komentar (<?= count($comments) ?>)</h3>
                     
                     <!-- List Comments -->
                     <ul class="space-y-8 mb-12">
                        <?php if(!empty($comments)): ?>
                            <?php foreach($comments as $comment): ?>
                                <li class="flex gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-500 flex-shrink-0 border border-slate-200">
                                        <?= substr($comment->name, 0, 1) ?>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-slate-50 p-4 rounded-xl rounded-tl-none border border-slate-100">
                                            <div class="flex justify-between items-start mb-2">
                                                <h5 class="font-bold text-slate-900"><?= $comment->name ?></h5>
                                                <span class="text-xs text-slate-400 font-medium"><?= date('d M Y H:i', strtotime($comment->created_at)) ?></span>
                                            </div>
                                            <p class="text-slate-600 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($comment->body)) ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-center py-8 text-slate-400 italic">Belum ada komentar. Jadilah yang pertama berkomentar!</li>
                        <?php endif; ?>
                     </ul>

                     <!-- Comment Form -->
                     <div class="border-t border-slate-100 pt-8">
                        <h4 class="font-bold text-lg text-slate-900 mb-6">Tulis Komentar</h4>
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="p-4 mb-6 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-100 text-sm font-bold flex items-center gap-2">
                                <i class="ri-checkbox-circle-fill text-lg"></i>
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>
                         <?php if($this->session->flashdata('error')): ?>
                            <div class="p-4 mb-6 bg-red-50 text-red-700 rounded-xl border border-red-100 text-sm font-bold flex items-center gap-2">
                                <i class="ri-error-warning-fill text-lg"></i>
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('blog/post_comment') ?>" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                            <input type="hidden" name="id_post" value="<?= $post->id_post ?>">
                            <input type="hidden" name="slug" value="<?= $post->slug ?>">
                            <div class="grid md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" placeholder="Nama Anda" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Email (Tidak dipublikasikan)</label>
                                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" placeholder="email@contoh.com">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Komentar</label>
                                <textarea name="body" rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" placeholder="Tulis komentar anda disini..." required></textarea>
                            </div>
                            <button type="submit" class="px-8 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-emerald-600 transition-all shadow-lg hover:shadow-emerald-500/20 active:scale-95">
                                Kirim Komentar
                            </button>
                        </form>
                     </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-4/12 space-y-8">
                <!-- Recent Posts -->
                <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-8">
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

                <!-- Recent Comments -->
                <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 p-8">
                    <h3 class="font-black text-xl text-slate-900 mb-6 flex items-center gap-2">
                        <i class="ri-chat-quote-line text-blue-500"></i> Komentar Terbaru
                    </h3>
                    <div class="space-y-6">
                        <?php if(!empty($recent_comments)): ?>
                            <?php foreach($recent_comments as $rc): ?>
                                <div class="border-b border-slate-50 last:border-0 pb-4 last:pb-0">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-bold text-slate-900"><?= $rc->name ?></span>
                                        <span class="text-[10px] text-slate-400"><?= date('d/m/y', strtotime($rc->created_at)) ?></span>
                                    </div>
                                    <p class="text-xs text-slate-500 italic line-clamp-2 mb-2">"<?= htmlspecialchars($rc->body) ?>"</p>
                                    <a href="<?= base_url('blog/read/'.$rc->slug) ?>" class="text-[10px] font-bold text-emerald-600 hover:text-emerald-500 uppercase tracking-wider flex items-center gap-1">
                                        Lihat Post <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-sm text-slate-400 italic">Belum ada komentar.</p>
                        <?php endif; ?>
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
