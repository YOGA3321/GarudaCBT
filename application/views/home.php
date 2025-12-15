<?php $this->load->view('_templates/public/header'); ?>

    <!-- HERO SECTION -->
    <section class="relative bg-slate-900 pt-32 pb-32 lg:pt-48 lg:pb-48 overflow-hidden">
        <!-- Background Slider/Image -->
        <div class="absolute inset-0 z-0">
            <div class="swiper heroSwiper h-full w-full">
                <div class="swiper-wrapper">
                    <?php if(!empty($slider)): ?>
                        <?php foreach($slider as $s): ?>
                        <div class="swiper-slide relative h-full w-full">
                            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/60 to-transparent z-10"></div>
                            <img src="<?= base_url($s->gambar) ?>" class="w-full h-full object-cover" alt="Slide">
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="swiper-slide relative h-full w-full">
                             <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/60 to-transparent z-10"></div>
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070" class="w-full h-full object-cover" alt="Default Hero">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container mx-auto px-4 relative z-20">
            <div class="max-w-3xl" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-6 border border-emerald-500/30">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Website Resmi Sekolah
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white mb-6 leading-tight">
                    Mewujudkan Generasi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Berprestasi</span> & Berakhlak
                </h1>
                <p class="text-lg md:text-xl text-slate-300 mb-10 leading-relaxed max-w-xl">
                    <?= $setting->motto ?? 'Membangun generasi cerdas, berkarakter, dan berakhlak mulia melalui pendidikan berkualitas dan inovatif.' ?>
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#profil" class="px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl font-bold transition-all transform hover:-translate-y-1 shadow-lg shadow-emerald-600/20 flex items-center gap-2">
                        Tentang Sekolah <i class="ri-arrow-down-line"></i>
                    </a>
                    <a href="<?= base_url('login') ?>" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-xl font-bold backdrop-blur-sm border border-white/10 transition-all flex items-center gap-2">
                        <i class="ri-user-line"></i> Portal Login
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS & FEATURES (Floating) -->
    <section class="relative z-30 -mt-16 px-4 mb-20">
        <div class="container mx-auto">
            <!-- Stats -->
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-8 md:p-12 mb-20 border border-slate-100" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-100 gap-8 md:gap-0">
                    <div class="text-center px-4 py-4 md:py-0">
                        <div class="text-4xl lg:text-5xl font-black text-slate-800 mb-2 counter" data-count="<?= $stats['siswa'] ?>">0</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Siswa Aktif</div>
                    </div>
                    <div class="text-center px-4 py-4 md:py-0">
                        <div class="text-4xl lg:text-5xl font-black text-emerald-600 mb-2 counter" data-count="<?= $stats['guru'] ?>">0</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Guru & Staff</div>
                    </div>
                    <div class="text-center px-4 py-4 md:py-0">
                        <div class="text-4xl lg:text-5xl font-black text-blue-600 mb-2 counter" data-count="<?= $stats['prestasi'] ?>">0</div>
                        <div class="text-sm font-bold text-slate-500 uppercase tracking-widest">Prestasi Diraih</div>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100 hover:border-emerald-500/30 hover:shadow-emerald-100/50 transition-all group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ri-book-open-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Kurikulum Merdeka</h3>
                    <p class="text-slate-500">Menerapkan standar pendidikan terbaru yang berfokus pada pengembangan minat dan bakat siswa.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100 hover:border-blue-500/30 hover:shadow-blue-100/50 transition-all group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ri-medal-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Prestasi Akademik</h3>
                    <p class="text-slate-500">Dukungan penuh untuk kompetisi sains, matematika, dan teknologi tingkat nasional.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-100 hover:border-orange-500/30 hover:shadow-orange-100/50 transition-all group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                        <i class="ri-basketball-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Ekstrakurikuler</h3>
                    <p class="text-slate-500">Beragam kegiatan positif untuk membentuk karakter dan keterampilan sosial siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SAMBUTAN -->
    <section id="profil" class="py-20 bg-slate-50 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                <!-- Text -->
                <div class="w-full lg:w-1/2 order-2 lg:order-1" data-aos="fade-right">
                    <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-2 block">Sambutan Kepala Sekolah</span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 mb-6">
                        <?= $setting->kepsek ?? 'Kepala Sekolah' ?>
                    </h2>
                    <div class="prose prose-lg text-slate-600 mb-8">
                        <p class="italic text-slate-800 border-l-4 border-emerald-500 pl-4 mb-4 font-medium">
                            "<?= $setting->motto ?? 'Pendidikan Berkualitas untuk Masa Depan Gemilang.' ?>"
                        </p>
                        <p>
                            <?= nl2br(substr(strip_tags($setting->sambutan ?? 'Selamat datang di website resmi kami. Kami berkomitmen memberikan layanan pendidikan terbaik.'), 0, 400)) ?>...
                        </p>
                    </div>
                    <a href="<?= base_url('sejarah') ?>" class="inline-flex items-center gap-2 text-emerald-700 font-bold hover:text-emerald-800 transition-colors">
                        Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
                <!-- Image -->
                <div class="w-full lg:w-1/2 order-1 lg:order-2" data-aos="fade-left">
                    <div class="relative">
                        <div class="absolute inset-0 bg-emerald-200 rounded-[2rem] transform rotate-3 translate-x-2 translate-y-2"></div>
                        <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                             <?php if (!empty($setting->tanda_tangan)): ?>
                                <img src="<?= base_url().$setting->tanda_tangan ?>" class="w-full h-auto object-cover" alt="Kepala Sekolah">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888" class="w-full h-auto object-cover" alt="Default Kepsek">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section id="berita" class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div class="max-w-xl">
                    <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-2 block">Kabar Sekolah</span>
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900">Berita & Artikel Terbaru</h2>
                </div>
                <a href="<?= base_url('blog') ?>" class="px-6 py-3 rounded-full border border-slate-200 font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                    Lihat Semua Berita
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(!empty($news)): ?>
                    <?php foreach($news as $index => $post): ?>
                         <article class="flex flex-col h-full bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-lg shadow-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                             <div class="h-48 w-full relative overflow-hidden">
                                 <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110" alt="<?= $post->judul ?>">
                                  <div class="absolute top-4 left-4">
                                     <span class="bg-white/95 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-emerald-700 shadow-sm">
                                         <?= $post->kategori ?? 'Berita' ?>
                                     </span>
                                 </div>
                             </div>
                             <div class="p-6 flex-1 flex flex-col">
                                 <div class="flex items-center gap-2 text-xs font-bold text-slate-400 mb-3">
                                     <i class="ri-calendar-line"></i> <?= date('d M Y', strtotime($post->tanggal)) ?>
                                 </div>
                                 <h3 class="text-xl font-bold text-slate-900 mb-3 leading-snug hover:text-emerald-600 transition-colors">
                                     <a href="<?= base_url('blog/read/'.$post->slug) ?>">
                                         <?= $post->judul ?>
                                     </a>
                                 </h3>
                                 <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-1">
                                     <?= strip_tags($post->isi) ?>
                                 </p>
                                 <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="inline-flex items-center gap-1 text-emerald-600 font-bold text-sm hover:gap-2 transition-all">
                                     Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                                 </a>
                             </div>
                         </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-12 bg-slate-50 rounded-2xl border border-dashed border-slate-300 text-slate-500">
                        Belum ada berita terbaru.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="py-24 bg-slate-900 text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                 <span class="text-emerald-400 font-bold tracking-widest uppercase text-sm mb-2 block">Dokumentasi</span>
                 <h2 class="text-3xl md:text-5xl font-black">Galeri Kegiatan</h2>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]">
                <?php if(!empty($gallery)): ?>
                    <?php foreach($gallery as $i => $g): ?>
                        <!-- First item is large -->
                        <div class="<?= ($i == 0) ? 'col-span-2 row-span-2' : 'col-span-1 row-span-1' ?> relative rounded-2xl overflow-hidden group cursor-pointer" data-aos="zoom-in" data-aos-delay="<?= $i * 50 ?>">
                            <img src="<?= base_url($g->gambar) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="<?= $g->judul ?>">
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-4">
                                <div class="text-center transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    <h4 class="font-bold text-lg mb-1"><?= $g->judul ?></h4>
                                    <span class="text-emerald-400 text-sm"><?= $g->kategori ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                     <div class="col-span-4 text-center py-12 border border-dashed border-slate-700 rounded-2xl text-slate-400">
                        Belum ada galeri foto.
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-12">
                 <a href="<?= base_url('gallery') ?>" class="inline-block px-8 py-3 rounded-full border border-slate-700 hover:bg-emerald-600 hover:border-emerald-600 hover:text-white transition-all font-bold text-slate-300">
                    Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var heroSwiper = new Swiper(".heroSwiper", {
                effect: "fade",
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                fadeEffect: { crossFade: true },
                speed: 1000,
            });
            
            // Simple Counter Animation
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-count');
                const duration = 2000; // ms
                const increment = target / (duration / 16); // 60fps
                
                let current = 0;
                const updateCounter = () => {
                    current += increment;
                    if(current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };
                // Trigger when visible (simple version)
                // In production, better to use IntersectionObserver
                updateCounter();
            });
        });
    </script>
<?php $this->load->view('_templates/public/footer'); ?>
