<<<<<<< HEAD
<main>
    <h1>Home</h1>
    <h1>Selamat datang <?= $data['user']['nama'] ?></h1>
    <a href="<?= BASEURL . '/login' ?>">Login</a>
    <a href="<?= BASEURL . '/login/logout' ?>">Logout</a>
</main>
=======
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash();?>
    </div>
</div>
<h1>Ini home. Halo <?= $data['nama']; ?> </h1>
<a href="<?= BASEURL; ?>/auth/logout">Logout</a>
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c
