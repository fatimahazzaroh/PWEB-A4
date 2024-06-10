<div class="content">
        <!-- Content area -->
        <h2>PENITIPAN ELLIOT PETCARE</h2>
        <div class="garis"></div>
        <div class="container-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <?php if ($data['roles_id'] != 3): // Jika bukan cust ?>
                            <th>Nama Pengguna</th>
                        <?php endif; ?>
                        <th>Nama Kucing</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Jenis Kamar</th>
                        <th>No. Kamar</th>
                        <?php if ($data['roles_id'] == 2): // Jika admin ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['penitipan'] as $index => $penitipan) : ?>
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="<?= $penitipan['id'] ?>">Konfirm</button>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Ubah Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin hendak mengubah status?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form id="confirmForm" method="POST" action="<?= BASEURL; ?>/penitipan/updateStatusBooking">
                        <input type="hidden" id="penitipanId" name="penitipan_id" value="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
        // Set nilai default untuk input penitipan_id saat modal ditampilkan
        var confirmModal = document.getElementById('confirmModal');
        confirmModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Tombol yang memicu modal
            var id = button.getAttribute('data-id'); // Ambil ID dari atribut data-id pada tombol
            var inputPenitipanId = document.getElementById('penitipanId');
            inputPenitipanId.value = id; // Set nilai input penitipan_id dengan ID yang sesuai
        });
    </script>