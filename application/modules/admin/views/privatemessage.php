<?php 
function time_since($since) {
	$chunks = array(
		array(60 * 60 * 24 * 365 , 'year'),
		array(60 * 60 * 24 * 30 , 'month'),
		array(60 * 60 * 24 * 7, 'week'),
		array(60 * 60 * 24 , 'day'),
		array(60 * 60 , 'hour'),
		array(60 , 'minute'),
		array(1 , 'second')
	);

	for ($i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
		$name = $chunks[$i][1];
		if (($count = floor($since / $seconds)) != 0) {
			break;
		}
	}

	$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
	return $print;
}
?>



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
						<h3 class="box-title">Private Message</h3>
					</div>

					<!-- /.box-header -->
					<div class="box-body">

						<div class="panel-body" style="border: 1px silver solid; padding: 40px; height: 408px; overflow-y: scroll;">	

							<?php if ($this->session->flashdata('msg_send_fail')): ?>
								<div class="alert alert-danger" style="text-align: center; font-size: 14px">
									<i class="fa fa-times-circle"></i>
									<?php  echo $this->session->flashdata('msg_send_fail') ?>
								</div>
							<?php endif; ?>

							<ul class="chat" style="width: 100%">

								<?php if(is_array($getPrivateMessage)): 
								foreach($getPrivateMessage as $pvtmsg): ?>

								<li class="<?php echo ($pvtmsg->USER_TYPE == 'admin') ? 'right' : 'left' ?> clearfix" style="padding: 20px; background-color: <?php echo ($pvtmsg->USER_TYPE == 'admin') ? '#c4e8ee' : '#ffc1d1' ?>; border-radius: 8px; margin-bottom: 20px">

									<span class="chat-img <?php echo ($pvtmsg->USER_TYPE == 'admin') ? 'pull-right' : 'pull-left' ?>">

										<?php if($pvtmsg->USER_TYPE == 'admin'): ?>

											<img src="<?php echo base_url().'uploads/images/specialists/'.$admin_details->IMAGE ?>" alt="User Avatar" class="img-circle" style="height: 50px; width: 50px">

										<?php else: ?>

											<img src="<?php echo ($getUserById->GENDER == 'male') ? base_url().'assets/images/male.png' : base_url().'assets/images/female.png' ?>" alt="User Avatar" class="img-circle" style="height: 50px; width: 50px">

										<?php endif; ?>

									</span>

									<div class="chat-body clearfix">
										<div class="header">

											<?php if($pvtmsg->USER_TYPE == 'admin'): ?>
												<text class=" text-muted sent-time"><span class="glyphicon glyphicon-time "></span>
													<?php 
													$created = $pvtmsg->CREATED;
													$timestamp = strtotime($created);
										// $sec = date('s', $timestamp); 
													echo time_since(time() - $timestamp).' ago' ; 
													?> 
												</text>
												<strong class="pull-right primary-font"><?php echo $pvtmsg->NAME; ?></strong>

											<?php else: ?>
												<strong class="primary-font"><?php echo $pvtmsg->NAME; ?></strong> <text class="pull-right text-muted sent-time">
													<span class="glyphicon glyphicon-time"></span>
													<?php 
													$created = $pvtmsg->CREATED;
													$timestamp = strtotime($created);
										// $sec = date('s', $timestamp); 
													echo time_since(time() - $timestamp).' ago'; 
													?>  
												</text>

											<?php endif; ?>

										</div>
										<p class="message-display" style="margin: 10px 0 10px 0;" >
											<?php echo $pvtmsg->MESSAGE; ?>
										</p>
									</div>
								</li>

							<?php endforeach; ?>

						<?php endif; ?>

					</ul>
				</div>

				<div class="panel-footer">
					<?php 

					$receiverid = $this->uri->segment(3);
					$attributes = array('id' => 'privatemsg-form', 'method' => 'post', 'name' => 'privatemsg-form');
					echo form_open('admin/sendprivatemsg', $attributes); 
					?>

					<div class="input-group">

						<input id="privatemsg" name="privatemsg" type="text" class="form-control " placeholder="Type your message here..." />
						<input id="receiverid" name="receiverid" type="hidden" value="<?php echo $receiverid ?>">
						<input id="senderid" name="senderid" type="hidden" value="<?php echo $admin_details->ID ?>" />
						<span class="input-group-btn">
							<button class="btn btn-info" id="privatemsg-btn" name="privatemsg-btn">Send</button>
						</span>

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





