<?php $this->load->view('_templates/public/header'); ?>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-[#0B1120]"></div>
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#14b8a6 1px, transparent 1px); background-size: 40px 40px;"></div>
        
        <!-- Animated Glow Blobs -->
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-teal-500/20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-cyan-500/15 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-2 px-5 rounded-full bg-teal-500/20 backdrop-blur-md text-teal-400 border border-teal-500/30 text-[11px] font-bold uppercase tracking-[0.2em] mb-6 animate-fade-in-up">
                Alumni Network
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-in-up delay-100 leading-tight">
                Verifikasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-cyan-400">Alumni</span>
            </h1>
            <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-8 animate-fade-in-up delay-200">
                Cek kelulusan dan verifikasi status alumni sekolah kami.
            </p>
            <div class="flex items-center justify-center gap-3 text-sm font-medium animate-fade-in-up delay-300">
                <a href="<?= base_url() ?>" class="text-slate-400 hover:text-white transition-colors">Beranda</a>
                <span class="text-slate-600">/</span>
                <span class="text-teal-400 font-bold">Verifikasi Alumni</span>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-16" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V3C1146.53,26.09,1055.71,74.35,985.66,92.83Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-teal-500/5 rounded-full blur-3xl pointer-events-none -translate-y-1/2 translate-x-1/2"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-xl mx-auto">
                
                <!-- Verification Form Card -->
                <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden animate-on-scroll">
                    <div class="p-8 md:p-10">
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-5 text-white text-3xl shadow-lg shadow-teal-500/30">
                                <i class="ri-user-search-line"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-slate-900 mb-2">Cek Status Alumni</h2>
                            <p class="text-slate-500 text-sm">Masukkan NISN dan Nama untuk memverifikasi status alumni.</p>
                        </div>
                        
                        <form id="alumni-form" class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">NISN <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="ri-bank-card-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" name="nisn" id="nisn" required
                                        class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 outline-none transition-all"
                                        placeholder="Masukkan 10 digit NISN" maxlength="20">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" name="nama" id="nama" required
                                        class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 outline-none transition-all"
                                        placeholder="Masukkan nama sesuai ijazah">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Lulus <span class="text-slate-400 font-normal">(Opsional)</span></label>
                                <div class="relative">
                                    <i class="ri-calendar-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <select name="tahun_lulus" id="tahun_lulus"
                                        class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-100 outline-none transition-all appearance-none bg-white">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php for($y = date('Y'); $y >= 2000; $y--): ?>
                                            <option value="<?= $y ?>"><?= $y ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" id="btn-submit"
                                class="w-full py-4 bg-gradient-to-r from-teal-500 to-teal-600 text-white font-bold rounded-xl hover:from-teal-600 hover:to-teal-700 transition-all shadow-lg shadow-teal-500/30 flex items-center justify-center gap-2">
                                <i class="ri-search-line"></i>
                                <span>Cek Status Alumni</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Result Display (Hidden by default) -->
                <div id="result-container" class="mt-8 hidden">
                    <!-- Success Result -->
                    <div id="result-success" class="bg-white rounded-3xl shadow-xl shadow-green-100/50 border-2 border-green-200 overflow-hidden hidden">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-6 text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 backdrop-blur-sm">
                                <i class="ri-check-double-line text-3xl text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white">Terverifikasi ✓</h3>
                        </div>
                        <div class="p-6 text-center">
                            <img id="result-foto" src="" alt="Foto Alumni" class="w-24 h-24 rounded-xl object-cover mx-auto mb-4 border-4 border-white shadow-lg">
                            <h4 id="result-nama" class="font-bold text-lg text-slate-900 mb-1">-</h4>
                            <p id="result-nisn" class="text-slate-500 text-sm mb-4">NISN: -</p>
                            <span class="inline-flex items-center gap-1 px-4 py-2 bg-green-100 text-green-700 text-sm font-bold rounded-full">
                                <i class="ri-verified-badge-fill"></i> Terdaftar sebagai Alumni
                            </span>
                        </div>
                    </div>
                    
                    <!-- Error Result -->
                    <div id="result-error" class="bg-white rounded-3xl shadow-xl shadow-red-100/50 border-2 border-red-200 overflow-hidden hidden">
                        <div class="p-8 text-center">
                            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ri-close-circle-line text-4xl text-red-500"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Data Tidak Ditemukan</h3>
                            <p id="result-message" class="text-slate-500 text-sm mb-6">-</p>
                            <button onclick="document.getElementById('nisn').focus()" class="px-6 py-2 text-red-600 bg-red-50 font-bold rounded-lg hover:bg-red-100 transition-colors">
                                <i class="ri-refresh-line mr-1"></i> Coba Lagi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Info Notice -->
                <div class="mt-8 p-5 bg-slate-50 rounded-2xl border border-slate-100 animate-on-scroll delay-200">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="ri-information-line text-teal-600 text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-1">Informasi Penting</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">
                                Data yang ditampilkan sudah dimasking untuk menjaga privasi. Jika membutuhkan surat keterangan alumni resmi, silakan hubungi pihak sekolah langsung.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<script>
document.getElementById('alumni-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const btn = document.getElementById('btn-submit');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="ri-loader-4-line animate-spin"></i> Mencari...';
    btn.disabled = true;
    
    const formData = new FormData(this);
    
    fetch('<?= base_url("profile/alumni_lookup") ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('result-container').classList.remove('hidden');
        
        if (data.status) {
            document.getElementById('result-success').classList.remove('hidden');
            document.getElementById('result-error').classList.add('hidden');
            document.getElementById('result-foto').src = data.data.foto;
            document.getElementById('result-nama').textContent = data.data.nama;
            document.getElementById('result-nisn').textContent = 'NISN: ' + data.data.nisn;
        } else {
            document.getElementById('result-success').classList.add('hidden');
            document.getElementById('result-error').classList.remove('hidden');
            document.getElementById('result-message').textContent = data.message;
        }
    })
    .catch(err => {
        console.error(err);
        document.getElementById('result-container').classList.remove('hidden');
        document.getElementById('result-success').classList.add('hidden');
        document.getElementById('result-error').classList.remove('hidden');
        document.getElementById('result-message').textContent = 'Terjadi kesalahan sistem. Silakan coba lagi.';
    })
    .finally(() => {
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
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
    
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

<script>
    // Intersection Observer for animations
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

<?php $this->load->view('_templates/public/footer'); ?>
