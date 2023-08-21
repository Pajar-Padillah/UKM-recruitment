<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold">
                    Form Laporan
                </h4>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form method="post" action="<?php echo base_url('laporan/laporan_pendaftaran') ?>">
                    <div class="laporan">
                        <div class="row form-group">
                            <label class="col-lg-2 text-lg-left" for="tanggal">Periode Tanggal </label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <p class="mx-3">Dari tanggal</p>
                                            <?php if (isset($_POST['filter'])) : ?>
                                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tgl_awal; ?>">
                                            <?php else : ?>
                                                <input type="date" class="form-control" name="tanggal_awal" value="<?= date('Y-m-01'); ?>">
                                            <?php endif ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="mx-3">Sampai tanggal</p>
                                            <?php if (isset($_POST['filter'])) : ?>
                                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tgl_akhir; ?>">
                                            <?php else : ?>
                                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= date('Y-m-d'); ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-9 offset-lg-2">
                                <button type="submit" name="filter" class="btn btn-primary btn-icon-split">
                                    <span class="icon">
                                        <i class="ti ti-filter"></i>
                                    </span>
                                    <span class="text">
                                        Filter
                                    </span>
                                </button>
                                <a href="<?= base_url('laporan'); ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon">
                                        <i class="ti ti-undo"></i>
                                    </span>
                                    <span class="text">
                                        Reset
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="tabel_barang">
                    <?php if (isset($_POST['filter'])) : ?>

                        <?php
                        $tanggal_awal_heading = date($tgl_awal);
                        $tanggal_akhir_heading = date($tgl_akhir);
                        ?>
                        <hr>
                        <h5 class="text-center"> Data Pendaftaran Periode Tanggal <?= tgl_indo($tanggal_awal_heading) ?> s/d <?= tgl_indo($tanggal_akhir_heading) ?></h5>
                        <div class="table-responsive">
                            <?php if (!empty($data)) { ?>
                                <table id="table" class="table table-bordered text-nowrap mb-0 align-middle">
                                <?php } else { ?>
                                    <table class="table table-bordered text-nowrap mb-0 align-middle">
                                    <?php } ?>
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">No.</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">NPM</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Nama</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">No Telp</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Angkatan</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Tempat, Tanggal Lahir</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Prodi</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Jurusan</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Alamat</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Status</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if ($data) :
                                            foreach ($data as $item) :
                                        ?>
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= $item['npm'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= ucfirst($item['nama']) ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= $item['no_telp'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= $item['angkatan'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= ucfirst($item['tempat_lahir']) ?>, <?= tgl_indo($item['tanggal_lahir']) ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= ucfirst($item['prodi']) ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= ucfirst($item['jurusan']) ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold"><?= ucfirst($item['alamat']) ?></h6>
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
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    Data pendaftaran tidak ada!
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    </table>
                        </div>
                        <div class="my-3">
                            <?php if (!empty($data)) { ?>
                                <a target="_blank" href="<?= base_url('laporan/laporanPDF/' . $tgl_awal . '/' . $tgl_akhir); ?>" class="btn btn-success"><i class="ti ti-printer"></i> Cetak Laporan</a>
                            <?php } ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if (isset($_POST['filter'])) { ?>
            $("#tabel_barang").show();
        <?php }  ?>
    });
</script>