<?php $this->load->view('_templates/public/header'); ?>

    <!-- Hero Section with Modern Gradient -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-[#0B1120]"></div>
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#14b8a6 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <!-- Animated Glow Blobs -->
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-2 px-5 rounded-full bg-teal-500/20 backdrop-blur-md text-teal-400 border border-teal-500/30 text-[11px] font-bold uppercase tracking-[0.2em] mb-6 animate-fade-in-up">
                Profil Sekolah
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-in-up delay-100 leading-tight">
                <?= isset($page_title) ? $page_title : $title ?>
            </h1>
            <div class="flex items-center justify-center gap-3 text-sm font-medium animate-fade-in-up delay-200">
                <a href="<?= base_url() ?>" class="text-slate-400 hover:text-white transition-colors">Beranda</a>
                <span class="text-slate-600">/</span>
                <span class="text-teal-400 font-bold"><?= $title ?></span>
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
                                <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all <?= ($this->uri->segment(1) == 'sejarah') ? 'bg-gradient-to-r from-teal-500 to-teal-600 text-white font-bold shadow-lg shadow-teal-500/30' : 'text-slate-600 hover:bg-teal-50 hover:text-teal-600' ?>">
                                    <i class="ri-history-line <?= ($this->uri->segment(1) == 'sejarah') ? '' : 'text-slate-400' ?>"></i>
                                    Sejarah Sekolah
                                </a>
                                <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all <?= ($this->uri->segment(1) == 'visi_misi' OR $this->uri->segment(1) == 'visimisi') ? 'bg-gradient-to-r from-teal-500 to-teal-600 text-white font-bold shadow-lg shadow-teal-500/30' : 'text-slate-600 hover:bg-teal-50 hover:text-teal-600' ?>">
                                    <i class="ri-flag-line <?= ($this->uri->segment(1) == 'visi_misi') ? '' : 'text-slate-400' ?>"></i>
                                    Visi & Misi
                                </a>
                                <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all <?= ($this->uri->segment(1) == 'struktur') ? 'bg-gradient-to-r from-teal-500 to-teal-600 text-white font-bold shadow-lg shadow-teal-500/30' : 'text-slate-600 hover:bg-teal-50 hover:text-teal-600' ?>">
                                    <i class="ri-organization-chart <?= ($this->uri->segment(1) == 'struktur') ? '' : 'text-slate-400' ?>"></i>
                                    Struktur Organisasi
                                </a>
                                <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all <?= ($this->uri->segment(2) == 'ekskul') ? 'bg-gradient-to-r from-teal-500 to-teal-600 text-white font-bold shadow-lg shadow-teal-500/30' : 'text-slate-600 hover:bg-teal-50 hover:text-teal-600' ?>">
                                    <i class="ri-basketball-line <?= ($this->uri->segment(2) == 'ekskul') ? '' : 'text-slate-400' ?>"></i>
                                    Ekstrakurikuler
                                </a>
                            </nav>
                        </div>

                        <!-- PPDB Widget -->
                        <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 shadow-xl text-white relative overflow-hidden group">
                           <div class="absolute -top-10 -right-10 w-40 h-40 bg-teal-500/20 rounded-full blur-3xl"></div>
                           <div class="absolute bottom-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform duration-500">
                               <i class="ri-school-line text-8xl"></i>
                           </div>
                           <h4 class="font-bold text-lg mb-3 relative z-10">Pendaftaran Siswa Baru</h4>
                           <p class="text-slate-400 text-sm mb-6 relative z-10">Bergabunglah bersama kami untuk mewujudkan masa depan cerah.</p>
                           <a href="#" class="inline-flex items-center justify-center gap-2 w-full py-3 bg-teal-500 hover:bg-teal-400 text-white font-bold text-center rounded-xl transition-colors shadow-lg shadow-teal-900/50 relative z-10">
                               Info PPDB <i class="ri-arrow-right-line"></i>
                           </a>
                        </div>
                        
                        <!-- Contact Widget -->
                         <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-6 border border-teal-100/50">
                            <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-teal-100 flex items-center justify-center">
                                    <i class="ri-customer-service-2-line text-teal-600"></i>
                                </div>
                                Hubungi Kami
                            </h4>
                            <div class="space-y-3 text-sm">
                                <a href="tel:<?= $setting->telp ?? '' ?>" class="flex items-center gap-3 text-slate-600 hover:text-teal-600 transition-colors">
                                    <div class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-teal-500 shadow-sm"><i class="ri-phone-line"></i></div>
                                    <span class="font-medium"><?= $setting->telp ?? '(021) 1234-5678' ?></span>
                                </a>
                                <a href="mailto:<?= $setting->email ?? '' ?>" class="flex items-center gap-3 text-slate-600 hover:text-teal-600 transition-colors">
                                    <div class="w-9 h-9 rounded-xl bg-white flex items-center justify-center text-teal-500 shadow-sm"><i class="ri-mail-line"></i></div>
                                    <span class="font-medium"><?= $setting->email ?? 'info@sekolah.sch.id' ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden animate-on-scroll delay-100">
                        <!-- Decorative Top Border -->
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-teal-400 via-cyan-400 to-blue-400"></div>
                        
                        <!-- Decorative Corner -->
                        <div class="absolute -top-20 -right-20 w-60 h-60 bg-teal-500/5 rounded-full blur-2xl pointer-events-none"></div>
                        
                        <?php if(!empty($content)): ?>
                            <article class="prose prose-lg prose-slate max-w-none 
                                prose-headings:font-bold prose-headings:text-slate-800 
                                prose-h1:text-3xl prose-h1:mb-8 prose-h1:border-b prose-h1:border-teal-100 prose-h1:pb-4
                                prose-h2:text-2xl prose-h2:text-teal-700 prose-h2:mt-10 prose-h2:mb-4
                                prose-p:leading-relaxed prose-p:text-slate-600
                                prose-a:text-teal-600 hover:prose-a:text-teal-500 prose-a:no-underline prose-a:font-semibold
                                prose-img:rounded-2xl prose-img:shadow-xl prose-img:my-8
                                prose-strong:text-slate-700
                                prose-blockquote:border-l-4 prose-blockquote:border-teal-500 prose-blockquote:bg-teal-50/50 prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-2xl prose-blockquote:not-italic prose-blockquote:text-slate-600
                                prose-ul:space-y-2 prose-li:text-slate-600
                                prose-ol:list-decimal prose-ol:pl-6 prose-ol:space-y-2
                                marker:text-teal-500">
                                <?= $content ?>
                            </article>
                        <?php else: ?>
                            <!-- Empty State -->
                            <div class="text-center py-20">
                                <div class="w-28 h-28 bg-gradient-to-br from-teal-50 to-cyan-50 rounded-full flex items-center justify-center mx-auto mb-8">
                                    <i class="ri-file-text-line text-5xl text-teal-300"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-800 mb-3">Belum Ada Informasi</h3>
                                <p class="text-slate-500 max-w-md mx-auto leading-relaxed">Halaman <?php echo strtolower($title); ?> belum memiliki konten yang ditambahkan oleh admin.</p>
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
    
    /* Ordered List Styling */
    .prose ol {
        list-style-type: decimal !important;
        padding-left: 1.5rem !important;
        margin-left: 0.5rem;
    }
    .prose ol li {
        padding-left: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .prose ol li::marker {
        color: #14b8a6;
        font-weight: 600;
    }
</style>

<?php $this->load->view('_templates/public/footer'); ?>
