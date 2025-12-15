<?php $this->load->view('_templates/public/header'); ?>

    <!-- Header Section (Light Theme) -->
    <section class="relative pt-32 pb-20 bg-emerald-50 overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-100 rounded-full blur-3xl opacity-50 -mr-16 -mt-16"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-50 -ml-16 -mb-16"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-emerald-100 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4 animate-fade-in-up">
                Profil Sekolah
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-slate-800 mb-4 animate-fade-in-up delay-100">
                Ekstrakurikuler
            </h1>
            <div class="flex items-center justify-center gap-2 text-sm text-slate-500 font-medium animate-fade-in-up delay-200">
                <a href="<?= base_url() ?>" class="hover:text-emerald-600 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-600 font-bold">Ekstrakurikuler</span>
            </div>
        </div>
    </section>

    <!-- Main Content Layout -->
    <section class="py-16 bg-white min-h-screen relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Sidebar Navigation (Reusable) -->
                <div class="lg:w-1/4">
                    <div class="sticky top-28 space-y-8" data-aos="fade-right">
                        <!-- Navigation Menu -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg shadow-slate-100 border border-slate-100">
                            <h3 class="font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <i class="ri-menu-2-line text-emerald-500"></i> Menu Profil
                            </h3>
                            <nav class="space-y-2">
                                <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($this->uri->segment(1) == 'sejarah') ? 'bg-emerald-50 text-emerald-700 font-bold shadow-sm ring-1 ring-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' ?>">
                                    <i class="ri-history-line <?= ($this->uri->segment(1) == 'sejarah') ? 'text-emerald-600' : 'text-slate-400' ?>"></i>
                                    Sejarah Sekolah
                                </a>
                                <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($this->uri->segment(1) == 'visi_misi' OR $this->uri->segment(1) == 'visimisi') ? 'bg-emerald-50 text-emerald-700 font-bold shadow-sm ring-1 ring-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' ?>">
                                    <i class="ri-flag-line <?= ($this->uri->segment(1) == 'visi_misi' OR $this->uri->segment(1) == 'visimisi') ? 'text-emerald-600' : 'text-slate-400' ?>"></i>
                                    Visi & Misi
                                </a>
                                <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($this->uri->segment(1) == 'struktur') ? 'bg-emerald-50 text-emerald-700 font-bold shadow-sm ring-1 ring-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' ?>">
                                    <i class="ri-organization-chart <?= ($this->uri->segment(1) == 'struktur') ? 'text-emerald-600' : 'text-slate-400' ?>"></i>
                                    Struktur Organisasi
                                </a>
                                <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($this->uri->segment(2) == 'ekskul') ? 'bg-emerald-50 text-emerald-700 font-bold shadow-sm ring-1 ring-emerald-100' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' ?>">
                                    <i class="ri-basketball-line <?= ($this->uri->segment(2) == 'ekskul') ? 'text-emerald-600' : 'text-slate-400' ?>"></i>
                                    Ekstrakurikuler
                                </a>
                            </nav>
                        </div>
                        
                         <!-- Quick Info Widget -->
                        <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 shadow-xl text-white relative overflow-hidden group">
                           <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                               <i class="ri-school-line text-8xl"></i>
                           </div>
                           <h4 class="font-bold text-lg mb-4 relative z-10">Pendaftaran Siswa Baru</h4>
                           <p class="text-slate-300 text-sm mb-6 relative z-10">Bergabunglah bersama kami untuk mewujudkan masa depan cerah.</p>
                           <a href="#" class="inline-block w-full py-3 bg-emerald-500 hover:bg-emerald-400 text-white font-bold text-center rounded-xl transition-colors shadow-lg shadow-emerald-900/50 relative z-10">
                               Info PPDB <i class="ri-arrow-right-line ml-1"></i>
                           </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area (Grid) -->
                <div class="lg:w-3/4">
                    <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/50 border border-slate-100" data-aos="fade-up">
                         <div class="flex items-center justify-between mb-8 border-b border-slate-100 pb-4">
                            <div>
                                <h2 class="text-2xl font-black text-slate-800">Kegiatan Ekstrakurikuler</h2>
                                <p class="text-slate-500 text-sm mt-1">Wadah pengembangan bakat dan minat siswa.</p>
                            </div>
                            <div class="hidden sm:block">
                                <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold"><?= count($ekstras) ?> Kegiatan</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <?php if(!empty($ekstras)): ?>
                                <?php foreach($ekstras as $e): ?>
                                    <div class="group bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden hover:shadow-lg transition-all duration-300 relative flex flex-col h-full hover:bg-white ring-1 ring-transparent hover:ring-emerald-100">
                                        <!-- Image Placeholder/Real Image -->
                                        <div class="h-48 overflow-hidden relative bg-slate-200">
                                             <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=2070" 
                                                  class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 filter grayscale group-hover:grayscale-0">
                                            <div class="absolute top-4 left-4 z-10">
                                                <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-black text-emerald-600 uppercase tracking-widest shadow-sm">
                                                    <?= $e['kode_ekstra'] ?? 'EKS' ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="p-6 flex flex-col flex-grow">
                                            <h3 class="font-bold text-xl text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors">
                                                <?= $e['nama_ekstra'] ?>
                                            </h3>
                                            
                                            <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-slate-400 shadow-sm border border-slate-100">
                                                        <i class="ri-user-star-line"></i>
                                                    </div>
                                                    <div class="text-xs">
                                                        <span class="block text-slate-400 font-semibold uppercase text-[10px] tracking-wider">Pembina</span>
                                                        <span class="block font-bold text-slate-700"><?= $e['nama_guru'] ?? '-' ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-span-full py-12 text-center">
                                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                                        <i class="ri-basketball-line text-4xl"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-xl mb-1">Belum ada data</h3>
                                    <p class="text-slate-500">Data ekstrakurikuler belum ditambahkan.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<?php $this->load->view('_templates/public/footer'); ?>
