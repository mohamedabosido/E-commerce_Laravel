<!-- plugins:js -->
<script src="{{ asset('admin_assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admin_assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin_assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admin_assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin_assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin_assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('admin_assets/js/dashboard.js') }}"></script>
<script src="{{ asset('admin_assets/js/todolist.js') }}"></script>
<!-- Custom js for this page -->
<script src="{{ asset('admin_assets/js/file-upload.js') }}"></script>
<!-- End custom js for this page -->
<!-- sweetalert -->
@include('sweetalert::alert')
