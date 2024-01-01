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
        <!-- <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title mb-4">Testimonial</h3>
            </div>
        </div> -->
        <!--/ Title row end -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="column-title">Testimonial</h3>

                <div id="testimonial-slide" class="testimonial-slide">
                    <?php
                    if ($testimonials) {
                        foreach ($testimonials as $t) { ?>
                            <div class="item">
                                <div class="quote-item">
                                    <span class="quote-text">
                                        <?= $t->content ?>
                                    </span>

                                    <div class="quote-item-footer">
                                        <div class="quote-item-info">
                                            <h3 class="quote-author"><?= $t->name ?></h3>
                                            <span class="quote-subtext"><?= $t->title ?></span>
                                        </div>
                                    </div>
                                </div><!-- Quote item end -->
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <h4>Tidak ada testimoni yang ditampilkan</h4>
                    <?php
                    }
                    ?>
                </div>
                <!--/ Testimonial carousel end-->
            </div><!-- Col end -->

        </div>

        <div class="gap-40"></div>
        <!-- 1st row end -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="column-title">We love to hear</h3>

                <?= $this->session->flashdata('message_name') ?>
                <!-- contact form works with formspree.io  -->
                <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
                <form id="contact-form" action="<?= base_url('company/add_testimonial') ?>" method="post" role="form">
                    <div class="error-container"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subjek email</label>
                                <input class="form-control form-control-subject" name="subject" id="subject" value="Testimoni" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Perusahaan</label>
                                <input class="form-control form-control-name" name="company" id="company">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input class="form-control form-control-name" name="title" id="title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Testimoni</label>
                        <textarea class="form-control form-control-content" name="content" id="content" placeholder="" rows="5"></textarea>
                    </div>
                    <div class="text-right"><br>
                        <button class="btn btn-primary solid blank" type="submit">Tambahkan</button>
                    </div>
                </form>
            </div>

        </div><!-- Content row -->
    </div><!-- Container end -->
</section><!-- Main container end -->