<div class="content">
        <!-- Content area -->
        <h2>PENITIPAN ELLIOT PETCARE</h2>
        <div class="garis"></div>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                    <th>No</th>
                    <?php if ($data['roles_id'] != 3): // Jika bukan cust ?>
                        <th>Nama Pengguna</th>
                    <?php endif; ?>
                    <th>Nama Kucing</th>
                    <th>Tanggal masuk</th>
                    <th>Tanggal keluar</th>
                    <th>Jenis Kamar</th>
                    <th>No. Kamar</th>
                    <?php if ($data['roles_id'] == 2): // Jika admin ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                    
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
                        <?php if ($data['roles_id'] == 2): // Jika admin ?>
                        <td>
                            <a href="<?= BASEURL ?>/penitipan/updateStatus/<?= $penitipan['id'] ?>?status=booked" class="button <?= $penitipan['status'] == 'booked' ? 'disabled' : '' ?>">Konfirm</a>
                        </td>
                    <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>