

<div class="top_banner two">
	<div class="container">
		<div class="sub-hd-inner">
			<h3 class="tittle">PRIVATE <span>MESSAGE</span></h3>
		</div>
	</div>
</div>


<!--//team-->
<div class="private_message">
	<div class="container-fluid">
		<div class="row">

			<div class="panel-body" style="border: 1px silver solid; padding: 40px; height: 500px; overflow-y: scroll;">	

				<?php if ($this->session->flashdata('msg_send_fail')): ?>
					<div class="alert alert-danger" style="text-align: center; font-size: 14px">
						<i class="fa fa-times-circle"></i>
						<?php echo $this->session->flashdata('msg_send_fail') ?>
					</div>
				<?php endif; ?>

				<ul class="chat" >

					<?php if(is_array($getPrivateMessage)): 
					foreach($getPrivateMessage as $pvtmsg): ?>

						<li class="<?php echo ($pvtmsg->USER_TYPE == 'user') ? 'right' : 'left' ?> clearfix" style="padding: 20px; background-color: <?php echo ($pvtmsg->USER_TYPE == 'user') ? '#c4e8ee' : '#ffc1d1' ?>; border-radius: 9px; margin-bottom: 20px">

							<span class="chat-img <?php echo ($pvtmsg->USER_TYPE == 'user') ? 'pull-right' : 'pull-left' ?>">

							<?php if($pvtmsg->USER_TYPE == 'user'): ?>

								<img src="<?php echo ($user_detail->GENDER == 'male') ? base_url().'assets/images/male.png' : base_url().'assets/images/female.png' ?>" alt="User Avatar" class="img-circle" style="height: 50px; width: 50px">

							<?php else: ?>

								<a href="<?php echo base_url().'site/specialistprofile/'.$getSpecialistById->ID ?>"><img src="<?php echo base_url().'uploads/images/specialists/'.$getSpecialistById->IMAGE ?>" alt="User Avatar" class="img-circle" style="height: 50px; width: 50px"></a>

							<?php endif; ?>

							</span>

							<div class="chat-body clearfix">
								<div class="header">
									
								<?php if($pvtmsg->USER_TYPE == 'user'): ?>
									<text class=" text-muted sent-time"><span class="glyphicon glyphicon-time "></span>
										<?php 
										$created = $pvtmsg->CREATED;
										$timestamp = strtotime($created);
										// $sec = date('s', $timestamp); 
										echo time_since(time() - $timestamp).' ago' ; 
										?> 
									</text>
									<text class="pull-right primary-font" style="font-size: 15px"><?php echo $pvtmsg->NAME; ?></text>

								<?php else: ?>
									<text class="primary-font" style="font-size: 15px"><?php echo $pvtmsg->NAME; ?></text> <text class="pull-right text-muted sent-time">
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
			</div>

			<div class="panel-footer">
				<?php 

				$receiverid = $this->uri->segment(2);
				$attributes = array('id' => 'privatemsg-form', 'method' => 'post', 'name' => 'privatemsg-form');
				echo form_open('sendprivatemsg', $attributes); 
				?>

				<div class="input-group">

					<input id="privatemsg" name="privatemsg" type="text" class="form-control " placeholder="Type your message here..." />
					<input id="receiverid" name="receiverid" type="hidden" value="<?php echo $receiverid ?>">
					<input id="senderid" name="senderid" type="hidden" value="<?php echo $user_detail->ID ?>" />
					<span class="input-group-btn">
						<button class="btn btn-info" id="privatemsg-btn" name="privatemsg-btn">Send</button>
					</span>

				</div>
				<?php echo form_close(); ?>
			</div>

		</div>





		<div class="clearfix"></div>
	</div>



</div>			
<!--//team-->