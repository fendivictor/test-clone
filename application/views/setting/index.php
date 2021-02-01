<div class="form-profile p-4" style="text-align: left !important;">
    <h2>Password</h2>
    <?php  
        if ($this->session->flashdata('message')) {
            echo '  <div class="alert alert-'.$this->session->flashdata('msg_type').'" role="alert">
                        ' . $this->session->flashdata('message') . '
                    </div>';
        }
    ?>
    <form action="<?= base_url() ?>setting/change_password?user_id=<?= $this->session->userdata('user_id'); ?>" method="POST"> 
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control rounded-pill" placeholder="Password" required name="password">
        </div>
        <div class="form-group">
            <label for="re-type-password">Re-type Password</label>
            <input type="password" class="form-control rounded-pill" placeholder="Re-type Password" required name="re_password">
        </div>
        <button class="btn btn-primary rounded-pill mt-5">Ubah</button>
    </form>
</div>