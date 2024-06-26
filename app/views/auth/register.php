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
                <label for="no_telp" class="no_telp">No telepon</label>
                <div class="form-input">
                <input type="text" id="no_telp" name="no_telp" required></div>
            </div>
            <!-- tolong di style -->
            <div class="kecamatan">
                <label for="kecamatan">Kecamatan</label>
                <div class="form-input">
                <select name="kecamatan_id" id="kecamatan" required>
                <option value="">Pilih Kecamatan</option>
                <?php foreach ($data['kecamatan'] as $kecamatan) : ?>
                    <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['kecamatan'] ?></option>
                <?php endforeach; ?>
                </select></div>
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

    <div class="gambar_homepage2">
    <img src="<?= BASEURL; ?>/img/Bghomepage.png" class="background_image">
    <img src="<?= BASEURL; ?>/img/logokucing.png" class="logokucing"></div>
