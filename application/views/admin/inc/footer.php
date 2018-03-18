

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{base_url}assets/backend/themes/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{base_url}assets/backend/themes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{base_url}assets/backend/themes/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{base_url}assets/backend/themes/bower_components/raphael/raphael-min.js"></script>
    <script src="{base_url}assets/backend/themes/bower_components/morrisjs/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{base_url}assets/backend/themes/dist/js/sb-admin-2.js"></script>
    <script src="{base_url}assets/backend/themes/dist/js/liputan.custom.js"></script>

    <!-- DataTables JavaScript -->
    <script src="{base_url}assets/backend/themes/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{base_url}assets/backend/themes/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Summernote WYSIWYG -->
    <script src="{base_url}assets/plugins/summernote/summernote.js"></script>
    <script src="{base_url}assets/plugins/summernote/summernote.min.js"></script>

    <script>
    $(document).ready(function() {
        //dataTables
        $('#dataTables').DataTable({  responsive: true,"order": [[ 5, "DESC" ]] });
        $('#defaultTables').DataTable({  responsive: true,"order": [[ 0, "" ]],"lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]] });
        $('#leagueTables').DataTable({  responsive: true,"order": [[ 0, "" ]],"lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]] });
        $('#bolaworldTables').DataTable({  responsive: true,"order": [[ 0, "" ]],"lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]] });

        //WYSIWYG
        $('.summernote').summernote({ height: 400 });
    });
    </script>

</body>

</html>