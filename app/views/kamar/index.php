<div class="content">
        <!-- Content area -->
        <h2>JENIS KAMAR PENITIPAN <br> ELLIOT PETSHOP</h2>
        <div class="garis"></div>
        
        <?php if ($data['roles_id'] == 3) : ?>
            <!-- Button trigger modal Buat Pesanan -->
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
                        <!-- Button trigger modal Tambah Kamar -->
                        <button type="button" class="btn btn-primary" style="float: right; background-color: #FF4167;" data-bs-toggle="modal" data-bs-target="#formKamar">
                            Tambah Kamar
                        </button>
                        </th>
                        <?php endif; ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['kamar'] as $index=>$kamar) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $kamar['jenis_kamar']?></td>
                        <td><?= $kamar['harga']?></td>
                        <td><?= $kamar['total']?>/10</td>
                        <td><?= $kamar['deskripsi']?></td>
                        <?php if ($data['roles_id'] == 2) : ?>
                        <td class="actions-button">
                            <div><a href="Staff-EditFormKamar.html" >Edit</a></div>
                            </td>
                            <?php endif; ?>
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

<!-- Modal Tambah Jenis Kamar-->
<div class="modal fade" id="formKamar" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="kamarForm" method="POST" enctype="multipart/form-data" action="<?= BASEURL; ?>/kamar/addKamar">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
function loadNoKamar(jenis_kamar_id) {
    const nomorKamarSelect = document.getElementById('nomor_kamar');
    nomorKamarSelect.innerHTML = '<option value="">Loading...</option>';

    fetch(`<?= BASEURL; ?>/kamar/getNoKamar/${jenis_kamar_id}`)
        .then(response => response.json())
        .then(data => {
            let options = '<option value="">Pilih Nomor Kamar</option>';
            data.forEach(item => {
                options += `<option value="${item.no_kamar}">${item.no_kamar}</option>`;
            });
            nomorKamarSelect.innerHTML = options;
        });
}
</script>
<!-- <div>
    <h1>Daftar Kamar</h1>
    <table border="1px">
        <thead>
            <tr>
                <td>No.</td>
                <td>Jenis_Kamar</td>
                <td>Aksi</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['kamar'] as $kamar) : ?>
                <tr>
                    <td><?= $kamar['id'] ?></td>
                    <td><?= $kamar['jenis_kamar'] ?></td>
                    <td><button><a href="<?= BASEURL; ?>/kamar/detail/<?= $kamar['id'] ?>">Detail</a></button></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $kamar['id'] ?>" data-bs-id="<?= $kamar['id'] ?>">Edit</button></td>
                </tr>
                <div class="modal fade" id="editModal<?= $kamar['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Kamar</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="id" class="col-form-label">ID:</label>
                                        <input type="text" class="form-control" id="id" value="<?= $kamar['id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis-kamar" class="col-form-label">Message:</label>
                                        <input class="form-control" id="jenis-kamar" value="<?= $kamar['jenis_kamar'] ?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="col-form-label">Harga:</label>
                                        <input class="form-control" id="harga" value="<?= $kamar['harga']?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                                        <textarea class="form-control" id="deskripsi"><?= $kamar['deskripsi']?></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div> -->


<!-- <script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('bs-id'); // Corrected the data attribute
        var modal = $(this);
        modal.find('.modal-title').text('Edit data ' + id); // Updated the modal title with the ID
        modal.find('.modal-body input#id').val(id); // Pass the ID to the input field
    });
</script> -->
