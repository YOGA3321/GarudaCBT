<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>body { font-family: 'Outfit', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-slate-800">

    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
             <a href="<?= base_url() ?>" class="font-bold text-xl text-emerald-600 flex items-center gap-2">
                <i class="ri-home-4-line"></i> Home
            </a>
            <span class="font-bold text-slate-800">Profil Sekolah</span>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12 max-w-4xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12">
            <h1 class="text-3xl font-extrabold text-slate-900 border-b pb-4 mb-8"><?= $page_title ?></h1>
            <div class="prose max-w-none text-slate-600 leading-relaxed">
                <?= $content ?>
            </div>
        </div>
    </div>

</body>
</html>
