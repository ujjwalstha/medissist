 <!-- //Line Slider -->
 <div class="top_banner two">
 	<div class="container">
 		<div class="sub-hd-inner">
 			<h3 class="tittle">KNOW ABOUT <span>YOUR SPECIALIST</span></h3>
 		</div>
 	</div>
 </div>
 <!--/contact-->		
 <div class="contact-top">
 	<div class="container">

		<div class="col-md-1"></div>

 		<div class="col-md-4">
 			<img class="image  thumbnail" src="<?php echo base_url().'uploads/images/specialists/'.$specialist->IMAGE ?>" alt=" " style="height: 330px; width: 330px">
 			<a href="<?php echo base_url().'privatemessage/'.$specialist->ID ?>" class="btn btn-danger btn-md" style="width: 330px"><i class="fa fa-envelope"></i> SEND PRIVATE MESSAGE</a>
 		</div>

 		<div class="col-md-5">
 			<table class="table table-responsive">
 				<tr>
 					<th class="strong-th">Name</th>
 					<td><?php echo $specialist->NAME; ?></td>
 				</tr>

 				<tr>
 					<th class="strong-th">Designation</th>
 					<td><?php echo $specialist->SPECIALIST_TYPE; ?></td>
 				</tr>

 				<tr>
 					<th class="strong-th">Qualification</th>
 					<td><?php echo $specialist->QUALIFICATION ? $specialist->QUALIFICATION : '-'; ?></td>
 				</tr>


 				<tr>
 					<th class="strong-th">Past Affiliation</th>
 					<td><?php echo $specialist->PAST_AFFILIATION ? $specialist->PAST_AFFILIATION : '-' ?></td>
 				</tr>


 				<tr>
 					<th class="strong-th">Membership with health oraganization/associations</th>
 					<td><?php echo $specialist->OVERALL_MEMBERSHIP ? $specialist->OVERALL_MEMBERSHIP : '-'; ?></td>
 				</tr>



 			</table>
 		</div>
 	</div>
 </div>
 <!--//contact-->	