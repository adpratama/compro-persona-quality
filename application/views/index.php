<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs
================================================== -->
	<meta charset="utf-8">
	<title><?= $title ?> - Persona Quality</title>

	<!-- Mobile Specific Metas
================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Persona Quality">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

	<!-- Favicon
================================================== -->
	<link rel="icon" type="image/png" href="<?= base_url('assets/front/') ?>images/logo.png">

	<!-- CSS
================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>plugins/bootstrap/bootstrap.min.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>plugins/fontawesome/css/all.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>plugins/animate-css/animate.css">
	<!-- slick Carousel -->
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>plugins/slick/slick.css">
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>plugins/slick/slick-theme.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>plugins/colorbox/colorbox.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="<?= base_url('assets/front/') ?>css/style.css">

	<style>
		.title-about {
			margin-left: -15px;
		}
	</style>
</head>

<body>
	<div class="body-inner">

		<?php
		$setting_names = ['telepon', 'email', 'alamat', 'tentang', 'facebook', 'twitter', 'instagram'];
		$settings = [];

		foreach ($setting_names as $name) {
			$settings[$name] = $this->M_Setting->setting($name);
		}
		?>
		<div id="top-bar" class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<ul class="top-info text-center text-md-left">
							<li><i class="fas fa-map-marker-alt"></i>
								<p class="info-text"><?= trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], $settings['alamat']['content']))  ?></p>
							</li>
						</ul>
					</div>
					<!--/ Top info end -->

					<div class="col-lg-4 col-md-4 top-social text-center text-md-right">
						<ul class="list-unstyled">
							<li>
								<a title="Facebook" href="<?= $settings['facebook']['content'] ?>">
									<span class="social-icon"><i class="fab fa-facebook-f"></i></span>
								</a>
								<a title="Twitter" href="<?= $settings['twitter']['content'] ?>">
									<span class="social-icon"><i class="fab fa-twitter"></i></span>
								</a>
								<a title="Instagram" href="<?= $settings['instagram']['content'] ?>">
									<span class="social-icon"><i class="fab fa-instagram"></i></span>
								</a>
							</li>
						</ul>
					</div>
					<!--/ Top social end -->
				</div>
				<!--/ Content row end -->
			</div>
			<!--/ Container end -->
		</div>
		<!--/ Topbar end -->
		<!-- Header start -->
		<header id="header" class="header-one">
			<div class="bg-white">
				<div class="container">
					<div class="logo-area">
						<div class="row align-items-center">
							<div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
								<a class="d-block" href="<?= base_url() ?>">
									<img loading="lazy" src="<?= base_url('assets/front/') ?>images/logo.png" alt="Constra">
								</a>
							</div>
							<!-- logo end -->

							<div class="col-lg-9 header-right">
								<ul class="top-info-box">
									<li>
										<div class="info-box">
											<div class="info-box-content">
												<p class="info-box-title">Hubungi kami</p>
												<?php
												$telepon = trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ","], $settings['telepon']['content']));

												$phoneNumberArray = explode(",", $telepon);

												// Looping untuk mengakses setiap nomor telepon
												foreach ($phoneNumberArray as $phoneNumber) {
													// Tampilkan nomor telepon 
												?>
													<p class="info-box-subtitle"><?= $phoneNumber ?></p>
												<?php
												}
												?>
											</div>
										</div>
									</li>
									<li>
										<div class="info-box">
											<div class="info-box-content">
												<p class="info-box-title">Email Kami</p>
												<?php
												$email = trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ","], $settings['email']['content']));

												$emailArray = explode(",", $email);

												// Looping untuk mengakses setiap nomor email
												foreach ($emailArray as $email) {
													// Tampilkan nomor email 
												?>
													<p class="info-box-subtitle"><?= $email ?></p>
												<?php
												}
												?>
											</div>
										</div>
									</li>
									<li>
										<div class="info-box">
											<div class="info-box-content">
												<p class="info-box-title">Situs web</p>
												<p class="info-box-subtitle">personaquality.co.id</p>
											</div>
										</div>
									</li>
									<li class="header-get-a-quote">
										<?php
										if (empty($this->session->userdata('username'))) {
											$url_auth = base_url('auth');
											$url_text = "Masuk";
										} else {
											$url_auth = base_url('dashboard');
											$url_text = "Dasbor"; ?>
										<?php
										}
										?>
										<a class="btn btn-primary" href="<?= $url_auth ?>"><?= $url_text ?></a>
									</li>
								</ul>
								<!-- Ul end -->
							</div>
							<!-- header right end -->
						</div>
						<!-- logo area end -->

					</div>
					<!-- Row end -->
				</div>
				<!-- Container end -->
			</div>

			<div class="site-navigation">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<nav class="navbar navbar-expand-lg navbar-dark p-0">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>

								<div id="navbar-collapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav mr-auto">
										<li class="nav-item  <?= ($this->uri->segment(1) == "home" or $this->uri->segment(1) == "") ? 'active' : '' ?>">
											<a href="<?= base_url('home') ?>" class="nav-link">Beranda</a>
										</li>
										<li class="nav-item dropdown  <?= ($this->uri->segment(1) == "company") ? 'active' : '' ?>">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Perusahaan <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li class="<?= ($this->uri->segment(2) == 'about') ? 'active' : '' ?>"><a href="<?= base_url('company/about') ?>">Tentang kami</a></li>
												<li class="<?= ($this->uri->segment(2) == 'team') ? 'active' : '' ?>"><a href="<?= base_url('company/team') ?>">Tim kami</a></li>
												<!-- <li><a href="testimonials.html">Testimonials</a></li>
												<li><a href="faq.html">Faq</a></li> -->
											</ul>
										</li>
										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layanan <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="services.html">Layanan Bantuan Karyawan (EAP)</a></li>
												<li><a href="service-single.html">Pribadi dan Keluarga</a></li>
												<li><a href="service-single.html">Penyelenggara Acara</a></li>
											</ul>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link">Artikel</a>
										</li>

										<li class="nav-item <?= ($this->uri->segment(1) == 'contact') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('contact') ?>">Kontak</a></li>
									</ul>
								</div>
							</nav>
						</div>
						<!--/ Col end -->
					</div>
					<!--/ Row end -->

					<!-- <div class="nav-search">
						<span id="search"><i class="fa fa-search"></i></span>
					</div> -->
					<!-- Search end -->

					<!-- <div class="search-block" style="display: none;">
						<label for="search-field" class="w-100 mb-0">
							<input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
						</label>
						<span class="search-close">&times;</span>
					</div> -->
					<!-- Site search end -->
				</div>
				<!--/ Container end -->

			</div>
			<!--/ Navigation end -->
		</header>
		<!--/ Header end -->
		<?php if (isset($pages)) $this->load->view($pages); ?>

		<footer id="footer" class="footer">
			<div class="footer-main">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-4 col-md-6 footer-widget footer-about">
							<h3 class="widget-title">Tentang kami</h3>
							<div class="footer-logo-container">
								<img loading="lazy" class="footer-logo" src="<?= base_url('assets/front/') ?>images/logo-stroke.png" alt="Constra">
							</div>
							<?= $settings['tentang']['content'] ?>
							<div class="footer-social">
								<ul>
									<li><a href="<?= $settings['facebook']['content'] ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="<?= $settings['twitter']['content'] ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="<?= $settings['instagram']['content'] ?>" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
							<!-- Footer social end -->
						</div>
						<!-- Col end -->

						<div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
							<h3 class="widget-title">Jam kerja</h3>
							<div class="working-hours">
								Kami bekerja 5 hari seminggu, dari hari Senin hingga Jumat. Hubungi kami jika Anda memiliki keadaan darurat, dengan kami
								Hotline dan formulir Kontak.
								<br><br> Senin - Kamis: <span class="text-right">08:00 - 17:00 </span>
								<br> Jumat: <span class="text-right">08:00 - 17:30</span>
							</div>
							<!--  senin - kamis jam 08.00 - 17.00. dan untuk jumatnya mas jam 08.00-17.30  -->
						</div>
						<!-- Col end -->

						<!-- <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
							<h3 class="widget-title">Services</h3>
							<ul class="list-arrow">
								<li><a href="service-single.html">Pre-Construction</a></li>
								<li><a href="service-single.html">General Contracting</a></li>
								<li><a href="service-single.html">Construction Management</a></li>
								<li><a href="service-single.html">Design and Build</a></li>
								<li><a href="service-single.html">Self-Perform Construction</a></li>
							</ul>
						</div> -->
						<!-- Col end -->
					</div>
					<!-- Row end -->
				</div>
				<!-- Container end -->
			</div>
			<!-- Footer main end -->

			<div class="copyright">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-12">
							<div class="copyright-info text-center">
								<span>Copyright &copy; <script>
										document.write(new Date().getFullYear())
									</script>, Persona Quality
								</span>
							</div>
						</div>

						<div class="col-md-12">
							<div class="copyright-info text-center">
								<span>Template Designed &amp; Developed by <a href="https://themefisher.com">Themefisher</a></span>
							</div>
						</div>

						<div class="col-md-12">
							<div class="footer-menu text-center">
								<ul class="list-unstyled mb-0">
									<li><a href="<?= base_url('company/about') ?>">Tentang</a></li>
									<li><a href="<?= base_url('company/team') ?>">Tim</a></li>
									<li><a href="<?= base_url('article') ?>">Artikel</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Row end -->

					<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
						<button class="btn btn-primary" title="Back to Top">
							<i class="fa fa-angle-double-up"></i>
						</button>
					</div>

				</div>
				<!-- Container end -->
			</div>
			<!-- Copyright end -->
		</footer>
		<!-- Footer end -->


		<!-- Javascript Files
  ================================================== -->

		<!-- initialize jQuery Library -->
		<script src="<?= base_url('assets/front/') ?>plugins/jQuery/jquery.min.js"></script>
		<!-- Bootstrap jQuery -->
		<script src="<?= base_url('assets/front/') ?>plugins/bootstrap/bootstrap.min.js" defer></script>
		<!-- Slick Carousel -->
		<script src="<?= base_url('assets/front/') ?>plugins/slick/slick.min.js"></script>
		<script src="<?= base_url('assets/front/') ?>plugins/slick/slick-animation.min.js"></script>
		<!-- Color box -->
		<script src="<?= base_url('assets/front/') ?>plugins/colorbox/jquery.colorbox.js"></script>
		<!-- shuffle -->
		<script src="<?= base_url('assets/front/') ?>plugins/shuffle/shuffle.min.js" defer></script>


		<!-- Google Map API Key-->
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script> -->
		<!-- Google Map Plugin-->
		<!-- <script src="<?= base_url('assets/front/') ?>plugins/google-map/map.js" defer></script> -->

		<!-- Template custom -->
		<script src="<?= base_url('assets/front/') ?>js/script.js"></script>

	</div>
	<!-- Body inner end -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	<script>
		// $('.single-item').slick();

		$('.single-item').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
		});
		$('.item-carousel').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
		});
	</script>

</body>

</html>