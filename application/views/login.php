<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,XMR=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />
        <title>Login Kementrian AHU</title>
    </head>
    <body>
        
        <div class="container overflow-hidden">
            <div class="row justify-content-center vh-100">
                <div class="col-lg-5 text-center align-self-center">
                    <img src="<?= base_url() ?>assets/images/logo-ahu.png" alt="logo ahu" width="80" class="d-inline-block">
                    <h3>Admin Kemenkuham</h3>

                    <?php  
                        if ($this->session->flashdata('message')) {
                            echo '  <div class="alert alert-danger" role="alert">
                                        ' . $this->session->flashdata('message') . '
                                    </div>';
                        }
                    ?>

                    <form action="<?= base_url(); ?>login/auth" method="POST">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-user-circle"></i>
                            </span>
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <button class="btn btn-primary rounded-pill">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>