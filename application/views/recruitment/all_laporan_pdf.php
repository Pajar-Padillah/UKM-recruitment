<!DOCTYPE html>
<html>

<head>
    <title>
        <?= $title; ?>
    </title>
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .border-table {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
        }

        .border-table th {
            border: 1 solid #000;
            font-weight: bold;
            background-color: #e1e1e1;
        }

        .border-table td {
            border: 1 solid #000;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets/images/logos/logo.png') ?>" style="position: absolute; width: 80px; height: auto;">
    <img src="<?= base_url('assets/images/logos/polinela.png') ?>" style="position: absolute; width: 80px; height: auto; float: right;">
    <table style="width: 110%;">
        <tr>
            <td align="center">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">UNIT KEGIATAN MAHASISWA PERS SUKMA</span></strong></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">POLITEKNIK NEGERI LAMPUNG</span></strong></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%;"><span style="font-family:Arial;">Jl. Soekarno Hatta No.10, Rajabasa Raya, Kota Bandar Lampung, Lampung 35141<br>
                        Telp : 0721-703995, Email : humas@polinela.ac.id
                    </span></p>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        <b>LAPORAN SEMUA DATA PENDAFTARAN UKM SUKMA</b>
    </p>
    <p align="center">
        Periode Tanggal <?= tgl_indo($tanggal['tgl_awal']) ?> s/d <?= tgl_indo($tanggal['tgl_akhir']) ?>
    </p>
    <table class="border-table">
        <tr>
            <th>No.</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Angkatan</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Prodi</th>
            <th>Jurusan </th>
            <th>Alamat</th>
            <th>Status</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data as $b) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $b['npm'] ?></td>
                <td><?= ucwords($b['nama']) ?></td>
                <td><?= $b['no_telp'] ?></td>
                <td><?= $b['angkatan'] ?></td>
                <td><?= ucwords($b['tempat_lahir']) ?>, <?= tgl_indo($b['tanggal_lahir']) ?></td>
                <td><?= ucwords($b['prodi']) ?></td>
                <td><?= ucwords($b['jurusan']) ?></td>
                <td><?= ucfirst($b['alamat']) ?></td>
                <td>
                    <?php if ($b['status'] == 'diterima') : ?>
                        <span><?= ucfirst($b['status']); ?></span>
                    <?php elseif ($b['status'] == 'ditolak') : ?>
                        <span><?= ucfirst($b['status']); ?></span>
                    <?php elseif ($b['status'] == 'pending') : ?>
                        <span><?= ucfirst($b['status']); ?></span>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div style="float:right;">
        <br>
        Bandar Lampung, <?= tgl_indo(date('Y-m-d'))  ?>
        <br>Ketua UKM SUKMA <br><br><br><br>
        <p>(....................................)</b></p>
    </div>
</body>

</html>