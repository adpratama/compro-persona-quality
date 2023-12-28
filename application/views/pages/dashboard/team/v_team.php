<div class="pagetitle">
    <h1>Teams Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Teams</li>
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
                            <h5 class="card-title">List of Team</h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="<?= base_url('dash/team/create') ?>" class="btn btn-primary btn-sm mt-3">Add new</a>
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
                            foreach ($teams as $c) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $c->name ?></td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editTeam<?= $c->slug ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button> -->
                                        <a href="<?= base_url('dash/team/delete/' . $c->slug) ?>" class="btn btn-danger btn-xs btn-delete">
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