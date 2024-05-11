<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
          </li>
          <li class="breadcrumb-item text-sm text-dark font-weight-bolder active" aria-current="page">Enkripsi</li>
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
      <span style="font-weight:bold;font-size:18px;color:#555555">Selamat Datang Di Aplikasi <i>RSA</i></span>
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
                      Volume<br>Biaya Kirim<br>(Rp)</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Jumlah<br>Biaya Kirim</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Status<br>Resi</th>
                    <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                      Aksi</th>
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
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp.
                          <?= $row['biaya_kirim'] ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?= $row['status_resi'] ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class='d-flex' style="flex-direction:column">
                          <span class="badge badge-sm bg-gradient-warning mb-2">Edit</span>
                          <span class="badge badge-sm bg-gradient-danger">Delete</span>
                        </div>
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
          <h6 class="mt-2 text-capitalize ps-3">Kunci Public Key</h6>
          <!-- batas form  -->

          <div class="border-bottom border-info mb-3"></div>

          <form class="d-flex flex-row justify-content-start">
            <div class="d-flex flex-column justify-content-start ml-3 mr-3 pl-3">
              <div class="d-flex flex-row align-items-center">
                <label for="" style="width:60px">Nilai P : </label>
                <div class="input-group input-group-outline" style="width:100px;">
                  <input id="p" type="text" class="form-control">
                </div>
              </div>

              <div class="d-flex flex-row align-items-center">
                <label class="" style="width:60px" for="">Nilai q : </label>
                <div class="input-group input-group-outline" style="width:100px;">
                  <input id="q" type="text" class="form-control">
                </div>
              </div>
            </div>
            <div style="width: 20px;" class="ml-3 mr-3">
            </div>
            <div class="d-flex flex-column">
              <div class="d-flex flex-row">
                <div class="input-group input-group-outline is-filled">
                  <label class="form-label">Nilai N</label>
                  <input id="n" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline is-filled">
                  <label class="form-label">Nilai φ(n)</label>
                  <input id="l" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline is-filled">
                  <label class="form-label">Nilai E</label>
                  <input id="e" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline is-filled">
                  <label class="form-label">Nilai D</label>
                  <input id="d" type="text" class="form-control">
                </div>
              </div>
              <div class="d-flex flex-row">
                <a class="btn bg-gradient-primary m-3" onclick="calculate()" type="button">Kunci</a>
                <a class="btn bg-gradient-primary m-3" href="" type="button">Enkripsi</a>
              </div>

            </div>
          </form>
          <!-- batas form -->
        </div>
        <!-- end card baru -->
      </div>
    </div>

    <script>
      "use strict";

      let e, d, n, l;

      function validatePrime(prime, nameOfPrime) {
        if (!isPrime(prime)) {
          alert("'" + nameOfPrime + "' Bukan Bilangan Prima. Masukkan Bilangan Prima.");
          return false;
        }
        if (prime <= 1) {
          alert("'" + nameOfPrime + "' Harus Bilangan Prima .");
          return false;
        }
        return true;
      }

      function calculate() {
        var p = document.getElementById("p").value;
        var q = document.getElementById("q").value;
        if (!(validatePrime(p, "p") && validatePrime(q, "q"))) return;
        n = p * q;
        document.getElementById("n").value = n;

        l = (p - 1) * (q - 1);
        document.getElementById("l").value = l;

        var es = findEncryptionKeys(l, n);
        document.getElementById("e").value = es[0];

        encryptorChanged();
      }

      function encryptorChanged() {
        e = document.getElementById("e").value;

        var ds = findDecryptionKeys(e, l);
        ds.splice(ds.indexOf(e), 1); //remove encryption key from list
        d = ds[0];
        document.getElementById("d").value = d;

      }

      function decryptorChanged() {
        d = document.getElementById("d").value;
        document.getElementById("privat-key").innerHTML = "(" + d + "," + n + ")";
      }

      function isPrime(num) {
        for (let i = 2, s = Math.sqrt(num); i <= s; i++)
          if (num % i === 0) return false;
        return num !== 1;
      }

      function findEncryptionKeys(l, n) {
        var arr = [];
        for (var i = 2; i < l; i++) {
          if (isCoPrime(i, l) && isCoPrime(i, n))
            arr.push(i);
          if (arr.length > 5) break;
        }
        return arr;
      }

      function isCoPrime(a, b) {
        var aFac = findFactors(a);
        var bFac = findFactors(b);
        var result = aFac.every(x => bFac.indexOf(x) < 0);
        return result;
      }

      var hashtable = new Object();

      function findFactors(num) {
        if (hashtable[num])
          return hashtable[num];

        var half = Math.floor(num / 2), // Ensures a whole number <= num.
          result = [],
          i, j;

        //result.push(1); // 1 should be a part of every solution but for our purpose of COPRIME 1 should be excluded

        // Determine out increment value for the loop and starting point.
        num % 2 === 0 ? (i = 2, j = 1) : (i = 3, j = 2);

        for (i; i <= half; i += j) {
          num % i === 0 ? result.push(i) : false;
        }

        result.push(num); // Always include the original number.
        hashtable[num] = result;
        return result;
      }

      function findDecryptionKeys(e, l) {
        var ds = [];
        for (var x = l + 1; x < l + 100000; x++) {
          if (x * e % l === 1) {
            ds.push(x);
            if (ds.length > 5) return ds;
          }
        }
        return ds;
      }

      function encrypt() {
        var m = document.getElementById("message").value;
        var ascii = Array.from(Array(m.length).keys()).map(i => m.charCodeAt(i));
        document.getElementById("ascii").innerHTML = ascii;
        var encrypted = ascii.map(i => powerMod(i, e, n));
        document.getElementById("encrypted-msg").innerHTML = encrypted;
        document.getElementById("encrypted-msg-textbox").value = encrypted;
      }

      function decrypt() {
        var cipher = stringToNumberArray(document.getElementById("encrypted-msg-textbox").value);
        var ascii = cipher.map(i => powerMod(i, d, n));
        document.getElementById("ascii-decrypted").innerHTML = ascii;
        var message = "";
        ascii.map(x => message += String.fromCharCode(x));
        document.getElementById("decrypted-msg").innerHTML = message;
      }

      function stringToNumberArray(str) {
        return str.split(",").map(i => parseInt(i));
      }

      // calculates   base^exponent % modulus
      function powerMod(base, exponent, modulus) {
        if (modulus === 1) return 0;
        var result = 1;
        base = base % modulus;
        while (exponent > 0) {
          if (exponent % 2 === 1) //odd number
            result = (result * base) % modulus;
          exponent = exponent >> 1; //divide by 2
          base = (base * base) % modulus;
        }
        return result;
      }

      // file
    </script>