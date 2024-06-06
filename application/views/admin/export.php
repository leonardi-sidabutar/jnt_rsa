<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengiriman Barang J&T Cargo.xls");
?>
<table id="myTable" class="table align-items-center mb-0">
    <thead>
        <tr>
            <th>Tanggal Pengiriman</th>
            <th> Kode Waybill</th>
            <th> Nama Pelanggan</th>
            <th> Outlet Pengirim</th>
            <th> Outlet Tujuan</th>
            <th> Jumlah Paket</th>
            <th> Metode Penyelesaian</th>
            <th> Volume Berat Paket</th>
            <th> Jumlah Biaya Kirim (Rp.)</th>
            <th> Status Resi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengiriman as $row) : ?>
            <tr>
                <td >
                    <span><?= $row['tanggal_pengiriman'] ?></span>
                </td>
                <td >
                    <span><?= $row['kode_waybill'] ?></span>
                </td>
                <td >
                    <span><?= $row['nama_pelanggan'] ?></span>
                </td>
                <td >
                    <span><?= $row['outlet_pengiriman'] ?></span>
                </td>
                <td >
                    <span><?= $row['outlet_tujuan'] ?></span>
                </td>
                <td >
                    <span><?= $row['jumlah_paket'] ?></span>
                </td>
                <td >
                    <span><?= $row['metode_penyelesaian'] ?></span>
                </td>
                <td >
                    <span><?= $row['volume_berat_paket'] ?></span>
                </td>
                <td >
                    <span>Rp.
                        <?= $row['biaya_kirim'] ?></span>
                </td>
                <td>
                    <span><?= $row['status_resi'] ?></span>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>