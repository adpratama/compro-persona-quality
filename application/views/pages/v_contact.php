<div id="banner-area" class="banner-area" style="background-image:url(<?= base_url() ?>assets/front/images/banner/banner11.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Kontak</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
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
<section id="main-container" class="main-container">
    <div class="container">

        <div class="row text-center">
            <div class="col-12">
                <!-- <h2 class="section-title">Reaching our Office</h2> -->
                <h3 class="section-sub-title">Lokasi kami</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fas fa-map-marker-alt mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4>Kunjungi kantor kami</h4>
                        <?= $alamat['content'] ?>
                    </div>
                </div>
            </div>
            <!-- Col 1 end -->

            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fa fa-envelope mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4>Email Kami</h4>
                        <?php
                        $email = trim(preg_replace(["/<p>/", "/<\/p>/"], ["", "<br>"], $email['content']));
                        ?>
                        <?= $email ?>
                    </div>
                </div>
            </div>
            <!-- Col 2 end -->

            <div class="col-md-4">
                <div class="ts-service-box-bg text-center h-100">
                    <span class="ts-service-icon icon-round">
                        <i class="fa fa-phone-square mr-0"></i>
                    </span>
                    <div class="ts-service-box-content">
                        <h4>Hubungi kami</h4>
                        <?php
                        $telepon = trim(preg_replace(["/<p>/", "/<\/p>/"], ["", "<br>"], $telepon['content']));
                        ?>
                        <?= $telepon ?>
                    </div>
                </div>
            </div>
            <!-- Col 3 end -->

        </div>
    </div>
    <!-- Conatiner end -->
</section>
<!-- Main container end -->