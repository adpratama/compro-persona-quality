<div id="banner-area" class="banner-area" style="background-image:url(<?= base_url() ?>assets/front/images/banner/banner1.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">About</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">company</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Col end -->
            </div>
            <!-- Row end -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Banner text end -->
</div>
<!-- Banner area end -->

<section id="ts-team" class="ts-team">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Quality Service</h2>
                <h3 class="section-sub-title">Professional Team</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-lg-12">
                <div id="team-slide" class="team-slide">
                    <?php
                    foreach ($teams as $t) {
                    ?>
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    <img loading="lazy" class="w-100" src="<?= base_url() ?>assets/front/images/team/<?= $t->photo ?>" alt="team-img">
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name"><?= $t->name ?></h3>
                                    <p class="ts-designation"><?= $t->jabatan ?></p>
                                    <!-- <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p> -->
                                    <div class="team-social-icons">

                                        <a target="_blank" href="<?= ($t->sm_facebook) ? $t->sm_facebook : '#' ?>"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="<?= ($t->sm_twitter) ? $t->sm_twitter : '#' ?>"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="<?= ($t->sm_instagram) ? $t->sm_instagram : '#' ?>"><i class="fab fa-instagram"></i></a>
                                        <a target="_blank" href="<?= ($t->sm_linkedin) ? $t->sm_linkedin : '#' ?>"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                    <!--/ social-icons-->
                                </div>
                            </div>
                            <!--/ Team wrapper end -->
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Team 1 end -->

                </div>
                <!-- Team slide end -->
            </div>
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section>