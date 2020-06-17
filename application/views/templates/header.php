<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- import font awesome -->
    <script src="https://kit.fontawesome.com/9957e7a5ea.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- load custom css file -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>" >

    <title>Solfège ludique | <?php echo $pageTitle ?></title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo base_url() ?>">Solfège ludique</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if($this->uri->segment(1)=="jeux"){echo "active";}?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jeux
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('jeux/show-page/1') ?>">L'ordre des dièses</a>
                        <a class="dropdown-item" href="<?php echo base_url('jeux/show-page/2') ?>">L'ordre des bémols</a>
                        <a class="dropdown-item" href="<?php echo base_url('jeux/show-page/3') ?>">Trouver la tonalité majeure (dièses)</a>
                        <a class="dropdown-item" href="<?php echo base_url('jeux/show-page/4') ?>">Trouver la tonalité majeure (bémols)</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container mt-4">
            <?php if(!is_null($this->session->flashdata('admin_denied'))){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('admin_denied'); ?>
                </div>
            <?php } ?>
            
