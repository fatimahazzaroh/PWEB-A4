<!-- Navbar -->
    <nav class="navbar2">
        <a href="#" class="navbar-logo2">
            <img src="<?= BASEURL; ?>/img/logo.svg" alt="Logo" class="logo2">
            <span>Elliot</span>
        </a>
    </nav>
    <div class="login-container2">
        <h2 class="header-text2">Yuk, masuk untuk membuat penitipan!</h2>
        <form action="<?= BASEURL . '/auth/sessionLogin' ?>" method="post" class="form-container2">
            <div class="form-group2">
                <label for="email" class="email2">Email</label>
                <input type="email" id="email" name="email" class="email2" required>
            </div>
            <div class="form-group2">
                <label for="password" class="password2">Password</label>
                <input type="password" id="password" name="password" class="password2" required>
            </div>
            <div class="form-submit">
                <button type="submit" class="submit-btn">Masuk</button>
            </div>
        </form>
        <p class="sign-up-link">Belum punya akun? <a href="<?= BASEURL . '/auth/halregister' ?>">Sign Up</a></p>
    </div>

    <div class="gambar_homepage2">
    <img src="<?= BASEURL; ?>/img/Bghomepage.png" class="background_image">
    <img src="<?= BASEURL; ?>/img/logokucing.png" class="logokucing"></div>