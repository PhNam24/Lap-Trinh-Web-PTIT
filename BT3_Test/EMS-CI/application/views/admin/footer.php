 <footer class="main-footer">
     <div class="pull-right hidden-xs">
         <b>Version</b> 3.4.13
     </div>
     <strong>&copy; <?php echo date("Y"); ?></strong> Employee Management System in CodeIgniter Framework
 </footer>

 </div>
 <!-- ./wrapper -->


 <!-- Bootstrap 3.3.7 -->
 <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- Slimscroll -->
 <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- bootstrap datepicker -->
 <script
     src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
 </script>
 <!-- FastClick -->
 <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
 <!-- DataTables -->
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
 </script>

 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
$.widget.bridge('uibutton', $.ui.button);
 </script>

 <!-- Date Picker -->
 <script>
$('#datepicker').datepicker({
    autoclose: true
})
 </script>

 <!-- Datatable -->
 <script>
$(function() {
    $('#example1').DataTable()

    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
})
 </script>
 </body>

 </html>