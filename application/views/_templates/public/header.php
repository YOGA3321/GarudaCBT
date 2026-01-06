<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $setting->sekolah ?? 'School Profile' ?> - <?= $title ?? 'Official Website' ?></title>
    
    <!-- Favicon -->
    <?php $favicon = !empty($setting->logo_kiri) ? base_url().$setting->logo_kiri : base_url('assets/img/favicon.png'); ?>
    <link rel="icon" type="image/png" href="<?= $favicon ?>">
    <link rel="shortcut icon" type="image/png" href="<?= $favicon ?>">
    
    <!-- Tailwind CSS (CDN for Development/Prototyping - Required for "Cool" Design) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#14b8a6', // Teal 600
                        secondary: '#0f172a', // Slate 900
                    }
                }
            }
        }
    </script>

    <!-- Local Assets -->
    <link rel="stylesheet" href="<?= base_url('assets/homepage/fonts/outfit/outfit.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/homepage/fonts/remixicon/remixicon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/aos.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/swiper-bundle.min.css') ?>">
    <!-- Custom Overrides -->
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/homepage.css') ?>">

    <style>
        /* Critical Styles */
        body { font-family: 'Outfit', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #14b8a6;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-teal-200 selection:text-teal-900 overflow-x-hidden">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass-nav py-3" id="navbar">
        <div class="container mx-auto px-4 lg:px-8 flex justify-between items-center">
            <!-- Logo Area -->
            <a href="<?= base_url() ?>" class="flex items-center gap-3 group">
                <div class="relative overflow-hidden rounded-xl shadow-lg group-hover:shadow-teal-500/20 transition-all duration-300">
                     <?php if (!empty($setting->logo_kiri)): ?>
                        <img src="<?= base_url().$setting->logo_kiri ?>" alt="Logo" class="h-10 w-auto object-contain">
                    <?php else: ?>
                        <div class="h-10 w-10 bg-gradient-to-br from-teal-600 to-teal-500 flex items-center justify-center text-white font-bold text-xl">
                            <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="hidden md:flex flex-col justify-center">
                    <h1 class="font-bold text-lg leading-none text-slate-800 tracking-tight group-hover:text-teal-600 transition-colors">
                        <?= $setting->sekolah ?? 'School Name' ?>
                    </h1>
                    <span class="text-[10px] text-teal-600 font-bold tracking-widest uppercase mt-1">Official Website</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-1 bg-slate-100/50 p-1.5 rounded-full border border-slate-200/60">
                <a href="<?= base_url() ?>" class="nav-link px-5 py-2 text-sm font-semibold text-slate-600 hover:text-teal-600 transition-colors">Beranda</a>
                
                <!-- Dropdown Profil -->
                <div class="relative group">
                    <button class="nav-link px-5 py-2 text-sm font-semibold text-slate-600 hover:text-teal-600 transition-colors flex items-center gap-1">
                        Profil <i class="ri-arrow-down-s-line text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 w-56 pt-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden p-2">
                             <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 text-slate-600 hover:text-teal-600 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center text-teal-600"><i class="ri-history-line"></i></div>
                                <span class="text-sm font-semibold">Sejarah</span>
                            </a>
                            <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 text-slate-600 hover:text-teal-600 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600"><i class="ri-flag-line"></i></div>
                                <span class="text-sm font-semibold">Visi & Misi</span>
                            </a>
                             <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 text-slate-600 hover:text-teal-600 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600"><i class="ri-organization-chart"></i></div>
                                <span class="text-sm font-semibold">Struktur</span>
                            </a>
                             <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 text-slate-600 hover:text-teal-600 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-orange-600"><i class="ri-basketball-line"></i></div>
                                <span class="text-sm font-semibold">Ekstrakurikuler</span>
                            </a>
                            <a href="<?= base_url('profile/alumni') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 text-slate-600 hover:text-teal-600 transition-colors">
                                <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center text-green-600"><i class="ri-user-search-line"></i></div>
                                <span class="text-sm font-semibold">Verifikasi Alumni</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="<?= base_url('blog') ?>" class="nav-link px-5 py-2 text-sm font-semibold text-slate-600 hover:text-teal-600 transition-colors">Berita</a>
                <a href="<?= base_url('gallery') ?>" class="nav-link px-5 py-2 text-sm font-semibold text-slate-600 hover:text-teal-600 transition-colors">Galeri</a>
                <a href="<?= base_url('direktori') ?>" class="nav-link px-5 py-2 text-sm font-semibold text-slate-600 hover:text-teal-600 transition-colors">Direktori</a>
            </div>
            
            <!-- Login Button -->
            <div class="hidden lg:block">
                 <a href="<?= base_url('login') ?>" class="group flex items-center gap-2 px-5 py-2.5 bg-teal-600 text-white rounded-full font-bold shadow-lg shadow-teal-600/20 hover:bg-teal-700 hover:shadow-teal-600/30 hover:-translate-y-0.5 transition-all duration-300 text-sm">
                    <span>Login</span>
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-button" class="lg:hidden p-2 text-slate-600 hover:text-teal-600 transition-colors">
                <i class="ri-menu-4-fill text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-white z-[60] hidden overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-slate-100 px-4 py-3 flex justify-between items-center shadow-sm">
             <div class="flex items-center gap-2">
                 <?php if (!empty($setting->logo_kiri)): ?>
                    <img src="<?= base_url().$setting->logo_kiri ?>" class="h-8 w-auto">
                <?php endif; ?>
                <span class="font-bold text-slate-800">Menu Utama</span>
            </div>
            <button class="w-10 h-10 flex items-center justify-center bg-slate-100 rounded-full text-slate-600 hover:bg-rose-100 hover:text-rose-600 transition-colors" onclick="closeMobileMenu()">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>
        <div class="p-4 space-y-2">
            <a href="<?= base_url() ?>" class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-slate-700 font-semibold hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">
                <i class="ri-home-4-line text-xl text-teal-500"></i> Beranda
            </a>
            
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                <h6 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Profil Sekolah</h6>
                <div class="grid grid-cols-2 gap-3">
                     <a href="<?= base_url('sejarah') ?>" class="flex flex-col items-center justify-center p-3 rounded-xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-teal-200 transition-all text-center">
                        <i class="ri-history-line text-2xl text-teal-500 mb-1"></i>
                        <span class="text-xs font-bold text-slate-600">Sejarah</span>
                    </a>
                    <a href="<?= base_url('visi_misi') ?>" class="flex flex-col items-center justify-center p-3 rounded-xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all text-center">
                        <i class="ri-flag-line text-2xl text-blue-500 mb-1"></i>
                        <span class="text-xs font-bold text-slate-600">Visi Misi</span>
                    </a>
                    <a href="<?= base_url('struktur') ?>" class="flex flex-col items-center justify-center p-3 rounded-xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-purple-200 transition-all text-center">
                        <i class="ri-organization-chart text-2xl text-purple-500 mb-1"></i>
                        <span class="text-xs font-bold text-slate-600">Struktur</span>
                    </a>
                    <a href="<?= base_url('profile/ekskul') ?>" class="flex flex-col items-center justify-center p-3 rounded-xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-orange-200 transition-all text-center">
                        <i class="ri-basketball-line text-2xl text-orange-500 mb-1"></i>
                        <span class="text-xs font-bold text-slate-600">Ekskul</span>
                    </a>
                    <a href="<?= base_url('profile/alumni') ?>" class="flex flex-col items-center justify-center p-3 rounded-xl bg-white border border-slate-100 shadow-sm hover:shadow-md hover:border-green-200 transition-all text-center">
                        <i class="ri-user-search-line text-2xl text-green-500 mb-1"></i>
                        <span class="text-xs font-bold text-slate-600">Alumni</span>
                    </a>
                </div>
            </div>

            <a href="<?= base_url('blog') ?>" class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-slate-700 font-semibold hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">
                <i class="ri-newspaper-line text-xl text-blue-500"></i> Berita Sekolah
            </a>
             <a href="<?= base_url('gallery') ?>" class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 text-slate-700 font-semibold hover:bg-teal-50 hover:border-teal-200 hover:text-teal-700 transition-all">
                <i class="ri-image-line text-xl text-pink-500"></i> Galeri Foto
            </a>
            
             <a href="<?= base_url('login') ?>" class="flex items-center justify-center gap-2 p-4 rounded-2xl bg-teal-600 text-white font-bold shadow-lg shadow-teal-500/30 mt-6 hover:bg-teal-700 transition-all">
                <i class="ri-login-circle-line text-xl"></i> Masuk Portal
            </a>
        </div>
    </div>

    <script>
        const mobileMenu = document.getElementById('mobileMenuOverlay');
        const openBtn = document.getElementById('mobile-menu-button');
        
        function openMobileMenu() {
            mobileMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if(openBtn) openBtn.addEventListener('click', openMobileMenu);
    </script>