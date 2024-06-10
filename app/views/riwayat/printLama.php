<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'koneksi.php';

$mpdf = new \Mpdf\Mpdf();

$stylesheet = file_get_contents('styles.css'); // Membaca konten dari file CSS
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS); // Menulis CSS ke dokumen

$html = 
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="navbar-top">
    <a href="#" class="navbar-logo">
        <img src="../logo.svg" alt="Logo" class="logo">
        <p>Elliot</p>
    </a>
</div>
    
<div class="container">
    <h2 style="text-align: center;">LAPORAN PENITIPAN KUCING <br> ELLIOT PETSHOP</h2>';

$sql_info = "SELECT individuals.nama AS nama_customer, penitipan.nama_kucing, penitipan.tanggal_masuk, penitipan.tanggal_keluar
    FROM individuals
    JOIN penitipan ON individuals.id = penitipan.individuals_id";
$result = $conn->query($sql_info);

if ($result->num_rows > 0) {
    $nomor = 1;
    while($row = $result->fetch_assoc()) {
    $html .= "<div class='container-info'>";
    $html .= "<div class='container-info-name'>";
    $html .= "<p>Nama Customer: " . $row["nama_customer"]. "</p>";
    $html .= "<p>Nama Kucing: " . $row["nama_kucing"]. "</p>";
    $html .= "</div>";
    $html .= "<div class='container-info-date'>";
    $html .= "<p>Tanggal Penitipan: " . $row["tanggal_masuk"]. "</p>";
    $html .= "<p>Tanggal Pengambilan: " . $row["tanggal_keluar"]. "</p>";
    $html .= "</div>";
    $html .= "</div>";
}
} else {
echo "0 hasil";
}

$html .= 
    '<div class="container-table">
        <table border="1" cellpadding="10" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>';
            
$sql_laporan = "SELECT * FROM laporan";
$result_laporan = $conn->query($sql_laporan);

if ($result_laporan->num_rows > 0) {
    $nomor = 1;
    while($row_laporan = $result_laporan->fetch_assoc()) {
        $html .= 
        '<tr>
            <td>' . $nomor . '</td>
            <td>' . $row_laporan["tanggal"] . '</td>
            <td>' . $row_laporan["deskripsi"] . '</td>
            <td><img src="' . $row_laporan["gambar"] . '" alt="Gambar" style="width: 100px;"></td>
        </tr>';
        $nomor++;
    }   $nomor = 1;

} else {
    echo "0 hasil";
}

$html .=  '
            </thead>
        </table>
    </div>

    <div class="container-payment" style="text-align: right;">
        <p>Jumlah Pembayaran:<strong> Rp500.000 </strong></p>
        <p>Status Pembayaran: <strong><span style="color: red;">Lunas</span></strong></p>
    </div>
</div>
</body>
</html>';

$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY); // Menulis HTML ke dokumen
$mpdf->Output();

$conn->close();
