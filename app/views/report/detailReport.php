<div class="content">
        <div class="Kembali">
            <button>Back</button>
        </div>
        <!-- Content area -->
        <h2>REPORT KONDISI KUCING <br> ELLIOT PETSHOP</h2>

        <!-- <div class="action"><button class="Add" onclick="window.location.href='Staff-FormReport.html'"> + New </button></div> -->
        <!-- Button trigger modal Tambah Report -->
        <button type="button" class="btn btn-primary" style="float: right; background-color: #FF4167;" data-bs-toggle="modal" data-bs-target="#formLaporan">
            Tambah Laporan
        </button>

        <div class="garis"></div>
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
                    <?php foreach ($data['report'] as $index => $report) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $report['tanggal'] ?></td>
                        <td><?= $report['deskripsi'] ?></td>
                        <td><img src="<?= BASEURL . $report['gambar']; ?>"></td>
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
    <div class="modal fade" id="formLaporan" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="reportForm" method="POST" enctype="multipart/form-data" action="<?= BASEURL; ?>/report/addReport">
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*" required>
                    </div>
                    <input type="hidden" id="penitipan_id" name="penitipan_id" value="<?= $data['penitipan_id']; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
