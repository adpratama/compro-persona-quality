<div class="pagetitle">
    <h1>Settings</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">List of Setting</h5>
                        </div>
                    </div>
                    <!-- <h5 class="card-title">Bordered Tabs</h5> -->

                    <!-- Bordered Tabs -->
                    <!-- <ul class="nav nav-tabs nav-tabs-bordered mt-3" id="borderedTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">About</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#visi-misi-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">Visi Misi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                        <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="">
                            <form action="<?= base_url('setting/update_about') ?>" method="post">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <textarea name="about" id="about" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row g-3 mt-1 text-end">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="visi-misi-tab" role="tabpanel" aria-labelledby="">
                            Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                        </div>
                        <div class="tab-pane fade" id="bordered-contact" role="tabpanel" aria-labelledby="contact-tab">
                            Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                        </div>
                    </div> -->
                    <!-- End Bordered Tabs -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Num</th>
                                <th>Title</th>
                                <th>Act.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($settings as $s) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $s->judul_setting ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editSetting<?= $s->kategori ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
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
<?php
foreach ($settings as $s) {
?>
    <div class="modal fade" id="editSetting<?= $s->kategori ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= base_url('dash/setting/store/' . $s->kategori) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="judul_setting" class="form-label">Title</label>
                                <input type="text" class="form-control" id="judul_setting" name="judul_setting" value="<?= $s->judul_setting ?>">
                            </div>
                        </div>
                        <div class="row g-3 mt-1">
                            <div class="col-12">
                                <label for="content" class="form-label">Title</label>
                                <textarea name="content" id="content" cols="30" rows="5" class="form-control"><?= $s->content ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="tooltip" title="Tutup modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Update <?= $s->judul_setting ?>">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>