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
            <span class="font-bold text-slate-800">Direktori Peserta Didik</span>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Direktori Siswa</h1>
                <p class="text-slate-500">Daftar peserta didik aktif</p>
            </div>
            <div class="relative w-full md:w-64">
                <input type="text" placeholder="Cari siswa..." class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm">
                <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <?php if(!empty($students)): ?>
                <?php foreach($students as $student): ?>
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all border border-gray-100 p-4 text-center group">
                        <div class="w-20 h-20 mx-auto rounded-full overflow-hidden bg-gray-100 mb-3 relative">
                            <?php if(!empty($student->foto) && file_exists('uploads/foto_siswa/'.$student->foto)): ?>
                                <img src="<?= base_url('uploads/foto_siswa/'.$student->foto) ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <i class="ri-user-smile-line text-3xl"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm truncate"><?= $student->nama_siswa ?></h3>
                        <p class="text-xs text-emerald-600 font-medium"><?= $student->nama_kelas ?? 'Kelas -' ?></p>
                        <p class="text-[10px] text-gray-400 mt-1"><?= $student->nis ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-12 text-center py-20 text-gray-500">Data siswa tidak ditemukan.</div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
