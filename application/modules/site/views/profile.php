 <!-- //Line Slider -->
 <div class="top_banner two">
 	<div class="container">
 		<div class="sub-hd-inner">
 			<h3 class="tittle">PRO<span>FILE</span></h3>
 		</div>
 	</div>
 </div>
 <!--/contact-->		
 <div class="contact-top">
 	<div class="container">

 		<div class="sub-hd two">
 			<h3 class="tittle two">UPDATE YOUR<span class="two"> PROFILE </span></h3>
 		</div>
 		
 		<div class="contact-form">

 			<div class="col-md-4"></div>

 			<div class="col-md-4">
 				<?php if ($this->session->flashdata('editprofile_success')): ?>
 					<div class="alert alert-success" style="font-size: 14px; text-align: center;">
 						<i class="fa fa-check-circle"></i>
 						<?php echo $this->session->flashdata('editprofile_success') ?>
 					</div>
 				<?php endif; ?>

 				<?php if ($this->session->flashdata('editprofile_fail')): ?>
 					<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
 						<i class="fa fa-times-circle"></i>
 						<?php echo $this->session->flashdata('editprofile_fail') ?>
 					</div>
 				<?php endif; ?>
 			</div>

 			<div class="col-md-4"></div>

 			<?php 
 			$attributes = array('id' => 'profile-form', 'method' => 'post', 'name' => 'profile-form');
 			echo form_open('site/profile', $attributes);
 			?>


 			<div class="col-md-5">
 				<div>
 					<span><label>FIRST NAME</label></span>
 					<span><input name="firstname" type="text" class="textbox" value="<?php echo $userdetail->FIRSTNAME ?>"></span>
 				</div>

 				<div>
 					<span><label>E-MAIL</label></span>
 					<span><input name="email" type="text" class="textbox" value="<?php echo $userdetail->EMAIL ?>"></span>
 				</div>

 				<div>
 					<span><label>BLOOD GROUP</label></span>
 					<span><input name="bloodgroup" type="text" class="textbox" value="<?php echo $userdetail->BLOOD_GROUP ?>"></span>
 				</div>
 				<br>
 				<div>
 					<span><input type="submit" value="Save" id="editprofile-btn" name="editprofile-btn" class="myButton"></span>
 				</div>
 			</div>

 			<div class="col-md-2">
 			</div>

 			<div class="col-md-5">
 				<div>
 					<span><label>LAST NAME</label></span>
 					<span><input name="lastname" type="text" class="textbox" value="<?php echo $userdetail->LASTNAME ?>"></span>
 				</div>

 				<div>
 					<span><label>GENDER</label></span>

 					<span><select name="gender" id="gender" style="width: 100%;">

 						<span><option class="gender-option" value="male" <?php if($userdetail->GENDER == 'male') echo "selected='selected'"?> >Male</option></span>
 						<span><option class="gender-option" value="female" <?php if($userdetail->GENDER == 'female') echo "selected='selected'"?> >Female</option></span>

 					</select></span>

 				</div>

 				<div>
 					<span><label>CONTACT NO.</label></span>
 					<span><input name="contact" type="text" class="textbox" value="<?php echo $userdetail->CONTACTNO ?>"></span>
 				</div>

 			</div>

 			<?php echo form_close(); ?>

 			<div class="clearfix"></div>
 		</div>
 	</div>



 	<div class="container" style="margin-top: 70px">

 		<div class="sub-hd two">
 			<h3 class="tittle two">CHANGE YOUR<span class="two"> PASSWORD </span></h3>
 		</div>

 		<div class="contact-form">

 			<div class="col-md-4"></div>

 			<div class="col-md-4">
 				<?php if ($this->session->flashdata('passUpdate_success')): ?>
 					<div class="alert alert-success" style="font-size: 14px; text-align: center;">
 						<i class="fa fa-check-circle"></i>
 						<?php echo $this->session->flashdata('passUpdate_success') ?>
 					</div>
 				<?php endif; ?>

 				<?php if ($this->session->flashdata('passUpdate_fail')): ?>
 					<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
 						<i class="fa fa-times-circle"></i>
 						<?php echo $this->session->flashdata('passUpdate_fail') ?>
 					</div>
 				<?php endif; ?>
 			</div>

 			<div class="col-md-4"></div>
 			
 			<?php 
 			$attributes = array('id' => 'changepassword-form', 'method' => 'post', 'name' => 'changepassword-form');
 			echo form_open('site/changepassword', $attributes);
 			?>

 				<div class="col-md-5">
 					<div>
 						<span><label>OLD PASSWORD</label></span>
 						<span><input name="oldpassword" type="password" class="textbox" id="oldpassword"></span>
 					</div>

 					<div>
 						<span><label>CONFIRM PASSWORD</label></span>
 						<span><input name="confirmpassword" type="password" class="textbox" id="confirmpassword"></span>
 					</div>
 					<br>
 					<div>
 						<span><input type="submit" value="Change Password" class="myButton" name="changepassword-btn" id="changepassword-btn"></span>
 					</div>
 				</div>

 				<div class="col-md-2">
 				</div>

 				<div class="col-md-5">
 					<div>
 						<span><label>NEW PASSWORD</label></span>
 						<span><input name="newpassword" type="password" class="textbox" id="newpassword"></span>
 					</div>
 				</div>

 			<?php echo form_close(); ?>

 			<div class="clearfix"></div>
 		</div>
 	</div>
 </div>
 <!--//contact-->	