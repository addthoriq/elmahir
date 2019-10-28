<!-- Mainly scripts -->
<script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('inspinia/js/popper.min.js') }}"></script>
<script src="{{ asset('inspinia/js/bootstrap.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('inspinia/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Flot -->
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.spline.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.pie.js') }}"></script>

<!-- Peity -->
<script src="{{ asset('inspinia/js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('inspinia/js/demo/peity-demo.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia/js/inspinia.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('inspinia/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- GITTER -->
<script src="{{ asset('inspinia/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('inspinia/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Sparkline demo data  -->
<script src="{{ asset('inspinia/js/demo/sparkline-demo.js') }}"></script>

<!-- ChartJS-->
<script src="{{ asset('inspinia/js/plugins/chartJs/Chart.min.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/chartist/chartist.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('inspinia/js/plugins/toastr/toastr.min.js') }}"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true
        });

    });
</script>