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
						<h3 class="box-title">Update medicinal product</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-4"></div>

						<div class="col-md-4">
							<?php if ($this->session->flashdata('medicinalproduct_success')): ?>
								<div class="alert alert-success" style="font-size: 14px; text-align: center;">
									<i class="fa fa-check-circle"></i>
									<?php echo $this->session->flashdata('medicinalproduct_success') ?>
								</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('medicinalproduct_fail')): ?>
								<div class="alert alert-danger"  style="font-size: 14px; text-align: center;">
									<i class="fa fa-times-circle"></i>
									<?php echo $this->session->flashdata('medicinalproduct_fail') ?>
								</div>
							<?php endif; ?>
						</div>

						<div class="col-md-4"></div>

						<div class="col-md-12" style="margin-top: 20px">

								<?php 
								$attributes = array('id' => 'editmedicinalproduct', 'method' => 'post', 'name' => 'editmedicinalproduct');
								echo form_open_multipart('admin/editmedicinalproduct', $attributes);
								?>

								<div class="control-group">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" placeholder="Enter Title" name="name" id="name" value="<?php echo $getmedicinalproduct->NAME ?>">
										<input type="hidden" name="id" value="<?php echo $getmedicinalproduct->ID ?>">
									</div>
								</div>


								<div class="control-group">
									<div class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control"  name="slug" id="slug" readonly value="<?php echo $getmedicinalproduct->SLUG ?>">
									</div>
								</div>


								<div class="control-group">
									<div class="form-group">
										<label>Description</label>
										<textarea name="description"  id="description" class="form-control"><?php echo $getmedicinalproduct->DESCRIPTION ?></textarea>
									</div>
								</div>


								<br>

								<div class="form-group">
									<button type="submit" class="btn btn-warning" name="editmedicinalproduct-btn" id="editmedicinalproduct-btn"><i class="fa fa-edit"></i> Update</button>
								</div>

								<?php echo form_close(); ?>
							
						</div>

						



						

					</div>

				</div>

			</section>
		</div>
		<!-- Main row ends -->

	</section>
	<!-- Main content ends -->
</div>





