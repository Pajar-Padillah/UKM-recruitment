<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran UKM PERS SUKMA</title>
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
        <b>FORMULIR PENDAFTARAN UKM SUKMA</b>
    </p>
    <img src="<?= base_url('assets/upload/recruitment/' . $data->foto) ?>" style="position: absolute; width: 140px; height: auto; margin-top:15pt; float: right;">
    <br>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Nama</span><span style="width:6.99pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';"><span style="width:25pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= ucwords($data->nama) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Email</span><span style="width:16.75pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';"><span style="width:16pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= $data->email ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">No Telepon</span><span style="width:17.50pt; display:inline-block;"></span><span style="font-family:'Times New Roman';"><span style="width:25pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';"><span style="width:34pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                    <?= $data->no_telp ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Hobby</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';"><span style="width:29pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= ucfirst($data->hobby) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Tempat, Tanggal Lahir</span><span style="width:23pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?= ucwords($data->tempat_lahir) ?>, <?= tgl_indo($data->tanggal_lahir) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Jenis Kelamin</span><span style="width:30pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?= ucfirst($data->jenis_kelamin) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Angkatan</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';"><span style="width:16pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= $data->angkatan ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Program Studi</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:29pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?= ucwords($data->prodi) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Jurusan</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';"><span style="width:26pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
                <?= ucwords($data->jurusan) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Asal Sekolah</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?= ucfirst($data->asal_sekolah) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Pengalaman Organisasi</span><span style="width:23pt; display:inline-block;">&nbsp;</span>:
        <?= ucfirst($data->pengalaman_organisasi) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Motto</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:35pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?= ucfirst($data->motto) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;">Alasan Bergabung</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:12pt; display:inline-block;">&nbsp;</span>:
        <?= ucfirst($data->alasan_bergabung) ?></span></p>
    <p style="margin-top:0pt; margin-bottom:3pt; line-height:150%;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="font-family:'Times New Roman';">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan ini saya menyatakan bahwa saya akan mengikuti semua peraturan yang ada didalam kegiatan UKM PERS SUKMA tersebut.
        </span>
    </p>
    <div style="float:right; margin-top:30pt; ">
        <br>
        Bandar Lampung, <?= tgl_indo(date('Y-m-d'))  ?>
        <br>Peserta<br><br><br><br>
        <p style="margin-bottom:0pt;"><b><?= ucwords($data->nama) ?> </b></p>
    </div>
</body>

</html>