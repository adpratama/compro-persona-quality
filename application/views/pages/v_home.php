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

<section id="ts-features" class="ts-features">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ts-intro">
                    <h2 class="into-title">Tentang Kami</h2>
                    <h3 class="into-sub-title">Persona Quality</h3>
                    <?= $tentang['content'] ?>
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
                                <h3 class="service-box-title">Kami memiliki Reputasi untuk Keunggulan</h3>
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
                                <h3 class="service-box-title">Kami Membangun Kemitraan</h3>
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
                                <h3 class="service-box-title">Dipandu oleh Komitmen</h3>
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
                                <h3 class="service-box-title">Sebuah Tim Profesional</h3>
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
                <p>Dalam memberikan jasanya, Persona Quality memegang teguh nilai-nilai yang dianutnya.</p>

                <div class="accordion accordion-group" id="our-values-accordion">
                    <?php
                    $no = 1;
                    foreach ($values as $v) {
                    ?>
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="heading<?= $no ?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left <?= ($no != 1) ? 'collapsed' : '' ?>" type="button" data-toggle="collapse" data-target="#collapse<?= $no ?>" aria-expanded="<?= ($no != 1) ? 'false' : 'true' ?>" aria-controls="collapse<?= $no ?>">
                                        <?= $v->judul_setting ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse<?= $no ?>" class="collapse <?= ($no != 1) ? '' : 'show' ?>" aria-labelledby="heading<?= $no ?>" data-parent="#our-values-accordion">
                                <div class="card-body">
                                    <?= $v->content ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        $no++;
                    }
                    ?>
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
                        <h2 class="ts-facts-num"><span class="counterUp" data-count="<?= count($clients) ?>">0</span></h2>
                        <h3 class="ts-facts-title">Clients</h3>
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

        <div class="row text-center">
            <div class="col-lg-12">
                <h3 class="section-sub-title">Happy Clients</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 mt-lg-0">
                <div class="row all-clients">
                    <?php
                    foreach ($clients as $c) {
                    ?>
                        <div class="col-sm-2 col-6">
                            <figure class="clients-logo">
                                <img loading="lazy" class="img-fluid-client" src="<?= base_url('assets/front/') ?>images/clients/<?= $c->logo ?>" alt="clients-logo" data-toggle="tooltip" title="<?= $c->name ?>" />
                            </figure>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Client 1 end -->

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

        <div class="row justify-content-center single-item">
            <?php
            foreach ($teams as $t) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="<?= base_url('assets/front/') ?>images/team/<?= $t->photo ?>" class="img-fluid" alt="team-img" />
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name"><?= $t->name ?></h3>
                            <p class="ts-designation"><?= $t->jabatan ?></p>
                            <!-- <p class="ts-description">
                                Nats Stenman began his career in construction with
                                boots on the ground
                            </p> -->
                            <div class="team-social-icons">
                                <a target="_blank" href="<?= ($t->sm_facebook) ? $t->sm_facebook : '#' ?>"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="<?= ($t->sm_twitter) ? $t->sm_twitter : '#' ?>"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="<?= ($t->sm_instagram) ? $t->sm_instagram : '#' ?>"><i class="fab fa-instagram"></i></a>
                                <a target="_blank" href="<?= ($t->sm_linkedin) ? $t->sm_linkedin : '#' ?>"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <!--/ social-icons-->
                        </div>
                    </div>
                    <!--/ Team wrapper 3 end -->
                </div>
            <?php
            }
            ?>
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