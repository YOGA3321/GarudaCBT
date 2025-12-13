<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $setting->sekolah ?? 'School Profile' ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#059669', // Emerald 600
                        secondary: '#0F172A', // Slate 900
                        accent: '#F59E0B', // Amber 500
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 12s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Outfit', sans-serif; }
        
        /* Glassmorphism Classes */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        /* Hero Background with Parallax feel */
        .hero-bg {
            background-color: #0f172a;
            position: relative;
            overflow: hidden;
        }

        .hero-pattern {
             background-image: radial-gradient(#059669 1px, transparent 1px);
             background-size: 40px 40px;
             mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Text Highlighting Animation */
        .highlight-anim {
            background: linear-gradient(120deg, #34d399 0%, #34d399 100%);
            background-repeat: no-repeat;
            background-size: 100% 0.2em;
            background-position: 0 88%;
            transition: background-size 0.25s ease-in;
        }
        .highlight-anim:hover {
            background-size: 100% 100%;
            color: white;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden selection:bg-emerald-200 selection:text-emerald-900">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass" id="navbar">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="flex items-center gap-3 group relative z-50">
                <div class="relative">
                     <div class="absolute inset-0 bg-emerald-400 rounded-xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                     <?php if (!empty($setting->logo_kiri)): ?>
                        <img src="<?= base_url().$setting->logo_kiri ?>" alt="Logo" class="relative h-10 w-auto group-hover:scale-105 transition-transform duration-300">
                    <?php else: ?>
                        <div class="relative h-10 w-10 bg-gradient-to-br from-primary to-emerald-400 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:rotate-6 transition-transform">
                            <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="hidden md:block">
                    <h1 class="font-bold text-lg leading-tight text-slate-900 group-hover:text-primary transition-colors"><?= $setting->sekolah ?? 'School Name' ?></h1>
                    <p class="text-[10px] text-primary font-bold tracking-[0.2em] uppercase">Official Website</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-2 bg-white/50 p-1.5 rounded-2xl backdrop-blur-sm border border-slate-100/50">
                <a href="#beranda" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-white hover:bg-slate-900 transition-all duration-300">Beranda</a>
                
                <div class="relative group">
                    <button class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-white hover:bg-slate-900 transition-all duration-300 flex items-center gap-1">
                        Profil <i class="ri-arrow-down-s-line ml-1 transition-transform duration-300 group-hover:-rotate-180"></i>
                    </button>
                    <!-- Dropdown with nicer animation -->
                    <div class="absolute top-full left-0 w-64 pt-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden p-2">
                            <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover/item:bg-emerald-600 group-hover/item:text-white transition-colors">
                                    <i class="ri-history-line text-lg"></i>
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-800">Sejarah</span>
                                    <span class="block text-xs text-slate-500">Tentang sekolah kami</span>
                                </div>
                            </a>
                            <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover/item:bg-blue-600 group-hover/item:text-white transition-colors">
                                    <i class="ri-flag-line text-lg"></i>
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-800">Visi & Misi</span>
                                    <span class="block text-xs text-slate-500">Tujuan dan cita-cita</span>
                                </div>
                            </a>
                             <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center group-hover/item:bg-purple-600 group-hover/item:text-white transition-colors">
                                    <i class="ri-organization-chart text-lg"></i>
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-800">Struktur</span>
                                    <span class="block text-xs text-slate-500">Kepemimpinan</span>
                                </div>
                            </a>
                             <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors group/item">
                                <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center group-hover/item:bg-orange-600 group-hover/item:text-white transition-colors">
                                    <i class="ri-basketball-line text-lg"></i>
                                </div>
                                <div>
                                    <span class="block text-sm font-bold text-slate-800">Ekstrakurikuler</span>
                                    <span class="block text-xs text-slate-500">Bakat & Minat</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#berita" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-white hover:bg-slate-900 transition-all duration-300">Berita</a>
                <a href="<?= base_url('direktori') ?>" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-white hover:bg-slate-900 transition-all duration-300">Direktori</a>
            </div>
            
            <div class="hidden md:block">
                 <a href="<?= base_url('login') ?>" class="group flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-full font-bold shadow-lg shadow-emerald-200 hover:shadow-emerald-400 hover:-translate-y-1 transition-all duration-300">
                    <span>Portal Login</span>
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Mobile Button -->
            <button class="md:hidden text-2xl text-slate-800 p-2 active:scale-95 transition-transform" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="ri-menu-4-fill"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-xl border-t border-slate-100 absolute w-full left-0 shadow-2xl h-screen z-40">
            <div class="flex flex-col p-6 gap-2">
                 <a href="#beranda" class="p-4 rounded-xl bg-slate-50 hover:bg-emerald-50 text-slate-800 hover:text-primary font-bold transition-all flex items-center gap-3"><i class="ri-home-4-line text-xl"></i> Beranda</a>
                 
                 <div class="py-2 px-4 text-xs font-black text-slate-400 uppercase tracking-widest mt-4">Profil Sekolah</div>
                 <div class="grid grid-cols-2 gap-2">
                     <a href="<?= base_url('sejarah') ?>" class="p-3 rounded-xl bg-slate-50 hover:bg-emerald-50 text-sm font-bold text-slate-700 hover:text-primary text-center border border-slate-100">Sejarah</a>
                     <a href="<?= base_url('visi_misi') ?>" class="p-3 rounded-xl bg-slate-50 hover:bg-emerald-50 text-sm font-bold text-slate-700 hover:text-primary text-center border border-slate-100">Visi Misi</a>
                     <a href="<?= base_url('struktur') ?>" class="p-3 rounded-xl bg-slate-50 hover:bg-emerald-50 text-sm font-bold text-slate-700 hover:text-primary text-center border border-slate-100">Struktur</a>
                     <a href="<?= base_url('profile/ekskul') ?>" class="p-3 rounded-xl bg-slate-50 hover:bg-emerald-50 text-sm font-bold text-slate-700 hover:text-primary text-center border border-slate-100">Ekskul</a>
                 </div>

                 <div class="py-2 px-4 text-xs font-black text-slate-400 uppercase tracking-widest mt-4">Informasi</div>
                 <a href="#berita" class="p-4 rounded-xl bg-slate-50 hover:bg-emerald-50 text-slate-800 hover:text-primary font-bold transition-all flex items-center gap-3"><i class="ri-newspaper-line text-xl"></i> Berita Terkini</a>
                 <a href="<?= base_url('direktori') ?>" class="p-4 rounded-xl bg-slate-50 hover:bg-emerald-50 text-slate-800 hover:text-primary font-bold transition-all flex items-center gap-3"><i class="ri-contacts-book-line text-xl"></i> Direktori Siswa</a>
                 
                 <a href="<?= base_url('login') ?>" class="mt-8 p-4 bg-slate-900 text-white rounded-xl text-center font-bold shadow-xl shadow-slate-900/20 active:scale-95 transition-transform">
                    Masuk ke Portal <i class="ri-login-circle-line ml-2"></i>
                 </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-bg relative min-h-screen flex items-center justify-center text-white pt-20 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full hero-pattern opacity-20"></div>
            
            <!-- Floating Blobs -->
            <div class="absolute top-1/4 -left-32 w-96 h-96 bg-primary/20 rounded-full blur-[128px] animate-float"></div>
            <div class="absolute bottom-0 -right-32 w-96 h-96 bg-blue-500/20 rounded-full blur-[128px] animate-float-delayed"></div>
            
            <!-- Rotating Ring -->
            <div class="absolute -top-1/2 right-0 w-[800px] h-[800px] border border-white/5 rounded-full animate-spin-slow opacity-20"></div>
        </div>
        
        <!-- Background Image (Blended) -->
        <div class="absolute inset-0 z-0 opacity-40 mix-blend-overlay">
            <img src="<?= base_url('assets/img/hero.jpg') ?>" class="w-full h-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070'">
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent z-0"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                <!-- Badge -->
                <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-white/5 backdrop-blur-md border border-white/10 text-emerald-300 font-semibold mb-8 hover:bg-white/10 transition-colors shadow-2xl">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    <span class="uppercase tracking-wider text-xs">Website Resmi Sekolah</span>
                </div>

                <!-- Headline -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-8 leading-[1.1] tracking-tight drop-shadow-2xl">
                    Mewujudkan Generasi <br>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 via-teal-300 to-white animate-text">
                         <?= $setting->sekolah ?? 'School Name' ?>
                    </span>
                </h1>

                <!-- Subheadline -->
                <p class="text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto mb-12 leading-relaxed font-light mix-blend-plus-lighter" data-aos="fade-up" data-aos-delay="200">
                    Pendidikan berkualitas untuk mencetak siswa yang <span class="font-bold text-white border-b-2 border-emerald-500" id="typing-text"></span>
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 items-center" data-aos="fade-up" data-aos-delay="400">
                    <a href="#profil" class="px-8 py-4 bg-primary hover:bg-emerald-500 text-white rounded-full font-bold text-lg transition-all shadow-lg shadow-emerald-900/30 hover:shadow-emerald-500/40 hover:-translate-y-1 w-full sm:w-auto flex items-center justify-center gap-2 group">
                        Jelajahi Profil
                        <i class="ri-arrow-down-line group-hover:translate-y-1 transition-transform"></i>
                    </a>
                    <a href="#berita" class="px-8 py-4 bg-white/5 backdrop-blur-md hover:bg-white/10 text-white rounded-full font-bold text-lg transition-all border border-white/10 hover:border-white/30 w-full sm:w-auto flex items-center justify-center gap-2 group">
                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:scale-110 transition-transform"><i class="ri-play-fill text-emerald-400"></i></span>
                        Lihat Berita
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Down Indicator -->
        <a href="#stats" class="absolute bottom-10 left-1/2 -translate-x-1/2 text-slate-500/50 hover:text-white transition-colors flex flex-col items-center gap-2 group cursor-pointer z-20">
            <span class="text-[10px] tracking-[0.3em] font-bold uppercase opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-2 group-hover:translate-y-0">Scroll</span>
            <div class="w-[1px] h-12 bg-gradient-to-b from-transparent via-slate-500 to-transparent group-hover:via-white transition-all"></div>
        </a>
    </section>

    <!-- Stats Section - Floating Over Hero -->
    <section id="stats" class="relative -mt-24 z-30 container mx-auto px-6">
        <div class="glass-card rounded-3xl p-8 lg:p-12 shadow-2xl border border-white/40">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 divide-x divide-slate-100">
                <!-- Item -->
                <div class="text-center group p-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="mb-4 inline-block p-4 rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-500 shadow-sm">
                        <i class="ri-user-smile-line text-3xl"></i>
                    </div>
                    <div class="text-4xl lg:text-5xl font-black text-slate-800 mb-1 counter" data-count="1250">0</div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Siswa Aktif</span>
                </div>
                <!-- Item -->
                <div class="text-center group p-4 border-none md:border-solid" data-aos="fade-up" data-aos-delay="100">
                    <div class="mb-4 inline-block p-4 rounded-2xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-500 shadow-sm">
                        <i class="ri-presentation-line text-3xl"></i>
                    </div>
                    <div class="text-4xl lg:text-5xl font-black text-slate-800 mb-1 counter" data-count="<?= count($teachers) > 0 ? count($teachers) : '45' ?>">0</div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Guru & Staff</span>
                </div>
                <!-- Item -->
                <div class="text-center group p-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="mb-4 inline-block p-4 rounded-2xl bg-purple-50 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-500 shadow-sm">
                        <i class="ri-basketball-line text-3xl"></i>
                    </div>
                    <div class="text-4xl lg:text-5xl font-black text-slate-800 mb-1 counter" data-count="<?= count($ekstras) > 0 ? count($ekstras) : '18' ?>">0</div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Ekstrakurikuler</span>
                </div>
                <!-- Item -->
                <div class="text-center group p-4 border-none" data-aos="fade-up" data-aos-delay="300">
                    <div class="mb-4 inline-block p-4 rounded-2xl bg-orange-50 text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-colors duration-500 shadow-sm">
                        <i class="ri-trophy-line text-3xl"></i>
                    </div>
                    <div class="text-4xl lg:text-5xl font-black text-slate-800 mb-1 counter" data-count="50">0</div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Prestasi</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Section -->
    <section id="profil" class="py-24 relative">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 -z-10 w-96 h-96 bg-emerald-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 left-0 -z-10 w-96 h-96 bg-blue-50 rounded-full blur-3xl opacity-50"></div>

        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <!-- Image Cards Staggered -->
                <div class="w-full lg:w-5/12 relative">
                    <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white transform hover:rotate-2 transition-transform duration-700" data-aos="fade-up-right">
                         <?php if (!empty($setting->tanda_tangan)): ?>
                             <img src="<?= base_url().$setting->tanda_tangan ?>" class="w-full h-[500px] object-cover scale-105 hover:scale-110 transition-transform duration-700 ease-in-out">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888&auto=format&fit=crop" class="w-full h-[500px] object-cover scale-105 hover:scale-110 transition-transform duration-700 ease-in-out">
                        <?php endif; ?>
                         <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-900/90 to-transparent p-8 flex flex-col justify-end h-64">
                             <h4 class="text-white text-2xl font-bold font-heading leading-none"><?= $setting->kepsek ?? 'Nama Kepala Sekolah' ?></h4>
                             <p class="text-emerald-400 text-sm font-bold uppercase tracking-wider mt-2">Kepala Sekolah</p>
                         </div>
                    </div>
                    
                    <!-- Decorative Behind Element -->
                    <div class="absolute top-10 -right-10 w-full h-full border-2 border-emerald-500/20 rounded-[2.5rem] -z-10 transform rotate-3" data-aos="fade-up-right" data-aos-delay="100"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-dots-pattern opacity-20 -z-10"></div>
                </div>
                
                <div class="w-full lg:w-7/12" data-aos="fade-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-orange-50 text-orange-600 text-[10px] font-black tracking-[0.2em] mb-6 uppercase border border-orange-100 shadow-sm">
                        <i class="ri-double-quotes-l"></i> Sambutan
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-[1.15]">
                        Membangun Masa Depan <br>
                        Yang Lebih <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500 relative">
                            Cerah
                            <svg class="absolute w-full h-2 bottom-1 left-0 text-emerald-200 -z-10" fill="currentColor" viewBox="0 0 100 20" preserveAspectRatio="none"><path d="M0 10 Q 50 20 100 10" stroke="none" /></svg>
                        </span>
                    </h2>
                    
                    <div class="prose prose-lg text-slate-600 text-justify mb-10 prose-p:leading-loose">
                        <p class="text-xl font-medium text-slate-900 italic mb-6">
                            "<?= $setting->motto ?? 'Pendidikan adalah senjata paling ampuh untuk mengubah dunia.' ?>"
                        </p>
                        <?= nl2br($setting->sambutan ?? 'Selamat datang di website resmi sekolah kami. Kami berkomitmen untuk memberikan pendidikan terbaik.') ?>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-4">
                         <a href="<?= base_url('sejarah') ?>" class="px-8 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-full font-bold transition-all flex items-center gap-2 shadow-lg shadow-slate-900/20 hover:-translate-y-1">
                            Baca Sejarah Sekolah <i class="ri-arrow-right-line"></i>
                        </a>
                        <div class="flex items-center gap-2 px-6 py-3 rounded-full bg-white border border-slate-100 shadow-sm text-slate-600 font-semibold cursor-default">
                             <div class="flex text-yellow-400 text-xs">
                                 <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                             </div>
                             <span>Terakreditasi A</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="berita" class="py-24 bg-slate-50 relative border-t border-slate-200 overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6" data-aos="fade-up">
                <div>
                     <span class="inline-block text-emerald-600 font-black tracking-widest text-xs uppercase mb-3 px-3 py-1 bg-emerald-100 rounded">Update Terkini</span>
                     <h2 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight">Berita & Artikel</h2>
                </div>
                <a href="<?= base_url('blog') ?>" class="group flex items-center gap-2 text-slate-500 hover:text-emerald-600 font-bold transition-colors border-b-2 border-transparent hover:border-emerald-600 pb-1">
                    Lihat Semua Berita <i class="ri-arrow-right-line transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if(!empty($news)): ?>
                    <?php foreach($news as $index => $post): ?>
                        <!-- Staggered delay loop -->
                        <article class="group bg-white rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-900/10 transition-all duration-500 transform hover:-translate-y-2 flex flex-col h-full ring-1 ring-slate-100" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                            <div class="relative h-64 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-60 z-10"></div>
                                <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" 
                                     alt="<?= $post->judul ?>" 
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                
                                <div class="absolute top-4 left-4 z-20">
                                    <span class="px-3 py-1.5 bg-white/30 backdrop-blur-md rounded-lg text-[10px] font-black text-white shadow-sm uppercase tracking-wider border border-white/20">
                                        <?= $post->kategori ?? 'Berita' ?>
                                    </span>
                                </div>
                                <div class="absolute bottom-4 left-4 z-20 flex items-center gap-3 text-white/90 text-xs font-medium">
                                    <span class="flex items-center gap-1 bg-black/30 px-2 py-1 rounded backdrop-blur-sm"><i class="ri-calendar-line"></i> <?= date('d M Y', strtotime($post->tanggal)) ?></span>
                                </div>
                            </div>
                            
                            <div class="p-8 flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-slate-900 mb-4 leading-normal group-hover:text-emerald-600 transition-colors line-clamp-2">
                                    <a href="<?= base_url('blog/read/'.$post->slug) ?>"><?= $post->judul ?></a>
                                </h3>
                                
                                <p class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                                    <?= strip_tags($post->isi) ?>
                                </p>
                                
                                <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="mt-auto inline-flex items-center text-sm font-bold text-slate-900 hover:text-emerald-600 transition-colors group/link">
                                    Baca Selengkapnya <i class="ri-arrow-right-line ml-1 transform group-hover/link:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200">
                        <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-4 text-slate-400 text-2xl">
                            <i class="ri-article-line"></i>
                        </div>
                        <p class="text-slate-500 font-medium">Belum ada berita terbaru saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-24 pb-10 relative overflow-hidden">
        <!-- Decoration Map/Grid -->
        <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-4 gap-12 lg:gap-20 mb-16">
                <!-- Branding -->
                <div class="md:col-span-2" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="h-16 w-16 bg-gradient-to-br from-primary to-emerald-400 rounded-2xl flex items-center justify-center text-white font-bold text-3xl shadow-lg shadow-emerald-900/50">
                             <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                        </div>
                        <div>
                            <span class="font-bold text-2xl text-white block leading-none tracking-tight"><?= $setting->sekolah ?? 'School Name' ?></span>
                            <span class="text-[10px] text-emerald-400 font-bold tracking-[0.2em] uppercase mt-1 block">Official Website</span>
                        </div>
                    </div>
                    <p class="leading-relaxed mb-8 max-w-md text-slate-400 font-light text-lg">
                        Membangun generasi <span class="text-emerald-400 font-medium highlight-anim">cerdas</span>, <span class="text-emerald-400 font-medium highlight-anim">berkarakter</span>, dan <span class="text-emerald-400 font-medium highlight-anim">berakhlak mulia</span>.
                    </p>
                    <div class="flex gap-4">
                        <?php if(!empty($setting->link_fb)): ?><a href="<?= $setting->link_fb ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all text-slate-400" title="Facebook"><i class="ri-facebook-fill text-xl"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_yt)): ?><a href="<?= $setting->link_yt ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#FF0000] hover:text-white hover:border-[#FF0000] transition-all text-slate-400" title="YouTube"><i class="ri-youtube-fill text-xl"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_ig)): ?><a href="<?= $setting->link_ig ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#E4405F] hover:text-white hover:border-[#E4405F] transition-all text-slate-400" title="Instagram"><i class="ri-instagram-fill text-xl"></i></a><?php endif; ?>
                    </div>
                </div>

                <!-- Sitemap -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h4 class="font-bold text-white text-lg mb-8">Jelajahi</h4>
                    <ul class="space-y-4">
                        <li><a href="#beranda" class="hover:text-primary transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-primary transition-colors"></i> Beranda</a></li>
                        <li><a href="<?= base_url('sejarah') ?>" class="hover:text-primary transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-primary transition-colors"></i> Profil Sekolah</a></li>
                        <li><a href="<?= base_url('blog') ?>" class="hover:text-primary transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-primary transition-colors"></i> Berita</a></li>
                        <li><a href="<?= base_url('direktori') ?>" class="hover:text-primary transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-primary transition-colors"></i> Direktori Siswa</a></li>
                         <li><a href="<?= base_url('login') ?>" class="hover:text-primary transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-primary transition-colors"></i> Login Portal</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="font-bold text-white text-lg mb-8">Hubungi Kami</h4>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4 group">
                            <div class="w-10 h-10 rounded-lg bg-white/5 text-primary flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors border border-white/10">
                                <i class="ri-map-pin-line"></i>
                            </div>
                            <span class="text-sm leading-relaxed text-slate-400 group-hover:text-slate-200 transition-colors"><?= $setting->alamat ?? 'Alamat Sekolah Belum Diatur' ?></span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-lg bg-white/5 text-primary flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors border border-white/10">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span class="font-medium text-slate-400 group-hover:text-slate-200 transition-colors"><?= $setting->telp ?? '-' ?></span>
                        </li>
                        <li class="flex items-center gap-4 group">
                             <div class="w-10 h-10 rounded-lg bg-white/5 text-primary flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors border border-white/10">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span class="text-slate-400 group-hover:text-slate-200 transition-colors"><?= $setting->email ?? '-' ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-center md:text-left text-slate-500">
                    &copy; <?= date('Y') ?> <span class="font-bold text-slate-300"><?= $setting->sekolah ?? 'School Name' ?></span>. All rights reserved.
                </p>
                <div class="flex items-center gap-6 text-sm font-medium">
                    <a href="#" class="text-slate-500 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-slate-500 hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        // Init AOS with Global Settings
        AOS.init({
            duration: 1000,
            once: true,
            mirror: false,
            offset: 80,
            easing: 'ease-out-cubic',
            anchorPlacement: 'top-bottom',
        });

        // Smart Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg', 'py-2');
                navbar.classList.remove('py-4');
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            } else {
                navbar.classList.remove('shadow-lg', 'py-2');
                navbar.classList.add('py-4');
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.85)';
            }
        });

        // Typing Effect with Smart Backspacing
        new Typed('#typing-text', {
            strings: ['Cerdas.', 'Berkarakter.', 'Berprestasi.', 'Berakhlak Mulia.'],
            typeSpeed: 60,
            backSpeed: 40,
            loop: true,
            backDelay: 2000,
            smartBackspace: true,
            showCursor: true,
            cursorChar: '|',
        });

        // Advanced Stats Counter with Intersection Observer
        const counters = document.querySelectorAll('.counter');
        const observerOptions = { threshold: 0.5 };
        
        const statsObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-count'));
                    const duration = 2000; // 2 seconds
                    const increment = target / (duration / 16); // 60fps
                    
                    let current = 0;
                    const updateCounter = () => {
                        current += increment;
                        if (current < target) {
                            counter.innerText = Math.ceil(current).toLocaleString();
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.innerText = target.toLocaleString();
                            // Add a pulse effect when done
                            counter.parentElement.classList.add('animate-pulse');
                            setTimeout(() => counter.parentElement.classList.remove('animate-pulse'), 500);
                        }
                    };
                    updateCounter();
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => statsObserver.observe(counter));
    </script>
</body>
</html>
