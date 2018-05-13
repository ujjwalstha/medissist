
<div class="top_banner two">
	<div class="container">
		<div class="sub-hd-inner">
			<h3 class="tittle">HEALTH <span>SPECIALIST</span></h3>
		</div>
	</div>
</div>


<!--//team-->
<div class="team_agile">
	<div class="container" style="margin-top: -40px">

		<!-- <div class="sub-hd two">
			<h3 class="tittle two">MEET THE <span class="two">SPECIALISTS</span></h3>
		</div> -->

		<div class="col-md-12 header-middle" style="background-color: #c5d3e6" >
			<div class="col-md-6">
				<div class="header-search" style="width: 100%">
					<form id="searchthis">
						<div class="search">
							<input type="search" value="Search for specialist name" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for specialist name';}" required="" class="searchField">
						</div>

						<div class="sear-sub">
							<input type="submit" value=" " class="searchBtn">
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>


			<div class="col-md-6">

				<div class="section_room" style="width: 100%">
					<select id="specialisttype"  class="frm-field required">
						<option class="specialisttype-option" value="all">All</option>
						<?php
						foreach ($getspecialisttype as $type):
							?>
							<option class="specialisttype-option" value="<?php echo $type->SPECIALIST_TYPE ?>"><?php echo ucwords($type->SPECIALIST_TYPE); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

			</div>

		</div>

	</div>

	<div  class="container" id="healthspecialistcontent">
		<div class="loader mx-auto" id="loading"></div>
	</div>

</div>



<!--//team-->

<div class="container alert-message text-muted">
	<span style="font-weight: bold; color: #e45753;">ATTENTION:</span>  Send private message to the specialist if they are unavailable. Or you can instantly chat with them through chat media located at the bottom. Thank you.
</div>



<script>

	$(document).ready(function() {

		$(window).on('load', function(){ //for displaying all the data as the page loads(but not working -_-)
			// alert('hi');
			$("#specialisttype").trigger("change");
		})

		$(document).ajaxStart(function(){  //For loader 
			$('#loading').show();
		}).ajaxStop(function(){
			$('#loading').hide();
		})

		$(document).off("click", ".searchBtn").on("click", ".searchBtn", function(e){
			e.preventDefault();
	         // alert($(".searchField").val());
	         var searchText = $(".searchField").val();
	         var url = "<?php echo base_url('site/searchspecialist') ?>";

	         $.ajax({
	         	type : "post",
	         	url  : url,
	         	cache: true,
	         	data : {"search" : searchText},
	         	dataType : "json",

	         	success : function(resp) {
	         		if(resp.status == 'success'){
	         			$("#healthspecialistcontent").html(resp.data);
	         		}
	         	}

	         })
	     });


		$(document).off("change", "#specialisttype").on("change", "#specialisttype", function(e) {
			e.preventDefault();
        // alert('hi');

        var types = $(this).val();
        var url   = "<?php echo base_url('site/sortspecialist') ?>" ;    

        $.ajax({
        	type : "post",
        	url  : url,
        	cache: true,
        	data : {"specialisttype" : types},
        	dataType : "json",
        	beforeSend : function() {
              //$("#eventcontent").slideUp('slow'); //for effect
          },
          success : function(resp) {
          	if(resp.status == 'success'){
              //$("#eventcontent").html(resp.data).slideDown('slow'); //for effect
              $("#healthspecialistcontent").html(resp.data);
          }
      }


  })
    });

	});

</script>