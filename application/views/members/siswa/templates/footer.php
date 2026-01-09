</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<script src="<?= base_url() ?>/assets/app/js/jquery.marquee.min.js"></script>
<div style="position: -webkit-sticky;
	position: sticky;
	bottom: 0;
	padding: 2px;
	background-color: darkgreen;
	font-size: 16pt;
	color: white;
    height: auto;">
    <div id="running-text-siswa" class="marquee" style="overflow: hidden;"></div>
</div>

<footer class="main-footer d-none">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="d-none float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Required JS -->
<!-- v3 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

    var runningText = JSON.parse('<?= json_encode($running_text) ?>');
    //console.log('runn', runningText);
    var teks = '';
    $.each(runningText, function (i, v) {
        teks += '<span class="ml-3 mr-3">' + v.text + '</span> &bull; '
    });

    $('#running-text-siswa').html(teks);

    $('.marquee').marquee({
        duration: 15000,
        //gap in pixels between the tickers
        gap: 20,
        delayBeforeStart: 1,
        direction: 'left',
        //true or false - should the marquee be duplicated to show an effect of continues flow
        duplicated: true
    });

</script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/pace-progress/pace.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/audio/summernote-audio.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/file/summernote-file.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/gallery/dist/summernote-gallery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/math/summernote-math.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- multi select -->
<script src="<?= base_url() ?>/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.toast.min.js"></script>

<!-- TimeAgo -->
<script src="<?= base_url() ?>/assets/plugins/jquery-timeago/jquery.timeago.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.js"></script>

<!-- App JS -->
<script src="<?= base_url() ?>/assets/app/js/show.toast.js"></script>
<script src="<?= base_url() ?>/assets/app/js/dashboard_guru.js"></script>

<!-- Custom JS -->
<script type="text/javascript">
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    function ajaxcsrf() {
        var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
        var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
        var csrf = {};
        csrf[csrfname] = csrfhash;
        $.ajaxSetup({
            "data": csrf
        });
        
        // Global AJAX error handler for session expiry
        $(document).ajaxError(function(event, jqXHR, settings, thrownError) {
            if (jqXHR.status === 401 || jqXHR.status === 403) {
                window.location.href = base_url + 'auth?session_expired=1';
            }
            if (jqXHR.responseText && jqXHR.responseText.indexOf('id="login-form"') > -1) {
                window.location.href = base_url + 'auth?session_expired=1';
            }
        });
    }
    
    // Idle timeout detection
    var idleTimeout = 7200000, warningTime = 6900000;
    var idleTimer, warningTimer, isWarningShown = false;
    
    function resetIdleTimer() {
        if (isWarningShown) return;
        clearTimeout(idleTimer); clearTimeout(warningTimer);
        warningTimer = setTimeout(function() { isWarningShown = true; showIdleWarning(); }, warningTime);
        idleTimer = setTimeout(function() { window.location.href = base_url + 'logout?reason=idle'; }, idleTimeout);
    }
    
    function showIdleWarning() {
        var countdown = 300, countdownInterval;
        swal.fire({
            title: 'Sesi Akan Berakhir',
            html: 'Logout otomatis dalam <b id="idle-countdown">5:00</b> menit.<br>Klik untuk melanjutkan.',
            icon: 'warning', showCancelButton: true, confirmButtonText: 'Lanjutkan', cancelButtonText: 'Logout',
            allowOutsideClick: false, allowEscapeKey: false,
            didOpen: function() {
                countdownInterval = setInterval(function() {
                    countdown--;
                    var min = Math.floor(countdown / 60), sec = countdown % 60;
                    document.getElementById('idle-countdown').textContent = min + ':' + (sec < 10 ? '0' : '') + sec;
                    if (countdown <= 0) { clearInterval(countdownInterval); window.location.href = base_url + 'logout?reason=idle'; }
                }, 1000);
            },
            willClose: function() { clearInterval(countdownInterval); }
        }).then(function(result) {
            if (result.isConfirmed) { isWarningShown = false; resetIdleTimer(); $.get(base_url + 'auth/check_session'); }
            else { window.location.href = base_url + 'logout'; }
        });
    }
    
    $(document).on('mousemove keydown click scroll', function() { resetIdleTimer(); });
    resetIdleTimer();

    function reload_ajax() {
        table.ajax.reload();
    }

    var initDestroyTimeOutPace = function () {
        var counter = 0;

        var refreshIntervalId = setInterval(function () {
            var progress;

            if (typeof $('.pace-progress').attr('data-progress-text') !== 'undefined') {
                progress = Number($('.pace-progress').attr('data-progress-text').replace("%", ''));
            }

            if (progress === 99) {
                counter++;
            }

            if (counter > 50) {
                clearInterval(refreshIntervalId);
                Pace.stop();
            }
        }, 100);
    };
    initDestroyTimeOutPace();

</script>

</body>

</html>
