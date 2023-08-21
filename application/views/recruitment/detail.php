<div class="card p-2 shadow border-bottom border-primary">
    <div class="card-header bg-white">
        <h4 class="align-middle m-0 font-weight-bold">
            Detail Data Recruitment : <?= ucwords($data['nama']) ?> </h4>
        <hr>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <?php if (!empty($data['foto'])) { ?>
                    <img src="<?= base_url() ?>assets/upload/recruitment/<?= $data['foto']  ?>" alt="" class="img-thumbnail rounded-5 mb-2">
                <?php } else { ?>
                    <img src="<?= base_url() ?>assets/images/profile/default.jpg" alt="" class="img-thumbnail rounded-5 mb-2">
                <?php } ?>
                <img src="<?= base_url('assets/upload/user-images/') . $data['foto'] ?>" alt="" class="img-thumbnail rounded-5 mb-2">
                <a href="<?= base_url('recruitment/edit/') . $data['id_recruitment'] ?>" class="btn btn-sm d-md-block btn-primary mb-2"><i class="ti ti-edit"></i> Edit Data</a>
                <a href="<?= base_url('recruitment/delete/' . $data['id_recruitment']) ?>" id="hapus" class="btn btn-sm d-md-block btn-danger mb-2"><i class="ti ti-trash"></i> Hapus Data</a>
                <a href="<?= base_url('recruitment') ?>" class="btn btn-sm d-md-block btn-secondary mb-2"><i class="ti ti-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">NPM</th>
                        <td><?= $data['npm'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= ucwords($data['nama']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $data['email'] ?></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td><?= $data['no_telp'] ?></td>
                    </tr>
                    <tr>
                        <th>Hobby</th>
                        <td><?= ucfirst($data['hobby']) ?></td>
                    </tr>
                    <tr>
                        <th>Tempat, Tanggal lahir</th>
                        <td><?= ucfirst($data['tempat_lahir']) ?>, <?= tgl_indo($data['tanggal_lahir']) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= $data['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td><?= $data['angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td><?= ucwords($data['prodi']) ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td><?= ucwords($data['jurusan']) ?></td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td><?= ucfirst($data['asal_sekolah']) ?></td>
                    </tr>
                    <tr>
                        <th>Pengalaman Organisasi</th>
                        <td><?= ucfirst($data['pengalaman_organisasi']) ?></td>
                    </tr>
                    <tr>
                        <th>Motto</th>
                        <td><?= ucfirst($data['motto']) ?></td>
                    </tr>
                    <tr>
                        <th>Alasan Bergabung</th>
                        <td><?= ucfirst($data['alasan_bergabung']) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
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