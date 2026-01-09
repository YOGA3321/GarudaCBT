</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>GarudaCBT</strong> v.<?= APP_VERSION ?>
    <div class="float-right d-none d-sm-inline-block">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>

<!-- Required JS -->
<!-- v3 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Datatables Buttons -->
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/pace-progress/pace.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>/assets/plugins/sparklines/sparkline.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/chart.js/chartjs-plugin-labels.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- moment -->
<script src="<?= base_url() ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/moment/moment-with-locales.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/audio/summernote-audio.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/file/summernote-file.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/gallery/dist/summernote-gallery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/summernote/plugin/math/summernote-math.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- multi select -->
<script src="<?= base_url() ?>/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/multiselect/js/jquery.quicksearch.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.toast.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/demo.js"></script>
<!-- /v3 -->
<!-- datetimepicker -->
<script src="<?= base_url() ?>/assets/plugins/jquery-datetimepicker/jquery.datetimepicker.full.js"></script>
<!-- TimeAgo -->
<script src="<?= base_url() ?>/assets/plugins/jquery-timeago/jquery.timeago.js" type="text/javascript"></script>
<!-- App JS -->
<script src="<?= base_url() ?>/assets/app/js/show.toast.js"></script>

<script src="<?= base_url() ?>/assets/app/js/jquery-thumbnail-cut.js"></script>

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
        // Expose globally for Datatables
        window.csrf_name = csrfname;
        window.csrf_hash = csrfhash;
        
        var csrf = {};
        csrf[csrfname] = csrfhash;
        $.ajaxSetup({
            "data": csrf
        });
        
        // Global AJAX error handler for session expiry
        $(document).ajaxError(function(event, jqXHR, settings, thrownError) {
            if (jqXHR.status === 401 || jqXHR.status === 403) {
                // Session expired
                window.location.href = base_url + 'auth?session_expired=1';
            }
            // Check if response contains login page HTML (redirect happened)
            if (jqXHR.responseText && jqXHR.responseText.indexOf('id="login-form"') > -1) {
                window.location.href = base_url + 'auth?session_expired=1';
            }
        });
    }
    
    // Idle timeout detection (2 hours = 7200000ms, warning at 1:55 = 6900000ms)
    var idleTimeout = 7200000; // 2 hours in milliseconds
    var warningTime = 6900000; // 1 hour 55 minutes (5 min before timeout)
    var idleTimer, warningTimer;
    var isWarningShown = false;
    
    function resetIdleTimer() {
        if (isWarningShown) return; // Don't reset if warning is shown
        
        clearTimeout(idleTimer);
        clearTimeout(warningTimer);
        
        // Warning timer - show modal 5 minutes before timeout
        warningTimer = setTimeout(function() {
            isWarningShown = true;
            showIdleWarning();
        }, warningTime);
        
        // Actual timeout - auto logout
        idleTimer = setTimeout(function() {
            window.location.href = base_url + 'logout?reason=idle';
        }, idleTimeout);
    }
    
    function showIdleWarning() {
        var countdown = 300; // 5 minutes in seconds
        var countdownInterval;
        
        swal.fire({
            title: 'Sesi Akan Berakhir',
            html: 'Anda akan logout otomatis dalam <b id="idle-countdown">5:00</b> menit karena tidak ada aktivitas.<br><br>Klik tombol di bawah untuk melanjutkan sesi.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Lanjutkan Sesi',
            cancelButtonText: 'Logout Sekarang',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: function() {
                countdownInterval = setInterval(function() {
                    countdown--;
                    var min = Math.floor(countdown / 60);
                    var sec = countdown % 60;
                    document.getElementById('idle-countdown').textContent = min + ':' + (sec < 10 ? '0' : '') + sec;
                    
                    if (countdown <= 0) {
                        clearInterval(countdownInterval);
                        window.location.href = base_url + 'logout?reason=idle';
                    }
                }, 1000);
            },
            willClose: function() {
                clearInterval(countdownInterval);
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                // User chose to continue - reset timers
                isWarningShown = false;
                resetIdleTimer();
                // Ping server to refresh session
                $.get(base_url + 'auth/check_session');
            } else {
                // User chose to logout
                window.location.href = base_url + 'logout';
            }
        });
    }
    
    // Track user activity
    $(document).on('mousemove keydown click scroll', function() {
        resetIdleTimer();
    });
    
    // Initialize idle timer
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

    function logout() {
        swal.fire({
            title: "Logout",
            text: "Anda yakin ingin logout?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout!'
        }).then((result) => {
            if (result.value) {
                location.href = base_url + "logout";
            }
        });
    }

</script>
<script>
    // SweetAlert2 Global Handler for CI Flashdata
    <?php if ($this->session->flashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= $this->session->flashdata('error'); ?>',
            showConfirmButton: true
        });
    <?php endif; ?>
    
    <?php if ($this->session->flashdata('warning')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!',
            text: '<?= $this->session->flashdata('warning'); ?>',
            showConfirmButton: true
        });
    <?php endif; ?>

    // Global Delete Confirmation
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });
</script>
</body>
</html>
