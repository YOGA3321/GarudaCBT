<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $setting->sekolah ?? 'School Profile' ?> - <?= $title ?? 'Official Website' ?></title>
    
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
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body { font-family: 'Outfit', sans-serif; }
        
        /* Glassmorphism Classes */
        .glass {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden selection:bg-emerald-200 selection:text-emerald-900 mx-auto">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass py-4 shadow-sm" id="navbar">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="flex items-center gap-3 group relative z-50">
                <div class="relative">
                     <?php if (!empty($setting->logo_kiri)): ?>
                        <img src="<?= base_url().$setting->logo_kiri ?>" alt="Logo" class="relative h-10 w-auto">
                    <?php else: ?>
                        <div class="relative h-10 w-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="hidden md:block">
                    <h1 class="font-bold text-lg leading-tight text-slate-800 group-hover:text-emerald-600 transition-colors"><?= $setting->sekolah ?? 'School Name' ?></h1>
                    <p class="text-[10px] text-emerald-600 font-bold tracking-[0.2em] uppercase">Official Website</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-2 bg-slate-100/50 p-1.5 rounded-2xl border border-slate-200">
                <a href="<?= base_url() ?>" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-emerald-600 hover:bg-white transition-all duration-300">Beranda</a>
                
                <div class="relative group">
                    <button class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-emerald-600 hover:bg-white transition-all duration-300 flex items-center gap-1">
                        Profil <i class="ri-arrow-down-s-line ml-1 transition-transform duration-300 group-hover:-rotate-180"></i>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute top-full left-0 w-64 pt-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden p-2">
                             <a href="<?= base_url('sejarah') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                                <i class="ri-history-line text-lg text-emerald-500"></i>
                                <span class="text-sm font-bold text-slate-700">Sejarah</span>
                            </a>
                            <a href="<?= base_url('visi_misi') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                                <i class="ri-flag-line text-lg text-blue-500"></i>
                                <span class="text-sm font-bold text-slate-700">Visi & Misi</span>
                            </a>
                             <a href="<?= base_url('struktur') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                                <i class="ri-organization-chart text-lg text-purple-500"></i>
                                <span class="text-sm font-bold text-slate-700">Struktur</span>
                            </a>
                             <a href="<?= base_url('profile/ekskul') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                                <i class="ri-basketball-line text-lg text-orange-500"></i>
                                <span class="text-sm font-bold text-slate-700">Ekstrakurikuler</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="<?= base_url('blog') ?>" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-emerald-600 hover:bg-white transition-all duration-300">Berita</a>
                <a href="<?= base_url('direktori') ?>" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-emerald-600 hover:bg-white transition-all duration-300">Direktori</a>
            </div>
            
            <div class="hidden md:block">
                 <a href="<?= base_url('login') ?>" class="group flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white rounded-xl font-bold shadow-lg shadow-emerald-600/20 hover:bg-emerald-700 hover:-translate-y-1 transition-all duration-300">
                    <span>Portal Login</span>
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-slate-700" type="button">
                <i class="ri-menu-4-fill text-2xl"></i>
            </button>
        </div>

    <!-- MOBILE MENU (STANDALONE - OUTSIDE NAV) -->
    <div id="mobileMenuOverlay" style="display: none !important;">
        <style>
            #mobileMenuOverlay {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100% !important;
                background-color: #ffffff !important;
                z-index: 999999 !important;
                overflow-y: auto !important; /* The overlay itself scrolls */
                -webkit-overflow-scrolling: touch !important;
                display: block !important; /* Back to block */
            }
            #mobileMenuOverlay * {
                box-sizing: border-box !important;
            }
            .mobile-menu-header {
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                padding: 16px 20px !important;
                border-bottom: 1px solid #e2e8f0 !important;
                background: white !important;
                width: 100% !important;
                position: sticky !important; /* Sticky header */
                top: 0 !important;
                z-index: 10 !important;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important;
            }
            .mobile-menu-content {
                padding: 20px !important;
                padding-top: 10px !important; /* Little bit of space */
                width: 100% !important;
                padding-bottom: 40px !important; /* Extra bottom space for scroll */
            }
            .mobile-menu-title {
                font-size: 18px !important;
                font-weight: 700 !important;
                color: #1e293b !important;
                margin: 0 !important;
            }
            .mobile-menu-close {
                width: 40px !important;
                height: 40px !important;
                background: #f1f5f9 !important;
                border: none !important;
                border-radius: 50% !important;
                cursor: pointer !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                transition: background 0.2s !important;
            }
            .mobile-menu-close:active {
                background: #e2e8f0 !important;
            }
            .mobile-menu-item {
                display: flex !important;
                align-items: center !important;
                gap: 16px !important;
                padding: 16px !important;
                margin-bottom: 12px !important;
                background: #f8fafc !important;
                border: 1px solid #e2e8f0 !important;
                border-radius: 12px !important;
                text-decoration: none !important;
                color: #1e293b !important;
                font-weight: 600 !important;
                font-size: 16px !important;
            }
            .mobile-menu-item:active {
                background-color: #f1f5f9 !important;
                border-color: #cbd5e1 !important;
            }
            .mobile-menu-item i {
                font-size: 24px !important;
            }
        </style>

        <div class="mobile-menu-header">
            <h2 class="mobile-menu-title">Menu Utama</h2>
            <button class="mobile-menu-close" onclick="closeMobileMenu()" type="button">
                <i class="ri-close-line" style="font-size: 24px; color: #64748b;"></i>
            </button>
        </div>

        <div class="mobile-menu-content">
            <a href="<?= base_url() ?>" class="mobile-menu-item">
                <i class="ri-home-4-line" style="color: #10b981;"></i>
                <span>Beranda</span>
            </a>

            <a href="<?= base_url('sejarah') ?>" class="mobile-menu-item">
                <i class="ri-history-line" style="color: #10b981;"></i>
                <span>Sejarah</span>
            </a>

            <a href="<?= base_url('visi_misi') ?>" class="mobile-menu-item">
                <i class="ri-flag-line" style="color: #3b82f6;"></i>
                <span>Visi & Misi</span>
            </a>

            <a href="<?= base_url('struktur') ?>" class="mobile-menu-item">
                <i class="ri-organization-chart" style="color: #8b5cf6;"></i>
                <span>Struktur Organisasi</span>
            </a>

            <a href="<?= base_url('profile/ekskul') ?>" class="mobile-menu-item">
                <i class="ri-basketball-line" style="color: #f97316;"></i>
                <span>Ekstrakurikuler</span>
            </a>

            <a href="<?= base_url('direktori') ?>" class="mobile-menu-item">
                <i class="ri-contacts-book-line" style="color: #a855f7;"></i>
                <span>Direktori</span>
            </a>

            <a href="<?= base_url('blog') ?>" class="mobile-menu-item">
                <i class="ri-newspaper-line" style="color: #f97316;"></i>
                <span>Berita</span>
            </a>

            <a href="<?= base_url('login') ?>" class="mobile-menu-item" style="background: #10b981 !important; color: white !important; margin-top: 20px !important;">
                <i class="ri-login-circle-line" style="color: white !important;"></i>
                <span>Masuk Portal</span>
            </a>
        </div>
    </div>

    <script>
        function openMobileMenu() {
            var menu = document.getElementById('mobileMenuOverlay');
            if (menu) {
                menu.style.display = 'block'; // Back to block
                document.body.style.overflow = 'hidden';
            }
        }

        function closeMobileMenu() {
            var menu = document.getElementById('mobileMenuOverlay');
            if (menu) {
                menu.style.display = 'none';
                document.body.style.overflow = '';
            }
        }

        // Bind to hamburger button
        document.addEventListener('DOMContentLoaded', function() {
            var hamburger = document.getElementById('mobile-menu-button');
            if (hamburger) {
                hamburger.addEventListener('click', openMobileMenu);
            }
        });
    </script>
