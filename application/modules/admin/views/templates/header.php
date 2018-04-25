<header class="main-header">
	<!-- Logo -->
	<a href="<?php echo base_url().'admin/adminpanel' ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b>LT</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b><?php echo ($admin_details->ADMIN_TYPE == 1) ? 'Super Admin' : 'Specialists' ; ?></b></span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">

				<li class="notifications-menu">
					<?php 
                          $attributes = array('method' => 'post');
                          echo form_open('admin/onlinestatus', $attributes);

                          $uri = $this->uri->segment(2);

                          if ($uri == 'privatemessage') {
                          	$uri_id = $this->uri->segment(3);
                          }

                          ?>  

                          <input type="hidden" name="adminid" value="<?= $admin_details->ID ?>">
                           <input type="hidden" name="uri" value="<?= $uri ?>">
                           <?php if($uri == 'privatemessage'): ?>
                           	<input type="hidden" name="uri_id" value="<?= $uri_id ?>">
                           	<?php endif;  ?>

                          <?php if ($admin_details->ONLINE_STATUS == 0): ?>
                            <button type="submit" class="btn btn-success btn-sm" style="margin: 9px 10px 0 0" name="online"> Go Online </button>
                          <?php else: ?>
                            <button type="submit" class="btn btn-danger btn-sm" style="margin: 9px 10px 0 0" name="offline"> Go Offline </button>
                          <?php endif;  ?>

                          <?php echo form_close(); ?>
					
					
				</li>

				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url().'uploads/images/specialists/'.$admin_details->IMAGE ?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $admin_details->NAME; ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo base_url().'uploads/images/specialists/'.$admin_details->IMAGE ?>" class="img-circle" alt="User Image">

							<p>
								<?php echo $admin_details->NAME; ?> - <?php echo ($admin_details->ADMIN_TYPE == 1) ? 'Super Admin' : $admin_details->SPECIALIST_TYPE; ?>


								<?php 
								$created = $admin_details->CREATED_DATE; 
								$timestamp = strtotime($created);
								$year = date('Y', $timestamp);
								$month = date('M', $timestamp);
								?>
								<small>Member since <?php echo $month.'. '.$year; ?></small>
							</p>
						</li>


						<!-- Menu Body -->
						<!-- <li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<a href="#">Followers</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Sales</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Friends</a>
								</div>
							</div>
						</li> -->


						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo base_url().'admin/settings' ?>" class="btn btn-default btn-flat">Settings</a>
							</div>
							
							<div class="pull-right">
								<a href="<?php echo base_url().'admin/logout' ?>" class="btn btn-default btn-flat">Logout</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>

<?php 

// 	function auto_logout($field)
// {
//     $t = time();
//     $t0 = $_SESSION[$field];
//     $diff = $t - $t0;
//     if ($diff > 1500 || !isset($t0))
//     {          
//         return true;
//     }
//     else
//     {
//         $_SESSION[$field] = time();
//     }
// }


// if(auto_logout("user_time"))
//     {
//         session_unset();
//         session_destroy();
//         location("login.php");          
//         exit;
//     }      

?>