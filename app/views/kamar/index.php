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
                        <button type="button" class="btn btn-primary float-right" style="background-color: #FF4167;" data-bs-toggle="modal" data-bs-target="#formKamar">
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
                        <button type="button" class="btn btn-warning editKamarButton" data-id="<?= $kamar['id'] ?>" data-bs-toggle="modal" data-bs-target="#formKamar">
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

<!-- <script>
    $(document).ready(function() {
        $('.editKamarButton').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: '<?= BASEURL; ?>/kamar/getKamarById/' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#formKamarLabel').text('Edit Kamar');
                    $('#kamar_id').val(data.id);
                    $('#jenis_kamar').val(data.jenis_kamar);
                    $('#harga').val(data.harga);
                    $('#deskripsi').val(data.deskripsi);
                    $('#kamarForm').attr('action', '<?= BASEURL; ?>/kamar/updateKamar');
                }
            });
        });

        $('#formKamar').on('hidden.bs.modal', function () {
            $('#formKamarLabel').text('Tambah Kamar');
            $('#kamarForm').trigger('reset');
            $('#kamarForm').attr('action', '<?= BASEURL; ?>/kamar/addKamar');
        });
    });
</script> -->
