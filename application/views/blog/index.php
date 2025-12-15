<?php $this->load->view('_templates/public/header'); ?>

     <!-- Header Section (Dynamic Pattern) -->
    <section class="relative pt-32 pb-24 bg-slate-900 border-b border-white/10 overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-gradient-to-tr from-emerald-900 via-slate-900 to-slate-900 opacity-90 z-10"></div>
             <!-- Pattern -->
             <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 z-0"></div>
             <!-- Animated Blobs -->
             <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
             <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float-delayed"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 text-center" data-aos="fade-up">
            <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/20 text-emerald-300 ring-1 ring-emerald-500/50 text-xs font-bold uppercase tracking-wider mb-4">
                Pusat Informasi
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4 tracking-tight">Berita & Artikel</h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">Ikuti perkembangan terbaru, prestasi siswa, dan agenda kegiatan sekolah kami.</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-slate-100 min-h-screen relative">
        <!-- Background element -->
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-slate-200/50 to-transparent -z-10"></div>

        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-10">
                
                <!-- Left Content (News List) -->
                <div class="lg:col-span-8 space-y-12">
                    
                    <!-- Featured Post (First Item) -->
                    <?php if(!empty($posts)): ?>
                        <?php 
                            $featured = $posts[0]; 
                            $others = array_slice($posts, 1);
                        ?>
                        <article class="relative group rounded-[2rem] overflow-hidden shadow-2xl shadow-emerald-900/20 h-[500px]" data-aos="fade-up">
                             <img src="<?= !empty($featured->gambar) ? base_url($featured->gambar) : 'https://via.placeholder.com/800x600' ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                             <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"></div>
                             
                             <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                                 <span class="inline-block px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-lg uppercase tracking-wider mb-3">
                                     <?= $featured->kategori ?? 'Berita Utama' ?>
                                 </span>
                                 <h2 class="text-3xl md:text-4xl font-black text-white mb-4 leading-tight group-hover:text-emerald-300 transition-colors">
                                     <a href="<?= base_url('blog/read/'.$featured->slug) ?>"><?= $featured->judul ?></a>
                                 </h2>
                                 <div class="flex items-center gap-4 text-slate-300 text-sm font-medium">
                                     <span class="flex items-center gap-1"><i class="ri-calendar-line text-emerald-400"></i> <?= date('d M Y', strtotime($featured->tanggal)) ?></span>
                                     <span class="flex items-center gap-1"><i class="ri-eye-line text-emerald-400"></i> <?= $featured->views ?> Views</span>
                                 </div>
                             </div>
                        </article>

                        <!-- Secondary Grid -->
                        <div class="grid md:grid-cols-2 gap-8">
                            <?php foreach($others as $post): ?>
                            <article class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-slate-200/60 hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full border border-slate-100 group" data-aos="fade-up">
                                <div class="relative h-56 overflow-hidden">
                                    <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/600x400' ?>" 
                                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-[10px] font-black text-slate-800 uppercase tracking-wide">
                                        <?= $post->kategori ?? 'Umum' ?>
                                    </span>
                                </div>
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="text-xs text-slate-400 font-bold mb-2 flex items-center gap-2">
                                        <i class="ri-calendar-line text-emerald-500"></i> <?= date('d M Y', strtotime($post->tanggal)) ?>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-900 mb-3 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">
                                        <a href="<?= base_url('blog/read/'.$post->slug) ?>"><?= $post->judul ?></a>
                                    </h3>
                                    <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                        <?= strip_tags($post->isi) ?>
                                    </p>
                                    <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="text-emerald-600 font-bold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all">
                                        Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </div>

                    <?php else: ?>
                        <div class="bg-white rounded-[2rem] p-12 text-center border-2 border-dashed border-slate-300">
                            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                                <i class="ri-article-line text-4xl"></i>
                            </div>
                            <h3 class="font-bold text-xl text-slate-800">Belum Ada Berita</h3>
                            <p class="text-slate-500">Saat ini belum ada artikel yang diterbitkan.</p>
                        </div>
                    <?php endif; ?>

                    <!-- Pagination -->
                    <div class="mt-12">
                        <?= $links ?>
                    </div>
                </div>

                <!-- Sidebar (Right) -->
                <aside class="lg:col-span-4 space-y-8">
                    <!-- Search -->
                    <div class="bg-white p-2 rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100">
                        <div class="relative">
                            <input type="text" placeholder="Cari artikel..." class="w-full pl-5 pr-12 py-4 rounded-xl bg-slate-50 border-none focus:ring-2 focus:ring-emerald-500 outline-none text-slate-700 font-medium placeholder:text-slate-400 transition-all">
                            <button class="absolute right-2 top-2 bottom-2 w-10 bg-white rounded-lg text-emerald-600 hover:bg-emerald-50 transition-colors shadow-sm flex items-center justify-center">
                                <i class="ri-search-line text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Categories Card -->
                    <div class="bg-slate-900 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-2xl shadow-slate-900/20">
                         <!-- Decorative blobs -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500 rounded-full blur-3xl opacity-20 -mr-10 -mt-10"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-blue-500 rounded-full blur-3xl opacity-20 -ml-10 -mb-10"></div>
                        
                        <h4 class="font-bold text-xl mb-6 flex items-center gap-2 relative z-10">
                            <i class="ri-layout-grid-line text-emerald-400"></i> Kategori
                        </h4>
                        
                        <div class="space-y-3 relative z-10">
                            <a href="#" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 transition-all group">
                                <span class="text-sm font-medium text-slate-300 group-hover:text-white">Berita Sekolah</span>
                                <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-md">12</span>
                            </a>
                            <a href="#" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 transition-all group">
                                <span class="text-sm font-medium text-slate-300 group-hover:text-white">Pengumuman</span>
                                <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-md">5</span>
                            </a>
                             <a href="#" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 transition-all group">
                                <span class="text-sm font-medium text-slate-300 group-hover:text-white">Prestasi Siswa</span>
                                <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-md">8</span>
                            </a>
                        </div>
                    </div>

                    <!-- Popular Posts -->
                    <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                        <h4 class="font-bold text-xl text-slate-900 mb-6 flex items-center gap-2">
                             <span class="w-1 h-6 bg-orange-500 rounded-full"></span> Terpopuler
                        </h4>
                        <div class="space-y-6">
                            <?php if(!empty($recent_posts)): ?>
                                <?php foreach(array_slice($recent_posts, 0, 4) as $popular): ?>
                                <a href="<?= base_url('blog/read/'.$popular->slug) ?>" class="flex gap-4 group">
                                    <div class="relative w-20 h-20 rounded-2xl overflow-hidden flex-shrink-0">
                                        <img src="<?= !empty($popular->gambar) ? base_url($popular->gambar) : 'https://via.placeholder.com/150' ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                                        <span class="absolute top-1 left-1 text-[10px] font-bold text-white bg-black/50 backdrop-blur px-1.5 rounded">#1</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1"><?= date('d M', strtotime($popular->tanggal)) ?></span>
                                        <h5 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">
                                            <?= $popular->judul ?>
                                        </h5>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </aside>
                
            </div>
        </div>
    </section>

<?php $this->load->view('_templates/public/footer'); ?>
