<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-5 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <a href="<?= base_url('login') ?>" class="text-center logo-img mt-3">
                                    <img src="<?= base_url(); ?>assets/images/logos/sukma.jpg" width="250" />
                                </a>
                            </div>
                            <p>Silahkan buat akun anda disini!</p>
                            <form action="<?php echo base_url('register/proses'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-2">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" value="<?= set_value('npm'); ?>" name="npm" class="form-control" id="npm">
                                    <?= form_error('npm', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" value="<?= set_value('nama'); ?>" name="nama" class="form-control" id="nama">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" value="<?= set_value('username'); ?>" name="username" class="form-control" id="username">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                    <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-3 rounded-2">Daftar</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                                    <a class="text-primary fw-bold ms-2" href="<?= base_url('/login') ?>">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($this->session->flashdata('flash_message')) { ?>
        <script>
            Swal.fire({
                title: "<?= $this->session->flashdata('flash_message')['title']; ?>",
                text: "<?= $this->session->flashdata('flash_message')['message']; ?>",
                icon: "<?= $this->session->flashdata('flash_message')['icon']; ?>",
                timer: 1500
            });
        </script>
    <?php } ?>
</div>