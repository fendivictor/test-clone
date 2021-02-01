<div class="form-profile p-4" style="text-align: left !important;">
    <h2>Profil</h2>
    <?php  
        if ($this->session->flashdata('message')) {
            echo '  <div class="alert alert-'.$this->session->flashdata('msg_type').'" role="alert">
                        ' . $this->session->flashdata('message') . '
                    </div>';
        }
    ?>
    <form action="<?= base_url() ?>profil/update?user_id=<?= $this->session->userdata('user_id'); ?>" method="post" autocomplete="off">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control rounded-pill" placeholder="Username" name="username" required value="<?= $this->session->userdata('username'); ?>">
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control rounded-pill" placeholder="Nama" name="profile_name" value="<?= $this->session->userdata('profile_name'); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control rounded-pill" placeholder="Email" name="email" value="<?= $this->session->userdata('email'); ?>">
        </div>
        <button class="btn btn-primary rounded-pill mt-5">Ubah</button>
    </form>
</div>