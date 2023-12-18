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
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <h3 class="column-title">Persona Quality</h3>
                <?= $tentang['content'] ?>
            </div>
            <!-- Col end -->
            <!-- <div class="col-lg-6">
                <h3 class="title-about">Persona Quality</h3>
                <div class="row">
                    <?= $tentang['content'] ?>
                </div>
                <h3 class="title-about">Visi</h3>
                <div class="row">
                    <?= $visi['content'] ?>
                </div>
                <h3 class="title-about">Misi</h3>
                <div class="row">
                    <?= $misi['content'] ?>
                </div>
            </div> -->
            <!-- Col end -->

            <div class="col-lg-6 mt-5 mt-lg-0 text-right">
                <img src="<?= base_url() ?>assets/front/images/logo.png" alt="" class="img-fluid" style="max-height: 250px;">
            </div>
            <!-- Col end -->
        </div>
        <div class="row">

            <div class="col-lg-6 mt-5 mt-lg-0">
                <h3 class="column-title">Visi</h3>
                <?= $visi['content'] ?>
                <div id="page-slider" class="page-slider small-bg">

                    <?php
                    foreach ($values as $v) {
                    ?>
                        <div class="item" style="background-image:url(<?= base_url() ?>assets/front/images/slider-pages/slide-page2.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title"><?= $v->judul_setting ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">
                <h3 class="column-title">Misi</h3>
                <?= $misi['content'] ?>
            </div>
        </div>
        <div class="row">


            <div class="col-lg-6 mt-5 mt-lg-0">

                <div id="page-slider" class="page-slider small-bg">

                    <?php
                    foreach ($values as $v) {
                    ?>
                        <div class="item" style="background-image:url(<?= base_url() ?>assets/front/images/slider-pages/slide-page2.jpg)">
                            <div class="container">
                                <div class="box-slider-content">
                                    <div class="box-slider-text">
                                        <h2 class="box-slide-title"><?= $v->judul_setting ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div><!-- Page slider end-->


            </div>
        </div>
        <!-- Content row end -->
    </div>
    <!-- Container end -->
</section>
<!-- Main container end -->