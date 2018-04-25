<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" type="image/gif/png" href="<?php echo base_url('assets/images/logo.png'); ?>">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/bower_components/font-awesome/css/font-awesome.min.css' ?> ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/bower_components/Ionicons/css/ionicons.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/css/custom.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/dist/css/AdminLTE.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/plugins/iCheck/square/blue.css' ?>">

 

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" >
  <div class="login-box">
    <div class="login-logo">
      <b>ADMIN</b>
      <h1>Online Health System</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border-radius: 7px">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if ($this->session->flashdata('login_fail')): ?>
        <div class="alert alert-danger" style="text-align: center;font-size: 14px">
          <i class="fa fa-times-circle"></i>
          <?= $this->session->flashdata('login_fail'); ?>
        </div>
      <?php endif; ?>

      <?php if ($this->session->flashdata('logout_success')): ?>
        <div class="alert alert-success" style="text-align: center;font-size: 14px">
          <i class="fa fa-check-circle"></i>
          <?= $this->session->flashdata('logout_success'); ?>
        </div>
      <?php endif; ?>

       <?php if ($this->session->flashdata('loginspecialist_fail')): ?>
        <div class="alert alert-danger" style="text-align: center;font-size: 14px">
          <i class="fa fa-times-circle"></i>
          <?= $this->session->flashdata('loginspecialist_fail'); ?>
        </div>
      <?php endif; ?>

      <?php 
      $attributes = array('id' => 'adminlogin', 'method' => 'post', 'name' => 'adminlogin');
      echo form_open('admin/login', $attributes);
      ?>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <select class="form-control" name="admintype">
          <option disabled selected value="0">--- SELECT TYPE ---</option>
          <option value="1">Super Admin</option>
          <option value="2">Specialist</option>
        </select>
        
      </div>

      <div class="row">
       <!--  <div class="col-xs-8">
          <div class="checkbox icheck" style="margin-left: 22px">
            <label>
              <input type="checkbox" name="showpw"> Show 
            </label>
          </div>
        </div> -->
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="loginbtn" name="loginbtn">Sign In</button>
        </div>
      </div>

      <?php echo form_close(); ?>



    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/jquery/dist/jquery.min.js' ?>"></script>
  <!-- jquery  validate plugin -->
  <script src="<?php echo base_url().'assets/js/jquery.validate.min.js' ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url().'assets/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <!-- iCheck -->
  <!-- <script src="<?php //echo base_url().'assets/admin_assets/plugins/iCheck/icheck.min.js' ?>"></script> -->

  <!-- <script>
    $(document).ready(function(){


      $("input[name='showpw']").click(function(){
        if('password' == $('#password').attr('type')){
         $('#password').prop('type', 'text');
       }else{
         $('#password').prop('type', 'password');
       }
     });


    });
  </script> -->

  <!-- <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script> -->

</body>
</html>



<script>

  $(document).ready(function(){

    $(document).off("click", "#loginbtn").on("click", "#loginbtn", function(){

      $("form[name='adminlogin']").validate({
      // Specify validation rules
      rules: {

        username: {
          required: true,
        },
        password:{
          required: true,
        }
      },
      // Specify validation error messages
      messages: {

        username: {
          required: "Please enter username",
        },
        password: {
          required: "Please enter password",
        }
      },

    });

    });

  // $('#myTable').DataTable();

});

</script>




