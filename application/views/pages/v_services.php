<div id="banner-area" class="banner-area" style="background-image:url(<?= base_url() ?>assets/front/images/banner/banner5.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Layanan</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="#">Layanan</a></li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 mb-5 mb-lg-0">

                <div class="post-content post-single">
                    <div class="post-media post-image text-center">
                        <img loading="lazy" src="<?= base_url('assets/front/images/services/' . $service['photo']) ?>" class="img-fluid" alt="post-image">
                    </div>

                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-author">
                                    <i class="far fa-user"></i><a href="#"> Admin</a>
                                </span>
                                <span class="post-cat">
                                    <i class="far fa-folder-open"></i><a href="#"> Layanan</a>
                                </span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i> <?= format_indo($service['created_at']) ?></span>
                            </div>
                            <h2 class="entry-title">
                                <?= $service['judul'] ?>
                            </h2>
                        </div><!-- header end -->

                        <div class="entry-content">
                            <?= $service['deskripsi'] ?>
                        </div>

                    </div><!-- post-body end -->
                </div><!-- post content end -->
            </div><!-- Content Col end -->
        </div><!-- Main row end -->

        <div class="row">
            <?php
            foreach ($items as $d) :
            ?>
                <div class="col-lg-3 mt-5">
                    <!-- <div class="ts-service-box d-flex"> -->
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><?= $d->judul ?></h3>
                        <?= $d->deskripsi ?>
                    </div>
                    <!-- </div> -->
                    <!-- Service 4 end -->
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div><!-- Conatiner end -->
</section><!-- Main container end -->