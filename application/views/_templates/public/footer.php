    <!-- Footer -->
    <footer class="bg-[#0B1120] text-slate-300 pt-24 pb-10 relative overflow-hidden">
        <!-- Decoration Map/Grid -->
        <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8 mb-16">
                <!-- Branding -->
                <div class="lg:col-span-2" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-8">
                        <?php if (!empty($setting->logo)): ?>
                             <img src="<?= base_url().$setting->logo ?>" alt="Logo" class="h-16 w-auto brightness-0 invert">
                        <?php else: ?>
                            <div class="h-16 w-16 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-2xl flex items-center justify-center text-white font-bold text-3xl shadow-lg shadow-emerald-900/50">
                                <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span class="font-bold text-2xl text-white block leading-none tracking-tight"><?= $setting->sekolah ?? 'School Name' ?></span>
                            <span class="text-[10px] text-emerald-400 font-bold tracking-[0.2em] uppercase mt-1 block">Official Website</span>
                        </div>
                    </div>
                    <p class="leading-relaxed mb-8 max-w-md text-slate-400 font-light text-lg">
                        <?= $setting->motto ?? 'Membangun generasi cerdas, berkarakter, dan berakhlak mulia.' ?>
                    </p>
                    <div class="flex gap-4">
                        <?php if(!empty($setting->link_fb)): ?><a href="<?= $setting->link_fb ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-all text-slate-400" title="Facebook"><i class="ri-facebook-fill text-xl"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_yt)): ?><a href="<?= $setting->link_yt ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#FF0000] hover:text-white hover:border-[#FF0000] transition-all text-slate-400" title="YouTube"><i class="ri-youtube-fill text-xl"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_ig)): ?><a href="<?= $setting->link_ig ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#E4405F] hover:text-white hover:border-[#E4405F] transition-all text-slate-400" title="Instagram"><i class="ri-instagram-fill text-xl"></i></a><?php endif; ?>
                        <?php if(!empty($setting->link_tiktok)): // Assuming this field might exist or using fallback logic ?>
                            <a href="<?= $setting->link_tiktok ?>" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#000000] hover:text-white hover:border-[#000000] transition-all text-slate-400" title="TikTok"><i class="ri-tiktok-fill text-xl"></i></a>
                        <?php else: // Placeholder for TikTok if user wants it but DB empty ?>
                             <!-- <a href="#" class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#000000] hover:text-white hover:border-[#000000] transition-all text-slate-400" title="TikTok"><i class="ri-tiktok-fill text-xl"></i></a> -->
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sitemap -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h4 class="font-bold text-white text-lg mb-8">Jelajahi</h4>
                    <ul class="space-y-4">
                        <li><a href="<?= base_url() ?>" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-emerald-400 transition-colors"></i> Beranda</a></li>
                        <li><a href="<?= base_url('sejarah') ?>" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-emerald-400 transition-colors"></i> Profil Sekolah</a></li>
                        <li><a href="<?= base_url('blog') ?>" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-emerald-400 transition-colors"></i> Berita</a></li>
                        <li><a href="<?= base_url('direktori') ?>" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-emerald-400 transition-colors"></i> Direktori Siswa</a></li>
                         <li><a href="<?= base_url('login') ?>" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group"><i class="ri-arrow-right-line text-slate-600 group-hover:text-emerald-400 transition-colors"></i> Login Portal</a></li>
                    </ul>
                </div>
                
                
                <!-- External Links (Dynamic) -->
                <div data-aos="fade-up" data-aos-delay="150">
                    <h4 class="font-bold text-white text-lg mb-8">Tautan Luar</h4>
                    <ul class="space-y-4">
                        <?php 
                        // Fetch external links directly for footer consistency across all pages
                        $ext_links = $this->db->get_where('master_link', ['status' => 1])->result();
                        if(!empty($ext_links)):
                            foreach($ext_links as $link):
                        ?>
                            <li>
                                <a href="<?= $link->url ?>" target="<?= $link->target ?>" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group">
                                    <i class="ri-external-link-line text-slate-600 group-hover:text-emerald-400 transition-colors"></i> <?= $link->judul ?>
                                </a>
                            </li>
                        <?php 
                            endforeach; 
                        else:
                        ?>
                            <li><span class="text-slate-500 italic text-sm">Belum ada tautan.</span></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Contact -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="font-bold text-white text-lg mb-8">Hubungi Kami</h4>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4 group">
                            <div class="w-10 h-10 rounded-lg bg-white/5 text-emerald-400 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 group-hover:text-white transition-colors border border-white/10">
                                <i class="ri-map-pin-line"></i>
                            </div>
                            <span class="text-sm leading-relaxed text-slate-400 group-hover:text-slate-200 transition-colors"><?= $setting->alamat ?? 'Alamat Sekolah Belum Diatur' ?></span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-lg bg-white/5 text-emerald-400 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 group-hover:text-white transition-colors border border-white/10">
                                <i class="ri-phone-line"></i>
                            </div>
                            <span class="font-medium text-slate-400 group-hover:text-slate-200 transition-colors"><?= $setting->telp ?? '-' ?></span>
                        </li>
                        <li class="flex items-center gap-4 group">
                             <div class="w-10 h-10 rounded-lg bg-white/5 text-emerald-400 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 group-hover:text-white transition-colors border border-white/10">
                                <i class="ri-mail-line"></i>
                            </div>
                            <span class="text-slate-400 group-hover:text-slate-200 transition-colors"><?= $setting->email ?? '-' ?></span>
                        </li>
                    </ul>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Init AOS with Global Settings
        AOS.init({
            disable: false, // Enable on mobile
            duration: 800, // Slightly faster for better mobile feel
            once: true,
            mirror: false,
            offset: 50, // Lower offset to trigger earlier on small screens
            easing: 'ease-out-cubic',
            anchorPlacement: 'top-bottom',
        });

        // Smart Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        if(navbar) {
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
        }
    </script>
</body>
</html>
