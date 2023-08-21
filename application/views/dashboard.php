<?php if (is_admin()) : ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat datang admin <?= userdata('nama') ?></h5>
                            <p>
                                Kamu memiliki <span class="fw-bold"><?= $jumlah_pending ?></span> data pendaftar yang belum di validasi.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-3 px-0 px-md-2">
                            <img src="<?= base_url('assets/images/logos/logo.png') ?>" height="135" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-10">
                                    <h5 class="card-title mb-9 fw-semibold"> Total User </h5>
                                    <h4 class="fw-semibold mb-3"><?= $total_user ?></h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <a class="fs-3" href="<?= base_url('user') ?>"><span class="me-2 rounded-circle bg-light-info round-20 d-inline align-items-center justify-content-center">
                                                <i class="ti ti-list-details text-info"></i>
                                            </span> Lihat Data</a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex justify-content-end">
                                        <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-users fs-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-10">
                                    <h5 class="card-title mb-9 fw-semibold"> Total Pendaftar </h5>
                                    <h4 class="fw-semibold mb-3"><?= $total_pendaftar ?></h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <a class="fs-3 text-warning" href="<?= base_url('recruitment') ?>"><span class="me-2 rounded-circle bg-light-warning round-20 d-inline align-items-center justify-content-center">
                                                <i class="ti ti-list-details text-warning"></i>
                                            </span> Lihat Data</a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex justify-content-end">
                                        <div class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-end">
                                            <i class="ti ti-files fs-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Tahap Pendaftaran</h5>
                    </div>
                    <?php if ($timeline) : ?>
                        <ul class="timeline-widget mb-0 position-relative mb-n5">
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark ">Pendaftaran Berkas (Online)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_awal_pendaftaran) ?> s/d <?= tgl_indo($timeline->tgl_akhir_pendaftaran) ?></div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Tes Tertulis (Offline)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_tes_tertulis) ?> </div>

                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Pengumuman Tes Tertulis (Online)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_pengumuman_tes_tertulis) ?></div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Tes Wawancara (Offline)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_tes_wawancara) ?></div>

                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Pengumuman Tes Wawancara (Online)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_pengumuman_tes_wawancara) ?></div>
                            </li>
                        </ul>
                    <?php else : ?>
                        <p class="text-center">Data timeline kosong! Silahkan input data terlebih dahulu</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">5 Pendaftar Terbaru</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">#</h6>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pendaftar)) { ?>
                                    <?php $no = 1;
                                    foreach ($pendaftar as $item) : ?>
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
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
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <tr class="text-center">
                                        <td colspan="5">Data pendaftaran tidak ada!</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Selamat datang <?= userdata('nama') ?></h5>
                            <?php if ($status) : ?>
                                <?php if ($status->status == 'pending') { ?>
                                    <p>
                                        Anda telah terdaftar pada tanggal <?= tgl_indo($status->tanggal_pendaftaran) ?>, dengan status <span class="badge bg-warning fs-2 rounded-3 fw-semibold"><?= ucfirst($status->status) ?></span>, silahkan menunggu admin memvalidasi data pendaftaran yang anda ajukan.
                                    </p>
                                <?php } elseif ($status->status == 'diterima') { ?>
                                    <p>
                                        Anda telah terdaftar pada tanggal <?= tgl_indo($status->tanggal_pendaftaran) ?>, dengan status <span class="badge bg-success fs-2  rounded-3 fw-semibold"><?= ucfirst($status->status) ?></span>, silahkan melanjutkan ke tahap tes tertulis yang akan di adakan pada tanggal <?= tgl_indo($timeline->tgl_tes_tertulis) ?>
                                    </p>
                                <?php } else { ?>
                                    <p>
                                        Anda telah terdaftar pada tanggal <?= tgl_indo($status->tanggal_pendaftaran) ?>, dengan status <span class="badge bg-danger fs-2  rounded-3 fw-semibold"><?= ucfirst($status->status) ?></span>, tetap semangat, silahkan mendaftar ke UKM lain dengan passion yang sesuai.
                                    </p>
                                <?php } ?>
                            <?php else : ?>
                                <p>
                                    Silahkan melakukan pendaftaran pada form pendaftaran sebelum tanggal <?= tgl_indo($timeline->tgl_akhir_pendaftaran) ?>
                                </p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-3 px-0 px-md-2">
                            <img src="<?= base_url('assets/images/logos/logo.png') ?>" height="135" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-10">
                            <h5 class="card-title mb-9 fw-semibold"> Status Pendaftaran </h5>
                            <?php if ($status) : ?>
                                <?php if ($status->status == 'pending') { ?>
                                    <span class="badge bg-warning rounded-3 fw-semibold mb-3"><?= ucfirst($status->status) ?></span>
                                <?php } elseif ($status->status == 'diterima') { ?>
                                    <span class="badge bg-success rounded-3 fw-semibold mb-3"><?= ucfirst($status->status) ?></span>
                                <?php } else { ?>
                                    <span class="badge bg-danger rounded-3 fw-semibold mb-3"><?= ucfirst($status->status) ?></span>
                                <?php } ?>
                            <?php else : ?>
                                <span class="badge bg-warning rounded-3 fw-semibold mb-3">Anda belum mendaftar</span>
                            <?php endif ?>
                            <?php if ($status) : ?>
                                <div class="d-flex align-items-center pb-1">
                                    <a class="fs-3 text-danger" href="<?= base_url('recruitment') ?>"><span class="me-2 rounded-circle bg-light-danger round-20 d-inline align-items-center justify-content-center">
                                            <i class="ti ti-list-details text-danger"></i>
                                        </span> Lihat Data</a>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-2">
                            <div class="d-flex justify-content-end">
                                <div class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-timeline fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Tahap Pendaftaran</h5>
                    </div>
                    <?php if ($timeline) : ?>
                        <ul class="timeline-widget mb-0 position-relative mb-n5">
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark ">Pendaftaran Berkas (Online)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_awal_pendaftaran) ?> s/d <?= tgl_indo($timeline->tgl_akhir_pendaftaran) ?></div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Tes Tertulis (Offline)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_tes_tertulis) ?> </div>

                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Pengumuman Tes Tertulis (Online)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_pengumuman_tes_tertulis) ?></div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Tes Wawancara (Offline)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_tes_wawancara) ?></div>

                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark">Pengumuman Tes Wawancara (Online)</div>
                                <div class="timeline-time text-dark fw-semibold flex-shrink-0 text-end"><?= tgl_indo($timeline->tgl_pengumuman_tes_wawancara) ?></div>
                            </li>
                        </ul>
                    <?php else : ?>
                        <p class="text-center">Data timeline kosong!</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('flash_message')) { ?>
    <script>
        Swal.fire({
            title: "<?= $this->session->flashdata('flash_message')['title']; ?>",
            text: "<?= $this->session->flashdata('flash_message')['message']; ?>",
            icon: "<?= $this->session->flashdata('flash_message')['icon']; ?>",
            timer: 2000
        });
    </script>
<?php } ?>