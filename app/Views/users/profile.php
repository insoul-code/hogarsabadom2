<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark fondo-white shadownav p-0">
            <div class="container">
                <a class="navbar-brand nunito color-principal" href="#">
                    <img src="<?= base_url('public/img/pawshome-logo.png')?>" alt="Logo PawHome">
                    <span class="color-principal bold">PawHome</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="<?= base_url('public/img/menu.svg')?>" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-center-desktop">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= site_url('/')?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('/productos/listado')?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('/animales/listado')?>">Animales</a>
                        </li>
                        <div class="only-mobile">
                            <?php if(!session('loggedUser')):?>
                                <a href="<?= site_url('auth/register')?>" class="btnbase btnlink m-3">Registro</a>
                                <a href="<?= site_url('auth')?>" class="btnbase btnprimary">Iniciar sesión</a>
                            <?php endif ?>
                            <?php if(session('loggedUser')):?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        <p class="elipsis-text" title="<?= session('nameLogged') ?>"><?= session('nameLogged') ?></p>
                                        <img src="<?= base_url('public/img/user.png') ?>" alt="">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if(session('rolLogged') == 'admin'):?>
                                            <li><a class="dropdown-item" href="<?= site_url('/productos') ?>">Registrar productos</a></li>
                                            <li><a class="dropdown-item" href="<?= site_url('/animales') ?>">Registrar animales</a></li>
                                            <li><a class="dropdown-item" href="<?= site_url('users/list') ?>">Lista de usuarios</a></li>
                                        <?php endif ?>
                                        <li><a class="dropdown-item" href="<?= site_url('users/profile') ?>">Perfil</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Salir</a></li>
                                    </ul>
                                </li>
                            <?php endif ?>
                        </div>
                    </ul>
                </div>
                <div class="only-desktop">
					<?php if(!session('loggedUser')):?>
						<a href="<?= site_url('auth/register')?>" class="btnbase btnlink m-3">Registro</a>
						<a href="<?= site_url('auth')?>" class="btnbase btnprimary">Iniciar sesión</a>
					<?php endif ?>
					<?php if(session('loggedUser')):?>
					<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
							<p class="elipsis-text" title="<?= session('nameLogged') ?>"><?= session('nameLogged') ?></p>
                            <img src="<?= base_url('public/img/user.png') ?>" alt="">
						</a>
						<ul class="dropdown-menu">
							<?php if(session('rolLogged') == 'admin'):?>
								<li><a class="dropdown-item" href="<?= site_url('/productos') ?>">Registrar productos</a></li>
								<li><a class="dropdown-item" href="<?= site_url('/animales') ?>">Registrar animales</a></li>
								<li><a class="dropdown-item" href="<?= site_url('users/list') ?>">Lista de usuarios</a></li>
							<?php endif ?>
							<li><a class="dropdown-item" href="<?= site_url('users/profile') ?>">Perfil</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Salir</a></li>
						</ul>
					</li>
					<?php endif ?>
				</div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h2 class="my-4">Mi perfil</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card-profile">
                    <div class="me-3">
                        <img src="<?= base_url('public/img/user.png') ?>" alt="">
                    </div>
                    <div>
                        <h4><?= ucfirst($userInfo['name']); ?></h4>
                        <span><?= $userInfo['email']; ?></span>
                    </div>
                    <div class="items">
                        <div class="pets me-4">
                            <h5>Mis mascotas</h5>
                            <img src="<?= base_url('public/img/animal1.jpg') ?>" alt="">
                            <img src="<?= base_url('public/img/animal2.jpg') ?>" alt="">
                            <img src="<?= base_url('public/img/animal3.jpg') ?>" alt="">
                        </div>
                        <div class="products">
                            <h5>Mis productos favoritos</h5>
                            <img src="<?= base_url('public/img/cuidogato1.jpg') ?>" alt="">
                            <img src="<?= base_url('public/img/cuidocaballo3.jpg') ?>" alt="">
                            <img src="<?= base_url('public/img/cuidogato1.jpg') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>