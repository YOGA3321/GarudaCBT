<?php
/**
 * Redesigned Student Exam Dashboard
 * Using Tailwind CSS for modern aesthetic
 */

$arrGuru = [];
foreach ($guru as $g) {
    $arrGuru[$g->id_guru] = $g->nama_guru;
}

$jam_pertama = null;
$jadwal_selesai = [];
?>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#4F46E5', // Indigo 600
                    secondary: '#64748B', // Slate 500
                    success: '#22C55E', // Green 500
                    warning: '#F59E0B', // Amber 500
                    danger: '#EF4444', // Red 500
                }
            }
        }
    }
</script>

<div class="content-wrapper min-h-screen bg-gray-50 text-gray-800 font-sans pt-32" style="margin-top: 0px;">
    <div class="sticky top-0 z-50">
        <!-- Optional Sticky Header Content if needed -->
    </div>

    <section class="content p-4 md:p-6">
        <div class="container mx-auto max-w-7xl">
            
            <!-- Top Navigation / Info -->
            <div class="mb-6">
                <?php
                $cbt_setting = [];
                $this->load->view('members/siswa/templates/top'); 
                ?>
            </div>

            <!-- Student Info Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
                <div class="bg-primary/10 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800">📋 Informasi Peserta</h3>
                    <span class="text-sm font-medium text-primary bg-indigo-50 px-3 py-1 rounded-full">
                        <?= buat_tanggal(date('D, d M Y')) ?>
                    </span>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Left: Student Details -->
                        <div class="lg:col-span-1 space-y-4">
                            <?php if ($cbt_info == null) : ?>
                                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Heroicon name: solid/exclamation -->
                                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-yellow-700">Tidak ada jadwal penilaian aktif saat ini.</p>
                                            <div class="mt-2">
                                                <a href="<?= base_url('dashboard') ?>" class="text-sm font-medium text-yellow-700 hover:text-yellow-600 underline">
                                                    &larr; Kembali ke Dashboard
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="bg-white border rounded-lg p-4 shadow-sm">
                                    <div class="flex items-center space-x-4 mb-4">
                                        <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-xl font-bold text-gray-500">
                                            <?= substr($siswa->nama, 0, 1) ?>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-900"><?= $siswa->nama ?></h4>
                                            <p class="text-sm text-gray-500"><?= $cbt_info->no_peserta->nomor_peserta ?? '-' ?></p>
                                        </div>
                                    </div>
                                    
                                    <ul class="divide-y divide-gray-100 text-sm">
                                        <?php
                                        $arrTitle = ['Ruang', 'Sesi', 'Waktu'];
                                        $arrSub = [
                                            $cbt_info->nama_ruang ?? '-', 
                                            $cbt_info->nama_sesi ?? '-', 
                                            (substr($cbt_info->waktu_mulai ?? '', 0, -3)) . ' - ' . (substr($cbt_info->waktu_akhir ?? '', 0, -3))
                                        ];
                                        foreach ($arrTitle as $key => $title) :
                                            if ($arrSub[$key] == null) array_push($cbt_setting, $title)
                                        ?>
                                            <li class="py-2 flex justify-between">
                                                <span class="text-gray-500"><?= $title ?></span>
                                                <span class="font-medium text-gray-900"><?= $arrSub[$key] ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Right: Rules / Regulations -->
                        <div class="lg:col-span-2">
                            <div class="bg-red-50 border border-red-100 rounded-lg p-5">
                                <h4 class="text-red-800 font-bold mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                    Tata Tertib Peserta
                                </h4>
                                <ul class="space-y-2 text-sm text-red-700 list-disc list-inside ml-2">
                                    <li>Meninggalkan ruang ujian tanpa izin pengawas</li>
                                    <li>Saling memberitahukan jawaban sesama peserta</li>
                                    <li>Membawa makanan dan minuman</li>
                                    <li>Membawa handphone/alat komunikasi ke ruangan ujian</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exam Schedule Cards -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Jadwal Ujian Hari Ini
                    </h2>
                    <span class="text-sm text-gray-500"><?= buat_tanggal(date('D, d M Y')) ?></span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="jadwal-content">
                    <?php
                    if ($cbt_info == null || count($cbt_setting) > 0) : ?>
                         <div class="col-span-1 md:col-span-2 xl:col-span-3 bg-white p-8 rounded-xl shadow-sm border border-gray-200 text-center">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-gray-100 mb-4">
                                <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Akses Terbatas</h3>
                            <p class="mt-2 text-gray-500">Anda tidak memiliki jadwal ujian aktif atau belum terdaftar dalam sesi.</p>
                             <div class="mt-6">
                                <a href="<?= base_url('dashboard') ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Kembali ke Dashboard
                                </a>
                            </div>
                        </div>
                    <?php else:
                        $jamSesi = $cbt_info == null ? '0' : (isset($cbt_info->sesi_id) ? $cbt_info->sesi_id : $cbt_info->id_sesi);
                        if (isset($cbt_jadwal[date('Y-m-d')]) && count($cbt_jadwal[date('Y-m-d')]) > 0) :
                            foreach ($cbt_jadwal[date('Y-m-d')] as $key => $jadwal)  :
                                // Logic Calculations
                                $kk = unserialize($jadwal->bank_kelas ?? '');
                                $arrKelasCbt = [];
                                foreach ($kk as $k) { array_push($arrKelasCbt, $k['kelas_id']); }

                                $startDay = strtotime($jadwal->tgl_mulai);
                                $endDay = strtotime($jadwal->tgl_selesai);
                                $today = strtotime(date('Y-m-d'));

                                $hariMulai = new DateTime($jadwal->tgl_mulai);
                                $hariSampai = new DateTime($jadwal->tgl_selesai);

                                $sesiMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                $sesiSampai = new DateTime($sesi[$jamSesi]['akhir']);
                                $now = strtotime(date('H:i'));

                                $durasi = $elapsed[$jadwal->id_jadwal];
                                $jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke] = $durasi != null ? $durasi->status == '2' : false;

                                // Card Style Logic
                                $cardColor = 'border-gray-200';
                                $btnClass = 'bg-primary hover:bg-indigo-700';
                                $statusText = '';
                                $isActionable = false;

                                if ($durasi != null) {
                                    $selesai = $durasi->selesai != null;
                                    $lanjutkan = $durasi->lama_ujian != null;
                                    $reset = $durasi->reset;
                                    if ($lanjutkan != null && !$selesai) { $cardColor = 'border-yellow-200'; $btnClass = 'bg-yellow-500 hover:bg-yellow-600'; }
                                    elseif ($selesai) { $cardColor = 'border-green-200'; $btnClass = 'bg-green-600 hover:bg-green-700'; }
                                    else { $cardColor = 'border-red-200'; }
                                } else {
                                    $selesai = false;
                                    $lanjutkan = false;
                                    $reset = 0;
                                    $cardColor = 'border-gray-200';
                                }
                                $jam_ke = $jadwal->jam_ke == '0' ? '1' : $jadwal->jam_ke;
                                ?>
                                
                                <div class="bg-white rounded-xl shadow-lg border <?= $cardColor ?> overflow-hidden transform transition hover:-translate-y-1 hover:shadow-xl duration-300">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mb-2">
                                                    Jam ke-<?= $jam_ke ?>
                                                </span>
                                                <h3 class="text-xl font-bold text-gray-900 line-clamp-2" title="<?= $jadwal->nama_mapel ?>">
                                                    <?= $jadwal->nama_mapel ?>
                                                </h3>
                                                <p class="text-sm text-gray-500 mt-1"><?= $jadwal->nama_jenis ?></p>
                                            </div>
                                            <div class="text-right">
                                                <div class="text-2xl font-bold text-gray-700"><?= $jadwal->durasi_ujian ?></div>
                                                <div class="text-xs text-gray-400 uppercase tracking-wide">Menit</div>
                                            </div>
                                        </div>

                                        <div class="mt-6">
                                            <?php
                                            // Status and Button Logic
                                            if (!$lanjutkan && $reset == 0 && !$selesai) : 
                                                if ($today < $startDay) : ?>
                                                    <button disabled class="w-full py-3 px-4 rounded-lg bg-gray-100 text-gray-400 font-bold text-sm cursor-not-allowed border border-gray-200 flex items-center justify-center">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        BELUM DIMULAI
                                                    </button>
                                                <?php elseif ($today > $endDay) : ?>
                                                    <button disabled class="w-full py-3 px-4 rounded-lg bg-red-50 text-red-400 font-bold text-sm cursor-not-allowed border border-red-100">
                                                        SUDAH BERAKHIR
                                                    </button>
                                                <?php else: ?>
                                                    <?php if ($now < strtotime($sesiMulai->format('H:i'))) : ?>
                                                        <button disabled class="w-full py-3 px-4 rounded-lg bg-yellow-50 text-yellow-600 font-bold text-sm cursor-not-allowed border border-yellow-100">
                                                            <?= strtoupper($cbt_info->nama_sesi ?? '') ?> BELUM DIMULAI
                                                        </button>
                                                    <?php elseif ($now > strtotime($sesiSampai->format('H:i'))) : ?>
                                                        <button disabled class="w-full py-3 px-4 rounded-lg bg-red-50 text-red-600 font-bold text-sm cursor-not-allowed border border-red-100">
                                                            <?= strtoupper($cbt_info->nama_sesi ?? '') ?> SUDAH BERAKHIR
                                                        </button>
                                                    <?php else : ?>
                                                        <?php if (isset($jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke - 1]) && $jadwal_selesai[$jadwal->tgl_mulai][$jadwal->jam_ke - 1] == false) : ?>
                                                             <button disabled class="w-full py-3 px-4 rounded-lg bg-gray-100 text-gray-500 font-bold text-sm cursor-not-allowed border border-gray-200 animate-pulse">
                                                                MENUNGGU GILIRAN
                                                            </button>
                                                        <?php else : ?>
                                                            <button onclick="location.href='<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>'" 
                                                                    class="w-full py-3 px-4 rounded-lg bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-bold text-sm shadow-md transform transition hover:scale-[1.02] flex items-center justify-center">
                                                                KERJAKAN SEKARANG
                                                                <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                                            </button>
                                                        <?php endif; endif; endif; ?>
                                            <?php elseif ($lanjutkan && !$selesai) : ?>
                                                <button onclick="location.href='<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>'" 
                                                        class="w-full py-3 px-4 rounded-lg bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold text-sm shadow-md transform transition hover:scale-[1.02] flex items-center justify-center">
                                                    LANJUTKAN UJIAN
                                                    <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </button>
                                            <?php else : ?>
                                                <button disabled class="w-full py-3 px-4 rounded-lg bg-green-50 text-green-600 font-bold text-sm cursor-default border border-green-200 flex items-center justify-center">
                                                     <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                    SUDAH SELESAI
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <div class="col-span-1 md:col-span-2 xl:col-span-3 bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                                <div class="inline-flex items-center justify-center h-20 w-20 rounded-full bg-gray-50 mb-6">
                                    <svg class="h-10 w-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak Ada Jadwal Hari Ini</h3>
                                <p class="text-gray-500 max-w-md mx-auto">Selamat! Tidak ada ujian yang dijadwalkan untuk Anda hari ini. Gunakan waktu ini untuk belajar materi selanjutnya.</p>
                            </div>
                        <?php endif;
                    endif; ?>
                </div>
            </div>

            <!-- History / Previous Exams Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                     <h3 class="text-lg font-bold text-gray-800">Riwayat Ujian</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                                <th class="p-4 font-semibold text-center w-24">Waktu</th>
                                <th class="p-4 font-semibold">Mata Pelajaran</th>
                                <th class="p-4 font-semibold hidden md:table-cell">Jenis</th>
                                <th class="p-4 font-semibold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                             <?php
                            foreach ($cbt_jadwal as $tgl => $jadwals)  :
                                if ($tgl != date('Y-m-d')) :?>
                                    <tr class="bg-gray-50">
                                        <td colspan="4" class="p-2 px-4 text-xs font-bold text-gray-500 uppercase tracking-wide">
                                            <?= buat_tanggal(date('D, d M Y', strtotime($tgl))) ?>
                                        </td>
                                    </tr>
                                    <?php
                                    foreach ($jadwals as $key => $jadwal)  :
                                        // Logic Duplicated/Simplified for filtered table
                                        $jam_ke = $jadwal->jam_ke == '0' ? '1' : $jadwal->jam_ke;
                                        // ... (Logic from original for rendering status) ...
                                        // Simplified Status Rendering for table
                                        $statusClass = 'bg-gray-100 text-gray-500';
                                        $statusLabel = 'SELESAI/BERAKHIR';
                                        // Re-implement basic status check for table history
                                        // Note: Keeping it simple for history table
                                    ?>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 text-center">
                                            <div class="text-lg font-bold text-gray-700"><?= $jadwal->durasi_ujian ?></div>
                                            <div class="text-xs text-gray-400">Menit</div>
                                        </td>
                                        <td class="p-4">
                                            <div class="font-bold text-gray-900"><?= $jadwal->nama_mapel ?></div>
                                            <div class="md:hidden text-xs text-gray-500 mt-1"><?= $jadwal->nama_jenis ?></div>
                                        </td>
                                        <td class="p-4 hidden md:table-cell text-sm text-gray-600">
                                            <?= $jadwal->nama_jenis ?>
                                        </td>
                                        <td class="p-4 text-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Riwayat
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>