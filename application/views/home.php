<?php $this->load->view('_templates/public/header'); ?>

    <!-- Load Typed.js Library -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <!-- HERO SECTION -->
    <section class="relative h-screen min-h-[700px] flex items-center overflow-hidden bg-slate-900">
        <!-- Swiper Background -->
        <div class="absolute inset-0 z-0">
            <div class="swiper heroSwiper h-full w-full">
                <div class="swiper-wrapper">
                    <?php if(!empty($slider) && is_array($slider)): ?>
                        <?php foreach($slider as $s): ?>
                        <div class="swiper-slide relative h-full w-full">
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/70 to-transparent z-10"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/30 to-transparent z-10"></div>
                            <!-- Image -->
                            <img src="<?= base_url($s->gambar) ?>" class="w-full h-full object-cover transform scale-105 animate-kenburns" alt="Slide">
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="swiper-slide relative h-full w-full">
                             <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/70 to-transparent z-10"></div>
                            <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=2071" class="w-full h-full object-cover animate-kenburns" alt="Default Hero">
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination !right-10 !left-auto !bottom-32 !w-auto hidden md:block"></div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="container mx-auto px-6 relative z-20 pt-10">
            <div class="max-w-4xl animate-fade-in-up">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-teal-500/20 backdrop-blur-md border border-teal-500/30 text-teal-300 text-xs font-bold uppercase tracking-[0.2em] mb-8 shadow-lg shadow-teal-500/10">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                    </span>
                    Official School Website
                </div>
                
                <!-- Headline with Typed.js -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white mb-6 leading-[1.1] tracking-tight drop-shadow-2xl">
                    Membentuk <br>
                    <!-- Element for Typed.js -->
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 via-teal-300 to-cyan-400" id="hero-typing"></span>
                    <span class="block text-3xl md:text-5xl text-slate-300 font-bold mt-4 animate-fade-in-slow">Berakhlak & Berprestasi</span>
                </h1>
                
                <!-- Motto -->
                <p class="text-lg md:text-xl text-slate-300 mb-10 leading-relaxed max-w-2xl font-light border-l-4 border-teal-500 pl-6 backdrop-blur-sm bg-black/20 py-4 pr-4 rounded-r-xl animate-fade-in-slow delay-200">
                    <?= !empty($setting->motto) ? $setting->motto : 'Membangun generasi cerdas, berkarakter, dan berakhlak mulia melalui pendidikan berkualitas dan inovatif.' ?>
                </p>
                
                <!-- Buttons -->
                <div class="flex flex-wrap gap-5 animate-fade-in-slow delay-300">
                    <a href="#profil" class="group relative px-8 py-4 bg-teal-600 text-white rounded-full font-bold overflow-hidden shadow-lg shadow-teal-600/30 transition-all hover:-translate-y-1 hover:shadow-teal-600/50">
                        <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                        <span class="relative flex items-center gap-3">
                            Jelajahi Profil <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                        </span>
                    </a>
                    <a href="<?= base_url('login') ?>" class="px-8 py-4 bg-white/10 text-white rounded-full font-bold backdrop-blur-md border border-white/20 transition-all hover:bg-white/20 hover:border-white/40 flex items-center gap-3 group">
                        <i class="ri-user-line text-teal-400 group-hover:text-white transition-colors"></i> 
                        <span>Portal Akademik</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS SECTION (Seamless Dark Theme) -->
    <section class="relative z-30 bg-[#0B1120] py-16">
        <div class="container mx-auto px-6">
            <!-- Stats Bar -->
            <div class="flex flex-wrap justify-center gap-8 md:gap-12 animate-slide-up">
                <!-- Siswa -->
                <div class="text-center group animate-on-scroll">
                    <div class="flex items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white text-2xl shadow-lg shadow-blue-500/30 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                            <i class="ri-user-smile-line"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-white tracking-tight counter" data-count="<?= $stats['siswa'] ?>">0</div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Siswa</div>
                        </div>
                    </div>
                </div>
                <!-- Guru -->
                <div class="text-center group animate-on-scroll delay-100">
                    <div class="flex items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center text-white text-2xl shadow-lg shadow-teal-500/30 group-hover:scale-110 group-hover:-rotate-6 transition-transform duration-300">
                            <i class="ri-briefcase-line"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-white tracking-tight counter" data-count="<?= $stats['guru'] ?>">0</div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Guru</div>
                        </div>
                    </div>
                </div>
                <!-- Prestasi -->
                <div class="text-center group animate-on-scroll delay-200">
                    <div class="flex items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center text-white text-2xl shadow-lg shadow-orange-500/30 group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
                            <i class="ri-trophy-line"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-white tracking-tight counter" data-count="<?= $stats['prestasi'] ?>">0</div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Prestasi</div>
                        </div>
                    </div>
                </div>
                <!-- Ekstra -->
                <div class="text-center group animate-on-scroll delay-300">
                    <div class="flex items-center gap-3">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center text-white text-2xl shadow-lg shadow-purple-500/30 group-hover:scale-110 group-hover:-rotate-12 transition-transform duration-300">
                            <i class="ri-football-line"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-black text-white tracking-tight counter" data-count="<?= $stats['ekstra'] ?>">0</div>
                            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Ekstra</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- FEATURES SECTION (Dark Theme - Inspired by Lopyta.com) -->
    <section class="py-24 relative overflow-hidden bg-[#0B1120]">
        <!-- Dot Grid Pattern -->
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#22d3ee 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <!-- Gradient Glow Blobs -->
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-teal-500/20 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none translate-y-1/2"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 animate-on-scroll">
                <span class="inline-block py-1.5 px-4 rounded-full bg-teal-500/20 text-teal-400 font-bold tracking-[0.2em] uppercase text-[10px] mb-6 border border-teal-500/30 backdrop-blur-sm">Kenapa Memilih Kami</span>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 tracking-tight leading-tight">Keunggulan & <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-400">Fasilitas Sekolah</span></h2>
                <p class="text-slate-400 text-lg leading-relaxed">Kami menghadirkan ekosistem pendidikan yang modern, aman, dan mendukung tumbuh kembang siswa secara maksimal.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group relative animate-on-scroll delay-100">
                    <!-- Gradient Border Effect -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-[2rem] opacity-0 group-hover:opacity-75 blur transition duration-500"></div>
                    <div class="relative bg-slate-900/80 backdrop-blur-xl p-10 rounded-[2rem] border border-white/10 h-full transition-all duration-300 group-hover:-translate-y-1">
                        <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-teal-600 text-white rounded-3xl flex items-center justify-center text-3xl mb-8 shadow-lg shadow-teal-500/30 group-hover:scale-110 transition-transform duration-500">
                            <i class="ri-book-open-line"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-teal-400 transition-colors">Kurikulum Merdeka</h3>
                        <ul class="space-y-3 text-slate-400">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-teal-500"></i> Pengembangan minat bakat</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-teal-500"></i> Pembelajaran berbasis proyek</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-teal-500"></i> Fokus pada karakter siswa</li>
                        </ul>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="group relative animate-on-scroll delay-200">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-[2rem] opacity-0 group-hover:opacity-75 blur transition duration-500"></div>
                    <div class="relative bg-slate-900/80 backdrop-blur-xl p-10 rounded-[2rem] border border-white/10 h-full transition-all duration-300 group-hover:-translate-y-1">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-3xl flex items-center justify-center text-3xl mb-8 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-500">
                            <i class="ri-medal-line"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-blue-400 transition-colors">Prestasi Akademik</h3>
                        <ul class="space-y-3 text-slate-400">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-blue-500"></i> Kompetisi sains & matematika</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-blue-500"></i> Olimpiade tingkat nasional</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-blue-500"></i> Pembinaan siswa berprestasi</li>
                        </ul>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="group relative animate-on-scroll delay-300">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500 to-pink-500 rounded-[2rem] opacity-0 group-hover:opacity-75 blur transition duration-500"></div>
                    <div class="relative bg-slate-900/80 backdrop-blur-xl p-10 rounded-[2rem] border border-white/10 h-full transition-all duration-300 group-hover:-translate-y-1">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-3xl flex items-center justify-center text-3xl mb-8 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-500">
                            <i class="ri-global-line"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-orange-400 transition-colors">Wawasan Global</h3>
                        <ul class="space-y-3 text-slate-400">
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-orange-500"></i> Penguasaan bahasa asing</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-orange-500"></i> Literasi digital</li>
                            <li class="flex items-center gap-2"><i class="ri-checkbox-circle-fill text-orange-500"></i> Menghadapi tantangan global</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Wave Transition to Principal Section -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none translate-y-1">
            <svg class="relative block w-full h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="#0f172a"></path>
            </svg>
        </div>
    </section>

    <!-- PRINCIPAL SECTION (Dark Theme with Floating Animation) -->
    <section id="profil" class="py-32 relative overflow-hidden bg-slate-900">
        <!-- Background Gradient Blobs -->
        <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-teal-500/10 rounded-full blur-[150px] pointer-events-none -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-blue-500/10 rounded-full blur-[150px] pointer-events-none translate-x-1/2 translate-y-1/2"></div>
        <div class="absolute top-1/2 left-1/2 w-[400px] h-[400px] bg-purple-500/5 rounded-full blur-[100px] pointer-events-none -translate-x-1/2 -translate-y-1/2"></div>
        
        <!-- Dot Pattern -->
        <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
                <!-- Text -->
                <div class="w-full lg:w-1/2 order-2 lg:order-1 animate-on-scroll">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-teal-500/20 text-teal-400 text-xs font-bold uppercase tracking-wider mb-8 border border-teal-500/30 backdrop-blur-sm">
                        <i class="ri-double-quotes-l"></i> Sambutan Kepala Sekolah
                    </div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-8 leading-none tracking-tight">
                        <?= !empty($setting->kepsek) ? $setting->kepsek : 'Kepala Sekolah' ?>
                    </h2>
                    <div class="prose prose-lg mb-10">
                        <blockquote class="text-xl font-medium text-slate-300 mb-6 italic border-l-4 border-teal-500 pl-4 py-1 bg-teal-500/5 rounded-r-xl">
                            "<?= !empty($setting->motto) ? $setting->motto : 'Pendidikan Berkualitas untuk Masa Depan Gemilang.' ?>"
                        </blockquote>
                        <p class="leading-relaxed text-slate-400">
                            <?= nl2br(substr(strip_tags(!empty($setting->sambutan) ? $setting->sambutan : 'Selamat datang di website resmi kami. Kami berkomitmen memberikan layanan pendidikan terbaik.'), 0, 500)) ?>...
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <a href="<?= base_url('sejarah') ?>" class="px-8 py-4 rounded-full bg-gradient-to-r from-teal-600 to-teal-600 text-white font-bold hover:from-teal-500 hover:to-teal-500 transition-all flex items-center gap-2 shadow-xl shadow-teal-500/20">
                            Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                        </a>
                        <a href="<?= base_url('visi_misi') ?>" class="px-8 py-4 rounded-full border-2 border-white/20 text-white font-bold hover:border-teal-500 hover:text-teal-400 transition-colors backdrop-blur-sm">
                            Visi & Misi
                        </a>
                    </div>
                </div>
                
                <!-- Image with Floating Animation -->
                <div class="w-full lg:w-1/2 order-1 lg:order-2 animate-on-scroll delay-200">
                    <div class="relative group animate-float">
                        <!-- Glowing Background Ring -->
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-[3rem] blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-105"></div>
                        
                        <!-- Abstract Shapes -->
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-400 to-teal-500 rounded-[3rem] transform rotate-6 translate-x-4 translate-y-4 group-hover:rotate-3 transition-transform duration-500 scale-95 shadow-2xl"></div>
                        <div class="absolute inset-0 bg-slate-800/50 rounded-[3rem] transform -rotate-3 -translate-x-2 -translate-y-2 scale-95"></div>
                        
                        <!-- Main Image Container -->
                        <div class="relative rounded-[3rem] overflow-hidden shadow-2xl bg-slate-800 aspect-[4/5] transform group-hover:-translate-y-2 transition-transform duration-500 border-4 border-white/10">
                             <?php if (!empty($setting->foto_kepsek)): ?>
                                <img src="<?= base_url().$setting->foto_kepsek ?>" class="w-full h-full object-cover" alt="Kepala Sekolah">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888" class="w-full h-full object-cover" alt="Default Kepsek">
                            <?php endif; ?>
                            
                            <!-- Name Card Overlay -->
                            <div class="absolute bottom-6 left-6 right-6 bg-slate-900/90 backdrop-blur-md p-6 rounded-3xl shadow-lg border border-white/10">
                                <h4 class="font-bold text-xl text-white"><?= !empty($setting->kepsek) ? $setting->kepsek : 'Kepala Sekolah' ?></h4>
                                <p class="text-teal-400 text-sm font-bold uppercase tracking-wider">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Wave to News Section -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none translate-y-1">
            <svg class="relative block w-full h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f8fafc"></path>
            </svg>
        </div>
    </section>

    <!-- EKSTRAKURIKULER SECTION -->
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30 pointer-events-none" style="background-image: radial-gradient(circle, rgba(20,184,166,0.3) 1px, transparent 1px); background-size: 50px 50px;"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 animate-on-scroll">
                <span class="inline-block py-1.5 px-4 rounded-full bg-teal-100 text-teal-700 font-bold tracking-[0.2em] uppercase text-[10px] mb-6 border border-teal-200">Pengembangan Bakat</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight">Ekstrakurikuler <span class="text-teal-600">Sekolah</span></h2>
                <p class="text-slate-500 text-lg leading-relaxed">Wadah pengembangan bakat, minat, dan potensi siswa di luar jam pelajaran akademik untuk mencetak generasi yang aktif dan berprestasi.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <?php if(!empty($ekstras) && is_array($ekstras)): ?>
                    <?php 
                    $icons = ['ri-compass-3-line', 'ri-book-read-line', 'ri-quill-pen-line', 'ri-football-line', 'ri-music-2-line', 'ri-palette-line'];
                    $colors = ['teal', 'blue', 'purple', 'orange', 'pink', 'cyan'];
                    foreach($ekstras as $i => $ekstra): 
                        $icon = $icons[$i % count($icons)];
                        $color = $colors[$i % count($colors)];
                    ?>
                    <div class="group bg-white p-8 rounded-[2rem] shadow-lg hover:shadow-2xl hover:shadow-<?= $color ?>-500/20 transition-all duration-500 border border-slate-100 hover:-translate-y-2 animate-on-scroll delay-<?= $i * 100 ?>">
                        <div class="w-16 h-16 bg-gradient-to-br from-<?= $color ?>-500 to-<?= $color ?>-600 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-<?= $color ?>-500/30 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                            <i class="<?= $icon ?>"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-<?= $color ?>-600 transition-colors"><?= $ekstra->nama_ekstra ?></h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-4">Kegiatan <?= strtolower($ekstra->nama_ekstra) ?> untuk melatih kedisiplinan dan keterampilan siswa.</p>
                        <span class="inline-flex items-center gap-1 text-xs font-bold text-<?= $color ?>-600 bg-<?= $color ?>-50 px-3 py-1 rounded-full"><?= $ekstra->kode_ekstra ?></span>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-16 bg-white rounded-[2rem] border-2 border-dashed border-slate-200">
                        <i class="ri-football-line text-4xl text-slate-300 mb-4 block"></i>
                        <p class="text-slate-400">Belum ada data ekstrakurikuler.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-12 animate-on-scroll">
                <a href="<?= base_url('profile/ekskul') ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-teal-600 text-white font-bold shadow-lg shadow-teal-500/30 hover:bg-teal-700 hover:-translate-y-1 transition-all">
                    Lihat Semua Ekskul <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- QUOTES / TESTIMONI SECTION -->
    <?php if(!empty($quotes) && is_array($quotes) && count($quotes) > 0): ?>
    <section class="py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 relative overflow-hidden">
        <!-- Glow Effects -->
        <div class="absolute top-1/2 left-1/4 w-[400px] h-[400px] bg-teal-500/20 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>
        <div class="absolute top-1/2 right-1/4 w-[400px] h-[400px] bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 animate-on-scroll">
                <span class="inline-block py-1.5 px-4 rounded-full bg-teal-500/20 text-teal-400 font-bold tracking-[0.2em] uppercase text-[10px] mb-6 border border-teal-500/30">Inspirasi</span>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-4">Kata <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-400">Bijak</span></h2>
            </div>

            <div class="swiper quotesSwiper max-w-4xl mx-auto">
                <div class="swiper-wrapper">
                    <?php foreach($quotes as $quote): ?>
                    <div class="swiper-slide">
                        <div class="bg-white/5 backdrop-blur-lg rounded-[2rem] p-10 md:p-14 border border-white/10 text-center">
                            <i class="ri-double-quotes-l text-5xl text-teal-400/50 mb-6 block"></i>
                            <p class="text-xl md:text-2xl text-white leading-relaxed mb-8 font-medium italic">
                                "<?= $quote->content ?>"
                            </p>
                            <div class="flex items-center justify-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    <?= strtoupper(substr($quote->author ?? 'A', 0, 1)) ?>
                                </div>
                                <div class="text-left">
                                    <h4 class="text-white font-bold"><?= $quote->author ?? 'Anonim' ?></h4>
                                    <p class="text-slate-400 text-sm"><?= $quote->role ?? '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination !relative !bottom-0 mt-8"></div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Wave Transition from Quotes to News -->
    <div class="bg-slate-900">
        <svg class="w-full h-16" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3C1146.53,26.09,1055.71,74.35,985.66,92.83Z" fill="#f0fdfa"></path>
        </svg>
    </div>

    <!-- NEWS SECTION -->
    <section id="berita" class="py-24 relative overflow-hidden" style="background: linear-gradient(135deg, #f0fdfa 0%, #f8fafc 50%, #f0f9ff 100%);">
        <!-- Decorative Shapes -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-teal-200/30 rounded-full blur-3xl pointer-events-none translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-200/30 rounded-full blur-3xl pointer-events-none -translate-x-1/2 translate-y-1/2"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 animate-on-scroll">
                <div class="max-w-2xl">
                    <span class="text-teal-600 font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Update Terkini</span>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight">Kabar Sekolah</h2>
                </div>
                <a href="<?= base_url('blog') ?>" class="px-8 py-3 rounded-full border-2 border-slate-200 font-bold text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all flex items-center gap-2">
                    Lihat Semua Berita <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php if(!empty($news) && is_array($news)): ?>
                    <?php foreach($news as $index => $post): ?>
                         <article class="group bg-white rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-teal-500/20 transition-all duration-500 border border-slate-100 flex flex-col h-full hover:-translate-y-2 animate-on-scroll delay-<?= $index * 100 ?>">
                             <!-- Image -->
                             <div class="h-64 w-full relative overflow-hidden">
                                 <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                 <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="<?= $post->judul ?>">
                                  <div class="absolute top-5 left-5 z-20">
                                     <span class="bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl text-xs font-bold text-teal-700 shadow-lg flex items-center gap-2">
                                         <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                                         <?= $post->kategori ?? 'Berita' ?>
                                     </span>
                                 </div>
                             </div>
                             <!-- Content -->
                             <div class="p-8 flex-1 flex flex-col">
                                 <div class="flex items-center gap-4 text-xs font-bold text-slate-400 mb-5 uppercase tracking-wider flex-wrap">
                                     <span class="flex items-center gap-1"><i class="ri-calendar-line text-teal-500"></i> <?= date('d M Y', strtotime($post->tanggal)) ?></span>
                                     <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                     <span class="flex items-center gap-1"><i class="ri-time-line text-teal-500"></i> <?= date('H:i', strtotime($post->tanggal)) ?></span>
                                     <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                     <span class="flex items-center gap-1"><i class="ri-user-line text-teal-500"></i> Admin</span>
                                 </div>
                                 <h3 class="text-2xl font-bold text-slate-900 mb-4 leading-tight group-hover:text-teal-600 transition-colors line-clamp-2">
                                     <a href="<?= base_url('blog/read/'.$post->slug) ?>">
                                         <?= $post->judul ?>
                                     </a>
                                 </h3>
                                 <p class="text-slate-500 text-sm line-clamp-3 mb-8 flex-1 leading-relaxed">
                                     <?= strip_tags($post->isi) ?>
                                 </p>
                                 <div class="border-t border-slate-100 pt-6 mt-auto">
                                     <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="inline-flex items-center gap-2 text-slate-900 font-bold text-sm group-hover:text-teal-600 group-hover:gap-4 transition-all">
                                         Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                                     </a>
                                 </div>
                             </div>
                         </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-24 bg-white rounded-[2rem] border-2 border-dashed border-slate-200 text-slate-400">
                        <div class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl text-slate-300">
                            <i class="ri-article-line"></i>
                        </div>
                        <p class="font-medium">Belum ada berita terbaru saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Wave Transition to Gallery -->
    <div class="bg-gradient-to-b from-teal-50/50 to-slate-900">
        <svg class="w-full h-24" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#0f172a"></path>
        </svg>
    </div>

    <!-- GALLERY SECTION (Dark) -->
    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#22d3ee 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-teal-500/20 rounded-full blur-[120px] pointer-events-none translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-600/20 rounded-full blur-[120px] pointer-events-none -translate-x-1/2 translate-y-1/2"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20 max-w-3xl mx-auto animate-on-scroll">
                 <span class="text-teal-400 font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Dokumentasi</span>
                 <h2 class="text-4xl md:text-5xl font-black mb-6 tracking-tight">Galeri Kegiatan</h2>
                 <p class="text-slate-400 text-lg">Momen-momen berharga yang terekam dalam lensa kegiatan sekolah, menggambarkan keceriaan dan semangat belajar.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 auto-rows-[200px] md:auto-rows-[280px]">
                <?php if(!empty($gallery) && is_array($gallery)): ?>
                    <?php foreach($gallery as $i => $g): ?>
                        <div class="<?= ($i == 0 || $i == 5) ? 'col-span-2 row-span-2' : 'col-span-1 row-span-1' ?> relative rounded-3xl overflow-hidden group cursor-pointer shadow-2xl border border-white/5 bg-slate-800 animate-on-scroll delay-<?= $i * 50 ?>">
                            <img src="<?= base_url($g->gambar) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100" alt="<?= $g->judul ?>">
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300"></div>
                            
                            <!-- Content -->
                            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <span class="text-teal-400 text-[10px] font-bold uppercase tracking-wider mb-2 block"><?= $g->kategori ?? 'Galeri' ?></span>
                                <h4 class="font-bold text-lg md:text-xl leading-tight text-white group-hover:text-teal-200 transition-colors"><?= $g->judul ?></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                     <div class="col-span-4 text-center py-24 border-2 border-dashed border-slate-700 rounded-[2rem] text-slate-500 bg-slate-800/30">
                        <i class="ri-image-line text-4xl mb-3 block opacity-50"></i>
                        Belum ada galeri foto.
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-20">
                 <a href="<?= base_url('gallery') ?>" class="inline-flex items-center gap-3 px-10 py-4 rounded-full bg-teal-600 hover:bg-teal-500 text-white font-bold shadow-lg shadow-teal-500/20 hover:shadow-teal-500/40 transition-all transform hover:-translate-y-1">
                    <span>Lihat Galeri Lengkap</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="py-24 bg-gradient-to-br from-teal-600 to-teal-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="container mx-auto px-6 relative z-10 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-black mb-8 animate-on-scroll">Siap Bergabung Bersama Kami?</h2>
            <p class="text-xl text-teal-100 mb-10 max-w-2xl mx-auto animate-on-scroll delay-100">Daftarkan putra-putri Anda sekarang dan jadilah bagian dari keluarga besar kami untuk masa depan yang lebih cerah.</p>
            <div class="flex flex-wrap justify-center gap-4 animate-on-scroll delay-200">
                <a href="#" class="px-8 py-4 bg-white text-teal-700 rounded-full font-bold shadow-xl hover:bg-slate-100 transition-colors">
                    Informasi PPDB
                </a>
                <a href="<?= base_url('contact') ?>" class="px-8 py-4 bg-teal-700/50 border border-teal-400 text-white rounded-full font-bold hover:bg-teal-700 transition-colors">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

