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
                    },
                    colors: {
                        primary: '#059669', // Emerald 600
                        secondary: '#0F172A', // Slate 900
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .hero-bg {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass" id="navbar">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="flex items-center gap-3 group">
                 <?php if (!empty($setting->logo_kiri)): ?>
                    <img src="<?= base_url().$setting->logo_kiri ?>" alt="Logo" class="h-10 w-auto group-hover:scale-110 transition-transform">
                <?php else: ?>
                    <div class="h-10 w-10 bg-primary rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                    </div>
                <?php endif; ?>
                <div class="hidden md:block">
                    <h1 class="font-bold text-lg leading-tight text-slate-900"><?= $setting->sekolah ?? 'School Name' ?></h1>
                    <p class="text-xs text-primary font-medium tracking-widest">OFFICIAL WEBSITE</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-1">
                <a href="#beranda" class="px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary font-medium transition-all">Beranda</a>
                
                <div class="relative group">
                    <button class="px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary font-medium transition-all flex items-center gap-1">
                        Profil <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div class="absolute top-full left-0 w-48 bg-white shadow-xl rounded-xl mt-2 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all transform translate-y-2 group-hover:translate-y-0 border border-slate-100">
                        <a href="<?= base_url('sejarah') ?>" class="block px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary">Sejarah</a>
                        <a href="<?= base_url('visi_misi') ?>" class="block px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary">Visi & Misi</a>
                        <a href="<?= base_url('struktur') ?>" class="block px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary">Struktur Organisasi</a>
                    </div>
                </div>

                <a href="#berita" class="px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary font-medium transition-all">Berita</a>
                <a href="<?= base_url('direktori') ?>" class="px-4 py-2 rounded-lg hover:bg-emerald-50 text-slate-600 hover:text-primary font-medium transition-all">Direktori</a>
                
                <a href="<?= base_url('login') ?>" class="ml-4 px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 font-medium flex items-center gap-2">
                    <i class="ri-login-circle-line"></i> Portal
                </a>
            </div>

            <!-- Mobile Button -->
            <button class="md:hidden text-2xl text-slate-800" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="ri-menu-4-line"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100">
            <div class="flex flex-col p-4 gap-2">
                 <a href="#beranda" class="px-4 py-3 rounded-lg hover:bg-emerald-50">Beranda</a>
                 <a href="<?= base_url('sejarah') ?>" class="px-4 py-3 rounded-lg hover:bg-emerald-50">Profil</a>
                 <a href="#berita" class="px-4 py-3 rounded-lg hover:bg-emerald-50">Berita</a>
                 <a href="<?= base_url('direktori') ?>" class="px-4 py-3 rounded-lg hover:bg-emerald-50">Direktori</a>
                 <a href="<?= base_url('login') ?>" class="px-4 py-3 bg-primary text-white rounded-lg text-center font-bold mt-2">Login Portal</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative min-h-screen flex items-center justify-center hero-bg text-white pt-20">
        <div class="container mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
            <span class="inline-block px-4 py-2 rounded-full bg-white/10 backdrop-blur border border-white/20 text-emerald-300 font-semibold mb-6 animate-pulse">
                Selamat Datang di Website Resmi
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight tracking-tight">
                <?= $setting->sekolah ?? 'School Name' ?>
            </h1>
            <p class="text-lg md:text-xl text-slate-200 max-w-2xl mx-auto mb-10 leading-relaxed font-light">
                Mewujudkan generasi yang <span class="text-emerald-400 font-bold">Cerdas</span>, <span class="text-emerald-400 font-bold">Berkarakter</span>, dan <span class="text-emerald-400 font-bold">Berprestasi</span> di era global.
            </p>
            <div class="flex justify-center gap-4">
                <a href="#profil" class="px-8 py-4 bg-primary hover:bg-emerald-700 text-white rounded-full font-bold transition-all shadow-lg hover:shadow-emerald-500/40 hover:-translate-y-1">
                    Selengkapnya
                </a>
                <a href="#berita" class="px-8 py-4 bg-white/10 backdrop-blur hover:bg-white/20 text-white rounded-full font-bold transition-all border border-white/30">
                    Lihat Berita
                </a>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-[calc(100%+1.3px)] h-[100px] text-slate-50 fill-current">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
        </div>
    </section>

    <!-- Sambutan Section -->
    <section id="profil" class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="w-full lg:w-5/12 relative" data-aos="fade-right">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-yellow-400/20 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-primary/20 rounded-full blur-2xl"></div>
                    
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white">
                         <?php if (!empty($setting->tanda_tangan)): // Using tanda_tangan as photo placeholder for now ?>
                             <img src="<?= base_url().$setting->tanda_tangan ?>" class="w-full object-cover transform hover:scale-105 transition-transform duration-700">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1888&auto=format&fit=crop" class="w-full object-cover">
                        <?php endif; ?>
                         <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-slate-900 to-transparent p-8">
                            <h3 class="text-white font-bold text-xl"><?= $setting->kepsek ?? 'Nama Kepala Sekolah' ?></h3>
                            <p class="text-emerald-400 text-sm font-medium">Kepala Sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-7/12" data-aos="fade-left">
                    <span class="inline-block py-1 px-3 rounded bg-emerald-100 text-emerald-700 text-xs font-bold tracking-widest mb-4">SAMBUTAN KEPALA SEKOLAH</span>
                    <h2 class="text-4xl font-bold text-slate-900 mb-6 leading-tight">Assalamu'alaikum <br> Warahmatullahi Wabarakatuh</h2>
                    <div class="prose prose-lg text-slate-600 text-justify">
                        <?= nl2br($setting->sambutan ?? 'Selamat datang di website resmi sekolah kami. Kami berkomitmen untuk memberikan pendidikan terbaik.') ?>
                    </div>
                    <div class="mt-8 pt-8 border-t border-slate-200 flex items-center gap-4">
                         <a href="<?= base_url('sejarah') ?>" class="text-primary font-bold hover:text-emerald-700 flex items-center gap-2">
                            Baca Sejarah Sekolah <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="berita" class="py-24 bg-slate-100 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-primary font-bold tracking-wider text-sm uppercase">Kabar Terbaru</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-2">Berita & Artikel</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php if(!empty($news)): ?>
                    <?php foreach($news as $post): ?>
                        <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up">
                            <div class="relative h-56 overflow-hidden">
                                <img src="<?= !empty($post->gambar) ? base_url($post->gambar) : 'https://via.placeholder.com/800x600?text=No+Image' ?>" 
                                     alt="<?= $post->judul ?>" 
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-lg text-xs font-bold text-slate-800 shadow-sm">
                                    <?= date('d M Y', strtotime($post->tanggal)) ?>
                                </div>
                            </div>
                            <div class="p-8">
                                <span class="text-primary text-xs font-bold uppercase tracking-wide"><?= $post->kategori ?? 'Berita' ?></span>
                                <h3 class="text-xl font-bold text-slate-900 mt-2 mb-3 leading-tight group-hover:text-primary transition-colors">
                                    <a href="<?= base_url('blog/read/'.$post->slug) ?>"><?= $post->judul ?></a>
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-3 mb-4">
                                    <?= strip_tags($post->isi) ?>
                                </p>
                                <a href="<?= base_url('blog/read/'.$post->slug) ?>" class="inline-flex items-center text-sm font-bold text-primary hover:text-emerald-700 group">
                                    Baca Selengkapnya <i class="ri-arrow-right-line ml-1 transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-3 text-center py-10 bg-white rounded-2xl border border-dashed border-slate-300">
                        <p class="text-slate-500">Belum ada berita terbaru.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-12">
                 <a href="<?= base_url('blog') ?>" class="px-8 py-3 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 rounded-full font-bold transition-all shadow-sm">
                    Lihat Berita Lainnya
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-20 pb-10 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-yellow-400"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="h-10 w-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                             <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                        </div>
                        <span class="font-bold text-2xl text-white"><?= $setting->sekolah ?? 'School Name' ?></span>
                    </div>
                    <p class="leading-relaxed mb-8 max-w-md text-slate-400">
                        Membangun generasi cerdas, berkarakter, dan berakhlak mulia. Platform pendidikan terintegrasi untuk masa depan yang lebih baik.
                    </p>
                    <div class="flex gap-4">
                        <?php if(!empty($setting->link_fb)): ?><a href="<?= $setting->link_fb ?>" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary transition-all text-white"><i class="ri-facebook-fill"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_yt)): ?><a href="<?= $setting->link_yt ?>" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-red-600 transition-all text-white"><i class="ri-youtube-fill"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_ig)): ?><a href="<?= $setting->link_ig ?>" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-pink-600 transition-all text-white"><i class="ri-instagram-fill"></i></a><?php endif; ?>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-white text-lg mb-6">Jelajahi</h4>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="<?= base_url('sejarah') ?>" class="hover:text-primary transition-colors">Profil Sekolah</a></li>
                        <li><a href="#guru" class="hover:text-primary transition-colors">Guru & Staff</a></li>
                        <li><a href="<?= base_url('blog') ?>" class="hover:text-primary transition-colors">Berita</a></li>
                        <li><a href="<?= base_url('direktori') ?>" class="hover:text-primary transition-colors">Direktori Siswa</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white text-lg mb-6">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="ri-map-pin-line text-primary mt-1"></i>
                            <span class="text-sm"><?= $setting->alamat ?? 'Alamat' ?></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ri-phone-line text-primary"></i>
                            <span><?= $setting->telp ?? '-' ?></span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ri-mail-line text-primary"></i>
                            <span><?= $setting->email ?? '-' ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-center md:text-left">
                    &copy; <?= date('Y') ?> <span class="font-bold text-white"><?= $setting->sekolah ?? 'School Name' ?></span>. All rights reserved.
                </p>
                <p class="text-sm text-center md:text-right flex items-center gap-2">
                    Powered by <a href="#" class="font-bold text-primary hover:text-white transition-colors">Lopyta</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Init AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                document.getElementById('navbar').classList.add('shadow-lg', 'bg-white/90');
                document.getElementById('navbar').classList.remove('bg-transparent', 'glass');
            } else {
                document.getElementById('navbar').classList.remove('shadow-lg', 'bg-white/90');
                document.getElementById('navbar').classList.add('glass');
            }
        });
    </script>
</body>
</html>
