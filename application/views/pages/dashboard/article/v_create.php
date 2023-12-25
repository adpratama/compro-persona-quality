<link href="<?= base_url() ?>assets/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
<div class="pagetitle">
    <h1>Articles</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('dash/article') ?>">Articles</a></li>
            <li class="breadcrumb-item active">Add new</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <?php
        if ($this->uri->segment(4) == true) { ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('dash/article/store/' . $article['slug']) ?>" method="post" class="rom g-3" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="kategori_artikel" class="form-label">Kategori</label>
                                    <select name="kategori_artikel" id="kategori_artikel" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        foreach ($categories as $c) {
                                        ?>
                                            <option <?= ($article['id_category'] == $c->Id) ? "selected" : "" ?> value="<?= $c->Id ?>"><?= $c->category_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="judul_artikel" class="form-label">Judul</label>
                                    <textarea name="judul_artikel" id="judul_artikel" cols="30" rows="2" class="form-control"><?= $article['judul'] ?></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="headline_artikel" class="form-label">Headline</label>
                                    <textarea name="headline_artikel" id="headline_artikel" cols="30" rows="2" class="form-control"><?= $this->session->flashdata('headline_artikel') ?><?= $article['headline'] ?></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="content_artikel" class="form-label">Content</label>
                                    <input type="hidden" name="isi_artikel" value='<?= $article['content'] ?>' class="form-control">
                                    <div id="content_artikel" style="height: 150px;"><?= $article['content'] ?></div>
                                </div>
                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('dash/article/update_photo/' . $article['slug']) ?>" method="post" class="rom g-3" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="foto_artikel" class="form-label">Foto</label>
                                    <input type="file" name="foto_artikel" id="foto_artikel" class="form-control" onchange="previewImageAdd(this);">
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                                </div>
                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('dash/article/store') ?>" method="post" class="rom g-3" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="kategori_artikel" class="form-label">Kategori</label>
                                    <select name="kategori_artikel" id="kategori_artikel" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        foreach ($categories as $c) {
                                        ?>
                                            <option <?= ($this->session->flashdata('kategori_artikel') == $c->Id) ? "selected" : "" ?> value="<?= $c->Id ?>"><?= $c->category_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="judul_artikel" class="form-label">Judul</label>
                                    <textarea name="judul_artikel" id="judul_artikel" cols="30" rows="2" class="form-control"><?= $this->session->flashdata('judul_artikel') ?></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="foto_artikel" class="form-label">Foto</label>
                                    <input type="file" name="foto_artikel" id="foto_artikel" class="form-control" onchange="previewImageAdd(this);">
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="headline_artikel" class="form-label">Headline</label>
                                    <textarea name="headline_artikel" id="headline_artikel" cols="30" rows="2" class="form-control"><?= $this->session->flashdata('headline_artikel') ?></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="content_artikel" class="form-label">Content</label>
                                    <input type="hidden" name="isi_artikel" value='<?= $this->session->flashdata('isi_artikel') ?>' class="form-control">
                                    <div id="content_artikel" style="height: 150px;"><?= $this->session->flashdata('isi_artikel') ?></div>
                                </div>
                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
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

<script src="<?= base_url() ?>assets/dashboard/vendor/quill/quill.min.js"></script>
<script>
    var quill_content = new Quill('#content_artikel', {
        theme: 'snow',
    });

    quill_content.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='isi_artikel']").value = quill_content.root.innerHTML;
    });

    document.getElementById('content_artikel').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('content_artikel').value = content;
    });
</script>