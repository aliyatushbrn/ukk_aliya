<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="<?= base_url('assets/sneat') ?>/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>
    <?= $judul_halaman; ?>
  </title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/sneat') ?>/assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="<?= base_url('assets/sneat') ?>/https://fonts.googleapis.com" />
  <link rel="preconnect" href="<?= base_url('assets/sneat') ?>/https://fonts.gstatic.com" crossorigin />
  <link
    href="<?= base_url('assets/sneat') ?>/https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/css/core.css"
    class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/vendor/css/theme-default.css"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url('assets/sneat') ?>/assets/css/demo.css" />
  <link rel="stylesheet"
    href="<?= base_url('assets/sneat') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="<?= base_url('assets/sneat') ?>/assets/vendor/js/helpers.js"></script>
  <script src="<?= base_url('assets/sneat') ?>/assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?= base_url('home') ?>" class="app-brand-link">
            <span class="app-brand-text fw-bolder" style="text-transform: uppercase">Charming
              Beauty</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>
        <?php $halaman = $this->uri->segment(1); ?>
        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?php if ($halaman == 'home') {
            echo "active";
          } ?>">
            <a href="<?= base_url('home') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <?php if ($this->session->userdata('level') == 'Admin') { ?>
            <li class="menu-item <?php if ($halaman == 'produk') {
              echo "active";
            } ?>">
              <a href="<?= base_url('produk') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store-alt"></i>
                <div data-i18n="Analytics">Produk</div>
              </a>
            </li>
            <li class="menu-item <?php if ($halaman == 'pengguna') {
              echo "active";
            } ?>">
              <a href="<?= base_url('pengguna') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Pengguna</div>
              </a>
            </li>
            <li class="menu-item <?php if ($halaman == 'laporan') {
              echo "active";
            } ?>">
              <a href="<?= base_url('laporan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Laporan Penjualan</div>
              </a>
            </li>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 'Kasir') { ?>
            <li class="menu-item <?php if ($halaman == 'penjualan') {
              echo "active";
            } ?>">
              <a href="<?= base_url('penjualan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div data-i18n="Analytics">Penjualan</div>
              </a>
            </li>
          <?php } ?>
          <li class="menu-item <?php if ($halaman == 'pelanggan') {
            echo "active";
          } ?>">
            <a href="<?= base_url('pelanggan') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-group"></i>
              <div data-i18n="Analytics">Pelanggan</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <?= $judul_halaman; ?>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="<?= base_url('assets/sneat') ?>/assets/img/avatars/6.png" alt
                      class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?= base_url('assets/sneat') ?>/assets/img/avatars/6.png" alt
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">
                            <?= $this->session->userdata('nama'); ?>
                          </span>
                          <small class="text-muted">
                            <?= $this->session->userdata('level'); ?>
                          </small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-fluid flex-grow-1 container-p-y">
            <!-- Layout Demo -->
            <?= $contents; ?>
            <!--/ Layout Demo -->
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                <a href="<?= base_url('assets/sneat') ?>/https://themeselection.com" target="_blank"
                  class="footer-link fw-bolder">Aliyatu Shabrina Zein</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url('assets/sneat') ?>/assets/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url('assets/sneat') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url('assets/sneat') ?>/assets/vendor/js/menu.js"></script>
  <script src="<?= base_url('assets/sneat') ?>/assets/js/main.js"></script>
  <script async defer src="<?= base_url('assets/sneat') ?>/https://buttons.github.io/buttons.js"></script>
</body>

</html>