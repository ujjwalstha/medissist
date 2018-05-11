
<div class="top_banner two">
	<div class="container">
		<div class="sub-hd-inner">
			<h3 class="tittle">HEALTH CARE<span> AND MEDICINES</span></h3>
		</div>
	</div>
</div>


<!--//team-->
<div class="team_agile">
	<div class="container">

		<div class="sub-hd two">
			<h3 class="tittle two">FIND WHAT YOU <span class="two">ARE LOOKING FOR?</span></h3>
		</div>

		<div class="col-md 12">
			
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs" style="margin-top: 70px">

				<ul id="myTab" class="nav nav-tabs" role="tablist" style="border: none;">

					<li role="presentation" class="active"><a href="#healthproblem" id="healthproblem-tab" role="tab" data-toggle="tab" aria-controls="healthproblem" >Health Problems</a></li>

					<li role="presentation"><a href="#medicalproduct" role="tab" id="medicalproduct-tab" data-toggle="tab" aria-controls="medicalproduct">Medicinal Products</a></li>


					<!-- <li role="presentation"><a href="#tree" role="tab" id="tree-tab" data-toggle="tab" aria-controls="tree">Extras</a></li> -->
				</ul>

				<div id="myTabContent" class="tab-content">

					<div role="tabpanel" class="tab-pane fade in active" id="healthproblem" aria-labelledby="healthproblem-tab">
						<div class="col-md-3 col-sm-3 tab-image" style="margin-top: 25px">
						
							<input type="text" id="myHealthInput" onkeyup="myHealthFunction()" placeholder="Search for health problem" title="Type in a name">

							<ul id="myHealthUL">
								<?php foreach($gethealthproblems as $healthproblem): ?>
									<li><a href="#" id="healthproblem-list" data-id="<?php echo $healthproblem->ID ?>"><?php echo $healthproblem->NAME; ?></a></li>
								<?php endforeach; ?>
							</ul>

							<script>
								function myHealthFunction() {
									var input, filter, ul, li, a, i;
									input = document.getElementById("myHealthInput");
									filter = input.value.toUpperCase();
									ul = document.getElementById("myHealthUL");
									li = ul.getElementsByTagName("li");
									for (i = 0; i < li.length; i++) {
										a = li[i].getElementsByTagName("a")[0];
										if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
											li[i].style.display = "";
										} else {
											li[i].style.display = "none";

										}
									}
								}
							</script>

						</div>

						<div class="col-md-9 col-sm-9 tab-info" id="healthproblemcontent" style="margin-top: 7px">
							<div class="loader mx-auto" id="loading"></div>
						</div>
						<div class="clearfix"></div>
					</div>




					<div role="tabpanel" class="tab-pane fade" id="medicalproduct" aria-labelledby="medicalproduct-tab">
						
						<div class="col-md-3 col-sm-3 tab-image" style="margin-top: 25px">
							<input type="text" id="myMedicineInput" onkeyup="myFunction()" placeholder="Search for medicine names" title="Type in a name">

							<ul id="myMedicineUL">
								<?php foreach($getmedicinalproduct as $medicinalproduct): ?>
									<li><a href="#" id="medicinalproduct-list" data-id="<?php echo $medicinalproduct->ID ?>"><?php echo $medicinalproduct->NAME; ?></a></li>
								<?php endforeach; ?>
							</ul>

							<script>
								function myFunction() {

									var input, filter, ul, li, a, i;
									input = document.getElementById("myMedicineInput");
									filter = input.value.toUpperCase();
									ul = document.getElementById("myMedicineUL");
									li = ul.getElementsByTagName("li");
									for (i = 0; i < li.length; i++) {
										a = li[i].getElementsByTagName("a")[0];
										if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
											li[i].style.display = "";
										} else {
											li[i].style.display = "none";

										}
									}

									
								}
							</script>

							

						</div>

						<div class="col-md-9 col-sm-9 tab-info"  id="medicinalcontent" style="margin-top: 7px">
							<div class="loader mx-auto" id="loading"></div>
						</div>
						<div class="clearfix"></div>

					</div>


					<!-- <div role="tabpanel" class="tab-pane fade" id="tree" aria-labelledby="tree-tab">
						<div class="col-md-5 col-sm-5 tab-image">
							<img src="<?php //echo base_url().'assets/images/5.jpg' ?>" alt="Medicinal">
						</div>
						<div class="col-md-7 col-sm-7 tab-info">
							<p> This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact form, accompanied by English versions from the 1914 translation by H. Rackham. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
						</div>
						<div class="clearfix"></div>
					</div> -->


					
				</div>
			</div>

		</div>
		
		


		<div class="clearfix"></div>
	</div>



</div>			
<!--//team-->


<script>

	$(document).ready(function() {

		$(window).on('load', function(){ //for displaying all the data as the page loads(but not working -_-)
			// alert('hi');
			$("#healthproblem-list").trigger("click");
		})

		$(document).ajaxStart(function(){  //For loader 
			$('#loading').show();
		}).ajaxStop(function(){
			$('#loading').hide();
		})

		$(document).off("click", "#healthproblem-list").on("click", "#healthproblem-list", function(e){
			e.preventDefault();
	         
	         var title = $(this).text();
	         var id  = $(this).data('id');
	         // alert(id);
	         var url = "<?php echo base_url('site/healthproblemdata') ?>";

	         $.ajax({
	         	type : "post",
	         	url  : url,
	         	cache: true,
	         	data : {"id" : id, "title" : title},
	         	dataType : "json",

	         	success : function(resp) {
	         		if(resp.status == 'success'){
	         			$("#healthproblemcontent").html(resp.data);
	         		}
	         	}

	         })
	     });



	});


	$(document).ready(function() {

		

		$(document).ajaxStart(function(){  //For loader 
			$('#loading').show();
		}).ajaxStop(function(){
			$('#loading').hide();
		})

		$('#medicalproduct-tab').on('click', function(){
			$("#medicinalproduct-list").trigger("click");
		});


		$(document).off("click", "#medicinalproduct-list").on("click", "#medicinalproduct-list", function(e){
			e.preventDefault();
	         
	         var title = $(this).text();
	         var id  = $(this).data('id');
	         // alert(id);
	         var url = "<?php echo base_url('site/medicinalproductdata') ?>";

	         $.ajax({
	         	type : "post",
	         	url  : url,
	         	cache: true,
	         	data : {"id" : id, "title" : title},
	         	dataType : "json",

	         	success : function(resp) {
	         		if(resp.status == 'success'){
	         			$("#medicinalcontent").html(resp.data);
	         		}
	         	}

	         })
	     });



	});

</script>





