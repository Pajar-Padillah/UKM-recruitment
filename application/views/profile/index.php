<div class="card p-2 shadow border-bottom border-primary">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <?php if (!empty(userdata('foto'))) { ?>
                    <img src="<?= base_url() ?>assets/upload/user-images/<?= userdata('foto'); ?>" alt="" class="img-thumbnail rounded-5 mb-2">
                <?php } else { ?>
                    <img src="<?= base_url() ?>assets/images/profile/default.jpg" alt="" class="img-thumbnail rounded-5 mb-2">
                <?php } ?>
                <a href="<?= base_url('profile/edit'); ?>" class="btn btn-sm d-md-block btn-primary mb-2"><i class="ti ti-edit"></i> Edit Profile</a>
                <!-- <a href="<?= base_url('profile/ubahpassword'); ?>" class="btn btn-sm d-md-block btn-primary"><i class="ti ti-lock"></i> Ubah Password</a> -->
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">NPM</th>
                        <td><?= userdata('npm'); ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= ucfirst(userdata('nama')) ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?= userdata('username'); ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <?php if (userdata('role') == 1) { ?>
                            <td class="text-capitalize">Admin</td>
                        <?php } else { ?>
                            <td class="text-capitalize">Mahasiswa</td>
                        <?php } ?>
                    </tr>
                </table>
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