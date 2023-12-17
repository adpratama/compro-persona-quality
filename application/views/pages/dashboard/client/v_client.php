<div class="pagetitle">
    <h1>Clients Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Clients</li>
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
                            <h5 class="card-title">List of Client</h5>
                        </div>
                        <div class="col-6 text-end">

                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#addNewClient">
                                Add new
                            </button>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Num.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Act.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($clients as $c) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $c->name ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editClient<?= $c->slug ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <a href="<?= base_url('dash/client/delete/' . $c->slug) ?>" class="btn btn-danger btn-xs btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="addNewClient" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/client/store') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="client_name" class="form-label">Client's name</label>
                            <input type="text" class="form-control" id="client_name" name="client_name">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Logo</label>
                            <input class="form-control" type="file" id="client_logo" name="client_logo" onchange="previewImageAdd(this);">
                        </div>

                        <div class="col-12 text-center">
                            <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
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

<?php
foreach ($clients as $c) {
?>
    <div class="modal fade" id="editClient<?= $c->slug ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="<?= base_url('dash/client/store/' . $c->slug) ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="client_name" class="form-label">Client's name</label>
                                        <input type="text" class="form-control" id="client_name" name="client_name" value="<?= $c->name ?>">
                                    </div>
                                </div>
                                <div class="row g-3 mt-3 text-center">
                                    <div class="col-12">
                                        <img src="<?= base_url('assets/front/images/clients/' . $c->logo) ?>" alt="" class="card-img-top" style="max-width: 200px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Existing logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="client_logo" class="form-label">Client's logo</label>
                                        <input type="file" class="form-control" id="client_logo" name="client_logo" onchange="previewImage(this, 'preview<?= $c->slug ?>');">
                                    </div>
                                </div>
                                <div class="row g-3 mt-3 text-center">
                                    <div class="col-12">
                                        <img id="preview<?= $c->slug ?>" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="tooltip" title="Tutup modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Hanya update nama" value="update_nama">Update</button>
                        <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Hanya update logo" value="update_logo">Update logo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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