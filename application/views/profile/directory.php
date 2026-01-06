<?php $this->load->view('_templates/public/header'); ?>

    <!-- Header Section -->
    <section class="relative pt-32 pb-16 bg-slate-900 border-b border-white/10 overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10"></div>
             <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?q=80&w=2070" class="w-full h-full object-cover opacity-30">
        </div>
        
        <div class="container mx-auto px-6 relative z-10 text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-black text-white mb-2"><?= $title ?></h1>
            <div class="flex items-center justify-center gap-2 text-sm text-slate-400 uppercase tracking-widest font-bold">
                <a href="<?= base_url() ?>" class="hover:text-emerald-400 transition-colors">Beranda</a>
                <span class="text-emerald-500">•</span>
                <span>Direktori</span>
            </div>
        </div>
    </section>

    <!-- Directory Tabs & Filter -->
    <section class="py-10 bg-slate-50 border-b border-slate-200 sticky top-0 z-30 transition-shadow duration-300" id="sticky-header">
        <div class="container mx-auto px-6">
            <!-- Tabs Navigation -->
            <div class="flex flex-col items-center justify-center gap-6 mb-8">
                <div class="relative bg-white p-1.5 rounded-2xl inline-flex shadow-sm border border-slate-200">
                    <!-- Animated Pill Background -->
                    <div id="tab-pill" class="absolute top-1.5 left-1.5 bottom-1.5 w-[calc(50%-6px)] bg-emerald-600 rounded-xl shadow-md transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] z-0 transform translate-x-0"></div>
                    
                    <button onclick="switchTab('siswa')" id="tab-btn-siswa" class="relative z-10 px-8 py-2.5 rounded-xl font-bold text-sm transition-colors duration-300 text-white w-40 text-center">
                        Peserta Didik
                    </button>
                    <button onclick="switchTab('guru')" id="tab-btn-guru" class="relative z-10 px-8 py-2.5 rounded-xl font-bold text-sm transition-colors duration-300 text-slate-500 hover:text-slate-700 w-40 text-center">
                        Dewan Guru
                    </button>
                </div>

                <!-- Search Filter (Animated Fade) -->
                <div id="filter-container" class="w-full transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] max-h-20 opacity-100 overflow-hidden transform translate-y-0">
                    <form action="<?= base_url('direktori') ?>" method="GET" class="max-w-2xl mx-auto flex gap-4">
                        <div class="relative w-full group">
                            <input type="text" name="q" value="<?= $search ?? '' ?>" placeholder="Cari Siswa berdasarkan Nama, NIS, atau Kelas..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition-all outline-none text-slate-700 bg-white shadow-sm group-hover:shadow-md">
                            <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-emerald-500 transition-colors"></i>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 hover:-translate-y-0.5 active:translate-y-0">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Directory Content Slider -->
    <section class="bg-white min-h-screen relative overflow-hidden">
        <div class="container mx-auto px-6 py-12">
            <!-- Slider Wrapper (Overflow Hidden) -->
            <div class="overflow-hidden w-full relative">
                <!-- Sliding Flex Container -->
                <div id="content-slider" class="flex w-[200%] transition-transform duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] transform translate-x-0" style="width: 200%;">
                    
                    <!-- Panel 1: Siswa (Width 50%) -->
                    <div class="w-1/2 pr-3 md:pr-6 align-top shrink-0">
                        <!-- Header Info with Class Filter -->
                        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 px-1">
                            <p class="text-slate-500 text-sm font-medium bg-slate-50 px-3 py-1 rounded-lg border border-slate-100 inline-block">
                                <i class="ri-user-line mr-1 align-middle"></i>
                                Menampilkan <strong><?= count($students) ?></strong> dari <strong><?= $total_rows ?></strong> siswa
                            </p>
                            
                            <!-- Class Filter Dropdown -->
                            <form action="<?= base_url('direktori') ?>" method="get" class="flex items-center gap-2">
                                <?php if(!empty($search)): ?>
                                    <input type="hidden" name="q" value="<?= $search ?>">
                                <?php endif; ?>
                                <select name="kelas" onchange="this.form.submit()" class="px-4 py-2 rounded-xl border border-slate-200 bg-white text-slate-700 text-sm font-medium focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100 outline-none cursor-pointer">
                                    <option value="">Semua Kelas</option>
                                    <?php if(!empty($classes)): ?>
                                        <?php foreach($classes as $kls): ?>
                                            <option value="<?= $kls->id_kelas ?>" <?= (isset($selected_kelas) && $selected_kelas == $kls->id_kelas) ? 'selected' : '' ?>><?= $kls->nama_kelas ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </form>
                        </div>

                        <!-- Grid Siswa -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8 min-h-[400px]">
                            <?php if(!empty($students)): ?>
                                <?php foreach($students as $s): ?>
                                    <?php 
                                        // Gender-based default photos
                                        if(!empty($s->foto) && file_exists('./uploads/foto_siswa/'.$s->foto)) {
                                            $foto = base_url('uploads/foto_siswa/'.$s->foto);
                                        } else {
                                            // Default based on gender: L = Laki-laki, P = Perempuan
                                            $gender = isset($s->jenis_kelamin) ? $s->jenis_kelamin : 'L';
                                            $foto = ($gender == 'L') 
                                                ? base_url('assets/img/siswa-l.png') 
                                                : base_url('assets/img/siswa-p.png');
                                        }
                                    ?>
                                    <div class="group bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-lg shadow-slate-100/50 hover:shadow-2xl hover:shadow-emerald-900/10 transition-all duration-300 hover:-translate-y-1">
                                        <!-- Portrait Photo -->
                                        <div class="relative w-full aspect-[4/5] overflow-hidden bg-gradient-to-b from-emerald-50 to-slate-50">
                                            <img src="<?= $foto ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy" alt="<?= $s->nama ?>">
                                        </div>
                                        <!-- Info -->
                                        <div class="p-4 text-center">
                                            <h3 class="font-bold text-slate-800 text-base leading-tight mb-2 truncate"><?= $s->nama ?></h3>
                                            <p class="text-xs font-bold text-emerald-600 bg-emerald-50 inline-block px-3 py-1 rounded-full"><?= $s->nama_kelas ?? 'Siswa' ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-span-full py-20 text-center">
                                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                                        <i class="ri-user-search-line text-4xl"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-xl mb-1">Tidak ditemukan</h3>
                                    <p class="text-slate-500">Maaf, data siswa yang Anda cari tidak ditemukan.</p>
                                    <a href="<?= base_url('direktori') ?>" class="mt-4 inline-block text-emerald-600 font-bold hover:underline">Reset Pencarian</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-16 flex justify-center">
                            <?= $pagination ?>
                        </div>
                    </div>

                    <!-- Panel 2: Guru (Width 50%) -->
                    <div class="w-1/2 pl-3 md:pl-6 align-top shrink-0">
                        <div class="mb-8 flex justify-between items-center px-1">
                            <p class="text-slate-500 text-sm font-medium bg-slate-50 px-3 py-1 rounded-lg border border-slate-100 inline-block">
                                <i class="ri-briefcase-line mr-1 align-middle"></i>
                                Dewan Guru & Staff
                            </p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8 pb-10 min-h-[400px]">
                            <?php if(!empty($teachers)): ?>
                                <?php foreach($teachers as $g): ?>
                                    <?php 
                                        $g_foto = $g->foto;
                                        if(!empty($g_foto)) {
                                            if(file_exists('./'.$g_foto)){
                                                $foto_guru = base_url($g_foto);
                                            } elseif(file_exists('./uploads/profiles/'.$g_foto)) {
                                                $foto_guru = base_url('uploads/profiles/'.$g_foto);
                                            } else {
                                                // Default avatar based on gender or general
                                                $foto_guru = base_url('assets/img/guru.png');
                                            }
                                        } else {
                                            $foto_guru = base_url('assets/img/guru.png');
                                        }
                                        $jabatan = $g->level ?? 'Tenaga Pendidik';
                                    ?>
                                    <div class="group bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-lg shadow-slate-100/50 hover:shadow-2xl hover:shadow-sky-900/10 transition-all duration-300 hover:-translate-y-1">
                                        <!-- Portrait Photo -->
                                        <div class="relative w-full aspect-[4/5] overflow-hidden bg-gradient-to-b from-sky-50 to-slate-50">
                                            <img src="<?= $foto_guru ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy" alt="<?= $g->nama_guru ?>">
                                        </div>
                                        <!-- Info -->
                                        <div class="p-4 text-center">
                                            <h3 class="font-bold text-slate-800 text-base leading-tight mb-2 truncate"><?= $g->nama_guru ?></h3>
                                            <p class="text-xs font-bold text-sky-600 bg-sky-50 inline-block px-3 py-1 rounded-full uppercase tracking-wider text-[10px]"><?= $jabatan ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-span-full py-20 text-center">
                                    <p class="text-slate-500 italic">Belum ada data guru.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
    function switchTab(tab) {
        // Elements
        const pill = document.getElementById('tab-pill');
        const btnSiswa = document.getElementById('tab-btn-siswa');
        const btnGuru = document.getElementById('tab-btn-guru');
        const slider = document.getElementById('content-slider');
        const filterContainer = document.getElementById('filter-container');

        // Base Classes
        const btnBase = "relative z-10 px-8 py-2.5 rounded-xl font-bold text-sm transition-colors duration-300 w-40 text-center cursor-pointer select-none";
        const textActive = "text-white";
        const textInactive = "text-slate-500 hover:text-slate-700";
        
        // Pill Base
        const pillBase = "absolute top-1.5 left-1.5 bottom-1.5 w-40 rounded-xl shadow-md transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] z-0";

        if(tab === 'siswa') {
            // State: SISWA ACTIVE
            
            // 1. Pill: Emerald, Position 0
            pill.className = `${pillBase} bg-emerald-600 transform translate-x-0`;
            
            // 2. Buttons Text
            btnSiswa.className = `${btnBase} ${textActive}`;
            btnGuru.className = `${btnBase} ${textInactive}`;

            // 3. Content Slide
            slider.classList.remove('-translate-x-1/2');
            slider.classList.add('translate-x-0');

            // 4. Show Filter
            filterContainer.classList.remove('max-h-0', 'opacity-0', 'translate-y-[-20px]', 'mb-0');
            filterContainer.classList.add('max-h-20', 'opacity-100', 'translate-y-0');
            
        } else {
            // State: GURU ACTIVE
            
            // 1. Pill: Sky, Position 100% (Translate Full)
            pill.className = `${pillBase} bg-sky-600 transform translate-x-full`;
            
            // 2. Buttons Text
            btnGuru.className = `${btnBase} ${textActive}`;
            btnSiswa.className = `${btnBase} ${textInactive}`;

            // 3. Content Slide
            slider.classList.remove('translate-x-0');
            slider.classList.add('-translate-x-1/2');

            // 4. Hide Filter
            filterContainer.classList.remove('max-h-20', 'opacity-100', 'translate-y-0');
            filterContainer.classList.add('max-h-0', 'opacity-0', 'translate-y-[-20px]', 'mb-0');
        }
    }
    </script>

<?php $this->load->view('_templates/public/footer'); ?>
