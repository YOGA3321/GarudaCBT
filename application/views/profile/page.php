<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - <?= $setting->sekolah ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'], },
                    colors: { primary: '#059669', }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm border-b border-slate-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="<?= base_url() ?>" class="flex items-center gap-3">
                 <?php if (!empty($setting->logo_kiri)): ?>
                    <img src="<?= base_url().$setting->logo_kiri ?>" alt="Logo" class="h-10 w-auto">
                <?php else: ?>
                    <div class="h-10 w-10 bg-gradient-to-br from-primary to-emerald-400 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        <?= substr($setting->sekolah ?? 'S', 0, 1) ?>
                    </div>
                <?php endif; ?>
                <div class="hidden md:block leading-tight">
                    <h1 class="font-bold text-lg text-slate-900"><?= $setting->sekolah ?? 'School Name' ?></h1>
                    <p class="text-[10px] text-primary font-bold tracking-[0.2em] uppercase">Official Website</p>
                </div>
            </a>
            
            <a href="<?= base_url() ?>" class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-primary font-bold transition-all flex items-center gap-2">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>
    </nav>

    <!-- Header -->
    <div class="bg-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#059669 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="text-emerald-400 font-bold tracking-widest uppercase text-sm mb-2 block"><?= $title ?></span>
            <h1 class="text-4xl md:text-5xl font-black text-white"><?= $page_title ?></h1>
        </div>
    </div>

    <div class="container mx-auto px-6 py-12 max-w-4xl flex-grow">
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-12">
            <div class="prose max-w-none text-slate-600 leading-relaxed prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-primary">
                <?= $content ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-8 mt-auto">
        <div class="container mx-auto px-6 text-center text-slate-500 text-sm">
            &copy; <?= date('Y') ?> <span class="font-bold text-slate-800"><?= $setting->sekolah ?></span>. All rights reserved.
        </div>
    </footer>

</body>
</html>
