<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div style="display:flex;height:80px;align-items:center;justify-content:center;font-size:20px">
        <a href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <span class="ms-1 font-weight-bold text-white">KRIPTO GRAFI <i>RSA</i></span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <img src="<?=base_url('assets/img/jnt_logo.png')?>" style="display:flex;width:180px;margin:auto;margin-bottom:10px"
        alt="">
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Navigasi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?=$judul==='home' ? 'active' : ''  ?>" href="<?=base_url('admin/')?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Data</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white  <?=$judul==='pengiriman' ? 'active' : ''  ?>"
                    href="<?=base_url('admin/pengiriman')?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pengiriman Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?=$judul==='Enkripsi' ? 'active' : ''  ?>"
                    href="<?=base_url('admin/enkripsi')?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Enkripsi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?=$judul==='Dekripsi' ? 'active' : ''  ?> " href="<?=base_url('admin/dekripsi')?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">key</i>
                    </div>
                    <span class="nav-link-text ms-1">Dekripsi</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="<?=base_url('auth/logout')?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>