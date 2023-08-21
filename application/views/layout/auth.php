<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/logos/logo.png" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/styles.min.css" />
    <script src="<?= base_url(); ?>assets/js/sweetalert2.js"></script>

</head>

<body>
    <!--  Body Wrapper -->
    <?= $contents; ?>
    <script src="<?= base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>