<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/logos/logo.png" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/styles.min.css" />
    <script src="<?= base_url(); ?>assets/js/sweetalert2.js"></script>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= base_url('dashboard') ?>" class="text-nowrap logo-img mt-3">
                        <img src="<?= base_url(); ?>assets/images/logos/sukma.jpg" width="225" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= $this->menu->is_active('dashboard') ?>" href="<?= base_url('dashboard'); ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <?php if (is_admin()) { ?>
                                <span class="hide-menu">DATA MASTER</span>
                            <?php } else { ?>
                                <span class="hide-menu">DATA PROFILE</span>
                            <?php } ?>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= $this->menu->is_active('profile') ?>" href="<?= base_url('profile') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">My Profile</span>
                            </a>
                        </li>
                        <?php if (is_admin()) : ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->menu->is_active('user') ?>" href="<?= base_url('user') ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-users"></i>
                                    </span>
                                    <span class="hide-menu">Data User</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->menu->is_active('timeline') ?>" href="<?= base_url('timeline') ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-timeline-event"></i>
                                    </span>
                                    <span class="hide-menu">Data Timeline</span>
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">DATA PENDAFTARAN UKM</span>
                        </li>
                        <?php if (is_mhs()) : ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->menu->is_active('recruitment/tambah') ?>" href="<?= base_url('recruitment/tambah') ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Form Pendaftaran</span>
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= $this->menu->is_active('recruitment') ?>" href="<?= base_url('recruitment') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-files"></i>
                                </span>
                                <span class="hide-menu">Data Pendaftar</span>
                            </a>
                        </li>
                        <?php if (is_admin()) : ?>
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">REPORT</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link <?= $this->menu->is_active('laporan') ?>" href="<?= base_url('laporan') ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Laporan</span>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover fs-4" href="javascript:void(0)">
                                <i class="ti ti-user-check"></i>
                                <?php if (userdata('role') == 1) : ?>
                                    <span> &nbsp; Administrator</span>
                                <?php else : ?>
                                    <span> &nbsp; Mahasiswa</span>
                                <?php endif ?>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="d-none d-lg-inline fs-4 small text-capitalize" style="color: black; margin-right: 10px;">
                                        <?= userdata('nama'); ?>
                                    </span>
                                    <?php if (!empty(userdata('foto'))) { ?>
                                        <img src="<?= base_url() ?>assets/upload/user-images/<?= userdata('foto'); ?>" alt="" width="35" height="35" class="rounded-circle ml-2">
                                    <?php } else { ?>
                                        <img src="<?= base_url() ?>assets/images/profile/default.jpg" alt="" width="35" height="35" class="rounded-circle ml-2">
                                    <?php } ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="<?= base_url('profile') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="<?= base_url('login/logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid mb-4">
                <!--  Content -->
                <div class="mb-4">
                    <div class="d-sm-flex d-block align-items-center justify-content-between">
                        <h3 class="text-dark font-weight-medium"><b><?= $title ?></b></h3>
                        <a class="btn btn-primary"><i class="ti ti-calendar"></i> <?= tgl_indo(date('Y-m-d')) ?></a>
                    </div>
                </div>
                <?= $contents; ?>
            </div>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/datatables/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?= base_url(); ?>assets/js/dashboard.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>