<div class="pagetitle">
    <h1>Teams Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('dash/team') ?>">Teams</a></li>
            <li class="breadcrumb-item active">Add team</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="<?= base_url('dash/team/store') ?>" class="row g-3" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="team_name" class="form-label">Team's name</label>
                                <input type="text" class="form-control" id="team_name" name="team_name" value="<?= $this->session->flashdata('team_name'); ?>">
                            </div>
                            <div class="col-12">
                                <label for="team_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="team_title" name="team_title" value="<?= $this->session->flashdata('team_title'); ?>">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="team_photo" name="team_photo" onchange="previewImageAdd(this);">
                            </div>
                            <div class="col-12 text-center">
                                <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                            </div>
                            <div class="col-12">
                                <label for="team_fb" class="form-label">Facebook profile</label>
                                <input type="text" class="form-control" id="team_fb" name="team_fb" value="<?= $this->session->flashdata('team_fb'); ?>">
                            </div>
                            <div class="col-12">
                                <label for="team_tw" class="form-label">Twitter profile</label>
                                <input type="text" class="form-control" id="team_tw" name="team_tw" value="<?= $this->session->flashdata('team_tw'); ?>">
                            </div>
                            <div class="col-12">
                                <label for="team_ig" class="form-label">Instagram profile</label>
                                <input type="text" class="form-control" id="team_ig" name="team_ig" value="<?= $this->session->flashdata('team_ig'); ?>">
                            </div>
                            <div class="col-12">
                                <label for="team_lk" class="form-label">Linkedin profile</label>
                                <input type="text" class="form-control" id="team_lk" name="team_lk" value="<?= $this->session->flashdata('team_lk'); ?>">
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<script>
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