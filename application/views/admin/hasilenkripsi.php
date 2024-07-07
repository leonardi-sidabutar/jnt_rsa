<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
          </li>
          <li class="breadcrumb-item text-sm text-dark font-weight-bolder active" aria-current="page">Hasil Enkripsi</li>
        </ol>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <span style="margin-right:10px"><?= $login['role'] ?></span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="mb-3" style='margin-left:30px;'>
      <span style="font-weight:bold;font-size:18px;color:#555555">Selamat Datang Di Website <i>RSA</i></span>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header p-0 position-relative mx-3 z-index-2">

            <div class="bg-gradient-danger shadow-danger border-radius-lg pt-4 pb-3 mt-3">
              <h6 class="text-white text-capitalize ps-3">Data Pengiriman Barang</h6>
            </div>
          </div>
          <div class="card-footer px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Tanggal<br>Pengiriman</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Kode<br>Waybill</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Nama<br>Pelanggan</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Outlet<br>Pengiriman</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Outlet<br>Tujuan</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Jumlah<br>Paket</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Metode<br>Penyelesaian</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Volume<br>Berat Paket<br>(Kg)</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Jumlah<br>Biaya Kirim (Rp)</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Status<br>Resi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pengiriman as $row) : ?>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['tanggal_pengiriman'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['kode_waybill'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['nama_pelanggan'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['outlet_pengiriman'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['outlet_tujuan'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['jumlah_paket'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['metode_penyelesaian'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $row['volume_berat_paket'] ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp.
                          <?= $row['biaya_kirim'] ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?= $row['status_resi'] ?></span>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- card baru -->
        <br>
        <div class="card">
          <!-- batas form  -->
          <div style="width: 20px;" class="ml-3 mr-3">
          </div>
          <div class="d-flex flex-column">
            <div class="d-flex flex-row">
              <a href="<?= base_url('admin/enkripsi') ?>" class="btn bg-gradient-secondary m-3">Kembali</a>
              <a href="<?= base_url('admin/deleteenkripsi') ?>" class="btn bg-gradient-primary m-3">Kosongkan Tabel</a>
              <a href="<?=base_url('admin/eksporexcelhasilenk')?>" class="btn bg-gradient-primary m-3">Export</a>
            </div>

          </div>
        </div>
        <!-- end card baru -->
      </div>
    </div>