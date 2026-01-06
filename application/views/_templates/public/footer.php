<!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-10 relative overflow-hidden font-sans">
        <!-- Decoration Map/Grid -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-teal-500/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] pointer-events-none"></div>
        
        <div class="container mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-12">
                <!-- Branding -->
                <div class="lg:col-span-4 animate-on-scroll">
                    <div class="flex items-center gap-4 mb-8">
                        <?php if (!empty($setting->logo)): ?>
                             <img src="<?= base_url().$setting->logo ?>" alt="Logo" class="h-14 w-auto brightness-0 invert">
                        <?php else: ?>
                            <div class="h-14 w-14 bg-gradient-to-br from-teal-500 to-teal-500 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-teal-900/50">
                                <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span class="font-bold text-2xl text-white block leading-none tracking-tight"><?= $setting->sekolah ?? 'Nama Sekolah' ?></span>
                            <span class="text-[10px] text-teal-500 font-bold tracking-[0.2em] uppercase mt-1.5 block">Official Website</span>
                        </div>
                    </div>
                    <p class="leading-relaxed mb-8 text-slate-400 font-light text-lg">
                        <?= !empty($setting->motto) ? $setting->motto : 'Mewujudkan generasi berprestasi, berkarakter, dan berwawasan global.' ?>
                    </p>
                    <div class="flex gap-3">
                        <a href="<?= !empty($setting->link_fb) ? $setting->link_fb : '#' ?>" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all text-slate-400" title="Facebook"><i class="ri-facebook-fill text-lg"></i></a>
                        <a href="<?= !empty($setting->link_yt) ? $setting->link_yt : '#' ?>" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:bg-[#FF0000] hover:text-white hover:border-[#FF0000] transition-all text-slate-400" title="YouTube"><i class="ri-youtube-fill text-lg"></i></a>
                        <a href="<?= !empty($setting->link_ig) ? $setting->link_ig : '#' ?>" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:bg-[#E4405F] hover:text-white hover:border-[#E4405F] transition-all text-slate-400" title="Instagram"><i class="ri-instagram-fill text-lg"></i></a>
                        <a href="<?= !empty($setting->link_tiktok) ? $setting->link_tiktok : '#' ?>" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all text-slate-400" title="TikTok"><i class="ri-tiktok-fill text-lg"></i></a>
                    </div>
                </div>

                <!-- Sitemap -->
                <div class="lg:col-span-2 lg:col-start-6 animate-on-scroll delay-100">
                    <h4 class="font-bold text-white text-lg mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span> Jelajahi
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="<?= base_url() ?>" class="hover:text-teal-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-arrow-right-s-line text-slate-600 group-hover:text-teal-400 transition-colors"></i> Beranda</a></li>
                        <li><a href="<?= base_url('sejarah') ?>" class="hover:text-teal-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-arrow-right-s-line text-slate-600 group-hover:text-teal-400 transition-colors"></i> Profil Sekolah</a></li>
                        <li><a href="<?= base_url('blog') ?>" class="hover:text-teal-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-arrow-right-s-line text-slate-600 group-hover:text-teal-400 transition-colors"></i> Berita Terbaru</a></li>
                        <li><a href="<?= base_url('direktori') ?>" class="hover:text-teal-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-arrow-right-s-line text-slate-600 group-hover:text-teal-400 transition-colors"></i> Direktori Siswa</a></li>
                         <li><a href="<?= base_url('login') ?>" class="hover:text-teal-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-arrow-right-s-line text-slate-600 group-hover:text-teal-400 transition-colors"></i> Login Portal</a></li>
                    </ul>
                </div>
                
                <!-- External Links -->
                <div class="lg:col-span-2 animate-on-scroll delay-200">
                    <h4 class="font-bold text-white text-lg mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span> Tautan
                    </h4>
                    <ul class="space-y-3">
                        <?php 
                        // Try fetch
                        $ext_links = $this->db->get_where('master_link', ['status' => 1])->result();
                        
                        // Fallback manual links if empty
                        if(empty($ext_links)): 
                        ?>
                            <li><a href="https://kemdikbud.go.id" target="_blank" class="hover:text-blue-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-external-link-line text-slate-600 group-hover:text-blue-400 transition-colors"></i> Kemdikbud</a></li>
                            <li><a href="https://dapo.dikdasmen.kemdikbud.go.id" target="_blank" class="hover:text-blue-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-external-link-line text-slate-600 group-hover:text-blue-400 transition-colors"></i> Dapodik</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition-colors flex items-center gap-2 group text-sm"><i class="ri-external-link-line text-slate-600 group-hover:text-blue-400 transition-colors"></i> E-Rapor</a></li>
                        <?php else: ?>
                            <?php foreach($ext_links as $link): ?>
                                <li>
                                    <a href="<?= $link->url ?>" target="<?= $link->target ?>" class="hover:text-blue-400 transition-colors flex items-center gap-2 group text-sm">
                                        <i class="ri-external-link-line text-slate-600 group-hover:text-blue-400 transition-colors"></i> <?= $link->judul ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="lg:col-span-3 animate-on-scroll delay-300">
                    <h4 class="font-bold text-white text-lg mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span> Hubungi Kami
                    </h4>
                    <ul class="space-y-5">
                        <li class="flex items-start gap-4 group">
                            <div class="w-10 h-10 rounded-lg bg-slate-800 text-teal-500 flex items-center justify-center flex-shrink-0 group-hover:bg-teal-500 group-hover:text-white transition-colors border border-slate-700">
                                <i class="ri-map-pin-line"></i>
                            </div>
                            <span class="text-sm leading-relaxed text-slate-400 group-hover:text-slate-200 transition-colors pt-1">
                                <?= !empty($setting->alamat) ? $setting->alamat : 'Jl. Pendidikan No. 1, Kota Belajar, Indonesia' ?>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-lg bg-slate-800 text-teal-500 flex items-center justify-center flex-shrink-0 group-hover:bg-teal-500 group-hover:text-white transition-colors border border-slate-700">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span class="font-medium text-slate-400 group-hover:text-slate-200 transition-colors text-sm">
                                <?= !empty($setting->telp) ? $setting->telp : '(021) 1234-5678' ?>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 group">
                             <div class="w-10 h-10 rounded-lg bg-slate-800 text-teal-500 flex items-center justify-center flex-shrink-0 group-hover:bg-teal-500 group-hover:text-white transition-colors border border-slate-700">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span class="text-slate-400 group-hover:text-slate-200 transition-colors text-sm">
                                <?= !empty($setting->email) ? $setting->email : 'info@sekolahku.sch.id' ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-sm text-center md:text-left text-slate-500">
                    &copy; <?= date('Y') ?> <span class="font-bold text-slate-300"><?= $setting->sekolah ?? 'Sekolah' ?></span>. All rights reserved.
                </p>
                <div class="flex items-center gap-6 text-sm font-medium">
                    <a href="#" class="text-slate-500 hover:text-teal-400 transition-colors">Privacy Policy</a>
                    <a href="#" class="text-slate-500 hover:text-teal-400 transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Local JS Assets -->
    <script src="<?= base_url('assets/homepage/js/aos.js') ?>"></script>
    <script src="<?= base_url('assets/homepage/js/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/homepage/js/homepage.js?v='.time()) ?>"></script>
</body>
</html>