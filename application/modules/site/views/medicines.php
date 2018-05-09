
<div class="top_banner two">
	<div class="container">
		<div class="sub-hd-inner">
			<h3 class="tittle">MEDI<span>CINES</span></h3>
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

					<li role="presentation"><a href="#medicalproduct" role="tab" id="medicalproduct-tab" data-toggle="tab" aria-controls="medicalproduct">Medical Products</a></li>


					<!-- <li role="presentation"><a href="#tree" role="tab" id="tree-tab" data-toggle="tab" aria-controls="tree">Extras</a></li> -->
				</ul>

				<div id="myTabContent" class="tab-content">

					<div role="tabpanel" class="tab-pane fade in active" id="healthproblem" aria-labelledby="healthproblem-tab">
						<div class="col-md-3 col-sm-3 tab-image" style="margin-top: 25px">
						
							<input type="text" id="myHealthInput" onkeyup="myHealthFunction()" placeholder="Search for health problem" title="Type in a name">

							<ul id="myHealthUL">
								<li><a href="#">Adele</a></li>
								<li><a href="#">Agnes</a></li>
								<li><a href="#">Billy</a></li>
								<li><a href="#">Bob</a></li>
								<li><a href="#">Calvin</a></li>
								<li><a href="#">Christina</a></li>
								<li><a href="#">Cindy</a></li>
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

						<div class="col-md-9 col-sm-9 tab-info">
							<p><text style="font-weight: bold; font-size: 25px">Topic Goes Here</text>
							<hr style="height: 1px; background-color: #777777;"></p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						</div>
						<div class="clearfix"></div>
					</div>




					<div role="tabpanel" class="tab-pane fade" id="medicalproduct" aria-labelledby="medicalproduct-tab">
						
						<div class="col-md-3 col-sm-3 tab-image" style="margin-top: 25px">
							<input type="text" id="myMedicineInput" onkeyup="myFunction()" placeholder="Search for medicine names" title="Type in a name">

							<ul id="myMedicineUL">
								<li><a href="#">Adele</a></li>
								<li><a href="#">Agnes</a></li>
								<li><a href="#">Billy</a></li>
								<li><a href="#">Bob</a></li>
								<li><a href="#">Calvin</a></li>
								<li><a href="#">Christina</a></li>
								<li><a href="#">Cindy</a></li>
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

						<div class="col-md-9 col-sm-9 tab-info">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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





