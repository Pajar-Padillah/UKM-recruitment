<div class="card w-100">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-3">Data tanggal timeline</h5>
        <?php if (empty($timeline)) { ?>
            <a href="<?= base_url('timeline/tambah') ?>" class="btn btn-primary mb-3"><i class="ti ti-plus"></i> Tambah Data</a>
        <?php } ?>
        <div class="table-responsive">
            <?php if (!empty($timeline)) { ?>
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
                                <h6 class="fw-semibold mb-0">Mulai Pendaftaran</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Akhir Pendaftaran</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tes Tertulis</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Pengumuman Tes Tertulis</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tes Wawancara</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Pengumuman Tes Wawancara</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($timeline)) { ?>
                            <?php $no = 1;
                            foreach ($timeline as $item) : ?>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= tgl_indo($item['tgl_awal_pendaftaran']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= tgl_indo($item['tgl_akhir_pendaftaran']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= tgl_indo($item['tgl_tes_tertulis']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= tgl_indo($item['tgl_pengumuman_tes_tertulis']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= tgl_indo($item['tgl_tes_wawancara']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <span class="fw-normal"><?= tgl_indo($item['tgl_pengumuman_tes_wawancara']) ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <a href="<?= base_url('timeline/edit/') . $item['id_timeline'] ?>" title="Edit" class="badge bg-warning rounded-4"><i class="ti ti-edit"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr class="text-center">
                                <td colspan="7">Data timeline tidak ada!</td>
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