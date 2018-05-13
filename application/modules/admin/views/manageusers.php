<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo "Admin"; ?>
			<small><?php echo $breadcrumb; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'admin/adminpanel'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"><?php echo $breadcrumb; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Main row -->
		<div class="row">
			<section class="col-md-12 ">

				<div class="box box-danger">

					<div class="box-header with-border">
						<h3 class="box-title">Manage your specialists</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12">

							<div class="col-md-4"></div>

							<div class="col-md-4">
								<?php if ($this->session->flashdata('addspecialist_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('addspecialist_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('addspecialist_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('addspecialist_fail') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('useractivate_success')): ?>
									<div class="alert alert-success" style="text-align: center;font-size: 12px">
										<i class="fa fa-check-circle"></i>
										<?= $this->session->flashdata('useractivate_success'); ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('userdeactivate_success')): ?>
									<div class="alert alert-danger" style="text-align: center;font-size: 12px">
										<i class="fa fa-check-circle"></i>
										<?= $this->session->flashdata('userdeactivate_success'); ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('userdelete_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('userdelete_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('userdelete_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('userdelete_fail') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('passMatch_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('passMatch_fail') ?>
									</div>
								<?php endif; ?>
							</div>

							<div class="col-md-4"></div>

						</div>


						<div class="col-md-12" style="overflow-x: scroll; margin-top: 20px">

							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>S.N</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Gender</th>
										<th>Blood group</th>
										<th>Contact No.</th>

										<?php if($this->session->userdata('admintype') == 1): ?>
											<th>Status</th>  
											<th>Action</th>
										<?php endif; ?>
										
									</tr>
								</thead>


								<tbody>

									<?php
									$i = 1; 
									if(is_array($getusers)):
										foreach($getusers as $user): 
											?>

											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $user->FIRSTNAME; ?></td>
												<td><?php echo $user->LASTNAME; ?></td>
												<td><?php echo $user->EMAIL; ?></td>
												<td><?php echo $user->GENDER; ?></td>
												<td><?php echo $user->BLOOD_GROUP ? $user->BLOOD_GROUP : '-'; ?></td>
												<td><?php echo $user->CONTACTNO ? $user->CONTACTNO : '-'; ?></td>

												<?php if($this->session->userdata('admintype') == 1): ?>
												<td>

													<?php 
													$attributes = array('method' => 'post');
													echo form_open('admin/userstatus', $attributes);

													?>  

													<input type="hidden" name="userid" value="<?= $user->ID ?>">

													<?php if ($user->STATUS == 0): ?>
														<button type="submit" class="btn btn-success btn-xs" name="activate"> Activate</button>
													<?php else: ?>
														<button type="submit" class="btn btn-danger btn-xs" name="deactivate"> Deactivate</button>
													<?php endif;  ?>

													<?php echo form_close(); ?>
												</td>
												<td>

													<?php 
													$attributes = array('method' => 'post');
													echo form_open('admin/deleteuser', $attributes);
													?>  
													<input type="hidden" name="userid" value="<?= $user->ID ?>">
													<button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Confirm delete?')"><span class="fa fa-trash-o"></span>
													</button>
													<?php echo form_close(); ?>
												</td>
												<?php endif; ?>

											</tr>

										<?php endforeach; ?>
									<?php endif; ?>

								</tbody>


							</table>

							<br> 

						</div>  

					</div>

				</div>

			</section>
		</div>
		<!-- Main row ends -->

	</section>
	<!-- Main content ends -->
</div>





