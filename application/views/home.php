<?php $this->load->view('_templates/public/header'); ?>

    <!-- Hero Section (Light & Asymmetrical) -->
    <section id="beranda" class="relative min-h-screen flex items-center pt-24 pb-12 overflow-hidden bg-slate-50">
        <!-- Background Patterns -->
        <div class="absolute inset-0 z-0 opacity-40">
            <div class="absolute right-0 top-0 w-3/4 h-full bg-gradient-to-l from-emerald-50/50 to-transparent"></div>
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-200/30 rounded-full blur-3xl animate-float"></div>
            <div class="absolute top-1/2 left-12 w-64 h-64 bg-blue-200/30 rounded-full blur-3xl animate-float-delayed"></div>
            <!-- Grid Pattern -->
            <div class="absolute inset-0" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 30px 30px; opacity: 0.1;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-6">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Website Resmi Sekolah
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-slate-900 mb-6 leading-tight">
                        Wujudkan Generasi <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">
                             Berprestasi
                        </span>
                    </h1>
                    
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-lg">
                        <?= $setting->motto ?? 'Membangun generasi cerdas, berkarakter, dan berakhlak mulia melalui pendidikan berkualitas.' ?>
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="#profil" class="px-8 py-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold shadow-lg shadow-emerald-600/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                            Jelajahi Profil <i class="ri-arrow-right-line"></i>
                        </a>
                        <a href="#berita" class="px-8 py-4 bg-white hover:bg-slate-50 text-slate-700 rounded-xl font-bold border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center gap-2">
                            <i class="ri-newspaper-line text-emerald-600"></i> Berita Terbaru
                        </a>
                    </div>

                    <!-- Stats Row -->
                    <div class="mt-12 flex items-center gap-8 border-t border-slate-200 pt-8" data-aos="fade-up" data-aos-delay="200">
                        <div>
                            <h3 class="text-3xl font-black text-slate-800 counter" data-count="<?= $stats['siswa'] ?>">0</h3>
                            <p class="text-sm text-slate-500 font-medium">Siswa Aktif</p>
                        </div>
                        <div class="w-px h-10 bg-slate-200"></div>
                         <div>
                            <h3 class="text-3xl font-black text-slate-800 counter" data-count="<?= $stats['guru'] ?>">0</h3>
                            <p class="text-sm text-slate-500 font-medium">Guru & Staff</p>
                        </div>
                        <div class="w-px h-10 bg-slate-200"></div>
                        <div>
                            <h3 class="text-3xl font-black text-slate-800 counter" data-count="<?= $stats['prestasi'] ?>">0</h3>
                            <p class="text-sm text-slate-500 font-medium">Prestasi</p>
                        </div>
                    </div>
                </div>

                <!-- Hero Image/Slider -->
                <div class="relative" data-aos="fade-left">
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl shadow-emerald-100 border-8 border-white z-20 aspect-[4/3] transform rotate-2 hover:rotate-0 transition-transform duration-700 animate-float">
                        <div class="swiper heroSwiper h-full w-full">
                            <div class="swiper-wrapper">
                                <?php if(!empty($slider)): ?>
                                    <?php foreach($slider as $s): ?>
                                    <div class="swiper-slide h-full w-full">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                                        <img src="<?= base_url($s->gambar) ?>" class="w-full h-full object-cover">
                                        <div class="absolute bottom-6 left-6 z-20">
                                            <p class="text-white font-bold text-lg"><?= $s->caption ?? '' ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="swiper-slide h-full w-full">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070" class="w-full h-full object-cover">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative Elements -->
                    <div class="absolute -bottom-10 -left-10 w-full h-full rounded-[3rem] border-2 border-emerald-500/10 -z-10"></div>
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-yellow-400/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Section -->
    <section id="profil" class="py-24 relative bg-white overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                 <div class="w-full lg:w-1/2 order-2 lg:order-1" data-aos="fade-right">
                    <span class="text-emerald-600 font-bold tracking-widest uppercase text-xs mb-2 block">Sambutan Kepala Sekolah</span>
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-6 leading-tight">
                         <?= $setting->kepsek ?? 'Kepala Sekolah' ?>
                    </h2>
                    <div class="prose prose-lg text-slate-600 mb-8">
                         <p class="font-serif italic text-xl text-slate-800 border-l-4 border-emerald-500 pl-4 mb-6">
                            "<?= $setting->motto ?? 'Pendidikan adalah kunci kesuksesan.' ?>"
                        </p>
                        <?= nl2br($setting->sambutan ?? 'Selamat datang di website kami.') ?>
                    </div>
                    
                    <a href="<?= base_url('sejarah') ?>" class="inline-flex items-center gap-2 text-emerald-700 font-bold hover:gap-4 transition-all group">
                        Baca Sejarah Sekolah <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <div class="w-full lg:w-1/2 order-1 lg:order-2 relative" data-aos="fade-left">
                     <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl shadow-blue-900/10">
                         <?php if (!empty($setting->tanda_tangan)): ?>
                             <img src="<?= base_url().$setting->tanda_tangan ?>" class="w-full h-auto object-cover">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888" class="w-full h-auto object-cover">
                        <?php endif; ?>
                     </div>
                     <!-- Floating Card -->
                     <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-xl z-20 max-w-xs animate-float">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600">
                                <i class="ri-chat-quote-line text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-bold uppercase">Quotes Hari Ini</p>
                                <p class="text-sm font-bold text-slate-800 line-clamp-2">"Belajar tanpa berpikir itu tidaklah berguna."</p>
                            </div>
                        </div>
                     </div>
                     <div class="absolute -top-10 -right-10 w-64 h-64 bg-emerald-100 rounded-full -z-10 mix-blend-multiply filter blur-xl opacity-70"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Cards -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 relative z-10 -mt-32">
                 <!-- Card 1 -->
                 <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up" data-aos-delay="0">
                     <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6">
                         <i class="ri-book-open-line"></i>
                     </div>
                     <h3 class="text-xl font-bold text-slate-900 mb-3">Kurikulum Merdeka</h3>
                     <p class="text-slate-500 mb-6">Menerapkan kurikulum terbaru yang berpusat pada pengembangan karakter dan kompetensi siswa.</p>
                     <a href="#" class="text-blue-600 font-bold text-sm hover:underline">Pelajari Lebih Lanjut</a>
                 </div>
                 
                 <!-- Card 2 -->
                 <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up" data-aos-delay="100">
                      <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl mb-6">
                         <i class="ri-trophy-line"></i>
                     </div>
                     <h3 class="text-xl font-bold text-slate-900 mb-3">Prestasi Unggulan</h3>
                     <p class="text-slate-500 mb-6">Mencetak siswa berprestasi di bidang akademik maupun non-akademik di tingkat nasional.</p>
                     <a href="#" class="text-emerald-600 font-bold text-sm hover:underline">Lihat Prestasi</a>
                 </div>

                 <!-- Card 3 -->
                  <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform duration-300" data-aos="fade-up" data-aos-delay="200">
                      <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-2xl mb-6">
                         <i class="ri-group-line"></i>
                     </div>
                     <h3 class="text-xl font-bold text-slate-900 mb-3">Ekstrakurikuler</h3>
                     <p class="text-slate-500 mb-6">Beragam kegiatan ekstrakurikuler untuk menyalurkan bakat dan minat siswa secara optimal.</p>
                     <a href="<?= base_url('profile/ekskul') ?>" class="text-orange-600 font-bold text-sm hover:underline">Cek Ekskul</a>
                 </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                     <span class="text-emerald-600 font-bold tracking-widest uppercase text-xs mb-2 block">Dokumentasi</span>
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900">Galeri Kegiatan</h2>
                </div>
                <a href="<?= base_url('gallery') ?>" class="hidden md:flex items-center gap-2 px-6 py-3 rounded-full border border-slate-200 hover:bg-slate-50 font-bold text-slate-600 transition-colors">
                    Lihat Semua <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 h-[500px]">
                <?php if(!empty($gallery)): ?>
                    <?php 
                        $g1 = isset($gallery[0]) ? $gallery[0] : null;
                        $g2 = isset($gallery[1]) ? $gallery[1] : null;
                        $g3 = isset($gallery[2]) ? $gallery[2] : null;
                        $g4 = isset($gallery[3]) ? $gallery[3] : null;
                        $g5 = isset($gallery[4]) ? $gallery[4] : null;
                    ?>
                    
                    <!-- Feature Image (Left) -->
                    <div class="col-span-2 md:col-span-2 row-span-2 relative rounded-3xl overflow-hidden group cursor-pointer" data-aos="fade-up">
                        <?php if($g1): ?>
                        <img src="<?= base_url($g1->gambar) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent p-8 flex flex-col justify-end">
                            <span class="text-emerald-400 font-bold text-xs uppercase"><?= $g1->kategori ?></span>
                            <h3 class="text-white font-bold text-2xl"><?= $g1->judul ?></h3>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Right Grid -->
                    <div class="grid grid-rows-2 gap-4 col-span-2 md:col-span-2 h-full"> 
                         <?php if($g2): ?>
                         <div class="relative rounded-3xl overflow-hidden group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?= base_url($g2->gambar) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                         </div>
                         <?php endif; ?>
                         <div class="grid grid-cols-2 gap-4">
                             <?php if($g3): ?>
                             <div class="relative rounded-3xl overflow-hidden group cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                                <img src="<?= base_url($g3->gambar) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                             </div>
                             <?php endif; ?>
                             <?php if($g4): ?>
                             <div class="relative rounded-3xl overflow-hidden group cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                                <img src="<?= base_url($g4->gambar) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                 <!-- More overlay -->
                                 <a href="<?= base_url('gallery') ?>" class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                     <span class="text-white font-bold border border-white px-4 py-2 rounded-full">Lihat Semua</span>
                                 </a>
                             </div>
                             <?php endif; ?>
                         </div>
                    </div>
                <?php else: ?>
                    <div class="col-span-4 flex items-center justify-center bg-slate-50 rounded-3xl border border-dashed border-slate-300">
                        <p class="text-slate-500">Belum ada foto galeri.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Post/News Section -->
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                 <span class="text-emerald-600 font-bold tracking-widest uppercase text-xs mb-2 block">Informasi Terkini</span>
                 <h2 class="text-3xl md:text-5xl font-black text-slate-900">Berita Sekolah</h2>
            </div>
            
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(!empty($news)): ?>
                    <?php foreach($news as $index => $post): ?>
                         <article class="bg-white rounded-[2rem] p-4 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition-transform duration-300 border border-slate-100" data-aos="fade-up" data-aos-delay="<?= $index*100 ?>">
                             <div class="h-56 rounded-2xl overflow-hidden relative mb-6">
                                  <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" class="w-full h-full object-cover">
                                  <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-slate-800"><?= $post->kategori ?? 'Berita' ?></span>
                             </div>
                             <div class="px-2 pb-4">
                                 <div class="flex items-center gap-2 text-xs font-bold text-slate-400 mb-3">
                                     <i class="ri-calendar-line text-emerald-500"></i> <?= date('d M Y', strtotime($post->tanggal)) ?>
                                 </div>
                                 <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 hover:text-emerald-600 transition-colors">
                                     <a href="<?= base_url('blog/read/'.$post->slug) ?>"><?= $post->judul ?></a>
                                 </h3>
                                 <p class="text-slate-500 text-sm line-clamp-3 mb-6"><?= strip_tags($post->isi) ?></p>
                                 <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="text-emerald-600 font-bold text-sm hover:underline">Baca Selengkapnya</a>
                             </div>
                         </article>
                    <?php endforeach; ?>
                <?php endif; ?>
             </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var heroSwiper = new Swiper(".heroSwiper", {
                spaceBetween: 0,
                centeredSlides: true,
                effect: "fade",
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>
<?php $this->load->view('_templates/public/footer'); ?>
