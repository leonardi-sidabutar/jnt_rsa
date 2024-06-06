<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Dekripsi Data Pengiriman Barang J&T Cargo.xls");
?>
<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th>Tanggal Pengiriman</th>
            <th>Kode Waybill</th>
            <th>Nama Pelanggan</th>
            <th>Outlet Pengiriman</th>
            <th>Outlet Tujuan</th>
            <th>Jumlah Paket</th>
            <th>Metode Penyelesaian</th>
            <th>Volume Berat Paket (Kg)</th>
            <th>Jumlah Biaya Kirim (Rp)</th>
            <th>Status Resi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengiriman as $row) : ?>
            <tr>
                <td><?= $row['tanggal_pengiriman'] ?> </td>
                <td><?= $row['kode_waybill'] ?> </td>
                <td><?= $row['nama_pelanggan'] ?> </td>
                <td><?= $row['outlet_pengiriman'] ?> </td>
                <td><?= $row['outlet_tujuan'] ?> </td>
                <td><?= $row['jumlah_paket'] ?> </td>
                <td><?= $row['metode_penyelesaian'] ?> </td>
                <td><?= $row['volume_berat_paket'] ?> </td>
                <td>Rp.<?= $row['biaya_kirim'] ?> </td>
                <td><?= $row['status_resi'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>