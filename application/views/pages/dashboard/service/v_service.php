<link href="<?= base_url() ?>assets/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
<div class="pagetitle">
    <h1>Services</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
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
                            <h5 class="card-title">
                                List of Service
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#addNewService">
                                Add new
                            </button>
                        </div>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Title</th>
                                <th>Act.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($services as $s) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $s->judul ?></td>
                                    <td>
                                        <div class="btn-group">

                                            <a href="<?= base_url('dash/service/edit/') . $s->slug ?>" class="btn btn-primary btn-sm">

                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <a href="<?= base_url('dash/service/delete/' . $s->slug) ?>" class="btn btn-danger btn-sm btn-process" id="btnHapus">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
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

<div class="modal fade" id="addNewService" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/service/store') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="service_name" class="form-label">Service's name</label>
                            <input type="text" class="form-control" id="service_name" name="service_name" value='<?= $this->session->flashdata('service_name') ?>'>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="service_photo" name="service_photo" onchange="previewImageAdd(this);">
                        </div>

                        <div class="col-12 text-center">
                            <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                        </div>
                        <div class="col-12">
                            <label for="deskripsi_layanan" class="form-label">Deskripsi</label>
                            <input type="hidden" name="deskripsi" value='<?= $this->session->flashdata('deskripsi') ?>' class="form-control">
                            <div id="deskripsi_layanan" style="height: 150px;"><?= $this->session->flashdata('deskripsi') ?></div>
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
<script>
    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = '';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewImageAdd(input) {
        var preview = document.getElementById('previewAdd');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = '';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="<?= base_url() ?>assets/dashboard/vendor/quill/quill.min.js"></script>
<script>
    var quill_content = new Quill('#deskripsi_layanan', {
        theme: 'snow',
    });

    quill_content.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='deskripsi']").value = quill_content.root.innerHTML;
    });

    document.getElementById('deskripsi_layanan').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('deskripsi_layanan').value = content;
    });
</script>