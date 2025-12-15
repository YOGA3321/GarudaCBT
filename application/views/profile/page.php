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
                <?= isset($page_title) ? $page_title : $title ?>
            </h1>
            <div class="flex items-center justify-center gap-2 text-sm text-slate-500 font-medium animate-fade-in-up delay-200">
                <a href="<?= base_url() ?>" class="hover:text-emerald-600 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-600 font-bold"><?= $title ?></span>
            </div>
        </div>
    </section>

    <!-- Main Content Layout -->
    <section class="py-16 bg-white min-h-screen relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Sidebar Navigation -->
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
                        
                        <!-- Contact Widget -->
                         <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2"><i class="ri-customer-service-2-line text-emerald-600"></i> Hubungi Kami</h4>
                            <div class="space-y-3 text-sm">
                                <a href="#" class="flex items-center gap-3 text-slate-600 hover:text-emerald-600 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-emerald-500 shadow-sm"><i class="ri-phone-line"></i></div>
                                    <span>(021) 1234-5678</span>
                                </a>
                                <a href="#" class="flex items-center gap-3 text-slate-600 hover:text-emerald-600 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-emerald-500 shadow-sm"><i class="ri-mail-line"></i></div>
                                    <span>info@sekolah.sch.id</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden" data-aos="fade-up">
                        <!-- Decorative Top Border -->
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400"></div>
                        
                        <?php if(!empty($content)): ?>
                            <article class="prose prose-lg prose-slate max-w-none 
                                prose-headings:font-bold prose-headings:text-slate-800 
                                prose-h1:text-3xl prose-h1:mb-8 prose-h1:border-b prose-h1:border-emerald-100 prose-h1:pb-4
                                prose-p:leading-relaxed prose-p:text-slate-600
                                prose-a:text-emerald-600 hover:prose-a:text-emerald-500 
                                prose-img:rounded-2xl prose-img:shadow-lg
                                prose-blockquote:border-l-4 prose-blockquote:border-emerald-500 prose-blockquote:bg-emerald-50/30 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:rounded-r-lg prose-blockquote:not-italic
                                marker:text-emerald-500">
                                <?= $content ?>
                            </article>
                        <?php else: ?>
                            <!-- Empty State -->
                            <div class="text-center py-20">
                                <div class="w-24 h-24 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                                    <i class="ri-file-text-line text-4xl text-emerald-300"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Informasi</h3>
                                <p class="text-slate-500 max-w-md mx-auto">Halaman <?php echo strtolower($title); ?> belum memiliki konten yang ditambahkan oleh admin.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<?php $this->load->view('_templates/public/footer'); ?>
