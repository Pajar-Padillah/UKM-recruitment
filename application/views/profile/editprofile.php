<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Profile <b class="text-primary"><?= userdata('nama'); ?></b>
        </h5>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="npm" value="<?= userdata('npm'); ?>" name="npm" class="form-control" id="npm">
                                <?= form_error('npm', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="nama" value="<?= userdata('nama'); ?>" name="nama" class="form-control" id="nama">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">username</label>
                                <input type="text" value="<?= userdata('username'); ?>" name="username" class="form-control" id="username">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                <div id="emailHelp" class="form-text">Kosongkan jika tidak ingin mengganti password</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <?php if (!empty(userdata('foto'))) { ?>
                                    <img src="<?= base_url() ?>assets/upload/user-images/<?= userdata('foto'); ?>" class="img-preview img-fluid mb-3 col-lg-5 d-block">
                                <?php } else { ?>
                                    <img class="img-preview img-fluid mb-3 col-lg-5">
                                <?php } ?>
                                <input type="file" name="foto" class="form-control" id="foto" onchange="previewImage()">
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                <div id="emailHelp" class="form-text">Abaikan jika tidak ingin mengganti foto</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_user" id="id_user" value="<?= userdata('id_user'); ?>">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="<?= base_url('profile') ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const img = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const blob = URL.createObjectURL(img.files[0]);
        imgPreview.src = blob;
    }
</script>