<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bordered Tabs</h5>

                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Need Confirmation</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Visible</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Hidden</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                        <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pending as $t) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $t->name ?></td>
                                            <td><?= $t->company ?></td>
                                            <td>
                                                <!-- <div class="btn-group"> -->

                                                <a href="<?= base_url('dash/testimonial/hide/' . $t->id) ?>" class="btn btn-danger btn-sm btn-process" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Sembunyikan">
                                                    <i class="bi bi-hand-thumbs-down"></i>
                                                </a>
                                                <a href="<?= base_url('dash/testimonial/approve/' . $t->id) ?>" class="btn btn-primary btn-sm btn-process" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Setujui">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $t->id ?>">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <div class="modal fade" id="verticalycentered<?= $t->id ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><?= $t->name ?> - <?= $t->company ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?= $t->content ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('dash/testimonial/hide/' . $t->id) ?>" class="btn btn-danger btn-process" title="Sembunyikan">
                                                                    <i class="bi bi-hand-thumbs-down"></i>
                                                                </a>
                                                                <a href="<?= base_url('dash/testimonial/approve/' . $t->id) ?>" class="btn btn-primary btn-process" title="Setujui">
                                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Vertically centered Modal-->
                                                <!-- </div> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($visible as $t) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $t->name ?></td>
                                            <td><?= $t->company ?></td>
                                            <td>
                                                <!-- <div class="btn-group"> -->

                                                <a href="<?= base_url('dash/testimonial/hide/' . $t->id) ?>" class="btn btn-danger btn-sm btn-process" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Sembunyikan">
                                                    <i class="bi bi-hand-thumbs-down"></i>
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $t->id ?>">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <div class="modal fade" id="verticalycentered<?= $t->id ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><?= $t->name ?> - <?= $t->company ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?= $t->content ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('dash/testimonial/hide/' . $t->id) ?>" class="btn btn-danger btn-process" title="Sembunyikan">
                                                                    <i class="bi bi-hand-thumbs-down"></i>
                                                                </a>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Vertically centered Modal-->
                                                <!-- </div> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="bordered-contact" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($hidden as $t) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $t->name ?></td>
                                            <td><?= $t->company ?></td>
                                            <td>
                                                <!-- <div class="btn-group"> -->
                                                </a>
                                                <a href="<?= base_url('dash/testimonial/approve/' . $t->id) ?>" class="btn btn-primary btn-sm btn-process" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Setujui">
                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $t->id ?>">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <div class="modal fade" id="verticalycentered<?= $t->id ?>" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><?= $t->name ?> - <?= $t->company ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?= $t->content ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </a>
                                                                <a href="<?= base_url('dash/testimonial/approve/' . $t->id) ?>" class="btn btn-primary btn-process" title="Setujui">
                                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Vertically centered Modal-->
                                                <!-- </div> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>
        </div>
    </div>
</section>