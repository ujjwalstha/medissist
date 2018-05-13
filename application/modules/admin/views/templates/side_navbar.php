<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url().'uploads/images/specialists/'.$admin_details->IMAGE ?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $admin_details->NAME; ?></p>
				<?php if($admin_details->ONLINE_STATUS == 1): ?>
					<i class="fa fa-circle text-success"></i> Online
				<?php else: ?>
					<i class="fa fa-circle text-danger"></i> Offline
				<?php endif; ?>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<?php if($this->session->userdata('admintype') == 1): ?>
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">CONTENTS</li>


				<li><a href="<?php echo base_url().'admin/adminpanel' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user-md text-green"></i> <span>Health Specialist</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'admin/managespecialist' ?>"><i class="fa fa-user-md text-red"></i> <span>Manage Specialist</span></a></li>
						<li><a href="<?php echo base_url().'admin/managespecialisttype' ?>"><i class="fa fa-stethoscope text-yellow"></i> Manage Specialist Type</a></li>
					</ul>
				</li>

				<li><a href="<?php echo base_url().'admin/manageuser' ?>"><i class="fa fa-user text-blue"></i> <span>Manage Users</span></a></li>

				<li><a href="<?php echo base_url().'admin/healthproblems' ?>"><i class="fa fa-heartbeat text-red"></i> <span>Health Problems</span></a></li>

				<li><a href="<?php echo base_url().'admin/medicinalproduct' ?>"><i class="fa fa-medkit text-green"></i> <span>Medicinal Products</span></a></li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-group text-orange"></i> <span>Manage Forum</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'admin/managequestions' ?>"><i class="fa fa-question-circle text-red"></i> Manage Forum Questions</a></li>
						<li><a href="<?php echo base_url().'admin/manageanswers' ?>"><i class="fa fa-comments text-green"></i> Manage Forum Answers</a></li>
					</ul>
				</li>

			</ul>

		<?php elseif($this->session->userdata('admintype') == 2): ?>

			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">CONTENTS</li>

				<li><a href="<?php echo base_url().'admin/adminpanel' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-envelope"></i> <span>User Message</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<?php foreach($getusers as $users): ?>
							<li><a href="<?php echo base_url().'admin/privatemessage/'.$users->ID ?>"><i class="fa fa-user <?php echo ($users->GENDER == 'male') ? 'text-blue' : 'text-red' ?>"></i><?php echo $users->FIRSTNAME.' '.$users->LASTNAME; ?>

								<?php
									// $userid = $users->ID;
									// echo $this->admin_model->checkSeenStatus($userid);
								?>

								<span class="pull-right-container">
					                <i class="fa fa-envelope pull-right text-red message-received"></i>
					            </span>				

							</a></li>
						<?php endforeach; ?>
					</ul>
				</li>


			</ul>

		<?php endif; ?>

	</section>
	<!-- /.sidebar -->
</aside>