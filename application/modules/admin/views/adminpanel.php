<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $breadcrumb; ?>
			<small><?php echo $breadcrumb_small; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'admin/adminpanel'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<!-- <li class="active"><?php //echo $breadcrumb; ?></li> -->
		</ol>
	</section>

	<?php if($this->session->userdata('admintype') == 1): ?>

		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><?php echo $specialistCount; ?></h3>

							<p>Specialist Registrations</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?php echo base_url().'admin/managespecialist' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo $userCount; ?></h3>

							<p>User Registrations</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?php echo base_url().'admin/manageuser' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?php echo $forumQuestionCount; ?></h3>  <!-- <sup style="font-size: 20px">%</sup> -->

							<p>Forum Questions</p>
						</div>
						<div class="icon">
							<i class="ion ion-help-circled"></i>
						</div>
						<a href="<?php echo base_url().'admin/managequestions' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo $forumAnswerCount; ?></h3>

							<p>Forum Answers</p>
						</div>
						<div class="icon">
							<i class="ion ion-chatbubbles"></i>
						</div>
						<a href="<?php echo base_url().'admin/manageanswers' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo $specialistTypeCount; ?></h3>

							<p>Specialist Type</p>
						</div>
						<div class="icon">
							<i class="ion ion-plus"></i>
						</div>
						<a href="<?php echo base_url().'admin/managespecialisttype' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-purple">
						<div class="inner">
							<h3><?php echo $healthProblemCount; ?></h3>

							<p>Health Problem</p>
						</div>
						<div class="icon">
							<i class="ion ion-plus"></i>
						</div>
						<a href="<?php echo base_url().'admin/healthproblems' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-orange">
						<div class="inner">
							<h3><?php echo $medicinalProductCount; ?></h3>

							<p>Medicinal Product</p>
						</div>
						<div class="icon">
							<i class="ion ion-plus"></i>
						</div>
						<a href="<?php echo base_url().'admin/medicinalproduct' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->

			<!-- Main row -->
			<div class="row">
				<!-- right col (We are only adding the ID to make the widgets sortable)-->
					<section class="col-lg-4 connectedSortable">


						<!-- PRODUCT LIST -->
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Recently Added Health Problem</h3>

								<!-- tools box -->
								<div class="pull-right box-tools">
									<button type="button" class="btn btn-danger btn-sm pull-right" data-widget="collapse"
									data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>
								</div>
								<!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<ul class="products-list product-list-in-box">
									<?php foreach($getRecentHealthProblems as $health): ?>
										<li class="item">
											<div class="product-img">
												<i class="fa fa-heartbeat" style="color: #dd4b39; font-size: 25px"></i>
											</div>
											<div class="product-info">
												<a href="javascript:void(0)" class="product-title"><?php echo $health->NAME; ?>
												<span class="label label-warning pull-right"><?php $date = $health->CREATED_ON; $timestamp = strtotime($date); echo date('d M, Y', $timestamp); ?></span></a>
												<span class="product-description">
													<?php echo get_words(strip_tags($health->DESCRIPTION), 5).'...'; ?>
												</span>
											</div>
										</li>
									<?php endforeach; ?>


								</ul>
							</div>
							<!-- /.box-body -->
							<div class="box-footer text-center">
								<a href="<?php echo base_url().'admin/healthproblems' ?>" class="uppercase">View All</a>
							</div>
							<!-- /.box-footer -->
						</div>
						<!-- /.box -->

					</section>
					<!-- right col -->

					
					<!-- right col (We are only adding the ID to make the widgets sortable)-->
					<section class="col-lg-4 connectedSortable">


						<!-- PRODUCT LIST -->
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Recently Added Medicinal Products</h3>

								<!-- tools box -->
								<div class="pull-right box-tools">
									<button type="button" class="btn btn-success btn-sm pull-right" data-widget="collapse"
									data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>
								</div>
								<!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<ul class="products-list product-list-in-box">
									<?php foreach($getRecentMedicinalProduct as $medicinal): ?>
										<li class="item">
											<div class="product-img">
												<i class="	fa fa-medkit" style="color: #00a65a; font-size: 25px"></i>
											</div>
											<div class="product-info">
												<a href="javascript:void(0)" class="product-title"><?php echo $medicinal->NAME; ?>
												<span class="label label-warning pull-right"><?php $date = $medicinal->CREATED_ON; $timestamp = strtotime($date); echo date('d M, Y', $timestamp); ?></span></a>
												<span class="product-description">
													<?php echo get_words(strip_tags($medicinal->DESCRIPTION), 5).'...'; ?>
												</span>
											</div>
										</li>
									<?php endforeach; ?>


								</ul>
							</div>
							<!-- /.box-body -->
							<div class="box-footer text-center">
								<a href="<?php echo base_url().'admin/medicinalproduct' ?>" class="uppercase">View All</a>
							</div>
							<!-- /.box-footer -->
						</div>
						<!-- /.box -->

					</section>
					<!-- right col -->



					<!-- right col (We are only adding the ID to make the widgets sortable)-->
					<section class="col-lg-4 connectedSortable">


						<!-- PRODUCT LIST -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Recently Added Health Specialist</h3>

								<!-- tools box -->
								<div class="pull-right box-tools">
									<button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
									data-toggle="tooltip" title="Collapse">
									<i class="fa fa-minus"></i></button>
								</div>
								<!-- /. tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<ul class="products-list product-list-in-box">
									<?php foreach($getrecentspecialist as $specialist): ?>
										<li class="item">
											<div class="product-img">
												<img src="<?php echo base_url().'uploads/images/specialists/'.$specialist->IMAGE ?>" alt="Product Image">
											</div>
											<div class="product-info">
												<a href="javascript:void(0)" class="product-title"><?php echo $specialist->NAME; ?>
												<span class="label label-warning pull-right"><?php $date = $specialist->CREATED_DATE; $timestamp = strtotime($date); echo date('d M, Y', $timestamp); ?></span></a>
												<span class="product-description">
													<?php echo $specialist->SPECIALIST_TYPE; ?>
												</span>
											</div>
										</li>
									<?php endforeach; ?>


								</ul>
							</div>
							<!-- /.box-body -->
							<div class="box-footer text-center">
								<a href="<?php echo base_url().'admin/managespecialist' ?>" class="uppercase">View All</a>
							</div>
							<!-- /.box-footer -->
						</div>
						<!-- /.box -->

					</section>
					<!-- right col -->

				</div>
				<!-- /.row (main row) -->

			</section>
			<!-- /.content -->

			<?php else: ?>

				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">

						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3><?php echo $userCount; ?></h3>

									<p>User Registrations</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="<?php echo base_url().'admin/manageuser' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				</section>


			<?php endif; ?>
		</div>