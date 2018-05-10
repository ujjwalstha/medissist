<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo "Admin"; ?>
			<small><?php echo $breadcrumb; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'admin/dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
						<h3 class="box-title">Manage health problems</h3>

						<button class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add</button>

						<!-- Modal -->

						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-lg">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" style="background-color: #5cb85c; color: white">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-plus"></i> Add Health Problem Detail</h4>
									</div>
									<div class="modal-body">


										<?php 
										$attributes = array('id' => 'addhealthproblems', 'method' => 'post', 'name' => 'addhealthproblems');
										echo form_open_multipart('admin/addhealthproblems', $attributes);
										?>

										<div class="control-group">
											<div class="form-group ">
												<label>Title</label>
												<input type="text" class="form-control" placeholder="Enter Title" name="name" id="name">
											</div>
										</div>


										<div class="control-group">
											<div class="form-group ">
												<label>Slug</label>
												<input type="text" class="form-control"  name="slug" id="slug" readonly>
											</div>
										</div>


										<div class="control-group">
											<div class="form-group ">
												<label>Description</label>
												<textarea name="description"  id="description" class="form-control"></textarea>
											</div>
										</div>


										<br>

										<div class="form-group">
											<button type="submit" class="btn btn-success" name="addhealthproblems-btn" id="addhealthproblems-btn"><i class="fa fa-plus-circle"></i> Add</button>
										</div>
										<?php echo form_close(); ?>

									</div>
								</div>

							</div>
						</div>

						<!-- MODAL ENDS HERE -->
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12">

							<div class="col-md-4"></div>

							<div class="col-md-4">
								<?php if ($this->session->flashdata('addhealthproblem_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('addhealthproblem_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('addhealthproblem_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('addhealthproblem_fail') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('healthproblem_activate_success')): ?>
									<div class="alert alert-success" style="text-align: center;font-size: 12px">
										<i class="fa fa-check-circle"></i>
										<?= $this->session->flashdata('healthproblem_activate_success'); ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('healthproblem_deactivate_success')): ?>
									<div class="alert alert-danger" style="text-align: center;font-size: 12px">
										<i class="fa fa-check-circle"></i>
										<?= $this->session->flashdata('healthproblem_deactivate_success'); ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('healthproblem_delete_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('healthproblem_delete_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('healthproblem_delete_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('healthproblem_delete_fail') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('healthproblem_update_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('healthproblem_update_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('healthproblem_update_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('healthproblem_update_fail') ?>
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
										<th>Title</th>
										<th>Description</th>
										<th>Status</th>  
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>


								<tbody>

									<?php
									$i = 1; 
									if(is_array($getHealthProblems)):
										foreach($getHealthProblems as $healthproblem): 
											?>

											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $healthproblem->NAME; ?></td>
												<td><?php echo $healthproblem->DESCRIPTION; ?></td>

												<td>

													<?php 
													$attributes = array('method' => 'post');
													echo form_open('admin/healthproblemstatus', $attributes);

													?>  

													<input type="hidden" name="userid" value="<?= $healthproblem->ID ?>">

														<?php if ($healthproblem->STATUS == 0): ?>
															<button type="submit" class="btn btn-success btn-xs" name="activate"> Activate</button>
														<?php else: ?>
																<button type="submit" class="btn btn-danger btn-xs" name="deactivate"> Deactivate</button>
														<?php endif;  ?>

													<?php echo form_close(); ?>
													</td>

													<td>
														<a href="<?php echo base_url().'admin/edithealthproblem/'.$healthproblem->ID ?>"><button type="submit" class="btn btn-warning btn-xs" id="editBtn" name="editBtn"><span class="fa fa-edit"></span>
														</button></a>
													</td>

													<td>

														<?php 
														$attributes = array('method' => 'post');
														echo form_open('admin/deletehealthproblem', $attributes);
														?>  
														<input type="hidden" name="id" value="<?= $healthproblem->ID ?>">
														<button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Are you sure to delete?')"><span class="fa fa-trash-o"></span>
														</button>
														<?php echo form_close(); ?>
													</td>
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





