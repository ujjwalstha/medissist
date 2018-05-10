<?php 
if(is_array($getspecialist)) :

	// print_r($getspecialist);exit;
	foreach($getspecialist as $specialist):  
		?>

		<div class="col-md-3 team_bottom-grid">
			<div class="btm-right">
				<a href="#" id="specialist-img"><img  src="<?php echo base_url().'uploads/images/specialists/'.$specialist->IMAGE ?>" alt=" " ></a>
					<!-- <div class="captn-icon">
						<ul>
							<li><a class="fb" href="#"></a></li>
							<li><a class="twit" href="#"></a></li><li>
								<a class="goog" href="#"></a></li>
							</ul>
						</div> -->
						<div class="captn">
							<h4><?php echo $specialist->NAME; ?></h4>	
							<h5>- <?php echo $specialist->SPECIALIST_TYPE; ?></h5><br>
							<h5>
								<?php if($specialist->ONLINE_STATUS == 1): ?>
									<i class="fa fa-circle text-success"></i> Online
									<?php else: ?>
										<i class="fa fa-circle text-danger"></i> Offline
									<?php endif; ?>
								</h5> <br>

								<a href="<?php echo base_url().'privatemessage/'.$specialist->ID ?>" class="btn btn-danger"><i class="fa fa-envelope"></i> SEND PRIVATE MESSAGE</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>	

				<?php else: ?>
					<div class="alert alert-danger" style="text-align: center; margin-top: 50px" >
						<text>No specialist found.</text>
					</div>
					<div id="refresh-page"><a onclick='window.location.reload(true);' >Refresh this page.</a></div>
				<?php endif; ?>
				
				<div class="clearfix"></div>