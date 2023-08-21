<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Data Timeline</b>
        </h5>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('timeline/update') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_awal_pendaftaran" class="form-label">Tanggal awal pendaftaran</label>
                                <input type="date" value="<?= $timeline->tgl_awal_pendaftaran ?>" name="tgl_awal_pendaftaran" class="form-control" id="tgl_awal_pendaftaran">
                                <?= form_error('tgl_awal_pendaftaran', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_akhir_pendaftaran" class="form-label">Tanggal akhir pendaftaran</label>
                                <input type="date" value="<?= $timeline->tgl_akhir_pendaftaran ?>" name="tgl_akhir_pendaftaran" class="form-control" id="tgl_akhir_pendaftaran">
                                <?= form_error('tgl_akhir_pendaftaran', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_tes_tertulis" class="form-label">Tanggal tes tertulis</label>
                                <input type="date" value="<?= $timeline->tgl_tes_tertulis ?>" name="tgl_tes_tertulis" class="form-control" id="tgl_tes_tertulis">
                                <?= form_error('tgl_tes_tertulis', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_pengumuman_tes_tertulis" class="form-label">Tanggal pengumuman tes tertulis</label>
                                <input type="date" value="<?= $timeline->tgl_pengumuman_tes_tertulis ?>" name="tgl_pengumuman_tes_tertulis" class="form-control" id="tgl_pengumuman_tes_tertulis">
                                <?= form_error('tgl_pengumuman_tes_tertulis', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_tes_wawancara" class="form-label">Tanggal tes wawancara</label>
                                <input type="date" value="<?= $timeline->tgl_tes_wawancara ?>" name="tgl_tes_wawancara" class="form-control" id="tgl_tes_wawancara">
                                <?= form_error('tgl_tes_wawancara', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pengumuman_tes_wawancara" class="form-label">Tanggal pengumuman tes wawancara</label>
                                <input type="date" value="<?= $timeline->tgl_pengumuman_tes_wawancara ?>" name="tgl_pengumuman_tes_wawancara" class="form-control" id="tgl_pengumuman_tes_wawancara">
                                <?= form_error('tgl_pengumuman_tes_wawancara', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_timeline" value="<?= $timeline->id_timeline ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('timeline') ?>" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>