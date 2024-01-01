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
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Pending Testimonial
                            </h5>
                        </div>
                    </div>
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
                            foreach ($testimonials as $t) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $t->name ?></td>
                                    <td><?= $t->company ?></td>
                                    <td>
                                        <!-- <div class="btn-group"> -->

                                        <a href="<?= base_url('dash/testimonial/hide/' . $t->id) ?>" class="btn btn-danger btn-sm btn-process" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Tolak">
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
            </div>
        </div>
    </div>
</section>