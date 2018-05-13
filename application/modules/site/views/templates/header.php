<!--start-home-->

<div class="main-header" id="house">
	<div class="header-strip">
		<div class="container">
			<p class="location"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:info@example.com">info.medissist@gmail.com</a></p>
			<p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> + 977 9841 234567</p>

			<a href="<?php echo base_url().'logout' ?>" ><p class="phonenum pull-right"><span class="fa fa-sign-out" aria-hidden="true"></span> Logout</p></a>
			<a href="#"><p class="phonenum pull-right" style="padding-right: 10px"><span class="fa fa-user" aria-hidden="true"></span> <?php echo $this->session->userdata('welcome'); ?></p></a>
			
			

			<div class="clearfix"></div>
		</div>
	</div>

	<div class="header-middle">
		<div class="header-search">
			<script>
                  (function() {
                    var cx = '009963616871025953509:qv85vwdzyo4';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                  })();
                </script>
                <gcse:search></gcse:search>
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
						<h1 id="main-nav-title"><a class="navbar-brand" href="<?php echo base_url().'home' ?>"><span>M</span>edissist <img src="<?php echo base_url().'assets/images/logo2.png' ?>" alt=" " /></a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<div class="top-menu">
						<nav class="menu menu--francisco">
							<ul class="nav navbar-nav menu__list">
								<!-- <li class="menu__item menu__item--current"><a href="<?php //echo base_url().'medicines' ?>" class="menu__link"><span class="menu__helper">Medicines</span></a></li> -->

								<li class="menu__item"><a href="<?php echo base_url().'home' ?>" class="menu__link"><span class="menu__helper"><i class="fa fa-home"></i></span></a></li>

								<li class="menu__item"><a href="<?php echo base_url().'medicines' ?>" class="menu__link"><span class="menu__helper">Health Care AND Medicines</span></a></li>

								<li class="menu__item"><a href="<?php echo base_url().'healthspecialist' ?>" class="menu__link"><span class="menu__helper">Health Specialists</span></a></li>

								<li class="menu__item"><a href="<?php echo base_url().'forum' ?>" class="menu__link"><span class="menu__helper">Forum</span></a></li>

								<!-- <li class="menu__item"><a href="#" class="menu__link"><span class="menu__helper">Healthy Tips</span></a></li> -->

								<li class="menu__item"><a href="<?php echo base_url().'contact' ?>" class="menu__link"><span class="menu__helper">Contact Us</span></a></li>

								<!-- <li class="menu__item"><a href="<?php //echo base_url().'logout' ?>" class="menu__link"><span class="menu__helper"><i class="fa fa-sign-out"></i> Logout</span></a></li> -->
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