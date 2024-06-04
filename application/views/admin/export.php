<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengiriman.xls");
?>
<table id="myTable" class="table align-items-center mb-0">
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
                Jumlah<br>Biaya Kirim (Rp.)</th>
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