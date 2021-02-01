<?php  
$fungsi = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>

<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo-sidebar d-flex">
            <img src="<?= base_url() ?>assets/images/logo-ahu.png" alt="logo ahu" width="70">
            <h4> Admin <br> Kemenkuham </h5>
        </div>
        <div class="nav flex-column nav-pills menu-list">
            <a href="<?= base_url('screensaver'); ?>" class="nav-link screensaver <?= (strtolower($fungsi) == 'screensaver' && strtolower($method) == 'index') ? 'active' : ''; ?>">
                <i class="fa fa-desktop"></i>
                Screensaver
            </a>
            <a href="<?= base_url('profil'); ?>" class="nav-link profil <?= (strtolower($fungsi) == 'profil' && strtolower($method) == 'index') ? 'active' : ''; ?>">
                <i class="fa fa-receipt"></i>
                Profil
            </a>
            <a href="<?= base_url('setting'); ?>" class="nav-link setting <?= (strtolower($fungsi) == 'setting' && strtolower($method) == 'index') ? 'active' : ''; ?>">
                <i class="fa fa-cog"></i>
                Setting
            </a>
            <a href="<?= base_url('logout'); ?>" class="btn-logout">
                <i class="fa fa-power-off"></i>
                Keluar
            </a>
        </div>
    </div>
</div>