<div id="banner-area" class="banner-area" style="background-image:url(<?= base_url() ?>assets/front/images/banner/banner3.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Artikel</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Artikel</a></li>
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

                <div class="post-content post-single">
                    <div class="post-media post-image">
                        <img loading="lazy" src="<?= base_url('assets/front/images/articles/' . $article['photo']) ?>" class="img-fluid" alt="post-image">
                    </div>

                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-author">
                                    <i class="far fa-user"></i><a href="#"> <?= $article['name'] ?></a>
                                </span>
                                <span class="post-cat">
                                    <i class="far fa-folder-open"></i><a href="#"> <?= $article['category_name'] ?></a>
                                </span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i> June 14, 2016</span>
                            </div>
                            <h2 class="entry-title">
                                <?= $article['judul'] ?>
                            </h2>
                        </div><!-- header end -->

                        <div class="entry-content">
                            <?= $article['content'] ?>
                        </div>

                        <div class="tags-area d-flex align-items-center justify-content-between">
                            <div class="post-tags">
                                <a href="#"><?= $article['category_name'] ?></a>
                            </div>
                            <!-- <div class="share-items">
                                <ul class="post-social-icons list-unstyled">
                                    <li class="social-icons-head">Share:</li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div> -->
                        </div>

                    </div><!-- post-body end -->
                </div><!-- post content end -->
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
    </div><!-- Conatiner end -->
</section><!-- Main container end -->