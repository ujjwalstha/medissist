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
						<h3 class="box-title">Manage specialist type</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12">

							<div class="col-md-4"></div>

							<div class="col-md-4">

								<?php if ($this->session->flashdata('addspecialisttype_success')): ?>
									<div class="alert alert-success" style="font-size: 14px; text-align: center;">
										<i class="fa fa-check-circle"></i>
										<?php echo $this->session->flashdata('addspecialisttype_success') ?>
									</div>
								<?php endif; ?>

								<?php if ($this->session->flashdata('addspecialisttype_fail')): ?>
									<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
										<i class="fa fa-times-circle"></i>
										<?php echo $this->session->flashdata('addspecialisttype_fail') ?>
									</div>
								<?php endif; ?>


							</div>

							<div class="col-md-4"></div>

						</div>

						<div class="col-md-12" style="margin-top: 20px">
							<div class="col-md-4">

								<?php 
								$attributes = array('id' => 'addspecialisttype', 'method' => 'post', 'name' => 'addspecialisttype');
								echo form_open_multipart('admin/addspecialisttype', $attributes);
								?>

								<div class="control-group">
									<div class="form-group">
										<label><h4 style="font-weight: bold;">Add specialist type:</h4></label>
										<input type="text" class="form-control" placeholder="Enter specialist type here " name="specialisttype" id="eventtype">
									</div>
									<button type="submit" class="btn btn-success" name="addspecialisttype-btn" id="addspecialisttype-btn"><i class="fa fa-plus"></i> Add</button>
								</div>

								<?php echo form_close(); ?>
							</div>
						</div>

						<div class="col-md-4"></div>
						<div class="col-md-4">

							<?php if ($this->session->flashdata('typedelete_success')): ?>
								<div class="alert alert-success" style="text-align: center;font-size: 14px">
									<i class="fa fa-check-circle"></i>
									<?= $this->session->flashdata('typedelete_success'); ?>
								</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('typedelete_fail')): ?>
								<div class="alert alert-danger" style="text-align: center;font-size: 14px">
									<i class="fa fa-times-circle"></i>
									<?= $this->session->flashdata('typedelete_fail'); ?>
								</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('typeupdate_success')): ?>
								<div class="alert alert-success" style="text-align: center;font-size: 14px">
									<i class="fa fa-check-circle"></i>
									<?= $this->session->flashdata('typeupdate_success'); ?>
								</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('typeupdate_fail')): ?>
								<div class="alert alert-danger" style="text-align: center;font-size: 14px">
									<i class="fa fa-times-circle"></i>
									<?= $this->session->flashdata('typeupdate_fail'); ?>
								</div>
							<?php endif; ?>

						</div>
						<div class="col-md-4"></div>



						<div class="col-md-12" style="overflow-x: scroll; margin-top: 50px">

							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>S.N</th>
										<th nowrap>Specialist type</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>


								<tbody>

									<?php
									$i = 1; 
									if(is_array($getspecialisttype)):
										foreach($getspecialisttype as $type): 
											?>

											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $type->SPECIALIST_TYPE; ?></td>
												<td>
													<a href="<?php echo base_url().'admin/editspecialisttype/'.$type->TYPEID ?>"><button type="submit" class="btn btn-warning btn-xs" id="editBtn" name="editBtn"><span class="fa fa-edit"></span>
													</button></a>
												</td>

												<td>

													<?php 
													$attributes = array('method' => 'post');
													echo form_open('admin/deletespecialisttype', $attributes);
													?>  
													<input type="hidden" name="typeid" value="<?= $type->TYPEID ?>">
													<button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Are you sure to delete this answer?')"><span class="fa fa-trash-o"></span>
													</button>
													<?php echo form_close(); ?><br>
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





