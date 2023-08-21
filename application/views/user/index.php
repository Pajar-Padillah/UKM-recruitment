<div class="card w-100">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Data user</h5>
        <div class="table-responsive">
            <?php if (!empty($recruitment)) { ?>
                <table id="table" class="table table-bordered text-nowrap mb-0 align-middle">
                <?php } else { ?>
                    <table id="table" class="table table-bordered text-nowrap mb-0 align-middle">
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
                                <h6 class="fw-semibold mb-0">Username</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)) { ?>
                            <?php $no = 1;
                            foreach ($users as $item) : ?>
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
                                        <span class="fw-normal"><?= $item['username'] ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <a href="<?= base_url('user/edit/') . $item['id_user'] ?>" title="Edit" class="badge bg-warning rounded-4"><i class="ti ti-edit"></i></a>
                                        <a href="<?= base_url('user/delete/' . $item['id_user']) ?>" id="hapus" title="Hapus" class="badge bg-danger rounded-4"><i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr class="text-center">
                                <td colspan="5">Data user tidak ada!</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
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