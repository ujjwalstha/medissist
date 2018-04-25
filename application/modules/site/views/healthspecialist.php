
<div class="top_banner two">
	<div class="container">
		<div class="sub-hd-inner">
			<h3 class="tittle">HEALTH <span>SPECIALIST</span></h3>
		</div>
	</div>
</div>


<!--//team-->
<div class="team_agile">
	<div class="container">

		<div class="sub-hd two">
			<h3 class="tittle two">MEET THE <span class="two">SPECIALISTS</span></h3>
		</div>

		<?php foreach($getspecialist as $specialist):  ?>

			<div class="col-md-4 team_bottom-grid">
				<div class="btm-right">
					<img src="<?php echo base_url().'uploads/images/specialists/'.$specialist->IMAGE ?>" alt=" ">
					<div class="captn-icon">
						<ul>
							<li><a class="fb" href="#"></a></li>
							<li><a class="twit" href="#"></a></li><li>
								<a class="goog" href="#"></a></li>
							</ul>
						</div>
						<div class="captn">
							<h4><?php echo $specialist->NAME; ?></h4>	
							<h2>- <?php echo $specialist->SPECIALIST_TYPE; ?></h2><br>
							<h2>
								<?php if($specialist->ONLINE_STATUS == 1): ?>
									<i class="fa fa-circle text-success"></i> Online
								<?php else: ?>
									<i class="fa fa-circle text-danger"></i> Offline
								<?php endif; ?>
							</h2> <br>
							<a href="<?php echo base_url().'privatemessage/'.$specialist->ID ?>" class="btn btn-danger"><i class="fa fa-envelope"></i> SEND PRIVATE MESSAGE</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>	
			<div class="clearfix"></div>
		</div>



	</div>			
<!--//team-->

<div class="container alert-message text-muted">
	<span style="font-weight: bold; color: #e45753;">ATTENTION:</span>  Send private message to the specialist if they are unavailable. Orelse you can instantly chat with them through chat media located at the bottom. Thank you.
</div>