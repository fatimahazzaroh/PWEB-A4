<div class="content">
    <h2>JENIS KAMAR PENITIPAN <br> ELLIOT PETSHOP</h2>
    <div class="garis"></div>

    <?php if ($data['roles_id'] == 3) : ?>
        <button type="button" class="btn btn-primary" style="float: right; background-color: #FF4167;" data-bs-toggle="modal" data-bs-target="#formPesanan">
            Buat Pesanan
        </button>
    <?php endif; ?>

    <div class="container-table">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Kamar</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <?php if ($data['roles_id'] == 2) : ?>
                    <th>
                        <button type="button" class="btn btn-primary float-right tombolTambahDataKamar" style="background-color: #FF4167;" data-bs-toggle="modal" data-bs-target="#formKamar">
                            Tambah Kamar
                        </button>
                    </th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['kamar'] as $index => $kamar) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $kamar['jenis_kamar'] ?></td>
                    <td><?= $kamar['harga'] ?></td>
                    <td><?= $kamar['total'] ?>/10</td>
                    <td><?= $kamar['deskripsi'] ?></td>
                    <?php if ($data['roles_id'] == 2) : ?>
                    <td>
                        <button type="button" class="btn btn-warning tampilModalUbahKamar" data-id="<?= $kamar['id'] ?>" data-bs-toggle="modal" data-bs-target="#formKamar">
                            Edit
                        </button>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Adding/Editing Kamar -->
<div class="modal fade" id="formKamar" tabindex="-1" aria-labelledby="formKamarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formKamarLabel">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="kamarForm" method="POST" action="<?= BASEURL; ?>/kamar/tambahKamar">
                    <input type="hidden" id="kamar_id" name="id">
                    <div class="mb-3">
                        <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
                        <input type="text" class="form-control" id="jenis_kamar" name="jenis_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Buat Pesanan -->
<div class="modal fade" id="formPesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pesananForm" method="POST" enctype="multipart/form-data" action="<?= BASEURL; ?>/penitipan/addPesanan">
                    <input type="hidden" id="individuas_id" name="individuas_id" value="<?= $_SESSION['user']['id']; ?>">
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kamar" class="form-label">Jenis Kamar</label>
                        <select class="form-select" id="jenis_kamar" name="jenis_kamar" required>
                            <option value="">Pilih Jenis Kamar</option>
                            <?php foreach ($data['jenis_kamar'] as $jenis_kamar) : ?>
                                <option value="<?= $jenis_kamar['id'] ?>"><?= $jenis_kamar['jenis_kamar'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
                        <select class="form-select" id="nomor_kamar" name="nomor_kamar" required>
                            <option value="">Pilih Nomor Kamar</option>
                            <?php foreach ($data['no_kamar'] as $no_kamar) : ?>
                                <option value="<?= $no_kamar['id'] ?>"><?= $no_kamar['no_kamar'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kucing" class="form-label">Nama Kucing</label>
                        <input type="text" class="form-control" id="nama_kucing" name="nama_kucing" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
        feather.replace();
    </script>

<script src="https://unpkg.com/feather-icons"></script>

