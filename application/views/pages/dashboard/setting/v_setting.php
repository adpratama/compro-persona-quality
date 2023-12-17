<link href="<?= base_url() ?>assets/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
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

                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered mt-3" id="borderedTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="" data-bs-toggle="tab" data-bs-target="#about-us" type="button" role="tab" aria-controls="home" aria-selected="true">About us</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#our-values" type="button" role="tab" aria-controls="profile" aria-selected="false">Our values</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                        <div class="tab-pane fade show active" id="about-us" role="tabpanel" aria-labelledby="">
                            <form action="<?= base_url('dash/setting/update_visimisi') ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="tentang" class="form-label">Tentang</label>
                                        <input type="hidden" name="tentang" value='<?= $tentang['content'] ?>' class="form-control">
                                        <div id="input_tentang" style="height: 150px;"><?= $tentang['content'] ?></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <label for="visi" class="form-label">Visi</label>
                                        <input type="hidden" name="visi" value='<?= $visi['content'] ?>' class="form-control">
                                        <div id="input_visi" style="height: 150px;"><?= $visi['content'] ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="misi" class="form-label">Misi</label>
                                        <input type="hidden" name="misi" value='<?= $misi['content'] ?>' class="form-control">
                                        <div id="input_misi" style="height: 150px;"><?= $misi['content'] ?></div>
                                    </div>
                                </div>
                                <div class="row g-3 mt-1 text-end">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="our-values" role="tabpanel" aria-labelledby="">

                            <div class="row mb-3">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#addNewValues">
                                        Add new
                                    </button>
                                </div>
                            </div>

                            <table class="table">
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
                                    if (!$values) {
                                    ?>
                                        <tr>
                                            <td colspan="3">There is no data available.</td>
                                        </tr>
                                        <?php
                                    } else {
                                        foreach ($values as $s) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?>.</td>
                                                <td><?= $s->content ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editSetting<?= $s->kategori ?>">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="">
                            <form action="<?= base_url('dash/setting/update_contact') ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="hidden" name="alamat" value='<?= $alamat['content'] ?>' class="form-control">
                                        <div id="input_alamat" style="height: 150px;"><?= $alamat['content'] ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="telepon" class="form-label">Call us</label>
                                        <input type="hidden" name="telepon" value='<?= $telepon['content'] ?>' class="form-control">
                                        <div id="input_telepon" style="height: 150px;"><?= $telepon['content'] ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="hidden" name="email" value='<?= $email['content'] ?>' class="form-control">
                                        <div id="input_email" style="height: 150px;"><?= $email['content'] ?></div>
                                    </div>
                                </div>
                                <div class="row g-3 mt-1 text-end">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="addNewValues" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new values</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/setting/add_values') ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="values_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="values_title" name="values_title">
                        </div>
                        <div class="col-12">
                            <label for="values_content" class="form-label">Content</label>
                            <textarea name="values_content" id="values_content" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <?php
        foreach ($settings as $s) {
        ?>
    <div class="modal fade" id="editSetting<?= $s->kategori ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit <?= $s->judul_setting ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= base_url('dash/setting/store/' . $s->kategori) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="judul_setting" class="form-label">Title</label>
                                <input type="text" class="form-control" id="judul_setting" name="judul_setting" value="<?= $s->judul_setting ?>" disabled>
                            </div>
                        </div>
                        <div class="row g-3 mt-1">
                            <div class="col-12">
                                <label for="content" class="form-label">Content</label>
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
?> -->

<script src="<?= base_url() ?>assets/dashboard/vendor/quill/quill.min.js"></script>
<script>
    var quill_visi = new Quill('#input_visi', {
        theme: 'snow',
    });

    quill_visi.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='visi']").value = quill_visi.root.innerHTML;
    });

    document.getElementById('input_visi').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_visi').value = content;
    });
</script>
<script>
    var quill_misi = new Quill('#input_misi', {
        theme: 'snow',
    });

    quill_misi.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='misi']").value = quill_misi.root.innerHTML;
    });

    document.getElementById('input_misi').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_misi').value = content;
    });
</script>
<script>
    var quill_tentang = new Quill('#input_tentang', {
        theme: 'snow',
    });

    quill_tentang.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='tentang']").value = quill_tentang.root.innerHTML;
    });

    document.getElementById('input_tentang').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_tentang').value = content;
    });
</script>
<script>
    var quill_alamat = new Quill('#input_alamat', {
        theme: 'snow',
    });

    quill_alamat.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='alamat']").value = quill_alamat.root.innerHTML;
    });

    document.getElementById('input_alamat').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_alamat').value = content;
    });
</script>
<script>
    var quill_telepon = new Quill('#input_telepon', {
        theme: 'snow',
    });

    quill_telepon.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='telepon']").value = quill_telepon.root.innerHTML;
    });

    document.getElementById('input_telepon').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_telepon').value = content;
    });
</script>
<script>
    var quill_email = new Quill('#input_email', {
        theme: 'snow',
    });

    quill_email.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='email']").value = quill_email.root.innerHTML;
    });

    document.getElementById('input_email').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_email').value = content;
    });
</script>