<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/timer/favicon.ico">
		<title>Jadimanten | Official Web</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Template CSS Files
		================================================== -->
		<link href="<?php echo base_url(); ?>assets/timer/css/font-awesome.min.css" rel="stylesheet">
		<!-- Twitter Bootstrs CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/bootstrap.min.css">
		<!-- Ionicons Fonts Css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/ionicons.min.css">
		<!-- animate css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/animate.css">
		<!-- Hero area slider css-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/slider.css">
		<!-- owl craousel css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/owl.theme.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/jquery.fancybox.css">
		<!-- template main css file -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/main.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/timer/css/responsive.css">
		<!-- // <script src='https://www.google.com/recaptcha/api.js'></script> -->
		
	</head>
	<body onunload="">
		<!--
		==================================================
		Header Section Start
		================================================== -->
		<header id="top-bar" class="navbar-fixed-top animated-header">
			<div class="container">
				<div class="navbar-header">
					<!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<div class="navbar-brand">
						<a href="<?php echo base_url(); ?>" >
							<img src="<?php echo base_url(); ?>assets/timer/images/logo.png" alt="">
						</a>
					</div>
					<!-- /logo -->
				</div>
				<!-- main menu -->
				<nav class="collapse navbar-collapse navbar-right" role="navigation">
					<div class="main-menu">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="<?php echo base_url(); ?>" >Home</a>
							</li>
							<li><a href="about.html">About</a></li>
							<li><a href="service.html">Service</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
								<div class="dropdown-menu">
									<ul>
										<li><a href="404.html">404 Page</a></li>
										<li><a href="gallery.html">Gallery</a></li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
								<div class="dropdown-menu">
									<ul>
										<li><a href="blog-fullwidth.html">Blog Full</a></li>
										<li><a href="blog-left-sidebar.html">Blog Left sidebar</a></li>
										<li><a href="blog-right-sidebar.html">Blog Right sidebar</a></li>
									</ul>
								</div>
							</li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="<?php echo base_url(); ?>login">Masuk</a></li>
							<li><a href="<?php echo base_url(); ?>register">Daftar</a></li>
							
						</ul>
					</div>
				</nav>
				<!-- /main nav -->
			</div>
		</header>
		
		<header id="head" class="third">
			<div class="container">
				<div class="row">
					<!-- <div class="col-sm-8">
						<h1>Kontak kami</h1>
					</div> -->
				</div>
			</div>
		</header>
		<div class="container">
			<br><br>
			<center>
			<!-- /.row -->
			
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8"><br><br>
					<div class="panel1 panel1-default">
						<!-- Content Wrapper. Contains page content -->
						<div class="row">
							<div class="col-lg-1"></div>
							<div class="col-lg-10">
								<br>
								<h2><span style="color: #ff3704"><center>Lupa Kata Sandi?</center></span></h2>
								<p>
									Masukkan username login Anda dibawah ini. Kami akan mengirimkan pesan email beserta link untuk mengubah kata sandi.
								</p>
								<hr>
								<?php if($this->session->flashdata('message')): ?>
								<div class="alert alert-danger">
									<div class="fa  fa-exclamation-circle"></div> <?php echo $this->session->flashdata('message'); ?>
								</div>
								<?php endif; ?>
								<?php if($this->session->flashdata('errorcaptcha')): ?>
								<div class="alert alert-danger">
									<div class="fa  fa-exclamation-circle"></div> <?php echo $this->session->flashdata('errorcaptcha'); ?>
								</div>
								<?php endif; ?>
								<form method="post" action="<?php echo base_url(); ?>reset/form">
									<div class="form-group">
										<div class="col-lg-2"></div>
										<div class="col-lg-8">
											<?php if ($this->session->flashdata('username')):
											$username = $this->session->flashdata('username');
											else :
											$username="";
											endif?>
											<input type="email" name="username" class="form-control" placeholder="Masukkan username anda" value="<?php echo $username; ?>" required><br>
																						
										</div>
										<!-- <div class="g-recaptcha" data-sitekey="6LcZGBQUAAAAAOcsQvTS29WUSdWWSQ0Nl6iu4Gu3"></div> -->
										<div class="col-lg-2"></div>
									</div>
									<br><br>
									<hr>
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<button type="submit" class="btn btn-block btn-flat btn-success">Reset </button><br>
									</div>
									<div class="col-lg-3"></div>
								</form>
							</div>
							
							<div class="col-lg-1"></div>
						</div>
						
					</div>
				</div><br><br><br><br>
			</div>
			<div class="col-lg-2"></div>
		</div>
		</center>
	</div>
	
	<!--
	==================================================
	Call To Action Section Start
	================================================== -->
	<section id="call-to-action">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
						<p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
						<a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--
	==================================================
	Footer Section Start
	================================================== -->
	<footer id="footer">
		<div class="container">
			<div class="col-md-8">
				<p class="copyright">Copyright: <span>2015</span> . Design and Developed by <a href="http://www.Themefisher.com">Themefisher</a></p>
			</div>
			<div class="col-md-4">
				<!-- Social Media -->
				<ul class="social">
					<li>
						<a href="http://wwww.fb.com/themefisher" class="Facebook">
							<i class="ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="http://wwww.twitter.com/themefisher" class="Twitter">
							<i class="ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#" class="Linkedin">
							<i class="ion-social-linkedin"></i>
						</a>
					</li>
					<li>
						<a href="http://wwww.fb.com/themefisher" class="Google Plus">
							<i class="ion-social-googleplus"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<a href="" class="go-top" data-lilili="tooltip" data-original-title="Kembali ke atas"><span class="fa fa-chevron-up"></span></a>
		</footer> <!-- /#footer -->
		<!-- Template Javascript Files
		================================================== -->
		<!-- modernizr js -->
		<script src="<?php echo base_url(); ?>assets/timer/js/vendor/modernizr-2.6.2.min.js"></script>
		<!-- jquery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- owl carouserl js -->
		<script src="<?php echo base_url(); ?>assets/timer/js/owl.carousel.min.js"></script>
		<!-- bootstrap js -->
		<script src="<?php echo base_url(); ?>assets/timer/js/bootstrap.min.js"></script>
		<!-- wow js -->
		<script src="<?php echo base_url(); ?>assets/timer/js/wow.min.js"></script>
		<!-- slider js -->
		<script src="<?php echo base_url(); ?>assets/timer/js/slider.js"></script>
		<script src="<?php echo base_url(); ?>assets/timer/js/jquery.fancybox.js"></script>
		<!-- template main js -->
		<script src="<?php echo base_url(); ?>assets/timer/js/main.js"></script>
		<script type="text/javascript">
		$(document).ready( function(){
		var link_base = "<?php echo base_url();?>";
		$('[data-lilili="tooltip"]').tooltip();
		$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
		$('.go-top').fadeIn(200);
		} else {
		$('.go-top').fadeOut(200);
		}
		});
		
		// Animate the scroll to top
		$('.go-top').click(function(event) {
		event.preventDefault();
		
		$('html, body').animate({scrollTop: 0}, 300);
		})
		
		});
		</script>
		
	</body>
</html>