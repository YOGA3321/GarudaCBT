<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */
?>
<!-- Tailwind CSS & Config -->
<script src="<?= base_url('assets/app/js/tailwind.js') ?>"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'], // Modern font stack
                },
                colors: {
                    teal: {
                        50: '#f0fdfa',
                        100: '#ccfbf1',
                        200: '#99f6e4',
                        300: '#5eead4',
                        400: '#2dd4bf',
                        500: '#14b8a6', // Primary Brand Color
                        600: '#0d9488',
                        700: '#0f766e',
                        800: '#115e59',
                        900: '#134e4a',
                    },
                    slate: {
                        800: '#1e293b',
                        900: '#0f172a', // Dark Background
                    }
                }
            }
        }
    }
</script>

<style>
    /* Custom Scrollbar for Exam Content */
    .custom-scrollbar::-webkit-scrollbar { width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    
    body { background-color: #f8fafc; color: #334155; }
    
    /* Hide default radio */
    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0; }
</style>

<div class="min-h-screen bg-slate-50 relative pb-20">
    <!-- Header Section -->

    <header class="sticky top-0 z-50 bg-gradient-to-r from-teal-600 to-emerald-600 shadow-lg shadow-teal-900/10 border-b border-teal-500/30 transition-all duration-300 backdrop-blur-md supports-[backdrop-filter]:bg-teal-600/95">
        <div class="container mx-auto px-4 md:px-6 h-16 flex items-center justify-between">
            <!-- Left: Logo & Brand -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm shadow-inner border border-white/20 flex items-center justify-center text-white font-bold transition-transform hover:scale-105 active:scale-95">
                    <img src="<?= base_url() ?>/assets/img/garuda_circle.png" class="w-7 h-7 object-contain drop-shadow-md brightness-0 invert">
                </div>
                <div>
                    <h1 class="text-lg md:text-xl font-black text-white tracking-tight leading-none drop-shadow-sm font-sans">GarudaCBT</h1>
                    <span class="text-[10px] md:text-xs font-bold text-teal-100 tracking-[0.2em] uppercase opacity-90 block mt-0.5">Exam Portal</span>
                </div>
            </div>

            <!-- Right: Student Profile -->
            <div class="flex items-center gap-3 pl-1 pr-1.5 py-1 rounded-full bg-teal-800/20 border border-teal-400/20 backdrop-blur-sm sm:pl-3 sm:pr-4 sm:py-1.5 transition-colors hover:bg-teal-800/30 hover:border-teal-400/30">
                <div class="hidden sm:flex flex-col text-right mr-1">
                    <span class="text-xs md:text-sm font-bold text-white leading-tight drop-shadow-sm"><?= $siswa->nama ?></span>
                    <span class="text-[10px] font-medium text-teal-100 opacity-80"><?= $siswa->nama_kelas ?></span>
                </div>
                <div class="w-8 h-8 md:w-9 md:h-9 rounded-full bg-slate-200 overflow-hidden border-2 border-white/30 shadow-sm relative group">
                     <img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" class="w-full h-full object-cover transition-transform group-hover:scale-110">
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="container mx-auto px-4 md:px-6 py-8 max-w-5xl">
        <!-- Info Bar (Timer & Nomor) -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <span class="text-slate-500 font-bold uppercase tracking-wider text-sm">Nomor Soal</span>
                <div id="nomor-soal" class="w-14 h-14 flex items-center justify-center bg-teal-600 text-white text-2xl font-black rounded-2xl shadow-lg shadow-teal-500/30 transition-transform hover:scale-105"></div>
            </div>
            
            <div class="flex items-center gap-3 bg-white p-2 rounded-2xl shadow-sm border border-slate-200">
                <div class="px-5 py-2.5 bg-rose-50 text-rose-600 rounded-xl font-bold flex items-center gap-2 border border-rose-100">
                    <i class="fa fa-clock-o animate-pulse"></i>
                    <span id="timer" class="text-lg tabular-nums">00:00:00</span>
                </div>
                <button data-toggle="modal" data-target="#daftarModal" class="px-5 py-2.5 hover:bg-slate-100 rounded-xl text-slate-600 font-bold transition-all border border-transparent hover:border-slate-200 flex items-center gap-2">
                    <i class="fa fa-th-large"></i> <span class="hidden sm:inline">Daftar Soal</span>
                </button>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden relative transition-all duration-300">
            <!-- Loading Overlay -->
            <div id="loading" class="absolute inset-0 bg-white/90 backdrop-blur-sm z-50 flex flex-col items-center justify-center transition-opacity duration-300">
                <div class="w-16 h-16 border-4 border-slate-200 border-t-teal-500 rounded-full animate-spin mb-4"></div>
                <span class="text-slate-800 font-bold animate-pulse tracking-wide">MEMUAT SOAL...</span>
            </div>

            <div class="p-6 md:p-12">
                <div class="zoom-tool-bar mb-6 flex justify-end"></div>
                
                <div class="konten-soal-jawab">
                    <!-- Soal Text/Image -->
                    <div id="konten-soal" class="prose prose-lg max-w-none text-slate-700 mb-10 leading-relaxed font-medium"></div>
                    
                    <!-- Form Jawaban -->
                    <?= form_open('jawab', array('id' => 'jawab')) ?>
                        <input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
                        <input type="hidden" name="jadwal" value="<?= $jadwal->id_jadwal ?>">
                        <input type="hidden" name="bank" value="<?= $jadwal->id_bank ?>">
                        
                        <!-- Area Jawaban (Will be populated by JS) -->
                        <div id="konten-jawaban" class="w-full"></div>
                    <?= form_close() ?>
                </div>
            </div>

            <!-- Footer Navigation -->
            <div class="bg-slate-50/50 border-t border-slate-100 p-6 md:px-12 py-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <button id="prev" onclick="prevSoal()" class="w-full sm:w-auto px-8 py-4 rounded-xl border-2 border-slate-200 text-slate-600 font-bold hover:bg-white hover:border-teal-500 hover:text-teal-600 transition-all disabled:opacity-50 disabled:cursor-not-allowed group">
                    <i class="fa fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i> Sebelumnya
                </button>
                
                <div class="flex gap-2 w-full sm:w-auto">
                    <button id="timer-selesai" disabled class="btn btn-oval-sm btn-danger btn-disabled d-none"></button>
                    <button id="next" onclick="nextSoal()" class="w-full sm:w-auto flex-1 px-10 py-4 rounded-xl bg-teal-600 text-white font-bold shadow-lg shadow-teal-500/30 hover:bg-teal-700 hover:-translate-y-1 transition-all flex items-center justify-center gap-3 group">
                        <span id="text-next">Selanjutnya</span> <i class="fa fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel">Daftar Nomor Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="konten-modal">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'up')) ?>
