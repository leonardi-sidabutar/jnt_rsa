<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark font-weight-bolder active" aria-current="page">Home
                    </li>
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
        <div class="mb-3" style='margin-left:30px;'>
            <span style="font-weight:bold;font-size:18px;color:#555555">Selamat Datang Di Website <i>RSA</i></span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card z-index-2 ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8" style='display:flex;align-items:center'>
                                <span style="font-size:28px;color:#555555;line-height:1.5em;" class="mb-0 "
                                    align="center">Penerapan Kriptografi Pengamanan Data Pengiriman Barang Di J&T Cargo
                                    Padang Bulan Medan Menggunakan Metode <i>RSA (Rivest Shamir Adleman)</i></span>
                            </div>
                            <div class="col-lg-4" style='display:flex;align-items:center'>
                                <img src="<?=base_url('assets/img/jnt_logo.png')?>"
                                    style='display:flex;margin:auto;max-width:250px;' alt="">
                            </div>
                        </div>
                        <hr class="dark horizontal">
                    </div>
                </div>
            </div>
        </div>