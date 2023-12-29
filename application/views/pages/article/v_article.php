<div id="banner-area" class="banner-area" style="background-image:url(<?= base_url() ?>assets/front/images/banner/banner5.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Artikel</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="#">Artikel</a></li>
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

            <div class="col-lg-8 mb-5 mb-lg-0">
                <?php
                foreach ($article as $a) :
                ?>
                    <div class="post">
                        <div class="post-media post-image">
                            <img loading="lazy" src="<?= base_url('assets/front/images/articles/' . $a->photo) ?>" class="img-fluid" alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="#"> <?= $a->name ?></a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> <?= $a->category_name ?></a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> <?= format_indo($a->created_at) ?></span>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?= base_url('article/read/') . $a->slug ?>"><?= $a->judul ?></a>
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <?= $a->headline ?>
                            </div>

                            <div class="post-footer">
                                <a href="<?= base_url('article/read/') . $a->slug ?>" class="btn btn-primary">Lanjutkan membaca</a>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- 1st post end -->
                <?php
                endforeach;
                ?>
                <?= $this->pagination->create_links(); ?>

            </div><!-- Content Col end -->

            <div class="col-lg-4">

                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Artikel Terbaru</h3>
                        <ul class="list-unstyled">
                            <?php
                            foreach ($articles as $a) :
                            ?>
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <a href="<?= base_url('article/read/' . $a->slug) ?>"><img loading="lazy" alt="img" src="<?= base_url('assets/front/images/articles/' . $a->photo) ?>"></a>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="entry-title">
                                            <a href="<?= base_url('article/read/' . $a->slug) ?>"><?= $a->judul ?></a>
                                        </h4>
                                    </div>
                                </li><!-- 1st post end-->
                            <?php
                            endforeach;
                            ?>
                        </ul>

                    </div><!-- Recent post end -->

                    <div class="widget">
                        <h3 class="widget-title">Kategori Artikel</h3>
                        <ul class="arrow nav nav-tabs">
                            <?php
                            foreach ($categories as $c) :
                            ?>
                                <li><a href="#"><?= $c->category_name ?></a></li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div><!-- Categories end -->


                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->