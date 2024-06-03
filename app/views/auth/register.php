<<<<<<< HEAD
<!-- Navbar -->
<nav class="navbaratas">
        <a href="#" class="navbar-logo-atas">
            <img src="<?= BASEURL; ?>/img/logo.svg" alt="Logo" class="logo">
            <span>Elliot</span>
        </a>
        
    </nav>
    <div style="text-align: right;"><?= Flasher::flash(); ?></div>
    <!-- Navbar end -->

    <!-- tengah -->
    <div class="login-container">
        <h2 class="header-text">Yuk, daftar untuk mengakses Elliot!</h2>
        <div class="background">
        <form action="<?= BASEURL; ?>/auth/register" method="post" class="form-container">
            <div class="form-group">
                <label for="nama" class="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="no_telp" class="notel">No telepon</label>
                <input type="text" id="no_telp" name="no_telp" required>
            </div>
            <!-- tolong di style -->
            <div>
                <label for="kecamalan">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan" required>
                <option value="">Pilih Kecamatan</option>
                <?php foreach ($data['kecamatan'] as $kecamatan) : ?>
                    <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['kecamatan'] ?></option>
                <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat" class="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="email" class="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-submit">
                <button type="submit" class="submit-btn">Daftar</button>
            </div>
        </form>
        </div>
        <p class="sign-up-link">Sudah punya akun? <a href="<?= BASEURL; ?>/auth">Login</a></p>
    </div>

    <div class="gambarhomepage">
        <img src="<?= BASEURL; ?>/img/Bghomepage.png" class="gambar_homepage">
    </div>
=======
<div>

    <h1>Register</h1>
    <div><?= Flasher::flash(); ?>
    </div>
    
    <form action="<?= BASEURL; ?>/register/register" method="post" onsubmit="return validateForm()">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required>
        <label for="no_telp">No. Telp</label>
        <input type="number" name="no_telp" id="no_telp" required>
        <label for="kabupaten">Kabupaten</label>
        <select name="kabupaten_id" id="kabupaten" required>
            <option value="">Pilih Kabupaten</option>
            <?php foreach ($data['kabupaten'] as $kabupaten) : ?>
                <option value="<?= $kabupaten['id']; ?>"><?= $kabupaten['kabupaten']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan_id" id="kecamatan" required>
            <option value="">Pilih Kecamatan</option>
            <?php foreach ($data['kecamatan'] as $kecamatan) : ?>
                <option value="<?= $kecamatan['id']; ?>"><?= $kecamatan['kecamatan']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Register</button>
    </form>
</div>
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c
