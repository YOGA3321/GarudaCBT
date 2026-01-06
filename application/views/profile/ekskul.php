<?php $this->load->view('_templates/public/header'); ?>

    <!-- Hero Section with Modern Gradient (Consistent with Profile Pages) -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-[#0B1120]"></div>
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#14b8a6 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <!-- Animated Glow Blobs -->
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-2 px-5 rounded-full bg-teal-500/20 backdrop-blur-md text-teal-400 border border-teal-500/30 text-[11px] font-bold uppercase tracking-[0.2em] mb-6 animate-fade-in-up">
                Talenta & Kreativitas
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-in-up delay-100 leading-tight">
                Ekstrakurikuler <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-400">Sekolah</span>
            </h1>
            <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-8 animate-fade-in-up delay-200">
                Wadah pengembangan bakat, minat, dan potensi siswa di luar jam pelajaran akademik.
            </p>
            <div class="flex items-center justify-center gap-3 text-sm font-medium animate-fade-in-up delay-300">
                <a href="<?= base_url() ?>" class="text-slate-400 hover:text-white transition-colors">Beranda</a>
                <span class="text-slate-600">/</span>
                <span class="text-teal-400 font-bold">Ekstrakurikuler</span>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-16" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3C1146.53,26.09,1055.71,74.35,985.66,92.83Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- Main Content Layout -->
    <section class="py-10 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-teal-500/5 rounded-full blur-3xl pointer-events-none -translate-y-1/2 translate-x-1/2"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <div class="sticky top-28 space-y-6 animate-on-scroll">
                        <!-- Navigation Menu Card -->
                        <div class="bg-white rounded-2xl p-5 shadow-xl shadow-slate-100/50 border border-slate-100">
                            <h3 class="font-bold text-slate-900 mb-5 flex items-center gap-2 text-sm uppercase tracking-wider">
                                <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center">
                                    <i class="ri-menu-2-line text-teal-600"></i>
                                </div>
                                Menu Profil
                            </h3>
                            <nav class="space-y-1">
                                <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all text-slate-600 hover:bg-teal-50 hover:text-teal-600">
                                    <i class="ri-history-line text-slate-400"></i>
                                    Sejarah Sekolah
                                </a>
                                <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all text-slate-600 hover:bg-teal-50 hover:text-teal-600">
                                    <i class="ri-flag-line text-slate-400"></i>
                                    Visi & Misi
                                </a>
                                <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all text-slate-600 hover:bg-teal-50 hover:text-teal-600">
                                    <i class="ri-organization-chart text-slate-400"></i>
                                    Struktur Organisasi
                                </a>
                                <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all bg-gradient-to-r from-teal-500 to-teal-600 text-white font-bold shadow-lg shadow-teal-500/30">
                                    <i class="ri-basketball-line"></i>
                                    Ekstrakurikuler
                                </a>
                            </nav>
                        </div>

                        <!-- PPDB Widget -->
                        <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 shadow-xl text-white relative overflow-hidden group">
                           <div class="absolute -top-10 -right-10 w-40 h-40 bg-teal-500/20 rounded-full blur-3xl"></div>
                           <div class="absolute bottom-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform duration-500">
                               <i class="ri-trophy-line text-8xl"></i>
                           </div>
                           <h4 class="font-bold text-lg mb-3 relative z-10">Bergabung & Berprestasi</h4>
                           <p class="text-slate-400 text-sm mb-6 relative z-10">Temukan bakat terpendammu dan raih prestasi bersama.</p>
                           <a href="#" class="inline-flex items-center justify-center gap-2 w-full py-3 bg-teal-500 hover:bg-teal-400 text-white font-bold text-center rounded-xl transition-colors shadow-lg shadow-teal-900/50 relative z-10">
                               Daftar Sekarang <i class="ri-arrow-right-line"></i>
                           </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area (Grid) -->
                <div class="lg:w-3/4">
                    <div class="flex items-end justify-between mb-8 animate-on-scroll delay-100">
                        <div>
                            <h2 class="text-3xl font-black text-slate-900">Daftar Ekstrakurikuler</h2>
                            <p class="text-slate-500 mt-2">Pilih kegiatan yang sesuai dengan minat dan bakatmu.</p>
                        </div>
                        <span class="hidden md:inline-block px-4 py-2 bg-teal-50 text-teal-600 text-sm font-bold rounded-full">
                            <?= count($ekstras ?? []) ?> Kegiatan
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                         <?php if(!empty($ekstras)): ?>
                            <?php 
                            $icons = ['ri-compass-3-line', 'ri-book-read-line', 'ri-quill-pen-line', 'ri-football-line', 'ri-music-2-line', 'ri-palette-line', 'ri-code-line', 'ri-camera-line'];
                            $colors = ['teal', 'blue', 'purple', 'orange', 'pink', 'cyan', 'indigo', 'rose'];
                            foreach($ekstras as $index => $e): 
                                $icon = $icons[$index % count($icons)];
                                $color = $colors[$index % count($colors)];
                            ?>
                                <!-- Card Modern -->
                                <div class="group relative bg-white rounded-2xl shadow-lg shadow-slate-100/50 hover:shadow-xl hover:shadow-<?= $color ?>-500/10 transition-all duration-300 border border-slate-100 overflow-hidden animate-on-scroll delay-<?= min($index * 100, 300) ?>">
                                    <div class="p-6">
                                        <!-- Icon Header -->
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-<?= $color ?>-500 to-<?= $color ?>-600 flex items-center justify-center text-white text-2xl shadow-lg shadow-<?= $color ?>-500/30 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                                                <i class="<?= $icon ?>"></i>
                                            </div>
                                            <span class="px-3 py-1 bg-<?= $color ?>-50 text-<?= $color ?>-600 text-xs font-bold rounded-full">
                                                <?= $e->kode_ekstra ?? 'EKS' ?>
                                            </span>
                                        </div>
                                        
                                        <!-- Content -->
                                        <h3 class="font-bold text-xl text-slate-900 mb-2 group-hover:text-<?= $color ?>-600 transition-colors">
                                            <?= $e->nama_ekstra ?>
                                        </h3>
                                        <p class="text-slate-500 text-sm mb-5 line-clamp-2">
                                            Kegiatan rutin yang melatih kedisiplinan dan keterampilan siswa dalam bidang <?= strtolower($e->nama_ekstra) ?>.
                                        </p>
                                        
                                        <!-- Footer -->
                                        <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                                            <div class="w-9 h-9 rounded-full bg-<?= $color ?>-100 text-<?= $color ?>-600 flex items-center justify-center font-bold text-sm">
                                                <?= strtoupper(substr($e->nama_guru ?? 'P', 0, 1)) ?>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <span class="block text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Pembina</span>
                                                <span class="block text-sm font-bold text-slate-700 truncate"><?= $e->nama_guru ?? 'Belum Ditentukan' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-full py-16 text-center bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm text-slate-300">
                                    <i class="ri-folder-open-line text-5xl"></i>
                                </div>
                                <h3 class="text-slate-800 font-bold text-xl mb-2">Belum ada data</h3>
                                <p class="text-slate-500">Data ekstrakurikuler belum ditambahkan oleh administrator.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<!-- Page Animation Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
    });
</script>

<style>
    /* Page Animations */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .animate-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .delay-100 { transition-delay: 0.1s; }
    .delay-200 { transition-delay: 0.2s; }
    .delay-300 { transition-delay: 0.3s; }
    
    /* Hero Fade In */
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
    }
    .animate-fade-in-up.delay-100 { animation-delay: 0.1s; }
    .animate-fade-in-up.delay-200 { animation-delay: 0.2s; }
    .animate-fade-in-up.delay-300 { animation-delay: 0.3s; }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php $this->load->view('_templates/public/footer'); ?>
