<div class="container mt-3">
    <h1>Login</h1>
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash();?>
        </div>
    </div>
    <form action="<?= BASEURL; ?>/Log/login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">login</button>
    </form>
</div>