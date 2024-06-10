<div class="content">
        <!-- Content area --> 
        <h2>Riwayat Penitipan</h2>
        <div class="garis"></div>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                    <th>No</th>
                    <?php if ($data['roles_id'] != 3): // Jika bukan cust ?>
                        <th>Nama Customer</th>
                    <?php endif; ?>
                    <th>Nama Kucing</th>
                    <th>Tanggal masuk</th>
                    <th>Tanggal keluar</th>
                    <th>Jenis Kamar</th>
                    <th>No. Kamar</th>
                    <th>Laporan</th>
                    <th>Total Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['penitipan'] as $index =>$penitipan) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <?php if ($data['roles_id'] != 3): // Jika bukan cust ?>
                            <td><?= $penitipan['nama'] ?></td>
                        <?php endif; ?>
                        <td><?= $penitipan['nama_kucing'] ?></td>
                        <td><?= $penitipan['tanggal_masuk'] ?></td>
                        <td><?= $penitipan['tanggal_keluar'] ?></td>
                        <td><?= $penitipan['jenis_kamar'] ?></td>
                        <td><?= $penitipan['no_kamar'] ?></td>
                        <td><a href="<?= BASEURL ?>/riwayat/downloadPDF?id=<?= $penitipan['id'] ?>" class="btn btn-primary" target="_blank">Download PDF</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>
<script>
        feather.replace();
    </script>

<script src="https://unpkg.com/feather-icons"></script>