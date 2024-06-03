<div>
    <form action="<?= BASEURL; ?>/kamar/tambahBaru" method="post"> 
    <!-- menjalankan controller tambahBaru -->
        <label for="jenis_kamar">Jenis Kamar</label>
        <input type="text" name="jenis_kamar" id="jenis_kamar" required>
        <br>
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" required>
        <br>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
        <br>
        <button type="submit">Tambah Kamar</button>
    </form>
</div>
