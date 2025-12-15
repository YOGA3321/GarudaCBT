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

    <!-- Filter Section (Simple Search UI) -->
    <section class="bg-slate-50 py-10 border-b border-slate-200">
        <div class="container mx-auto px-6">
            <form action="<?= base_url('direktori') ?>" method="GET" class="max-w-2xl mx-auto flex gap-4">
                <div class="relative w-full">
                    <input type="text" name="q" value="<?= $search ?? '' ?>" placeholder="Cari Siswa berdasarkan Nama, NIS, atau Kelas..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition-all outline-none text-slate-700 bg-white shadow-sm">
                    <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                </div>
                <button type="submit" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl transition-colors shadow-lg shadow-emerald-600/20">
                    Cari
                </button>
            </form>
        </div>
    </section>

    <!-- Directory Grid -->
    <section class="py-16 bg-white min-h-screen">
        <div class="container mx-auto px-6">
            <div class="mb-8 flex justify-between items-center">
                <p class="text-slate-500 text-sm">Menampilkan <strong><?= count($students) ?></strong> dari <strong><?= $total_rows ?></strong> siswa</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                <?php if(!empty($students)): ?>
                    <?php foreach($students as $s): ?>
                        <?php $foto = !empty($s->foto) && file_exists('./uploads/foto_siswa/'.$s->foto) ? base_url('uploads/foto_siswa/'.$s->foto) : 'https://ui-avatars.com/api/?name='.urlencode($s->nama).'&background=10b981&color=fff&size=200'; ?>
                        <div class="group bg-white rounded-2xl p-4 border border-slate-100 shadow-lg shadow-slate-100/50 hover:shadow-2xl hover:shadow-emerald-900/10 transition-all duration-300 hover:-translate-y-1" data-aos="fade-up">
                            <div class="relative w-24 h-24 mx-auto mb-4 rounded-full overflow-hidden border-4 border-emerald-50 group-hover:border-emerald-100 transition-colors">
                                <img src="<?= $foto ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" loading="lazy">
                            </div>
                            <div class="text-center">
                                <h3 class="font-bold text-slate-800 text-lg leading-tight mb-1 truncate"><?= $s->nama ?></h3>
                                <p class="text-xs font-bold text-emerald-600 bg-emerald-50 inline-block px-3 py-1 rounded-full mb-2"><?= $s->nama_kelas ?? 'Siswa' ?></p>
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
    </section>

<?php $this->load->view('_templates/public/footer'); ?>
