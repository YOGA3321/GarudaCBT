<?php $this->load->view('_templates/public/header'); ?>

    <!-- Header -->
    <section class="relative pt-32 pb-20 bg-slate-900 border-b border-white/10 overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent z-10"></div>
             <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?q=80&w=2012" class="w-full h-full object-cover opacity-30">
        </div>
        
        <div class="container mx-auto px-6 relative z-10 text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-6xl font-black text-white mb-4"><?= $title ?></h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">Dokumentasi kegiatan dan momen berharga di sekolah kami.</p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-20 bg-white min-h-screen">
        <div class="container mx-auto px-6">
            
            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
                <?php if(!empty($gallery)): ?>
                    <?php foreach($gallery as $g): ?>
                        <div class="break-inside-avoid relative group rounded-2xl overflow-hidden shadow-lg border border-slate-100 bg-white" data-aos="fade-up">
                            <img src="<?= base_url($g->gambar) ?>" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105" loading="lazy" alt="<?= $g->judul ?>">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-6">
                                <span class="inline-block px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-lg mb-2 w-fit">
                                    <?= $g->kategori ?? 'Umum' ?>
                                </span>
                                <h3 class="text-white font-bold text-xl leading-tight mb-2"><?= $g->judul ?></h3>
                                <div class="w-12 h-1 bg-emerald-500 rounded-full"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-full py-20 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-300">
                        <i class="ri-image-line text-4xl text-slate-300 mb-4 block"></i>
                        <h3 class="text-slate-500 font-bold">Belum ada foto galeri.</h3>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?= $pagination ?>
        </div>
    </section>

<?php $this->load->view('_templates/public/footer'); ?>
