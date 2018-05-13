<!--/start-footer-section-->
		<div class="footer-section">
			<div class="container">
				<div class="footer-grids wow bounceIn animated" data-wow-delay="0.4s">
					<div class="col-md-3 footer-grid">
						<h4>About <span>Medissist</span></h4>
						<div class="border2"></div>
						<p>Online Health Assistive System. Welcome to Medissist, place where you can get free medical advise from professional health specialist. No card payment or card details required. Don't worry, we wont ask <a href="<?php echo base_url().'home' ?>" style="color: gray">[...]</a></p>
					</div>
					
					<div class="col-md-3 footer-grid tweet">
						<h4>Quick <span>Links</span></h4>
						<div class="border2"></div>

						<div class="icon-3-square">
							<a href="<?php echo base_url().'home' ?>"><i class="fa fa-hand-o-right" style="color: #2ad2c9"></i></a>
						</div>
						<div class="icon-text">
							<p><a href="<?php echo base_url().'home' ?>"> Home </a></p>
						</div>
						<div class="clearfix"></div>

						<div class="icon-3-square">
							<a href="<?php echo base_url().'medicines' ?>"><i class="fa fa-hand-o-right" style="color: #2ad2c9"></i></a>
						</div>
						<div class="icon-text">
							<p><a href="<?php echo base_url().'medicines' ?>"> Health Care and Medicines </a></p>
						</div>
						<div class="clearfix"></div>

						<div class="icon-3-square">
							<a href="<?php echo base_url().'healthspecialist' ?>"><i class="fa fa-hand-o-right" style="color: #2ad2c9"></i></a>
						</div>
						<div class="icon-text">
							<p><a href="<?php echo base_url().'healthspecialist' ?>"> Health Specialists </a></p>
						</div>
						<div class="clearfix"></div>

						<div class="icon-3-square">
							<a href="<?php echo base_url().'forum' ?>"><i class="fa fa-hand-o-right" style="color: #2ad2c9"></i></a>
						</div>
						<div class="icon-text">
							<p><a href="<?php echo base_url().'forum' ?>"> Forum </a></p>
						</div>
						<div class="clearfix"></div>

						<div class="icon-3-square">
							<a href="<?php echo base_url().'contact' ?>"><i class="fa fa-hand-o-right" style="color: #2ad2c9"></i></a>
						</div>
						<div class="icon-text">
							<p><a href="<?php echo base_url().'contact' ?>"> Contact </a></p>
						</div>
						<div class="clearfix"></div>
					</div>

					

					<div class="col-md-3 footer-grid tweet">
						<h4>Keep In <span>Touch</span></h4>
						<div class="border2"></div>

						<div class="icon-3-square">
							<i class="fa fa-envelope" style="color: #2ad2c9"></i>
						</div>
						<div class="icon-text">
							<p> info.medissist@gmail.com </p>
						</div>
						<div class="clearfix"></div>

						<div class="icon-3-square">
							<i class="fa fa-phone" style="color: #2ad2c9"></i>
						</div>
						<div class="icon-text">
							<p> +977 9841 234567 </p>
						</div>
						<div class="clearfix"></div>

						<div class="icon-3-square">
							<i class="fa fa-map-marker" style="color: #2ad2c9"></i>
						</div>
						<div class="icon-text">
							<p> Thapathali, Kathmandu Nepal </p>
						</div>
						<div class="clearfix"></div>

						
					</div>

					<div class="col-md-3 footer-grid flickr">
						<a href="<?php echo base_url().'healthspecialist' ?>"><h4>MEET <span>SPECIALISTS </span></h4></a>
						<div class="border2"></div>
						<div class="flickr-grids">
						<?php $i = 1; foreach($getspecialist as $specialist): ?>
							<div class="flickr-grid">
								<a href="#"><img src="<?php echo base_url().'uploads/images/specialists/'.$specialist->IMAGE ?>" alt=" " title="<?php echo $specialist->NAME ?>" style="max-height: 81.59px"></a>
							</div>
						<?php if($i++ == 6){break;} endforeach; ?>
							
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--//end-footer-section-->
		<!--//footer-->
		<div class="footer-bottom">
			<div class="container">
				<p>© 2018 Medissist. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		</div>
		<!--start-smooth-scrolling-->
		<script type="text/javascript">
			$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
								 		*/

								 		$().UItoTop({ easingType: 'easeOutQuart' });

								 	});
								 </script>
								 <!--end-smooth-scrolling-->
								 <a href="#house" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
								 <script src="<?php echo base_url().'assets/bootstrap-3.3.7/js/bootstrap.min.js' ?>"></script>

								 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5adfd89e227d3d7edc24b632/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>