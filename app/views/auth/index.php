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
        <!-- <div class="forgot-password">
            <a href="#" class="forgot-password-link">Lupa password?</a>
        </div> -->
        <p class="sign-up-link">Belum punya akun? <a href="<?= BASEURL . '/auth/halregister' ?>">Sign Up</a></p>
    </div>

    <div class="gambarhomepage2">
        <img src="<?= BASEURL; ?>/img/Bghomepage.png" class="gambar_homepage2">
    </div>

<!-- <main>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="<?= BASEURL . 'login' ?>" role="tab"
                aria-controls="nav-home" aria-selected="true">Login</a>
        </div>
    </nav>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="<?= BASEURL . 'login/sessionLogin' ?>">
                            <div class="gap-2 row">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value=""
                                            required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-0 form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> -->