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
						<h3 class="box-title">Manage specialist type</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12" style="margin-top: 20px">
							<div class="col-md-4">

								<?php 
								$attributes = array('id' => 'editspecialisttype', 'method' => 'post', 'name' => 'editspecialisttype');
								echo form_open_multipart('admin/editspecialisttype', $attributes);
								?>

								<div class="control-group">
									<div class="form-group">
										<label><h4 style="font-weight: bold;">Edit specialist type:</h4></label>
										<input type="text" class="form-control" placeholder="Enter specialist type here " name="specialisttype" id="specialisttype" value="<?php echo $specialisttype->SPECIALIST_TYPE ?>">
										<input type="hidden" name="typeid" value="<?php echo $specialisttype->TYPEID ?>">
									</div>
									<button type="submit" class="btn btn-warning" name="editspecialisttype-btn" id="editspecialisttype-btn"><i class="fa fa-edit"></i> Edit</button>
								</div>

								<?php echo form_close(); ?>
							</div>
						</div>

						



						

					</div>

				</div>

			</section>
		</div>
		<!-- Main row ends -->

	</section>
	<!-- Main content ends -->
</div>





