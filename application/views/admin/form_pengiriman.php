<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark font-weight-bolder active" aria-current="page">Data
                        Pengiriman Barang</li>
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
                        <i class="material-icons opacity-10">person</i>
                        <span style="margin-left:5px"><?=$login['role']?></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header p-0 position-relative mx-3 z-index-2">
                        <div class="mt-3">
                            <span class="text-bold">Edit Data Pengiriman Barang</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" class="text-start" method="POST" action="<?=base_url('Admin/update')?>">
                            <label class="form-label">Tanggal Pengiriman</label>
                            <input type="hidden" class="form-control" value="<?=$row['id']?>" name="id">
                            <div class="input-group input-group-outline mb-3 d-flex">
                                <input type="date" class="form-control" value="<?=$row['tanggal_pengiriman']?>"
                                    name="date">
                            </div>
                            <label class="form-label">Kode Waybill</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['kode_waybill']?>"
                                    name="waybill">
                            </div>
                            <label class="form-label">Nama Pelanggan</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['nama_pelanggan']?>" name="nama">
                            </div>
                            <label class="form-label">Outlet Pengiriman</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['outlet_pengiriman']?>"
                                    name="outlet_pengiriman">
                            </div>
                            <label class="form-label">Outlet Tujuan</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['outlet_tujuan']?>"
                                    name="outlet_tujuan">
                            </div>
                            <label class="form-label">Jumlah Paket</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['jumlah_paket']?>"
                                    name="jumlah_paket">
                            </div>
                            <label class="form-label">Metode Penyelesaian</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['metode_penyelesaian']?>"
                                    name="metode_penyelesaian">
                            </div>
                            <label class="form-label">Volumen Berat Paket</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['volume_berat_paket']?>"
                                    name="volume_berat">
                            </div>
                            <label class="form-label">Volumen Biaya Kirim</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" class="form-control" value="<?=$row['biaya_kirim']?>" name="biaya">
                            </div>
                            <label class="form-label">Status Resi</label>
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-select px-2" name="status">
                                    <option>Status Pengiriman</option>
                                    <option
                                        <?= $row['status_resi']==='PAKET SUDAH DITERIMA' ? "value='".$row['status_resi']."' selected" : "value='PAKET SUDAH DITERIMA'" ?>>
                                        PAKET SUDAH DITERIMA</option>
                                    <option
                                        <?= $row['status_resi']==='PAKET SEDANG TRANSIT' ? "value='".$row['status_resi']."' selected" : "value='PAKET SEDANG TRANSIT'" ?>>
                                        PAKET SEDANG TRANSIT</option>
                                    <option
                                        <?= $row['status_resi']==='PAKET SEDANG BERADA DI GUDANG' ? "value='".$row['status_resi']."' selected" : "value='PAKET SEDANG BERADA DI GUDANG'" ?>>
                                        PAKET SEDANG BERADA DI GUDANG</option>
                                    <option
                                        <?= $row['status_resi']==='PAKET SEDANG DALAM PERJALANAN' ? "value='".$row['status_resi']."' selected" : "value='PAKET SEDANG DALAM PERJALANAN'" ?>>
                                        PAKET SEDANG DALAM PERJALANAN</option>
                                </select>

                            </div>
                            <button type="reset" class="btn btn-danger btn-sm mt-3 mb-0">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm mt-3 mb-0">Simpan</button>
                        </form>
                    </div>
                    <div class="card-footer px-0 pb-2">
                    </div>
                </div>