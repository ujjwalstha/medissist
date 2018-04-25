<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $breadcrumb; ?>
			<small><?php echo $breadcrumb_small; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'admin/dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?php echo $breadcrumb; ?></li>
		</ol>
	</section>

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
		</div>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">


				<!-- Calendar -->
				<div class="box box-solid bg-green-gradient">
					<div class="box-header">
						<i class="fa fa-calendar"></i>

						<h3 class="box-title">Calendar</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<!-- button with a dropdown -->
									<!-- <div class="btn-group">
										<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-bars"></i></button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li><a href="#">Add new event</a></li>
												<li><a href="#">Clear events</a></li>
												<li class="divider"></li>
												<li><a href="#">View calendar</a></li>
											</ul>
										</div> -->
										<button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
										
										<!-- </button> -->
									</div>
									<!-- /. tools -->
								</div>
								<!-- /.box-header -->
								<div class="box-body no-padding">
									<!--The calendar -->
									<div id="calendar" style="width: 100%"></div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer text-black">
									<div class="row">
										<div class="col-sm-6">
											<!-- Progress bars -->
											<div class="clearfix">
												<span class="pull-left">Task #1</span>
												<small class="pull-right">90%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 90%;"></div>
											</div>

											<div class="clearfix">
												<span class="pull-left">Task #2</span>
												<small class="pull-right">70%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 70%;"></div>
											</div>
										</div>
										<!-- /.col -->
										<div class="col-sm-6">
											<div class="clearfix">
												<span class="pull-left">Task #3</span>
												<small class="pull-right">60%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 60%;"></div>
											</div>

											<div class="clearfix">
												<span class="pull-left">Task #4</span>
												<small class="pull-right">40%</small>
											</div>
											<div class="progress xs">
												<div class="progress-bar progress-bar-green" style="width: 40%;"></div>
											</div>
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								</div>
							</div>
							<!-- /.box -->


							<!-- quick email widget -->
							<div class="box box-info">
								<div class="box-header">
									<i class="fa fa-envelope"></i>

									<h3 class="box-title">Quick Email</h3>
									<!-- tools box -->
									<div class="pull-right box-tools">
										<button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
										data-toggle="tooltip" title="Collapse">
										<i class="fa fa-minus"></i></button>
									</div>
									<!-- /. tools -->
								</div>
								<div class="box-body">
									<form action="#" method="post">
										<div class="form-group">
											<input type="email" class="form-control" name="emailto" placeholder="Email to:">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="subject" placeholder="Subject">
										</div>
										<div>
											<textarea class="textarea" placeholder="Message"
											style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
										</div>
									</form>
								</div>
								<div class="box-footer clearfix">
									<button type="button" class="pull-right btn btn-default" id="sendEmail">Send
										<i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>


							</section>
							<!-- /.Left col -->
							<!-- right col (We are only adding the ID to make the widgets sortable)-->
							<section class="col-lg-5 connectedSortable">


								<!-- PRODUCT LIST -->
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title">Recently Added Products</h3>

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
											<li class="item">
												<div class="product-img">
													<img src="<?php echo base_url().'assets/admin_assets/dist/img/default-50x50.gif' ?>" alt="Product Image">
												</div>
												<div class="product-info">
													<a href="javascript:void(0)" class="product-title">Samsung TV
														<span class="label label-warning pull-right">$1800</span></a>
														<span class="product-description">
															Samsung 32" 1080p 60Hz LED Smart HDTV.
														</span>
													</div>
												</li>
												<!-- /.item -->
												<li class="item">
													<div class="product-img">
														<img src="<?php echo base_url().'assets/admin_assets/dist/img/default-50x50.gif' ?>" alt="Product Image">
													</div>
													<div class="product-info">
														<a href="javascript:void(0)" class="product-title">Bicycle
															<span class="label label-info pull-right">$700</span></a>
															<span class="product-description">
																26" Mongoose Dolomite Men's 7-speed, Navy Blue.
															</span>
														</div>
													</li>
													<!-- /.item -->
													<li class="item">
														<div class="product-img">
															<img src="<?php echo base_url().'assets/admin_assets/dist/img/default-50x50.gif' ?>" alt="Product Image">
														</div>
														<div class="product-info">
															<a href="javascript:void(0)" class="product-title">Xbox One <span
																class="label label-danger pull-right">$350</span></a>
																<span class="product-description">
																	Xbox One Console Bundle with Halo Master Chief Collection.
																</span>
															</div>
														</li>
														<!-- /.item -->
														<li class="item">
															<div class="product-img">
																<img src="<?php echo base_url().'assets/admin_assets/dist/img/default-50x50.gif' ?>" alt="Product Image">
															</div>
															<div class="product-info">
																<a href="javascript:void(0)" class="product-title">PlayStation 4
																	<span class="label label-success pull-right">$399</span></a>
																	<span class="product-description">
																		PlayStation 4 500GB Console (PS4)
																	</span>
																</div>
															</li>
															<!-- /.item -->
														</ul>
													</div>
													<!-- /.box-body -->
													<div class="box-footer text-center">
														<a href="javascript:void(0)" class="uppercase">View All Products</a>
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
								</div>