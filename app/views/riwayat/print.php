<div class="container">
        <h2 style="text-align: center;">LAPORAN PENITIPAN KUCING <br> ELLIOT PETSHOP</h2>
        <?php foreach ($data['report'] as $index =>$report) : ?>
        <!-- Include data from the PDF data array -->
        <?php foreach ($pdfData as $row): ?>
            <div class='container-info'>
                <div class='container-info-name'>
                    <p>Nama Customer: <?= $report["nama"] ?></p>
                    <p>Nama Kucing: <?= $report["nama_kucing"] ?></p>
                </div>
                <div class='container-info-date'>
                    <p>Tanggal Penitipan: <?= $report["tanggal_masuk"] ?></p>
                    <p>Tanggal Pengambilan: <?= $row["tanggal_keluar"] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $report['tanggal'] ?></td>
                        <td><?= $report['deskripsi'] ?></td>
                        <td><?= $report['gambar'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>