<?php $this->load->view('_templates/public/footer'); ?>

<!-- CUSTOM SCRIPTS FOR HOME -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Typed.js Init (Safe Mode) ---
        try {
            if(typeof Typed !== 'undefined') {
                var typed = new Typed('#hero-typing', {
                    strings: ['Generasi Emas', 'Berakhlak Mulia', 'Berprestasi'],
                    typeSpeed: 100,
                    backSpeed: 50,
                    backDelay: 2000,
                    loop: true,
                    showCursor: true,
                    cursorChar: '|',
                    autoInsertCss: true
                });
            } else {
                console.warn('Typed.js not loaded. Using fallback text.');
                document.getElementById('hero-typing').innerText = 'Generasi Emas';
            }
        } catch(e) {
            console.error('Typing animation error:', e);
            document.getElementById('hero-typing').innerText = 'Generasi Emas';
        }

        // --- Counter Animation ---
        const counters = document.querySelectorAll('.counter-value');
        const speed = 200;

        const animateCounters = () => {
            counters.forEach(counter => {
                const targetAttr = counter.getAttribute('data-target');
                const target = +targetAttr;
                
                // Immediate fallback if logic fails or target is 0
                if(target === 0) {
                    counter.innerText = "0"; 
                    return;
                }

                const updateCount = () => {
                    const count = +counter.innerText;
                    const inc = target / speed;
                    if (count < target) {
                        counter.innerText = Math.ceil(count + (inc < 1 ? 1 : inc));
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        }

        // --- Intersection Observer for Animations ---
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Trigger counters if this is the stats section
                    if(entry.target.querySelector('.counter-value')) {
                        animateCounters();
                    }
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        
        // --- Swiper Init ---
        if(typeof Swiper !== 'undefined') {
             // Hero Slider
             var heroSwiper = new Swiper(".heroSwiper", {
                effect: "fade",
                speed: 1000,
                loop: true,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".heroSwiper .swiper-pagination",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + ' transition-all duration-300"></span>';
                    },
                },
            });
            
            // Quotes Slider
            var quotesSwiper = new Swiper(".quotesSwiper", {
                effect: "slide",
                speed: 600,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".quotesSwiper .swiper-pagination",
                    clickable: true,
                },
            });
        }
        
        // --- Counter Animation (for .counter class) ---
        const counterElements = document.querySelectorAll('.counter');
        counterElements.forEach(counter => {
            const target = +counter.getAttribute('data-count');
            if(!target) return;
            
            const animateCounter = () => {
                const current = +counter.innerText;
                const increment = target / 100;
                if(current < target) {
                    counter.innerText = Math.ceil(current + increment);
                    setTimeout(animateCounter, 20);
                } else {
                    counter.innerText = target;
                }
            };
            
            // Use observer for counter trigger
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting && !counter.classList.contains('counted')) {
                        counter.classList.add('counted');
                        animateCounter();
                    }
                });
            }, { threshold: 0.5 });
            
            counterObserver.observe(counter);
        });
    });
</script>

<style>
    /* CUSTOM KEYFRAMES ANIMATIONS */
    .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
    .animate-fade-in-slow { animation: fadeIn 1.5s ease-out forwards; opacity: 0; animation-delay: 0.5s; }
    .animate-slide-up { animation: slideUp 0.8s ease-out forwards; }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes kenburns {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    .animate-kenburns {
        animation: kenburns 20s infinite alternate linear;
    }
    
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
    .animate-shimmer {
        animation: shimmer 2s infinite;
    }

    /* OBSERVER CLASS */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .animate-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .delay-100 { transition-delay: 0.1s; }
    .delay-200 { transition-delay: 0.2s; }
    .delay-300 { transition-delay: 0.3s; }
    
    /* FLOATING ANIMATION */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    
    /* CUSTOM SCROLLBAR - handled by homepage.css */
</style>