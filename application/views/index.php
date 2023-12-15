<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
================================================== -->
	<meta charset="utf-8">
	<title>Home - Persona Quality</title>

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

</head>

<body>
	<div class="body-inner">

		<div id="top-bar" class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<ul class="top-info text-center text-md-left">
							<li><i class="fas fa-map-marker-alt"></i>
								<p class="info-text">Jl. Parit Indah, Komplek Perkantoran Grand Sudirman, Blok B-7, Pekanbaru</p>
							</li>
						</ul>
					</div>
					<!--/ Top info end -->

					<div class="col-lg-4 col-md-4 top-social text-center text-md-right">
						<ul class="list-unstyled">
							<li>
								<a title="Facebook" href="https://facebbok.com/themefisher.com">
									<span class="social-icon"><i class="fab fa-facebook-f"></i></span>
								</a>
								<a title="Twitter" href="https://twitter.com/themefisher.com">
									<span class="social-icon"><i class="fab fa-twitter"></i></span>
								</a>
								<a title="Instagram" href="https://instagram.com/themefisher.com">
									<span class="social-icon"><i class="fab fa-instagram"></i></span>
								</a>
								<!-- <a title="Linkdin" href="https://github.com/themefisher.com">
									<span class="social-icon"><i class="fab fa-github"></i></span>
								</a> -->
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
								<a class="d-block" href="index.html">
									<img loading="lazy" src="<?= base_url('assets/front/') ?>images/logo.png" alt="Constra">
								</a>
							</div>
							<!-- logo end -->

							<div class="col-lg-9 header-right">
								<ul class="top-info-box">
									<li>
										<div class="info-box">
											<div class="info-box-content">
												<p class="info-box-title">Call Us</p>
												<p class="info-box-subtitle">(+62) 761 848844</p>
												<p class="info-box-subtitle">(+62) 761 862386</p>
												<p class="info-box-subtitle">(+62) 851 0001 7500</p>
											</div>
										</div>
									</li>
									<li>
										<div class="info-box">
											<div class="info-box-content">
												<p class="info-box-title">Email Us</p>
												<p class="info-box-subtitle">persona_quality@yahoo.com</p>
												<p class="info-box-subtitle">persona_quality01@gmail.com</p>
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
											$url_text = "Dashboard"; ?>
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
										<li class="nav-item dropdown active">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Home <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li class="active"><a href="index.html">Home One</a></li>
												<li><a href="index-2.html">Home Two</a></li>
											</ul>
										</li>

										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Company <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="about.html">About Us</a></li>
												<li><a href="team.html">Our People</a></li>
												<li><a href="testimonials.html">Testimonials</a></li>
												<li><a href="faq.html">Faq</a></li>
												<li><a href="pricing.html">Pricing</a></li>
											</ul>
										</li>

										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Projects <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="projects.html">Projects All</a></li>
												<li><a href="projects-single.html">Projects Single</a></li>
											</ul>
										</li>

										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="services.html">Services All</a></li>
												<li><a href="service-single.html">Services Single</a></li>
											</ul>
										</li>

										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Features <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="typography.html">Typography</a></li>
												<li><a href="404.html">404</a></li>
												<li class="dropdown-submenu">
													<a href="#!" class="dropdown-toggle" data-toggle="dropdown">Parent Menu</a>
													<ul class="dropdown-menu">
														<li><a href="#!">Child Menu 1</a></li>
														<li><a href="#!">Child Menu 2</a></li>
														<li><a href="#!">Child Menu 3</a></li>
													</ul>
												</li>
											</ul>
										</li>

										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="news-left-sidebar.html">News Left Sidebar</a></li>
												<li><a href="news-right-sidebar.html">News Right Sidebar</a></li>
												<li><a href="news-single.html">News Single</a></li>
											</ul>
										</li>

										<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
									</ul>
								</div>
							</nav>
						</div>
						<!--/ Col end -->
					</div>
					<!--/ Row end -->

					<div class="nav-search">
						<span id="search"><i class="fa fa-search"></i></span>
					</div>
					<!-- Search end -->

					<div class="search-block" style="display: none;">
						<label for="search-field" class="w-100 mb-0">
							<input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
						</label>
						<span class="search-close">&times;</span>
					</div>
					<!-- Site search end -->
				</div>
				<!--/ Container end -->

			</div>
			<!--/ Navigation end -->
		</header>
		<!--/ Header end -->

		<div class="banner-carousel banner-carousel-1 mb-0">
			<div class="banner-carousel-item" style="background-image:url(<?= base_url('assets/front/') ?>images/slider-main/bg6.jpg)">
				<div class="slider-content">
					<div class="container h-100">
						<div class="row align-items-center h-100">
							<div class="col-md-12 text-center">
								<h2 class="slide-title" data-animation-in="slideInLeft">17 Years of excellence in</h2>
								<h3 class="slide-sub-title" data-animation-in="slideInRight">Construction Industry</h3>
								<p data-animation-in="slideInLeft" data-duration-in="1.2">
									<a href="services.html" class="slider btn btn-primary">Our Services</a>
									<a href="contact.html" class="slider btn btn-primary border">Contact Now</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="banner-carousel-item" style="background-image:url(<?= base_url('assets/front/') ?>images/slider-main/bg7.jpg)">
				<div class="slider-content text-left">
					<div class="container h-100">
						<div class="row align-items-center h-100">
							<div class="col-md-12">
								<h2 class="slide-title-box" data-animation-in="slideInDown">World Class Service</h2>
								<h3 class="slide-title" data-animation-in="fadeIn">When Service Matters</h3>
								<h3 class="slide-sub-title" data-animation-in="slideInLeft">Your Choice is Simple</h3>
								<p data-animation-in="slideInRight">
									<a href="services.html" class="slider btn btn-primary border">Our Services</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="banner-carousel-item" style="background-image:url(<?= base_url('assets/front/') ?>images/slider-main/bg8.jpg)">
				<div class="slider-content text-right">
					<div class="container h-100">
						<div class="row align-items-center h-100">
							<div class="col-md-12">
								<h2 class="slide-title" data-animation-in="slideInDown">Meet Our Engineers</h2>
								<h3 class="slide-sub-title" data-animation-in="fadeIn">We believe sustainability</h3>
								<p class="slider-description lead" data-animation-in="slideInRight">We will deal with your failure that determines how you achieve success.</p>
								<div data-animation-in="slideInLeft">
									<a href="contact.html" class="slider btn btn-primary" aria-label="contact-with-us">Get Free Quote</a>
									<a href="about.html" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<section class="call-to-action-box no-padding">
			<div class="container">
				<div class="action-style-box">
					<div class="row align-items-center">
						<div class="col-md-8 text-center text-md-left">
							<div class="call-to-action-text">
								<h3 class="action-title">We understand your needs on construction</h3>
							</div>
						</div>
						<!-- Col end -->
						<div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
							<div class="call-to-action-btn">
								<a class="btn btn-dark" href="#">Request Quote</a>
							</div>
						</div>
						<!-- col end -->
					</div>
					<!-- row end -->
				</div>
				<!-- Action style box -->
			</div>
			<!-- Container end -->
		</section>
		<!-- Action end -->

		<section id="ts-features" class="ts-features">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="ts-intro">
							<h2 class="into-title">Tentang Kami</h2>
							<h3 class="into-sub-title">Persona Quality</h3>
							<p>Pusat layanan psikologi Persona Quality yang berkantor pusat di Pekanbaru. Didirikan pada bulan September 2003 didasarkan pada idealisme beberapa orang Psikolog yang berpengalaman di universitas, klinik/rumah sakit, perusahaan maupun biro layanan psikologi. Dengan semboyan Partner for Improvement, Persona Quality ingin ikut terlibat dalam proses pengembangan sumber daya manusia di Riau.</p>
						</div>
						<!-- Intro box end -->

						<div class="gap-20"></div>

						<div class="row">
							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fas fa-trophy"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">We've Repution for Excellence</h3>
									</div>
								</div>
								<!-- Service 1 end -->
							</div>
							<!-- col end -->

							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fas fa-sliders-h"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">We Build Partnerships</h3>
									</div>
								</div>
								<!-- Service 2 end -->
							</div>
							<!-- col end -->
						</div>
						<!-- Content row 1 end -->

						<div class="row">
							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fas fa-thumbs-up"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">Guided by Commitment</h3>
									</div>
								</div>
								<!-- Service 1 end -->
							</div>
							<!-- col end -->

							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fas fa-users"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">A Team of Professionals</h3>
									</div>
								</div>
								<!-- Service 2 end -->
							</div>
							<!-- col end -->
						</div>
						<!-- Content row 1 end -->
					</div>
					<!-- Col end -->

					<div class="col-lg-6 mt-4 mt-lg-0">
						<h3 class="into-sub-title">Our Values</h3>
						<p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>

						<div class="accordion accordion-group" id="our-values-accordion">
							<div class="card">
								<div class="card-header p-0 bg-transparent" id="headingOne">
									<h2 class="mb-0">
										<button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Safety
										</button>
									</h2>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header p-0 bg-transparent" id="headingTwo">
									<h2 class="mb-0">
										<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Customer Service
										</button>
									</h2>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header p-0 bg-transparent" id="headingThree">
									<h2 class="mb-0">
										<button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Integrity
										</button>
									</h2>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
									<div class="card-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
									</div>
								</div>
							</div>
						</div>
						<!--/ Accordion end -->

					</div>
					<!-- Col end -->
				</div>
				<!-- Row end -->
			</div>
			<!-- Container end -->
		</section>
		<!-- Feature are end -->

		<section id="facts" class="facts-area dark-bg">
			<div class="container">
				<div class="facts-wrapper">
					<div class="row">
						<div class="col-md-3 col-sm-6 ts-facts">
							<div class="ts-facts-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/fact1.png" alt="facts-img">
							</div>
							<div class="ts-facts-content">
								<h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
								<h3 class="ts-facts-title">Total Projects</h3>
							</div>
						</div>
						<!-- Col end -->

						<div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
							<div class="ts-facts-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/fact2.png" alt="facts-img">
							</div>
							<div class="ts-facts-content">
								<h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
								<h3 class="ts-facts-title">Staff Members</h3>
							</div>
						</div>
						<!-- Col end -->

						<div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
							<div class="ts-facts-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/fact3.png" alt="facts-img">
							</div>
							<div class="ts-facts-content">
								<h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
								<h3 class="ts-facts-title">Hours of Work</h3>
							</div>
						</div>
						<!-- Col end -->

						<div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
							<div class="ts-facts-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/fact4.png" alt="facts-img">
							</div>
							<div class="ts-facts-content">
								<h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
								<h3 class="ts-facts-title">Countries Experience</h3>
							</div>
						</div>
						<!-- Col end -->

					</div> <!-- Facts end -->
				</div>
				<!--/ Content row end -->
			</div>
			<!--/ Container end -->
		</section>
		<!-- Facts end -->

		<section id="ts-service-area" class="ts-service-area pb-0">
			<div class="container">
				<div class="row text-center">
					<div class="col-12">
						<h2 class="section-title">We Are Specialists In</h2>
						<h3 class="section-sub-title">One Stop Psychological Services</h3>
					</div>
				</div>
				<!--/ Title row end -->

				<div class="row">
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon4.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Sistem Pengelolaan SDM</a></h3>
								<p>Membantu perusahaan untuk merancang dan membuat peraturan perusahaan, analisa dan uraian jabatan, sistem penggajian, performance appraisal, perencanaan karir dan penelitian</p>
							</div>
						</div>
						<!-- Service 4 end -->
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon5.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Rekrutmen</a></h3>
								<p>Psikotes dan wawancara STAR. Psikotes untuk pengukuran IQ, EQ, bakat dan kemampuan khusus dikaitkan dengan deskripsi kerja, gaya/sikap kerja, kemampuan adaptasi/interaksi, aspek-aspek kepribadian dikaitkan dengan deskripsi kerja</p>
							</div>
						</div>
						<!-- Service 5 end -->
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon6.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Evaluasi</a></h3>
								<p>Kegiatan penilaian, kinerja dimaksudkan untuk mengukur kinerja masing-masing tenaga kerja dalam mengembangkan dan meningkatkan kualitas kerja, 1. Assesment Competency; 2. Assessment Center</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon6.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Coaching</a></h3>
								<p>Coaching adalah media bagi manager untuk memberikan arahan, pemahaman dan dorongan kepada karyawannya untuk memperbaiki kinerja melalui interaksi intensif</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon3.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Konseling</a></h3>
								<p>Konseling adalah layanan konsultasi baik dalam bentuk konseling maupun terapi psikologi jika dibutuhkan</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon3.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Training</a></h3>
								<p>Training yang dilakukan untuk meningkatkan kompetensi karyawan dalam mengatasi tugas diposisi yang dituju</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon2.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Seminar</a></h3>
								<p>Memberikan ceramah dan seminar sesuai kebutuhan dan permintaan klien</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="ts-service-box d-flex">
							<div class="ts-service-box-img">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/icon-image/service-icon1.png" alt="service-icon">
							</div>
							<div class="ts-service-box-info">
								<h3 class="service-box-title"><a href="#">Persiapan Pensiun</a></h3>
								<p>Pelatihan untuk mempersiapkan karyawan agar dapat menyesuaikan diri dengan masa pensiun</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Content row end -->

			</div>
			<!--/ Container end -->
		</section>
		<!-- Service end -->

		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 mt-5 mt-lg-0">

						<h3 class="column-title">Happy Clients</h3>

						<div class="row all-clients">
							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_chevron.png" alt="clients-logo" /></a>
								</figure>
							</div>
							<!-- Client 1 end -->

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_ptpn5.png" alt="clients-logo" /></a>
								</figure>
							</div>
							<!-- Client 2 end -->

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_agung_toyota.png" alt="clients-logo" /></a>
								</figure>
							</div>
							<!-- Client 3 end -->

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_brk.png" alt="clients-logo" /></a>
								</figure>
							</div>
							<!-- Client 4 end -->

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_provinsi_riau.png" alt="clients-logo" /></a>
								</figure>
							</div>
							<!-- Client 5 end -->

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_rsud_aa.png" alt="clients-logo" /></a>
								</figure>
							</div>

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_capella_group.png" alt="clients-logo" /></a>
								</figure>
							</div>

							<div class="col-sm-3 col-6">
								<figure class="clients-logo">
									<a href="#!"><img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/logo_bri_syariah.png" alt="clients-logo" /></a>
								</figure>
							</div>
							<!-- Client 6 end -->

						</div>
						<!-- Clients row end -->

					</div>
				</div>
			</div>
			<!--/ Container end -->
		</section>
		<!-- Content end -->

		<section id="main-container" class="main-container pb-4">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-12">
						<h3 class="section-sub-title">Our Teams</h3>
					</div>
				</div>
				<!--/ Title row end -->

				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-sm-6 mb-5">
						<div class="ts-team-wrapper">
							<div class="team-img-wrapper">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/team/team4.jpg" class="img-fluid" alt="team-img" />
							</div>
							<div class="ts-team-content-classic">
								<h3 class="ts-name">Dra. Rumondang J.K Napitu, M.Si., Psikolog</h3>
								<p class="ts-designation">Psikolog</p>
								<p class="ts-description">
									Nats Stenman began his career in construction with
									boots on the ground
								</p>
								<div class="team-social-icons">
									<a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
									<a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
									<a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
									<a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
								</div>
								<!--/ social-icons-->
							</div>
						</div>
						<!--/ Team wrapper 3 end -->
					</div>
					<!-- Col end -->

					<div class="col-lg-3 col-md-4 col-sm-6 mb-5">
						<div class="ts-team-wrapper">
							<div class="team-img-wrapper">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/team/team3.jpg" class="img-fluid" alt="team-img" />
							</div>
							<div class="ts-team-content-classic">
								<h3 class="ts-name">Drs. Agus Tiandri. S.Psi, M.Psi, Psikolog</h3>
								<p class="ts-designation">Psikolog</p>
								<p class="ts-description">
									Nats Stenman began his career in construction with
									boots on the ground
								</p>
								<div class="team-social-icons">
									<a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
									<a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
									<a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
								</div>
								<!--/ social-icons-->
							</div>
						</div>
						<!--/ Team wrapper 4 end -->
					</div>
					<!-- Col end -->

					<div class="col-lg-3 col-md-4 col-sm-6 mb-5">
						<div class="ts-team-wrapper">
							<div class="team-img-wrapper">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/team/team5.jpg" class="img-fluid" alt="team-img" />
							</div>
							<div class="ts-team-content-classic">
								<h3 class="ts-name">Hotmaida Dasalak, S.Psi., M.Si., Psikolog</h3>
								<p class="ts-designation">Psikolog</p>
								<p class="ts-description">
									Nats Stenman began his career in construction with
									boots on the ground
								</p>
								<div class="team-social-icons">
									<a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
									<a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
									<a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
								</div>
								<!--/ social-icons-->
							</div>
						</div>
						<!--/ Team wrapper 5 end -->
					</div>
					<!-- Col end -->

					<div class="col-lg-3 col-md-4 col-sm-6 mb-5">
						<div class="ts-team-wrapper">
							<div class="team-img-wrapper">
								<img loading="lazy" src="<?= base_url('assets/front/') ?>images/team/team2.jpg" class="img-fluid" alt="team-img" />
							</div>
							<div class="ts-team-content-classic">
								<h3 class="ts-name">Dewi Amalia, S.Psi., M.Psi., Psikolog</h3>
								<p class="ts-designation">Psikolog</p>
								<p class="ts-description">
									Nats Stenman began his career in construction with
									boots on the ground
								</p>
								<div class="team-social-icons">
									<a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
									<a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
									<a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
									<a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
								</div>
								<!--/ social-icons-->
							</div>
						</div>
						<!--/ Team wrapper 6 end -->
					</div>
					<!-- Col end -->
				</div>
				<!-- Content row end -->
			</div>
			<!-- Container end -->
		</section>

		<section id="news" class="news">
			<div class="container">
				<div class="row text-center">
					<div class="col-12">
						<h2 class="section-title">Work of Excellence</h2>
						<h3 class="section-sub-title">Recent Projects</h3>
					</div>
				</div>
				<!--/ Title row end -->

				<div class="row">
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="latest-post">
							<div class="latest-post-media">
								<a href="news-single.html" class="latest-post-img">
									<img loading="lazy" class="img-fluid" src="<?= base_url('assets/front/') ?>images/news/news1.jpg" alt="img">
								</a>
							</div>
							<div class="post-body">
								<h4 class="post-title">
									<a href="news-single.html" class="d-inline-block">We Just Completes $17.6 million Medical Clinic in Mid-Missouri</a>
								</h4>
								<div class="latest-post-meta">
									<span class="post-item-date">
										<i class="fa fa-clock-o"></i> July 20, 2017
									</span>
								</div>
							</div>
						</div>
						<!-- Latest post end -->
					</div>
					<!-- 1st post col end -->

					<div class="col-lg-4 col-md-6 mb-4">
						<div class="latest-post">
							<div class="latest-post-media">
								<a href="news-single.html" class="latest-post-img">
									<img loading="lazy" class="img-fluid" src="<?= base_url('assets/front/') ?>images/news/news2.jpg" alt="img">
								</a>
							</div>
							<div class="post-body">
								<h4 class="post-title">
									<a href="news-single.html" class="d-inline-block">Thandler Airport Water Reclamation Facility Expansion Project Named</a>
								</h4>
								<div class="latest-post-meta">
									<span class="post-item-date">
										<i class="fa fa-clock-o"></i> June 17, 2017
									</span>
								</div>
							</div>
						</div>
						<!-- Latest post end -->
					</div>
					<!-- 2nd post col end -->

					<div class="col-lg-4 col-md-6 mb-4">
						<div class="latest-post">
							<div class="latest-post-media">
								<a href="news-single.html" class="latest-post-img">
									<img loading="lazy" class="img-fluid" src="<?= base_url('assets/front/') ?>images/news/news3.jpg" alt="img">
								</a>
							</div>
							<div class="post-body">
								<h4 class="post-title">
									<a href="news-single.html" class="d-inline-block">Silicon Bench and Cornike Begin Construction Solar Facilities</a>
								</h4>
								<div class="latest-post-meta">
									<span class="post-item-date">
										<i class="fa fa-clock-o"></i> Aug 13, 2017
									</span>
								</div>
							</div>
						</div>
						<!-- Latest post end -->
					</div>
					<!-- 3rd post col end -->
				</div>
				<!--/ Content row end -->

				<div class="general-btn text-center mt-4">
					<a class="btn btn-primary" href="news-left-sidebar.html">See All Posts</a>
				</div>

			</div>
			<!--/ Container end -->
		</section>
		<!--/ News end -->

		<footer id="footer" class="footer bg-overlay">
			<div class="footer-main">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-4 col-md-6 footer-widget footer-about">
							<h3 class="widget-title">About Us</h3>
							<img loading="lazy" class="footer-logo" src="<?= base_url('assets/front/') ?>images/logo.png" alt="Constra">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
								labore et dolore magna aliqua.</p>
							<div class="footer-social">
								<ul>
									<li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
									</li>
									<li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
									<li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li>
								</ul>
							</div>
							<!-- Footer social end -->
						</div>
						<!-- Col end -->

						<div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
							<h3 class="widget-title">Working Hours</h3>
							<div class="working-hours">
								We work 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our
								Hotline and Contact form.
								<br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
								<br> Saturday: <span class="text-right">12:00 - 15:00</span>
								<br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
							</div>
						</div>
						<!-- Col end -->

						<div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
							<h3 class="widget-title">Services</h3>
							<ul class="list-arrow">
								<li><a href="service-single.html">Pre-Construction</a></li>
								<li><a href="service-single.html">General Contracting</a></li>
								<li><a href="service-single.html">Construction Management</a></li>
								<li><a href="service-single.html">Design and Build</a></li>
								<li><a href="service-single.html">Self-Perform Construction</a></li>
							</ul>
						</div>
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
									</script>, Designed &amp; Developed by <a href="https://themefisher.com">Themefisher</a></span>
							</div>
						</div>

						<div class="col-md-12">
							<div class="copyright-info text-center">
								<span>Distributed by <a href="https://themewagon.com/">Themewagon</a></span>
							</div>
						</div>

						<div class="col-md-12">
							<div class="footer-menu text-center">
								<ul class="list-unstyled mb-0">
									<li><a href="about.html">About</a></li>
									<li><a href="team.html">Our people</a></li>
									<li><a href="faq.html">Faq</a></li>
									<li><a href="news-left-sidebar.html">Blog</a></li>
									<li><a href="pricing.html">Pricing</a></li>
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
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
		<!-- Google Map Plugin-->
		<script src="<?= base_url('assets/front/') ?>plugins/google-map/map.js" defer></script>

		<!-- Template custom -->
		<script src="<?= base_url('assets/front/') ?>js/script.js"></script>

	</div>
	<!-- Body inner end -->
</body>

</html>