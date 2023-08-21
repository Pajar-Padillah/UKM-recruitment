<div class="card w-100">
    <div class="card-body p-4">
        <?php if (userdata('role') == 1) { ?>
            <h5 class="card-title fw-semibold mb-4">Data Pendaftaran</h5>
        <?php } else { ?>
            <h5 class="card-title fw-semibold mb-4">Data Pendaftaran : <?= userdata('nama') ?></h5>
        <?php } ?>
        <div class="table-responsive">
            <?php if (!empty($recruitment)) { ?>
                <table id="table" class="table table-bordered text-nowrap mb-0 align-middle">
                <?php } else { ?>
                    <table class="table table-bordered text-nowrap mb-0 align-middle">
                    <?php } ?>
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">#</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">NPM</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Prodi</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                            <?php if (is_admin()) : ?>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Validasi</h6>
                                </th>
                            <?php endif ?>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($recruitment)) { ?>
                            <?php $no = 1;
                            foreach ($recruitment as $item) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= $item['npm'] ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1"><?= ucfirst($item['nama']) ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= ucfirst($item['prodi']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <?php
                                            if ($item['status'] == "pending") {
                                                echo '<span class="badge bg-warning rounded-3 fw-semibold">' . ucfirst($item['status']) . '</span>';
                                            } else if ($item['status'] == "ditolak") {
                                                echo '<span class="badge bg-danger rounded-3 fw-semibold">' . ucfirst($item['status']) . '</span>';
                                            } else {
                                                echo '<span class="badge bg-success rounded-3 fw-semibold">' . ucfirst($item['status']) . '</span>';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <?php if (is_admin()) : ?>
                                        <td class="border-bottom-0">
                                            <?php if ($item['status']  == 'pending') { ?>
                                                <a data-bs-toggle="modal" data-bs-target="#terima<?= $item['id_recruitment'] ?>" title="Terima" class="badge bg-success rounded-4"><i class="ti ti-check"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#tolak<?= $item['id_recruitment'] ?>" title="Tolak" class="badge bg-danger rounded-4"><i class="ti ti-x"></i></a>
                                            <?php } else if ($item['status'] == 'ditolak') { ?>
                                                <a data-bs-toggle="modal" data-bs-target="#terima<?= $item['id_recruitment'] ?>" title="Terima" class="badge bg-success rounded-4"><i class="ti ti-check"></i></a>
                                            <?php } ?>
                                        </td> <?php endif ?>
                                    <td class="border-bottom-0">
                                        <a href="<?= base_url('recruitment/detail/') . $item['id_recruitment'] ?>" title="Detail" class="badge bg-info rounded-4"><i class="ti ti-eye"></i></a>
                                        <?php if (is_mhs()) : ?>
                                            <a href="<?= base_url('recruitment/edit/') . $item['id_recruitment'] ?>" title="Edit" class="badge bg-warning rounded-4"><i class="ti ti-edit"></i></a>
                                        <?php endif ?>
                                        <a href="<?= base_url('recruitment/delete/' . $item['id_recruitment']) ?>" id="hapus" title="Hapus" class="badge bg-danger rounded-4"><i class="ti ti-trash"></i></a>
                                        <?php if (is_mhs()) : ?>
                                            <?php if ($item['status'] == 'diterima') : ?>
                                                <a href="<?= base_url('recruitment/formulir_pdf/' . $item['id_recruitment']) ?>" target="_blank" title="Print" class="badge bg-secondary rounded-4"><i class="ti ti-printer"></i></a>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr class="text-center">
                                <td colspan="6">Data pendaftaran tidak ada!</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
        </div>
    </div>
</div>
<?php foreach ($recruitment as $item) : ?>
    <!-- Modal Setuju -->
    <div class="modal fade" id="terima<?= $item['id_recruitment'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Setujui Data Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url() ?>recruitment/validasi/diterima" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_recruitment" value="<?php echo $item['id_recruitment'] ?>" />
                        <p>Apakah kamu yakin ingin menyetujui pendaftaran ini?</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tolak -->
    <div class="modal fade" id="tolak<?= $item['id_recruitment'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tolak Data Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url() ?>recruitment/validasi/ditolak" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_recruitment" value="<?php echo $item['id_recruitment'] ?>" />
                        <p>Apakah kamu yakin ingin menolak pendaftaran ini?</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach ?>
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
<script>
    document.getElementById('hapus').addEventListener('click', function(e) {
        e.preventDefault();
        var url = this.getAttribute('href');
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            confirmButtonColor: '#DD6B55',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            closeOnConfirm: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>