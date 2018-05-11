

<!-- /.content-wrapper -->
<footer class="main-footer" >
	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0
	</div>
	<strong>Copyright &copy; 2018 <a href="http://50.63.163.55/~ujjwalsh/portfolio/">Ujjwal Shrestha</a>.</strong> All rights
	reserved.
</footer>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">

	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<!-- /.tab-pane -->   
	</div>
</aside>
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
  	<div class="control-sidebar-bg"></div>



  </div>
  <!-- ./wrapper started in head.php ends here -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery/dist/jquery.min.js' ?>"></script>
  
  <!-- jquery  validate plugin -->
<script src="<?php echo base_url().'assets/js/jquery.validate.min.js' ?>"></script>
<!-- All form, text field validation of admin dashboard -->
<script src="<?php echo base_url().'assets/js/validation.js' ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery-ui/jquery-ui.min.js' ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  	$.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/raphael/raphael.min.js' ?>"></script>
 <!--  <script src="<?php //echo base_url().'assets/admin_assets/bower_components/morris.js/morris.min.js' ?>"></script> -->
  <!-- Sparkline -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js' ?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url().'assets/admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js' ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/moment/min/moment.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js' ?>"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url().'assets/admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ?>"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/fastclick/lib/fastclick.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/admin_assets/dist/js/adminlte.min.js' ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="<?php //echo base_url().'assets/admin_assets/dist/js/pages/dashboard.js' ?>"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url().'assets/admin_assets/dist/js/demo.js' ?>"></script>

   
   <script src="<?php echo base_url().'assets/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js' ?>"></script>
   <script src="<?php echo base_url().'assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js' ?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/ckeditor/ckeditor.js' ?>"> </script>





 
</body>
</html>


<script>
    CKEDITOR.replace('description');

   
</script>


<script>

  $(document).ready( function () {
    $('#myTable').DataTable();
  });


  $("#name").keyup(function(){
      var str = $(this).val();
      var trims = $.trim(str);
      var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/^-|-$/g, '');
      $("#slug").val(slug.toLowerCase())
  });

</script>









