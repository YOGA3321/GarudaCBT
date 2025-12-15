<?php $this->load->view('_templates/public/header'); ?>

    <!-- Hero Section with Gradient -->
    <section class="relative pt-32 pb-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-slate-900"></div>
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        
        <!-- Animated Blobs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-20 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-2 px-4 rounded-full bg-white/10 backdrop-blur-md text-white border border-white/20 text-sm font-bold uppercase tracking-wider mb-6 animate-fade-in-up">
                Talenta & Kreativitas
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-in-up delay-100 leading-tight">
                Ekstrakurikuler <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400">Sekolah</span>
            </h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto mb-8 animate-fade-in-up delay-200">
                Wadah pengembangan bakat, minat, dan potensi siswa di luar jam pelajaran akademik untuk mencetak generasi yang aktif dan berprestasi.
            </p>
            <div class="flex items-center justify-center gap-3 text-sm font-medium animate-fade-in-up delay-300">
                <a href="<?= base_url() ?>" class="text-slate-400 hover:text-white transition-colors">Beranda</a>
                <span class="text-slate-600">/</span>
                <span class="text-emerald-400">Ekstrakurikuler</span>
            </div>
        </div>
    </section>



    <!-- Main Content Layout -->
    <section class="py-20 bg-white min-h-screen relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <div class="sticky top-28 space-y-8">
                        <!-- Navigation Menu -->
                        <div class="bg-white rounded-2xl p-2 shadow-lg shadow-slate-100 border border-slate-100">
                             <nav class="space-y-1">
                                <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all hover:bg-slate-50 text-slate-600 hover:text-emerald-600">
                                    <i class="ri-history-line"></i> Sejarah Sekolah
                                </a>
                                <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all hover:bg-slate-50 text-slate-600 hover:text-emerald-600">
                                    <i class="ri-flag-line"></i> Visi & Misi
                                </a>
                                <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all hover:bg-slate-50 text-slate-600 hover:text-emerald-600">
                                    <i class="ri-organization-chart"></i> Struktur Organisasi
                                </a>
                                <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all bg-gradient-to-r from-emerald-500 to-teal-500 text-white shadow-md shadow-emerald-500/20 font-bold">
                                    <i class="ri-basketball-line"></i> Ekstrakurikuler
                                </a>
                            </nav>
                        </div>
                        
                         <!-- Quick Info Widget -->
                        <div class="bg-gradient-to-br from-indigo-900 to-purple-800 rounded-3xl p-8 shadow-2xl text-white relative overflow-hidden group">
                           <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                           <div class="absolute bottom-0 right-0 p-4 opacity-10">
                               <i class="ri-trophy-line text-9xl"></i>
                           </div>
                           <h4 class="font-bold text-2xl mb-4 relative z-10 leading-tight">Bergabung & Berprestasi</h4>
                           <p class="text-indigo-200 text-sm mb-8 relative z-10">Temukan bakat terpendammu dan raih prestasi bersama kami.</p>
                           <button class="w-full py-3 bg-white/10 hover:bg-white/20 backdrop-blur border border-white/20 text-white font-bold rounded-xl transition-all relative z-10">
                               Daftar Sekarang
                           </button>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area (Grid) -->
                <div class="lg:w-3/4">
                    <div class="flex items-end justify-between mb-8">
                        <div>
                            <h2 class="text-3xl font-black text-slate-900">Daftar Ekstrakurikuler</h2>
                            <p class="text-slate-500 mt-2">Pilih kegiatan yang sesuai dengan minatmu.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                         <?php if(!empty($ekstras)): ?>
                            <?php foreach($ekstras as $index => $e): ?>
                                <!-- Card -->
                                <div class="group relative bg-white rounded-3xl shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/20 transition-all duration-300 border border-slate-100 overflow-hidden" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                                    <!-- Gradient Overlay on Hover -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/90 to-teal-600/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-center justify-center backdrop-blur-sm">
                                        <div class="text-center transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            <h4 class="text-2xl font-black text-white mb-2"><?= $e->nama_ekstra ?></h4>
                                            <span class="inline-block px-4 py-2 bg-white text-emerald-600 rounded-full text-sm font-bold shadow-lg">Lihat Detail</span>
                                        </div>
                                    </div>

                                    <!-- Image Area -->
                                    <div class="h-56 overflow-hidden relative bg-slate-200">
                                        <div class="absolute top-4 left-4 z-20">
                                            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-black text-slate-800 uppercase tracking-widest shadow-sm">
                                                <?= $e->kode_ekstra ?? 'EKS' ?>
                                            </span>
                                        </div>
                                         <img src="https://source.unsplash.com/random/800x600/?sport,activity&sig=<?= $index ?>" 
                                              class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="p-8">
                                        <h3 class="font-bold text-xl text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">
                                            <?= $e->nama_ekstra ?>
                                        </h3>
                                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                                            Kegiatan rutin yang melatih kedisiplinan dan keterampilan siswa dalam bidang <?= strtolower($e->nama_ekstra) ?>.
                                        </p>
                                        
                                        <div class="flex items-center gap-3 pt-6 border-t border-slate-100">
                                            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">
                                                <?= substr($e->nama_guru ?? 'G', 0, 1) ?>
                                            </div>
                                            <div>
                                                <span class="block text-xs text-slate-400 font-semibold uppercase tracking-wider">Pembina</span>
                                                <span class="block text-sm font-bold text-slate-700"><?= $e->nama_guru ?? 'Belum Ditentukan' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-full py-16 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-300">
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

<?php $this->load->view('_templates/public/footer'); ?>