<input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
<input type="hidden" name="jadwal" value="<?= $jadwal->id_jadwal ?>">
<input type="hidden" name="bank" value="<?= $jadwal->id_bank ?>">
<?= form_close() ?>

<script src="<?= base_url() ?>/assets/app/js/redirect.js"></script>
<script src="<?= base_url() ?>/assets/app/js/linker-list.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ElementQueries.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ResizeSensor.js"></script>
<script src="<?= base_url() ?>/assets/plugins/katex/katex.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/content-zoom-slider.js"></script>

<script>
    var elem = document.documentElement;
    history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
    window.addEventListener('popstate', function (event) {
        loadSoalNomor(1);
    });
    const infoJadwal = JSON.parse(JSON.stringify(<?= json_encode($jadwal) ?>));
    let nomorSoal = 0;
    let idSoal, idSoalSiswa, jenisSoal, modelSoal, typeSoal;
    let jawabanSiswa, jawabanBaru = null, jsonJawaban;
    let nav = 0;
    let soalTerjawab = 0, soalTotal = 0;
    let timerOut;
    let timerSelesai;
    //const durasi = JSON.parse(JSON.stringify(<?= json_encode($elapsed) ?>));
    let elapsed = '0';
    let h, m, s;
    var message = "Jangan menggunakan klik kanan!";

    let tick = 0;
    const _second = 1000,
        _minute = _second * 60,
        _hour = _minute * 60,
        _day = _hour * 24;
    const durasiUjian = Number(infoJadwal.durasi_ujian);
    let dif;
    let fieldLinks;
    let zoomClicked = 1;
    var arrSize = [];

    $(document).ready(function () {
        $(document).keydown(function (event) {
            //console.log('press', event.keyCode);
            var charCode = event.charCode || event.keyCode || event.which;
            if (charCode == 27 || charCode == 91 || charCode == 92) {
                return false;
            }
        });

        document.onmousedown = rtclickcheck;
        swal.fire({
            title: 'Peraturan Ujian',
            html: 'Kerjakan soal dengan serius,<br>jangan nyontek!',
            // showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                openFullscreen();
            }
        });

        $('#jawab').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var siswa = $('#up').find('input[name="siswa"]').val();
            var bank = $('#up').find('input[name="bank"]').val();


            let formData = new FormData($('#jawab')[0]);
            formData.append('siswa', siswa)
            formData.append('bank', bank)

            const jns = jsonJawaban['jenis']
            for (const key in jsonJawaban) {
                if ((jns==='2' || jns==='3') && key === 'jawaban_siswa') {
                    formData.append('data['+key+']', JSON.stringify(jsonJawaban[key]))
                } else {
                    formData.append('data['+key+']', jsonJawaban[key])
                }
            }

            $.ajax({
                url: base_url + 'siswa/savejawaban',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    soalTerjawab = response.soal_terjawab;
                    loadSoalNomor(nav);
                },
                error: function (xhr, error, status) {
                    showDangerToast('ERROR!');
                    console.log(xhr.responseText);
                }
            });
        });

        $(".konten-soal-jawab").contentZoomSlider({
            toolContainer: ".zoom-tool-bar",
        });

        loadSoalNomor(1);
    });

    function loadSoalNomor(nomor) {
        if (nomor == nomorSoal) {
            return;
        }
        var dataPost = $('#up').serialize() + '&nomor=' + nomor + '&timer=' + $('#timer').text() + '&elapsed=' + elapsed;
        //console.log('res', dataPost);
        if (soalTotal === 0 || nomor <= parseInt(soalTotal)) {
            $.ajax({
                type: 'POST',
                url: base_url + 'siswa/loadnomorsoal',
                data: dataPost,
                success: function (data) {
                    console.log('load soal', data);
                    $('#loading').addClass('d-none');
                    setKonten(data);
                }, error: function (xhr, error, status) {
                    showDangerToast('ERROR!');
                    console.log(xhr.responseText);
                }
            });
        } else {
            selesai();
        }
    }

    function loadSoal(datas) {
        $('#daftarModal').modal('hide').data('bs.modal', null);
        $('#daftarModal').on('hidden', function () {
            $(this).data('modal', null);
        });

        nav = $(datas).data('nomorsoal');
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function setKonten(data) {
        //console.log('max_jawaban', data.max_jawaban);
        idSoal = data.soal_id;
        idSoalSiswa = data.soal_siswa_id;
        nomorSoal = parseInt(data.soal_nomor);
        jenisSoal = data.soal_jenis;
        soalTerjawab = data.soal_terjawab;
        soalTotal = data.soal_total;

        jsonJawaban = {};
        jawabanBaru = null;
        jawabanSiswa = data.soal_jawaban_siswa != null ? data.soal_jawaban_siswa : '';
        if ($.isArray(jawabanSiswa)) jawabanSiswa.sort();

        if (nomorSoal === 1) {
            $('#prev').attr('disabled', 'disabled');
        } else {
            $('#prev').removeAttr('disabled');
        }

        $('#nomor-soal').html(nomorSoal);
        $('#konten-soal').html(data.soal_soal);
        var jenis = data.soal_jenis;
        var html = '';
        
        // Wrapper Grid
        html += '<div class="grid grid-cols-1 gap-4">';

        if (jenis == "1") {
            $.each(data.soal_opsi, function (key, opsis) {
                if (opsis.valAlias != "") {
                    html += '<label class="group relative block cursor-pointer select-none transition-transform active:scale-[0.99]">' +
                        '<input type="radio" name="jawaban" value="' + opsis.value.toUpperCase() + '"' +
                        ' data-jawabansiswa="' + opsis.value.toUpperCase() + '"' +
                        ' data-jawabanalias="' + opsis.valAlias.toUpperCase() + '"' +
                        ' onclick="submitJawaban(this)" ' + opsis.checked + ' class="peer sr-only">' +
                        
                        '<div class="flex items-center p-4 md:p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all duration-200 hover:bg-slate-50 hover:border-teal-300 peer-checked:border-teal-500 peer-checked:bg-teal-50/50 peer-checked:shadow-lg peer-checked:shadow-teal-500/10 peer-checked:ring-2 peer-checked:ring-teal-500 peer-checked:ring-offset-2">' +
                            // Alias Badge (A/B/C)
                            '<div class="flex-none w-10 h-10 md:w-12 md:h-12 rounded-xl bg-slate-100 text-slate-600 font-bold text-lg flex items-center justify-center transition-colors group-hover:bg-teal-500 group-hover:text-white peer-checked:bg-teal-600 peer-checked:text-white mr-4 md:mr-6 shadow-sm">' + 
                                opsis.valAlias.toUpperCase() + 
                            '</div>' +
                            // Answer Text
                            '<div class="flex-grow text-slate-700 font-medium text-base md:text-lg leading-relaxed peer-checked:text-slate-900">' + 
                                opsis.opsi + 
                            '</div>' +
                            // Check Icon
                            '<div class="hidden peer-checked:block text-teal-600 pl-4">' +
                                '<i class="fa fa-check-circle text-2xl"></i>' +
                            '</div>' +
                        '</div>' +
                    '</label>';
                }
            });
            html += '</div>'; // Close Grid Wrapper
            $('#konten-jawaban').html(html);

        } else if (jenis == "2") {
            $.each(data.soal_opsi, function (key, opsis) {
                html += '<label class="group relative block cursor-pointer select-none transition-transform active:scale-[0.99]">' +
                        '<input type="checkbox" id="check'+key+'" name="jawaban" value="' + opsis.value.toUpperCase() + '"' +
                        ' data-max="' + data.max_jawaban[0] + '"' +
                        ' data-jawabansiswa="' + opsis.value.toUpperCase() + '"' +
                        ' onclick="submitJawaban(this)" ' + opsis.checked + ' class="peer sr-only">' +
                        
                        '<div class="flex items-center p-4 md:p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all duration-200 hover:bg-slate-50 hover:border-teal-300 peer-checked:border-teal-500 peer-checked:bg-teal-50/50 peer-checked:shadow-lg peer-checked:shadow-teal-500/10 peer-checked:ring-2 peer-checked:ring-teal-500 peer-checked:ring-offset-2">' +
                            // Checkbox Fake Icon
                            '<div class="flex-none w-8 h-8 rounded-lg border-2 border-slate-300 bg-white mr-4 md:mr-6 flex items-center justify-center transition-all peer-checked:bg-teal-500 peer-checked:border-teal-500 text-white">' + 
                                '<i class="fa fa-check opacity-0 peer-checked:opacity-100 transition-opacity"></i>' +
                            '</div>' +
                            // Answer Text
                            '<div class="flex-grow text-slate-700 font-medium text-base md:text-lg leading-relaxed peer-checked:text-slate-900">' + 
                                opsis.opsi + 
                            '</div>' +
                        '</div>' +
                    '</label>';
            });
            html += '</div>'; // Close Grid Wrapper
            $('#konten-jawaban').html(html);

        } else if (jenis == "3") {
            modelSoal = data.soal_opsi.model;
            typeSoal = data.soal_opsi.type;
            let konten = $('#konten-jawaban')
            konten.html('');

            const dataJawab = data.soal_opsi
            const copy = $.extend(true, {}, dataJawab);
            
            let arrData = [copy.tabel[0]]
            if (Array.isArray(copy.tbody)) {
                for (let i = 0; i < copy.tbody.length; i++) {
                    let val = copy.tbody[i]
                    for (let j = 0; j < val.length; j++) {
                        if (j === 0) val[j] = copy.tabel[i+1][0]
                    }
                    arrData.push(val)
                }
            } else {
                for (let i = 0; i < copy.tabel.length; i++) {
                    let val = copy.tbody[i]
                    if (val) {
                        for (let j = 0; j < val.length; j++) {
                            if (j === 0) val[j] = copy.tabel[i][0]
                        }
                        arrData.push(val)
                    }
                }
            }

            let keys = 0
            let dataMax = {}
            $.each(data.max_jawaban, function (key, val) {
                dataMax[keys] = val
                keys ++
            })

            let objJawaban = {
                jawaban: arrData,
                max: dataMax,
                model: modelSoal,
                type: typeSoal,
            }
            
            konten.linkerList({
                enableEditor: false,
                data: objJawaban,
                viewMode: '2',
                id: nomorSoal,
                callback: function (id, data, hasLinks, isOffset) {
                    if (isOffset !== '0') {
                        $.toast({
                            heading: 'Warning',
                            text: 'Maksimal <b>' + isOffset + ' jawaban',
                            showHideTransition: 'slide',
                            icon: 'error',
                            loaderBg: '#f2a654',
                            position: 'bottom-center'
                        })
                    } else {
                        submitJawaban(data)
                    }
                }
            });
        } else if (jenis == "4") {
            html += '<div class="w-full max-w-2xl">' +
                '<label class="block text-slate-500 font-bold uppercase tracking-wider text-xs mb-3">Jawaban Singkat:</label>' +
                '<input id="jawaban-isian" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-200 rounded-xl text-slate-800 font-medium focus:bg-white focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all outline-none placeholder:text-slate-400" type="text"' +
                ' name="jawaban" value="' + jawabanSiswa + '"' +
                ' placeholder="Ketik jawaban Anda di sini..." autocomplete="off"/>' +
                '</div>';
            html += '</div>'; // Close Grid Wrapper
            $('#konten-jawaban').html(html);

            $("#jawaban-isian").on('change keyup paste', function () {
                submitJawaban(null);
            });
        } else {
            html += '<div class="w-full">' +
                '<label class="block text-slate-500 font-bold uppercase tracking-wider text-xs mb-3">Jawaban Uraian:</label>' +
                '<div class="bg-white rounded-xl border-2 border-slate-200 p-1 focus-within:border-teal-500 transition-colors">' +
                '<textarea id="jawaban-essai" class="w-full" type="text"' +
                ' name="jawaban" rows="6"' +
                ' placeholder="Tulis jawaban disini">' + jawabanSiswa + '</textarea>' +
                '</div>' +
                '</div>';
            html += '</div>'; // Close Grid Wrapper
            $('#konten-jawaban').html(html);

            $('#jawaban-essai').summernote({
                placeholder: 'Tulis Jawaban disini, tidak dibolehkan copy paste!',
                tabsize: 2,
                minHeight: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'math']],
                    ['cleaner',['cleaner']],
                ],
                callbacks: {
                    onKeyup: function(e) {
                        submitJawaban(null);
                    },
                    onChange: function(contents, $editable) {
                        submitJawaban(null);
                    }
                }
            });
        }

        $('#konten-modal').html(data.soal_modal);

        var $imgs = $('.konten-soal-jawab').find('img');
        $.each($imgs, function () {
            var curSrc = $(this).attr('src');
            if (!curSrc.includes("uploads")) return;
            var newSrc = '';
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                newSrc = base_url + curSrc;
                $(this).attr('src', newSrc);
            } else if (curSrc.indexOf(base_url) === -1) {
                var pathUpload = 'uploads';
                var forReplace = curSrc.split(pathUpload);
                newSrc = base_url + pathUpload + forReplace[1];
                $(this).attr('src', newSrc);
				$(this).removeAttr('alt');
            }
            $(this).on('load', function () {
                if ($(this).height() > 50) {
                    $(this).addClass('img-fluid');
                }
            });
        });

        $('video').css({'width': '100%', 'max-height': '100%'});

        $('.check').change(function (e) {
            var row = $(e.target).closest('tr');
            var isChecked = $(row).find("input:checked");
            var max = $(e.target).data('max');
            if (isChecked.length > max) {
                $(e.target).prop('checked', !$(this).prop('checked'));
                $.toast({
                    heading: 'Warning',
                    text: 'Maksimal <b>' + max + ' jawaban',
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'bottom-center'
                })
            } else {
                submitJawaban(null);
            }
        });

        if (!data.durasi) {
            window.location.href = base_url + 'siswa/cbt';
        } else {
            setElapsed(data.durasi);

            if (timerSelesai) {
                clearTimeout(timerSelesai);
                timerSelesai = null;
            }

            var next = $('#next');
            next.removeAttr('disabled');
            var txtnext = $('#text-next');
            $('#ic-btn').remove();

            if (soalTotal === nomorSoal && data.durasi.mulai != null && data.durasi.mulai != '0') {
                next.removeClass('btn-primary');
                next.addClass('btn-success');
                next.append('<i id="ic-btn" class="fa fa-check-circle"></i>');
                txtnext.html('<b>Selesai</b>');
                setTimerSelesai(next, data.durasi);
            } else {
                $('#timer-selesai').addClass('d-none');
                next.removeClass('d-none');
                next.removeClass('btn-success');
                next.addClass('btn-primary');
                next.append('<i id="ic-btn" class="fa fa-arrow-circle-right"></i>');
                txtnext.html('<b>Soal Berikutnya</b>');
            }
        }

        arrSize = [];
    }

    function setElapsed(durasi) {
        elapsed = durasi.lama_ujian == null || durasi.lama_ujian == '0' ? "00:00:00" : durasi.lama_ujian;
        createTimerCountdown(durasiUjian, elapsed.split(':'), function (isOver, remaining, onGoing) {
            $('#timer').html(remaining);
            elapsed = onGoing;
            if (isOver) {
                $('#prev').attr('disabled', 'disabled');
                $('#next').attr('disabled', 'disabled');

                var siswa = $('#up').find('input[name="siswa"]').val();
                var bank = $('#up').find('input[name="bank"]').val();
                var jadwal = $('#up').find('input[name="jadwal"]').val();

                $.ajax({
                    url: base_url + 'siswa/savejawaban',
                    method: 'POST',
                    data: $('#jawab').serialize() + '&jadwal=' + jadwal + '&siswa=' + siswa + '&bank=' + bank +
                        '&waktu=' + $('#timer').text() + '&elapsed=' + elapsed + '&data=' + JSON.stringify(jsonJawaban),
                    success: function (response) {
                        $('.konten-soal-jawab').html('');
                        dialogWaktu();
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
                    }
                });
            }
        })
    }

    function nextSoal() {
        $('#next').attr('disabled', 'disabled');
        $('#loading').removeClass('d-none');
        nav = (nomorSoal + 1);
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function setTimerSelesai(next, durasi) {
        const perdetik = 1000;
        const permenit = 60 * perdetik;
        const perjam = 60 * permenit;
        const t_dur = Number(infoJadwal.jarak) * (1000 * 60);

        const elapsed = (durasi.lama_ujian == null || durasi.lama_ujian == '0' ? "00:00:00" : durasi.lama_ujian).split(':');
        let t_jam = Number(elapsed[0]);
        let t_mnt = Number(elapsed[1]);
        let t_dtk = Number(elapsed[2]);

        const btnTimer = $('#timer-selesai');
        setTimer();

        function setTimer() {
            if (timerSelesai) {
                clearTimeout(timerSelesai);
                timerSelesai = null;
            }

            const elapsedMicro = (t_jam * perjam) + (t_mnt * permenit) + (t_dtk * perdetik);
            const t_remaining = t_dur - elapsedMicro;
            if (t_remaining <= 0) {
                next.removeClass('d-none');
                btnTimer.addClass('d-none');
            } else {
                // elapsed
                t_dtk++;
                if (t_dtk > 59) {
                    t_dtk = 0;
                    t_mnt++;
                }
                if (t_mnt > 59) {
                    t_mnt = 0;
                    t_jam++;
                }

                // remaining
                const r_jam = Math.floor(t_remaining / perjam);
                const r_mnt = Math.floor((t_remaining % perjam) / permenit);
                const r_dtk = Math.floor((t_remaining % permenit) / perdetik);
                next.addClass('d-none');
                btnTimer.removeClass('d-none');
                btnTimer.html(zeroPad(r_jam) + ':' + zeroPad(r_mnt) + ':' + zeroPad(r_dtk));

                timerSelesai = setTimeout(setTimer, 1000);
            }
        }
    }

    function prevSoal() {
        $('#prev').attr('disabled', 'disabled');
        $('#loading').removeClass('d-none');
        nav = (nomorSoal - 1);
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function updateModal(jwb) {
        var badges = $('#konten-modal').find(`#badge${nomorSoal}`);
        var btn = $('#konten-modal').find(`#btn${nomorSoal}`);
        btn.removeClass("btn-outline-secondary");
        btn.addClass("btn-primary");
        if (jenisSoal == 1) {
            if (badges.length) {
                $(`#badge${nomorSoal}`).text(jwb)
            } else {
                var badge = '<div id="badge' + nomorSoal + '" class="badge badge-pill badge-success border border-dark text-yellow"' +
                    ' style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' +
                    jwb +
                    '</div>';
                $(`#box${nomorSoal}`).append(badge);
            }
        } else {
            if (!badges.length) {
                var badge = '<div id="badge' + nomorSoal + '" class="badge badge-pill badge-success border border-dark"' +
                    ' style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' +
                    '&check;</div>';
                $(`#box${nomorSoal}`).append(badge);
            }
        }
    }

    function submitJawaban(opsi) {
        var jawaban_Siswa = '', jawaban_Alias = '';
        if (jenisSoal == 1) {
            jawaban_Siswa = $(opsi).data('jawabansiswa');
            jawaban_Alias = $(opsi).data('jawabanalias');
        } else if (jenisSoal == 2) {
            var isChecked = $('#konten-jawaban').find("input:checked");
            var max = $(opsi).data('max');
            //console.log('max:'+max, 'checked:'+isChecked.length);
            if (isChecked.length > max) {
                $(opsi).prop('checked', !$(opsi).prop('checked'));
                $.toast({
                    heading: 'Warning',
                    text: 'Maksimal <b>' + max + ' jawaban',
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'bottom-center'
                });
                return;
            } else {
                var selected = [];
                $('#konten-jawaban input:checked').each(function () {
                    selected.push($(this).val());
                });
                jawaban_Siswa = selected;
            }
        } else if (jenisSoal == 3) {
            jawaban_Siswa = opsi
        } else if (jenisSoal == 4){
            jawaban_Siswa = $('#jawaban-isian').val();
        } else {
            jawaban_Siswa = $('#jawaban-essai').summernote('code');
        }
        jawabanBaru = jawaban_Siswa;
        if (jenisSoal == 2) {
            if ($.isArray(jawabanBaru)) jawabanBaru.sort();
        }

        updateModal(jawaban_Alias);
        jsonJawaban = createJsonJawaban(jawaban_Alias, jawaban_Siswa);
        console.log('getJawaban', jsonJawaban)
    }

    function createJsonJawaban(jawab_Alias, jawab_Siswa) {
        var siswa = $('#up').find('input[name="siswa"]').val();
        var jadwal = $('#up').find('input[name="jadwal"]').val();
        var bank = $('#up').find('input[name="bank"]').val();

        var item = {};
        item ["no_soal_alias"] = nomorSoal;
        item ["jawaban_alias"] = jawab_Alias;
        item ["jawaban_siswa"] = jawab_Siswa;
        item ["jenis"] = jenisSoal;
        item ["id_soal"] = idSoal;
        item ["id_soal_siswa"] = idSoalSiswa;
        item ["id_jadwal"] = jadwal;
        item ["id_bank"] = bank;
        item ["id_siswa"] = siswa;

        return item;
    }

    function getDataTable() {
        var tbl = $('#table-jodohkan tr').get().map(function (row) {
            var $tables = [];

            $(row).find('th').get().map(function (cell) {
                var klm = $(cell).text().trim();
                $tables.push(klm == "" ? "#" : encode(klm));
            });

            $(row).find('td').get().map(function (cell) {
                if ($(cell).children('input').length > 0) {
                    $tables.push($(cell).find('input').prop("checked") === true ? "1" : "0");
                } else {
                    $tables.push(encode($(cell).text().trim()))
                }
            });

            return $tables;
        });
        return tbl;
    }

    function convertTable(data) {
        const head = []
        const body = []
        $.each(data.tabel, function (idx, val) {
            if (idx === 0) {
                $.each(val, function (id, vl) {
                    if (vl !== "#") head.push(encode(vl))
                })
            } else {
                $.each(val, function (id, vl) {
                    if (id === 0) body.push(encode(vl))
                })
            }
        })
        var kanan = data.thead;
        var kiri = [];
        $.each(data.tbody, function (i, v) {
            kiri.push(encode(v.shift()));
        });
        kanan.shift();

        var linked = [];
        $.each(data.tbody, function (n, arv) {
            $.each(arv, function (t, v) {
                if (v == '1') {
                    var it = {};
                    it['from'] = encode(body[n]);
                    it['to'] = encode(head[t]);
                    linked.push(it);
                }
            });
        });
        var item = {};
        item['type'] = data.type;
        item['jawaban'] = [body, head];
        item['linked'] = linked;
        return item;
    }

    function convertTableToList(data) {
        var kanan = data.thead;
        //console.log('kanan', kanan);
        var kiri = [];
        $.each(data.tbody, function (i, v) {
            kiri.push(decode(v.shift()));
        });
        kanan.shift();
        //console.log('kiri', kiri);
        $.each(kanan, function (i, v) {
            kanan[i] = (decode(v));
        });

        var linked = [];
        $.each(data.tbody, function (n, arv) {
            $.each(arv, function (t, v) {
                if (v == '1') {
                    var it = {};
                    it['from'] = decode(kiri[n]);
                    it['to'] = decode(kanan[t]);
                    linked.push(it);
                }
            });
        });
        var item = {};
        item['type'] = data.type;
        item['jawaban'] = [kiri, kanan];
        item['linked'] = linked;
        //console.log('test', item);
        return item;
    }

    function getListData() {
        var kolom = [];
        var baris = [];
        $(".FL-left li").each(function () {
            baris.push(encode($(this).text()));
        });
        $(".FL-right li").each(function () {
            kolom.push(encode($(this).text()));
        });
        return [kolom, baris];
    }

    function selesai() {
        if (soalTotal === soalTerjawab) {
            swal.fire({
                title: "Kamu yakin?",
                text: "Kamu akan menyelesaikan ujian",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Selesaikan!"
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: base_url + 'siswa/selesaiujian',
                        method: "POST",
                        data: $('#up').serialize(),
                        success: function (respon) {
                            $('#next').removeAttr('disabled');
                            $('#loading').addClass('d-none');
                            //console.log(respon);
                            if (respon.status) {
                                window.location.href = base_url + 'siswa/cbt';
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak bisa menyelesaikan ujian",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (xhr, error, status) {
                            console.log(xhr.responseText);
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menyelesaikan ujian",
                                icon: "error"
                            });
                        }
                    });
                } else {
                    $('#next').removeAttr('disabled');
                    $('#loading').addClass('d-none');
                }
            });
        } else {
            swal.fire({
                title: "BELUM SELESAI!",
                text: "Masih ada soal yang belum dikerjakan",
                icon: "error",
                confirmButtonColor: "#3085d6",
            }).then(result => {
                if (result.value) {
                    $('#next').removeAttr('disabled');
                    $('#loading').addClass('d-none');
                }
            });
        }
    }

    function dialogWaktu() {
        swal.fire({
            title: "Sudah Habis",
            text: "Waktu Ujian sudah habis, hubungi proktor",
            icon: "warning",
            allowOutsideClick: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then(result => {
            if (result.value) {
                window.location.href = base_url + 'siswa/cbt';
            }
        });
    }

    function rtclickcheck(keyp) {
        if (navigator.appName == "Netscape" && keyp.which == 3) {
            alert(message);
            return false;
        }

        if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
            alert(message);
            return false;
        }
    }

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem = window.top.document.body; //To break out of frame in IE
            elem.msRequestFullscreen();
        }
    }

    function getMinutes(startTime) {
        var endTime = new Date();
        endTime.setHours(endTime.getHours() - startTime.getHours());
        endTime.setMinutes(endTime.getMinutes() - startTime.getMinutes());
        endTime.setSeconds(endTime.getSeconds() - startTime.getSeconds());

        return {h: endTime.getHours(), m: endTime.getMinutes(), s: endTime.getSeconds()}
    }

    function createTimerCountdown(durasi, elapsed, func) {
        const perdetik = 1000;
        const permenit = 60 * perdetik;
        const perjam = 60 * permenit;
        const t_dur = durasi * (1000 * 60);

        let t_jam = Number(elapsed[0]);
        let t_mnt = Number(elapsed[1]);
        let t_dtk = Number(elapsed[2]);

        testTimer();

        function testTimer() {
            if (timerOut) {
                clearTimeout(timerOut);
                timerOut = null;
            }

            const elapsedMicro = (t_jam * perjam) + (t_mnt * permenit) + (t_dtk * perdetik);
            const t_remaining = t_dur - elapsedMicro;
            if (t_remaining <= 0) {
                if (func && (typeof func == "function")) {
                    func(true, 'Waktu habis', zeroPad(t_jam) + ':' + zeroPad(t_mnt) + ':' + zeroPad(t_dtk));
                }
            } else {
                // elapsed
                t_dtk++;
                if (t_dtk > 59) {
                    t_dtk = 0;
                    t_mnt++;
                }
                if (t_mnt > 59) {
                    t_mnt = 0;
                    t_jam++;
                }

                // remaining
                const r_jam = Math.floor(t_remaining / perjam);
                const r_mnt = Math.floor((t_remaining % perjam) / permenit);
                const r_dtk = Math.floor((t_remaining % permenit) / perdetik);

                if (func && (typeof func == "function")) {
                    func(false,
                        zeroPad(r_jam) + ':' + zeroPad(r_mnt) + ':' + zeroPad(r_dtk),
                        zeroPad(t_jam) + ':' + zeroPad(t_mnt) + ':' + zeroPad(t_dtk)
                    );
                }
                timerOut = setTimeout(testTimer, 1000);
            }
        }
    }

    function zeroPad(no) {
        return no < 10 ? '0' + no : no;
    }

    function encode(str) {
        var decoded = decodeURIComponent(str)
        var isEncoded = decoded !== str
        var encoded = encodeURIComponent(str)
        if (isEncoded) {
            return str
        } else {
            return encoded
        }
    }

    function decode(str) {
        var decoded = decodeURIComponent(str)
        var encoded = encodeURIComponent(decoded)
        var isEncoded = encoded === str
        if (isEncoded) {
            return decoded
        } else {
            return str
        }
    }

    document.addEventListener("visibilitychange", () => {
        if (document.hidden && infoJadwal.reset_login === '1') {
            location.href=base_url+"siswa/leavecbt/<?= $jadwal->id_jadwal ?>/<?= $siswa->id_siswa ?>";
        }
    });

    function transformToFormData(data, formData=(new FormData), parentKey=null) {
        $.each(data, function (value, key) {
            if (value === null) return; // else "null" will be added
            //let formattedKey = _.isEmpty(parentKey) ? key : `${parentKey}[${key}]`;
            let formattedKey = parentKey ? `${parentKey}[${key}]` : key
            if (value instanceof Array){
                $.each(value, function (ele) {
                    formData.append(`${formattedKey}[]`, ele)
                });
            } else if (value instanceof Object) {
                transformToFormData(value, formData, formattedKey)
            } else {
                formData.set(formattedKey, value)
            }
        })
        return formData
    }

    /* FULLSCREEN & ANTI-CHEAT SECURITY */
    /* FULLSCREEN & ANTI-CHEAT SECURITY & LOGGING */
    function saveLogActivity(msg) {
        $.ajax({
            url: base_url + "siswa/save_log_activity",
            type: "POST",
            data: {
                id_siswa: '<?= $siswa->id_siswa ?>',
                id_jadwal: '<?= $jadwal->id_jadwal ?>',
                activity: msg
            },
            success: function(response) {
                console.log("Activity logged");
            },
            error: function(xhr) {
                console.error("Failed to log activity");
            }
        });
    }

    function openFullscreen() {
        var elem = document.documentElement;
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) { /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE11 */
            elem.msRequestFullscreen();
        }
    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) { /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE11 */
            document.msExitFullscreen();
        }
    }

    // Force Fullscreen & Warn on Tab Switch
    window.addEventListener('blur', function() {
        if (!timerSelesai && typeof swal !== 'undefined') {
            saveLogActivity("Meninggalkan halaman ujian (Tab Switch/Minimize)");
            
            swal.fire({
                title: 'PERINGATAN KERAS!',
                html: 'Anda terdeteksi meninggalkan halaman ujian.<br>Dilarang membuka aplikasi/tab lain!<br><b>Aksi ini tercatat di sistem.</b>',
                icon: 'warning',
                confirmButtonColor: '#d33',
                confirmButtonText: 'KEMBALI KE UJIAN',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    openFullscreen();
                }
            });
        }
    });

    // Disable Inspect Element
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if(e.keyCode == 123) { return false; } // F12
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) { return false; } // Ctrl+Shift+I
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) { return false; } // Ctrl+Shift+C
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) { return false; } // Ctrl+Shift+J
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) { return false; } // Ctrl+U
    };
    
    // Start Exam Overlay Logic
    $(document).ready(function() {
         if($('#start-exam-overlay').length === 0) {
             $('body').append(`
                <div id="start-exam-overlay" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15, 23, 42, 0.95); backdrop-filter:blur(10px); z-index:99999; display:flex; justify-content:center; align-items:center; flex-direction:column;">
                    <div class="bg-white p-8 rounded-3xl shadow-2xl text-center max-w-md mx-4 animate-bounce-in">
                        <div class="mb-6">
                             <div class="w-20 h-20 bg-teal-100 rounded-full flex items-center justify-center mx-auto text-teal-600 mb-4">
                                <i class="fa fa-shield-alt text-4xl"></i>
                             </div>
                             <h2 class="text-2xl font-black text-slate-800 mb-2">MODE UJIAN AMAN</h2>
                             <p class="text-slate-600 leading-relaxed">
                                Ujian ini dilindungi oleh sistem keamanan.
                                <br>Dilarang membuka tab lain atau keluar dari mode layar penuh selama ujian berlangsung.
                             </p>
                        </div>
                        <button onclick="startExamSecurity()" class="w-full py-4 bg-teal-600 hover:bg-teal-700 text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-teal-500/30 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2">
                            <i class="fa fa-play-circle"></i> MULAI KERJAKAN
                        </button>
                    </div>
                </div>
             `);
         }
    });

    function startExamSecurity() {
        openFullscreen();
        $('#start-exam-overlay').fadeOut(300);
    }

</script>
