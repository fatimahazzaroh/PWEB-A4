<section>
<!-- Navbar side -->
    <nav class="navbar">
        <div class="navbar-top">
            <a href="#" class="navbar-logo">
                <img src="<?= BASEURL; ?>/img/logo.svg" alt="Logo" class="logo">
                <span class="brand-name">Elliot</span>
            </a>
            <ul class="navbar-menu">
                <li><a href="<?= BASEURL; ?> /kamar" class="navbar-item"><i data-feather="home"></i><span>Kamar</span></a></li>
                <li><a href="<?= BASEURL; ?> /penitipan" class="navbar-item"><i data-feather="book-open"></i><span>Booking</span></a></li>
                <li><a href="<?= BASEURL; ?> /report" class="navbar-item"><i data-feather="archive"></i><span>Report</span></a></li>
                <li><a href="<?= BASEURL; ?> /riwayat" class="navbar-item"><i data-feather="bookmark"></i><span>Riwayat</span></a></li>
            </ul>
        </div>
        <div class="navbar-bottom">
        
            <a href="#" class="bottom-item">
                <i data-feather="user"></i>
                <?php if ($data['roles_id'] == 1) : ?>
                <span>Owner</span>
                <?php endif; ?>
                <?php if ($data['roles_id'] == 2) : ?>
                <span>Admin</span>
                <?php endif; ?>
                <?php if ($data['roles_id'] == 3) : ?>
                <span>Customer</span>
                <?php endif; ?>
            </a>
            <a href="<?= BASEURL; ?>/auth/logout" class="bottom-item">
                <button class="logout-button">Log Out</button>
            </a>
        </div>
    </nav>

    <script>
        feather.replace();
    </script>

<script src="https://unpkg.com/feather-icons"></script>
