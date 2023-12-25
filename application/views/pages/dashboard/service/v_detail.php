<link href="<?= base_url() ?>assets/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
<div class="pagetitle">
    <h1><?= $service['judul'] ?></h1>
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
                                List of Item
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#detailService">
                                Detail
                            </button>
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#newItem">
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
                            foreach ($items as $s) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $s->judul ?></td>
                                    <td>
                                        <div class="btn-group">

                                            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editItem<?= $s->slug ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <a href="<?= base_url('dash/service/delete_item/' . $s->slug) ?>" class="btn btn-danger btn-sm btn-process" id="btnHapus">
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

<!-- Modal services detail -->
<div class="modal fade" id="detailService" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $service['judul'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <form method="POST" action="<?= base_url('dash/service/store/' . $service['slug']) ?>">
                            <div class="row">
                                <div class="col-12">
                                    <label for="service_name" class="form-label">Service's name</label>
                                    <input type="text" class="form-control" id="service_name" name="service_name" value='<?= $service['judul'] ?>'>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="deskripsi_layanan" class="form-label">Deskripsi</label>
                                <input type="hidden" name="deskripsi" value='<?= $service['deskripsi'] ?>' class="form-control">
                                <div id="deskripsi_layanan" style="height: 150px;"><?= $service['deskripsi'] ?></div>
                            </div>
                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="<?= base_url('dash/service/store') ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <label for="foto_artikel" class="form-label">Foto</label>
                                    <input type="file" name="foto_artikel" id="foto_artikel" class="form-control" onchange="previewImageAdd(this);">
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                                </div>
                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Update photo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal add new item -->
<div class="modal fade" id="newItem" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/service/add_new_item') ?>">
                <div class="modal-body">
                    <input type="hidden" name="slug" class="form-control" value="<?= $service['slug'] ?>">
                    <input type="hidden" name="id_service" class="form-control" value="<?= $service['Id'] ?>">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="item_name" class="form-label">Item name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name" value='<?= $this->session->flashdata('item_name') ?>'>
                        </div>
                        <div class="col-12">
                            <label for="keterangan_item" class="form-label">Keterangan</label>
                            <input type="hidden" name="keterangan" value='<?= $this->session->flashdata('keterangan') ?>' class="form-control">
                            <div id="keterangan_item" style="height: 150px;"><?= $this->session->flashdata('keterangan') ?></div>
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

<script src="<?= base_url() ?>assets/dashboard/vendor/quill/quill.min.js"></script>
<!-- modal edit item -->
<?php
foreach ($items as $item) {
?>
    <div class="modal fade" id="editItem<?= $item->slug ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= base_url('dash/service/add_new_item/' . $item->slug) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="item_id" class="form-control" value="_<?= $item->Id ?>">
                        <input type="hidden" name="slug" class="form-control" value="<?= $service['slug'] ?>">
                        <input type="hidden" name="id_service" class="form-control" value="<?= $item->id_service ?>">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="item_name" class="form-label">Item name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" value='<?= $item->judul ?>'>
                            </div>
                            <div class="col-12">
                                <label for="keterangan_item_<?= $item->Id ?>" class="form-label">Keterangan</label>
                                <input type="hidden" name="keterangan_<?= $item->Id ?>" value='<?= $item->deskripsi ?>' class="form-control">
                                <div id="keterangan_item_<?= $item->Id ?>" style="height: 150px;"><?= $item->deskripsi ?></div>
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
        var quill_content_<?= $item->Id ?> = new Quill('#keterangan_item_<?= $item->Id ?>', {
            theme: 'snow',
        });

        quill_content_<?= $item->Id ?>.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='keterangan_<?= $item->Id ?>']").value = quill_content_<?= $item->Id ?>.root.innerHTML;
        });

        document.getElementById('keterangan_item_<?= $item->Id ?>').addEventListener('input', function() {
            var content<?= $item->Id ?> = this.innerHTML;
            document.getElementById('keterangan_item_<?= $item->Id ?>').value = content<?= $item->Id ?>;
        });
    </script>

<?php
}
?>
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
<script>
    var quill_deskripsi = new Quill('#deskripsi_layanan', {
        theme: 'snow',
    });

    quill_deskripsi.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='deskripsi']").value = quill_deskripsi.root.innerHTML;
    });

    document.getElementById('deskripsi_layanan').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('deskripsi_layanan').value = content;
    });
</script>
<script>
    var quill_content = new Quill('#keterangan_item', {
        theme: 'snow',
    });

    quill_content.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='keterangan']").value = quill_content.root.innerHTML;
    });

    document.getElementById('keterangan_item').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('keterangan_item').value = content;
    });
</script>