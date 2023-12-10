<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Daftar Pekerjaan || Karir Bersama</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/ELSON.png') ?>">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?> ">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">


</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <img src="<?= base_url('assets/img/ELSON.png') ?>" width="100px">
        </div>

        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/dashboard') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-house') ?>"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/daftar/lowongan') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-briefcase') ?>"></use>
                    </svg> Lowongan Kerja</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/lowongan/daftar') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-book') ?>"></use>
                    </svg> Lamaran</a>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    <!-- navbar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-menu') ?>"></use>
                    </svg>
                </button>

                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md">
                                <img class="avatar-img" src="<?= base_url('assets/img/avatars/8.jpg') ?>">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') ?>"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span>
                            </a>
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div>
                            <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                </svg> Profile</a>
                            <a class="dropdown-item" href="<?= base_url('/logout') ?>">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout') ?>"></use>
                                </svg>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <div class="body flex-grow-1 px-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-0">Daftar Lowongan Pekerjaan</h4>
                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Nama Pekerjaan</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Batas Lamaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lowongan as $index => $item) : ?>
                                    <?php
                                    $isApplied = false;
                                    foreach ($applied_jobs as $job) {
                                        if ($job['id_job'] == $item['id']) {
                                            $isApplied = true;
                                            break;
                                        }
                                    }
                                    ?>
                                    <?php if (!$isApplied) : ?>
                                        <tr>
                                            <td scope="row"><?php echo (int)$index + 1; ?></td>
                                            <td>
                                                <?php
                                                $idPerusahaan = $item['id_perusahaan'];
                                                $namaPerusahaan = '';
                                                foreach ($perusahaan as $perusahaanItem) {
                                                    if ($perusahaanItem['id'] === $idPerusahaan) {
                                                        $namaPerusahaan = $perusahaanItem['nama_perusahaan'];
                                                        break;
                                                    }
                                                }
                                                echo $namaPerusahaan;
                                                ?>
                                            </td>
                                            <td><?php echo $item['nama_pekerjaan']; ?></td>
                                            <td><?php echo $item['posisi']; ?></td>
                                            <td class="wrap-text"><?php echo $item['deskripsi']; ?></td>
                                            <td><?php echo $item['batas_post']; ?></td>
                                            <td>
                                                <a href="<?= base_url('pelamar/lowongan/apply/' . $item['id']) ?>" class="btn btn-block btn-info">Lamar</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php foreach ($lowongan as $index => $item) : ?>
                                    <?php
                                    $isApplied = false;
                                    foreach ($applied_jobs as $job) {
                                        if ($job['id_job'] == $item['id']) {
                                            $isApplied = true;
                                            break;
                                        }
                                    }
                                    ?>
                                    <?php if ($isApplied) : ?>
                                        <tr>
                                            <td scope="row"><?php echo (int)$index + 1; ?></td>
                                            <td>
                                                <?php
                                                $idPerusahaan = $item['id_perusahaan'];
                                                $namaPerusahaan = '';
                                                foreach ($perusahaan as $perusahaanItem) {
                                                    if ($perusahaanItem['id'] === $idPerusahaan) {
                                                        $namaPerusahaan = $perusahaanItem['nama_perusahaan'];
                                                        break;
                                                    }
                                                }
                                                echo $namaPerusahaan;
                                                ?>
                                            </td>
                                            <td><?php echo $item['nama_pekerjaan']; ?></td>
                                            <td><?php echo $item['posisi']; ?></td>
                                            <td class="wrap-text"><?php echo $item['deskripsi']; ?></td>
                                            <td><?php echo $item['batas_post']; ?></td>
                                            <td>
                                                <!-- Button lamaran untuk data yang sudah dilamar -->
                                                <button class="btn btn-block btn-info" disabled>Sudah Lamar</button>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
                        <!-- Isi bagian chart jika ada -->
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div>
                © 2023 Karir Bersama
            </div>
            <div class="ms-auto">
                Lamar Kerja Dimana-pun, Kapan-pun
            </div>
        </footer>
    </div>


    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/simplebar/js/simplebar.min.js') ?> "></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url('assets/vendors/chart.js/js/chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/@coreui/utils/js/coreui-utils.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script>
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const confirmDelete = confirm('Anda yakin ingin menghapus data ini?');

                if (confirmDelete) {
                    window.location.href = e.target.getAttribute('href');
                }
            });
        });
    </script>



</body>

</html>