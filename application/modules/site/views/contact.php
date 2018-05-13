 <!-- //Line Slider -->
 <div class="top_banner two">
 	<div class="container">
 		<div class="sub-hd-inner">
 			<h3 class="tittle">CONTACT <span>US</span></h3>
 		</div>
 	</div>
 </div>
 <!--/contact-->		
 <div class="contact-top">
 	<div class="container">
 		
 		<div class="contact-form">
 			
 			<div class="col-md-4">



 				<?php if ($this->session->flashdata('feedback_success')): ?>
 					<div class="alert alert-success" style="font-size: 14px; text-align: center;">
 						<i class="fa fa-check-circle"></i>
 						<?php echo $this->session->flashdata('feedback_success') ?>
 					</div>
 				<?php endif; ?>

 				

 				<?php 
 				$attributes = array('id' => 'feedback-form', 'method' => 'post', 'name' => 'feedback-form');
 				echo form_open('site/sendfeedback', $attributes);
 				?>

 				<div>
 					<span><label>SUBJECT</label></span>
 					<span><input name="subject" type="text" id="subject" class="textbox" required></span>
 				</div>

 				<div>					    	
 					<span><label>MESSAGE</label></span>
 					<span><textarea name="message" id="message"> </textarea></span>
 				</div>

 				<div>
 					<span><input type="submit" value="SEND" class="myButton" name="feedback-btn" id="feedback-btn"></span>
 				</div>

 				<?php echo form_close(); ?>
 			</div>

 			<div class="col-md-1">
 			</div>

 			<div class="col-md-7" style="margin-top: 5px">

 				<div id="map"></div>

 				<script>
 					function initMap() {
 						var uluru = {lat: 27.6894, lng: 85.3227};
 						var map = new google.maps.Map(document.getElementById('map'), {
 							zoom: 14,
 							center: uluru
 						});
 						var marker = new google.maps.Marker({
 							position: uluru,
 							map: map
 						});
 					}
 				</script>

 				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATQ1kRnLN9LU0ajAZJbCrBmakbhruQvas&callback=initMap">
 				</script>	

 			</div>
 		</form>
 		<div class="clearfix"></div>
 	</div>
 </div>
</div>
<!--//contact-->	