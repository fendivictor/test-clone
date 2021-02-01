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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/blockui/style.css">
        <title>Kementrian AHU <?= isset($title) ? ' | ' .$title : ''; ?></title>
    </head>
    <body class="bg-grey-soft">
        <div class="d-flex vh-100">
            <?php $this->load->view('partial/sidebar'); ?>
            <div class="content col overflow-hidden">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid justify-content-end">
                        <a href="#" class="btn btn-primary mt-0">
                            <div class="image-profile">
                            </div>
                            Hello <?= $this->session->userdata('profile_name'); ?>
                        </a>
                    </div>
                </nav>
                
                        