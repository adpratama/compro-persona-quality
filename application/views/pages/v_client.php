<div id="banner-area" class="banner-area" style="background-image:url(<?= base_url() ?>assets/front/images/banner/banner3.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Klien</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item">
                                    <a href="#">Beranda</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Perusahaan</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Klien kami</li>
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
<section class="content">
    <div class="container">

        <!-- <div class="row text-center">
            <div class="col-lg-12">
                <h3 class="section-sub-title">Klien kami</h3>
            </div>
        </div> -->
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