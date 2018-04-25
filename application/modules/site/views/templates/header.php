<!--start-home-->

<div class="main-header" id="house">
	<div class="header-strip">
		<div class="container">
			<p class="location"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:info@example.com">info@example.com</a></p>
			<p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> + 655 8858 54892</p>
			<div class="social-icons">
				<ul>					
					<li><a href="#"><i class="facebook"> </i></a></li>
					<li><a href="#"><i class="twitter"> </i></a></li>
					<li><a href="#"><i class="google-plus"> </i></a></li>										
				</ul>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>

	<div class="header-middle">
		<div class="header-search">
			<form action="#" method="post">
				<div class="search">
					<input type="search" value="Search" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<!-- <div class="section_room">
					<select id="country" onchange="change_country(this.value)" class="frm-field required">
						<option value="null">All Tests</option>
						<option value="null">Blood Test</option>     
						<option value="AX">Urine Test </option>
						<option value="AX">Blood Volume Test</option>
						<option value="AX">Normal Test</option>
						<option value="AX">Body Scanning</option>
					</select>
				</div> -->
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>

	<!--header-top-->
	<div class="header-top">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo">
						<h1><a class="navbar-brand" href="<?php echo base_url().'home' ?>"><span>M</span>edissist <img src="<?php echo base_url().'assets/images/logo2.png' ?>" alt=" " /></a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<div class="top-menu">
						<nav class="menu menu--francisco">
							<ul class="nav navbar-nav menu__list">
								<li class="menu__item menu__item--current"><a href="<?php echo base_url().'medicines' ?>" class="menu__link"><span class="menu__helper">Medicines</span></a></li>

								<li class="menu__item"><a href="<?php echo base_url().'healthspecialist' ?>" class="menu__link"><span class="menu__helper">Health Specialists</span></a></li>

								<li class="menu__item"><a href="<?php echo base_url().'forum' ?>" class="menu__link"><span class="menu__helper">Forum</span></a></li>

								<!-- <li class="menu__item"><a href="#" class="menu__link"><span class="menu__helper">Healthy Tips</span></a></li> -->

								<li class="menu__item"><a href="<?php echo base_url().'contact' ?>" class="menu__link"><span class="menu__helper">Contact Us</span></a></li>

								<li class="menu__item"><a href="<?php echo base_url().'logout' ?>" class="menu__link"><span class="menu__helper"><i class="fa fa-sign-out"></i> Logout</span></a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /.navbar-collapse -->
			</nav>

			<div class="clearfix"></div>
		</div>
	</div>
	<!--//header-top-->
</div>