<div class="content">
        <!-- Content area -->
        <h2>JENIS KAMAR PENITIPAN <br> ELLIOT PETSHOP</h2>
        <div class="garis"></div>
        <!-- Button trigger modal Tambah Kamar -->
        <button type="button" class="btn btn-primary" style="float: right; background-color: #FF4167;" data-bs-toggle="modal" data-bs-target="#formKamar">
            Tambah Kamar
        </button>
        
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Kamar</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                        <!-- <?php if ($data['roles_id'] == 2) : ?>
                            <th class="action"><button class="Add"><a href="Staff-FormKamar.html">+ New</button></th>
                        <?php endif; ?> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['kamar'] as $kamar) : ?>
                    <tr>
                        <td><?= $kamar['id'] ?></td>
                        <td><?= $kamar['jenis_kamar']?></td>
                        <td><?= $kamar['harga']?></td>
                        <td><?= $kamar['active_count']?>10</td>
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

<!-- Modal -->
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
