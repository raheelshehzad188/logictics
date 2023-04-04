<!-- jQuery -->
<script src="{{ asset('themes/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('themes/AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Moment JS -->
<script src="{{ asset('themes/AdminLTE/plugins/moment/moment.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('themes/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('themes/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('themes/AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('themes/AdminLTE/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- daterange picker -->
<script src="{{ asset('themes/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="{{ asset('themes/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-select/dataTables.select.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-select/js/select.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/dataTables.checkboxes.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('themes/AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('themes/AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
{{-- jquery-easy-loading --}}
<script src="{{ asset('themes/AdminLTE/plugins/jquery-easy-loadings/jquery.loading.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('themes/AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- Custom -->

<!-- CSRF Protection -->
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>

<!--<script type="text/javascript"
        src='https://maps.google.com/maps/api/js?key=AIzaSyA_xGU9HS9rxtOVdBlQFgEsIbWGA4GK1CQ&sensor=false&libraries=places'></script>-->
<script src="{{ asset('js/location-picker.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('themes/AdminLTE/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
