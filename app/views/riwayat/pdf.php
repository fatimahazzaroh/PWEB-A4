<!-- pdf.php -->
<?php
// require_once BASEURL . '/vendor/autoload.php';

// Initialize PDF object
$mpdf = new \Mpdf\Mpdf();

// Load CSS
$stylesheet = file_get_contents('styles.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

// Begin PDF content
$html = '<div class="container">';
$html .= '<h2 style="text-align: center;">LAPORAN PENITIPAN KUCING <br> ELLIOT PETSHOP</h2>';

// Display report data
foreach ($data['report'] as $index => $report) {
    $html .= '<div class="container-info">';
    $html .= '<div class="container-info-name">';
    $html .= '<p>Nama Customer: ' . $report["nama"] . '</p>';
    $html .= '<p>Nama Kucing: ' . $report["nama_kucing"] . '</p>';
    $html .= '</div>';
    $html .= '<div class="container-info-date">';
    $html .= '<p>Tanggal Penitipan: ' . $report["tanggal_masuk"] . '</p>';
    $html .= '<p>Tanggal Pengambilan: ' . $report["tanggal_keluar"] . '</p>';
    $html .= '</div>';
    $html .= '</div>';
}

// Table for additional report details
$html .= '<div class="container-table">';
$html .= '<table border="1" cellpadding="10" cellspacing="0">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>No</th>';
$html .= '<th>Tanggal</th>';
$html .= '<th>Deskripsi</th>';
$html .= '<th style="width: 170px;">Gambar</th>'; // Adjust width here
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($data['report'] as $index => $report) {
    $html .= '<tr>';
    $html .= '<td>' . ($index + 1) . '</td>';
    $html .= '<td>' . $report['tanggal'] . '</td>';
    $html .= '<td>' . $report['deskripsi'] . '</td>';
    $html .= '<td>' . $report['gambar'] . '</td>';
    $html .= '</tr>';
}
$html .= '</tbody>';
$html .= '</table>';
$html .= '</div>';
$html .= '</div>';

// Write HTML content to PDF
$mpdf->WriteHTML($html);

// Output PDF
$mpdf->Output();
