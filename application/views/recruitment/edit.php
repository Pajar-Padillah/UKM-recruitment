<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Pendaftaran</b>
        </h5>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('recruitment/update') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="npm" readonly value="<?= $recruitment->npm ?>" name="npm" class="form-control" id="npm">
                                <?= form_error('npm', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="nama" readonly value="<?= $recruitment->nama ?>" name="nama" class="form-control" id="nama">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" value="<?= $recruitment->email ?>" autofocus name="email" class="form-control" id="email">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="number" value="<?= $recruitment->no_telp ?>" name="no_telp" class="form-control" id="no_telp">
                                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="hobby" class="form-label">Hobby</label>
                                <textarea name="hobby" class="form-control" id="hobby" rows="2"><?= $recruitment->hobby ?></textarea>
                                <?= form_error('hobby', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" value="<?= $recruitment->tempat_lahir ?>" name="tempat_lahir" class="form-control" id="tempat_lahir">
                                <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" value="<?= $recruitment->tanggal_lahir ?>" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                                <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" value="<?= $recruitment->jenis_kelamin ?>">
                                    <option <?php if ($recruitment->jenis_kelamin == 'Laki-laki') {
                                                echo 'selected';
                                            } ?>>Laki-laki</option>
                                    <option <?php if ($recruitment->jenis_kelamin == 'Perempuan') {
                                                echo 'selected';
                                            } ?>>Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <input type="number" value="<?= $recruitment->angkatan ?>" name="angkatan" class="form-control" id="angkatan">
                                <?= form_error('angkatan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <?php if (!empty(userdata('foto'))) { ?>
                                    <img src="<?= base_url() ?>assets/upload/recruitment/<?= $recruitment->foto ?>" class="img-preview img-fluid mb-3 col-lg-5 d-block">
                                <?php } else { ?>
                                    <img class="img-preview img-fluid mb-3 col-lg-5">
                                <?php } ?>
                                <input type="file" name="foto" class="form-control" id="foto" onchange="previewImage()">
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <input type="text" value="<?= $recruitment->prodi ?>" name="prodi" class="form-control" id="prodi">
                                <?= form_error('prodi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" value="<?= $recruitment->jurusan ?>" name="jurusan" class="form-control" id="jurusan">
                                <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="pengalaman_organisasi" class="form-label">Pengalaman Organisasi</label>
                                <textarea name="pengalaman_organisasi" class="form-control" id="pengalaman_organisasi" rows="3"><?= $recruitment->pengalaman_organisasi ?></textarea>
                                <?= form_error('pengalaman_organisasi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" value="<?= $recruitment->asal_sekolah ?>" name="asal_sekolah" class="form-control" id="asal_sekolah">
                                <?= form_error('asal_sekolah', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3"><?= $recruitment->alamat ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="motto" class="form-label">Motto</label>
                                <textarea name="motto" class="form-control" id="motto" rows="2"><?= $recruitment->motto ?></textarea>
                                <?= form_error('motto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="alasan_bergabung" class="form-label">Alasan Bergabung</label>
                                <textarea name="alasan_bergabung" class="form-control" id="alasan_bergabung" rows="3"><?= $recruitment->alasan_bergabung ?></textarea>
                                <?= form_error('alasan_bergabung', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_recruitment" id="id_recruitment" value="<?= $recruitment->id_recruitment ?>">
                    <input type="hidden" name="user_id" id="status" value="<?= $recruitment->user_id ?>">
                    <input type="hidden" name="status" id="status" value="<?= $recruitment->status ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
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