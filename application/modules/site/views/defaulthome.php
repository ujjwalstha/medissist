<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link href="<?php echo base_url().'assets/bootstrap-3.3.7/css/bootstrap.min.css' ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/defaulthome.css' ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url().'assets/css/style.css' ?>"> -->
	<link rel="icon" type="image/gif/png" href="<?php echo base_url('assets/images/logo.png'); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/admin_assets/bower_components/font-awesome/css/font-awesome.min.css' ?> ">
</head>
<body>

	<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="logo" style="margin-top: -15px;"><span style="font-size: 45px;">M</span>EDISSIST</div>
				</div>
				<div class="col-sm-6">
					<div class="row">

						<?php if ($this->session->flashdata('login_error')): ?>
							<div style="text-align: center; font-size: 15px; color: maroon;">
								<i class="fa fa-times-circle"></i>
								<?php echo $this->session->flashdata('login_error'); ?>
							</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata('status_error')): ?>
							<div style="text-align: center; font-size: 15px; color: maroon;">
								<i class="fa fa-times-circle"></i>
								<?php echo $this->session->flashdata('status_error'); ?>
							</div>
						<?php endif; ?>

						<?php 
						$attributes = array('id' => 'login-form', 'method' => 'post', 'name' => 'login-form');
						echo form_open('login', $attributes) 
						?>

						<div class="col-sm-5">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email Address" name="email" id="email">
							</div>
						</div>	
						<div class="col-sm-5">
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password" id="password">

								<div class="login-bottom-text hidden-sm" style="margin: 5px 0 5px 0"><a href="" class="forgot-password" data-toggle="modal" data-target="#forgotPasswordModal"> Forgot your password? </a></div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="submit" value="Login" class="btn btn-danger btn-header-login" name="loginBtn" id="loginBtn">
							</div>
						</div>

						<?php echo form_close(); ?> 
						
					</div>	
				</div>
			</div>
		</div>
	</header>

	
	<!-- Modal -->
	<div id="forgotPasswordModal" class="modal fade" role="dialog" style="margin-top: 100px">
		<div class="modal-dialog modal-sm">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header fp-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-lock"></i> Forgot your password?</h4>
				</div>
				<div class="modal-body">
					<p>
						<?php 
						$attributes = array('id' => 'forgot-password-form', 'method' => 'post', 'name' => 'forgot-password-form');
						echo form_open('site/forgotpassword', $attributes) 
						?>

						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" placeholder="Enter your valid email address" name="email">
						</div>

						<button type="submit" class="btn btn-info btn-sm" id="forgotpass-btn" name="forgotpass-btn">Submit</button>

						<?php echo form_close(); ?> 
					</p>
				</div>

			</div>

		</div>
	</div>


	<article >
		<div class="container">

			<div class="col-sm-8">
				<div class="col-md-2"></div>

				<div class="col-md-8" style="margin-top: 45px">
					<?php if ($this->session->flashdata('forgotpassword_success')): ?>
						<div class="alert alert-success" style="font-size: 14px; text-align: center;">
							<i class="fa fa-check-circle"></i>
							<?php echo $this->session->flashdata('forgotpassword_success') ?>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('forgotpassword_fail')): ?>
						<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
							<i class="fa fa-times-circle"></i>
							<?php echo $this->session->flashdata('forgotpassword_fail') ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-md-2"></div>

				<div class="login-main">
					<h4><i class="fa fa-dashboard"></i> Online Health Assistive System</h4>
					<span>Welcome to Medissist, place where you can get free medical advise from professional health specialist.</span>

					<h4> <i class="fa fa-money"></i> No card payment or card details required </h4>
					<span>Don't worry, we wont ask for anything which will stop you from making full use of our services.</span>

					<h4><i class="fa fa-user-md"></i> Communicate and interact with the doctors through chat</h4>
					<span>Need some health advise? Our health specialist are here to help you.</span>

					<h4> <i class="fa fa-users"></i> Communicate with other people through forum</h4>
					<span>Share your heart out regarding your health problem or knowledge with other people.</span>

					<h4> <i class="fa fa-heartbeat"></i> Live a happy and healthy life</h4>
					<span>We wish you a very happy and healthy life and hope sickness won't be the only reason for you to visit us.</span>
				</div>
			</div>

			<div class="col-sm-4" style="background-color: #d2edf2;">
				<div class="">

					<h3><i class="fa fa-shield"></i> Register For Free </h3>
					<hr>

					<?php if ($this->session->flashdata('register_success')): ?>
						<div class="alert alert-success" style="text-align: center; font-size: 14px">
							<i class="fa fa-check-circle"></i>
							<?php echo $this->session->flashdata('register_success') ?>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('register_fail')): ?>
						<div class="alert alert-danger" style="text-align: center; font-size: 14px">
							<i class="fa fa-times-circle"></i>
							<?php echo $this->session->flashdata('register_fail') ?>
						</div>
					<?php endif; ?>

					<?php 
					$attributes = array('id' => 'signup-form', 'method' => 'post', 'name' => 'signup-form');
					echo form_open('signup', $attributes) 
					?>

					<div class="form-group"> 
						<label class="control-label" for="">First Name <span class="red asterisk">*</span></label>
						<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname">
					</div>

					<div class="form-group">
						<label class="control-label" for="">Last Name <span class="red asterisk">*</span></label>
						<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname">
					</div>

					<div class="form-group">
						<label class="control-label" for="">Email Address <span class="red asterisk">*</span></label>
						<input type="text" class="form-control" placeholder="Email Address" name="email" id="email">
					</div>

					<div class="form-group">
						<label class="control-label" for="">Password <span class="red asterisk">*</span></label>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password">
					</div>

					<div class="form-group">
						<label class="control-label" for="">Gender <span class="red asterisk">*</span></label><br>

						<input type="radio" name="gender" id="male" value="male"> <label class="control-label" for="male">Male</label>
						<input type="radio" name="gender" id="female" value="female"> <label class="control-label" for="female">Female</label>
						<!-- <input type="radio" name="gender" id="others" value="others"> <label class="control-label" for="others">Others</label> -->
					</div>

					<div class="form-group">
						<input type="checkbox" name="termscheck" placeholder="terms" id="termscheck">
						<label class="control-label" for="termscheck" id="termsconditions">Terms and Conditions <span class="red asterisk">*</span></label>
					</div>


					<div style="height:10px;"></div>
					<div class="form-group">
						<label class="control-label" for=""></label>
						<button type="submit" class="btn btn-info" id="signupBtn" name="register"><!-- <i class="fa fa-sign-up"></i> --> Sign Up</button>
					</div>	

					<?php echo form_close(); ?> 

				</div>
			</div>
		</div>

		<footer class="container	">
			<hr>

			<div style="clear:both"></div>
			<small class="copyrights"> © Copyrights Online Health Care 2018</small>
		</footer>
	</article>

