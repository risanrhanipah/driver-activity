<script src="{{url('assets/')}}/vendors/js/vendor.bundle.base.js"></script>

<!-- endinject -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->
<!-- Plugin js for this page -->
<script src="{{url('assets/')}}/vendors/chart.js/Chart.min.js"></script>
<script src="{{url('assets/')}}/vendors/datatables.net/jquery.dataTables.js"></script> -->
<script src="{{url('assets/')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{url('assets/')}}/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{url('assets/')}}/js/off-canvas.js"></script>
<script src="{{url('assets/')}}/js/hoverable-collapse.js"></script>
<script src="{{url('assets/')}}/js/template.js"></script>
<script src="{{url('assets/')}}/js/settings.js"></script>
<script src="{{url('assets/')}}/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{url('assets/')}}/js/dashboard.js"></script>
<script src="{{url('assets/')}}/js/Chart.roundedBarCharts.js"></script>
<script>
$(document).ready(function() {
    $('#datatable').dataTable();
});
</script>
<!-- End custom js for this page-->