</body>
</html>




<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/js/jquery.min.js' ?>"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url().'assets/bootstrap-3.3.7/js/bootstrap.min.js' ?>"></script>
<!-- jquery  validate plugin -->
<script src="<?php echo base_url().'assets/js/jquery.validate.min.js' ?>"></script>

<script>
	$(document).ready(function(){

		$(document).off("click", "#loginBtn").on("click", "#loginBtn", function(){

			$("form[name='login-form']").validate({
    // Specify validation rules
    rules: {

    	email: {
    		required: true,
    		email: true
    	},
    	password: {
    		required: true,
    	}
    },
    // Specify validation error messages
    messages: {

    	password: {
    		required: "Please enter your password",
    	},
    	email: {
    		required: "Please enter your email" ,
    		email: "Please enter a valid email address"
    	}
    },

});

		});




		$(document).on("click", "#signupBtn", function(){

			$("form[name='signup-form']").validate({
	    // Specify validation rules
	    rules: {

	    	firstname: {
	    		required: true
	    	},
	    	lastname: {
	    		required: true
	    	},
	    	email: {
	    		required: true,
	    		email: true
	    	},
	    	password: {
	    		required: true,
	    		minlength: 6
	    	},
	    	gender: {
	    		required: true,
	    	},
	    	termscheck: {
	    		required: true,
	    	}

	    },
		    // Specify validation error messages
		    messages: {

		    	firstname: {
		    		required: "Please enter your first name"
		    	},
		    	lastname: {
		    		required: "Please enter your last name"
		    	},

		    	email: {
		    		required: "Please enter email" ,
		    		email: "Please enter a valid email address"
		    	},
		    	password: {
		    		required: "Please enter password",
		    		minlength: "Your password must be at least 6 characters long"
		    	},
		    	gender: {
		    		required: "Please select your gender",
		    	},
		    	termscheck: {
		    		required: "Please check terms and conditions",
		    	}
		    },

		});

		});


		$(document).off("click", "#forgotpass-btn").on("click", "#forgotpass-btn", function(){

			$("form[name='forgot-password-form']").validate({
	    // Specify validation rules
	    rules: {

	    	email: {
	    		required: true,
	    		email: true
	    	}
	    },
		    // Specify validation error messages
		    messages: {

		    	email: {
		    		required: "Please enter your email" ,
		    		email: "Please enter a valid email address"
		    	}
		    },

		});

		});

	});	
</script>