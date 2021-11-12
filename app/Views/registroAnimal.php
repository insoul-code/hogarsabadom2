<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de producto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                            <a class="nav-link" href="<?= site_url('/productos/listado')?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('/animales/listado')?>">Animales</a>
                        </li>
                        <div class="only-mobile">
                            <a href="#" class="btnbase btnlink m-3">Registro</a>
                            <a href="#" class="btnbase btnprimary">Iniciar sesión</a>
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
    <section class="mb-4">
        <div class="container">
        <div class="d-flex justify-content-between align-items-center">
                <h2 class="my-4">Registro de animales</h2>
                <a href="<?= site_url('/animales/listado')?>" class="btnbase btnprimary-outline"><i class="fas fa-list-ul me-2"></i>Ver lista de animales</a>
            </div>
            <div class="card-form">
            <div class="row align-items-center">
                <div class="col-md-6">
                <form action="<?= site_url('/animales/nuevo')?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del animal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Edad<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="edad" placeholder="Ingrese la edad del animal">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fotografía<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="foto" placeholder="Pegue la url de la foto del animal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Selecciona un tipo<span class="text-danger">*</span></label>
                        <select class="form-select" name="tipo">
                            <option selected>Seleccione el tipo de animal</option>
                            <option value="1">Perro</option>
                            <option value="2">Gato</option>
                            <option value="3">Ave</option>
                            <option value="4">Caballo</option>
                            <option value="5">Reptil</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripción<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="descripcion" rows="3"></textarea>
                </div>
                <button class="btnbase btnprimary w-100">Registrar animal</button>
                </div>
                </form>
                <div class="col-md-6">
                    <img class="w-100" src="<?= base_url('public/img/animals.svg')?>" alt="">
                </div>
        </div>
        </div>
        </div>
    </section>
    <section>
        <?php 
            if(session('mensaje')):
        ?>
            <div class="modal fade" id="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header fondoPrincipal text-white">
                        <h5 class="modal-title">Casa hogar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6><?= session('mensaje')?></h6>
                    </div>
                    </div>
                </div>
            </div>
        <?php unset ($_SESSION['mensaje']); ?>
        <?php endif ?>
    </section>
    <footer class="p-5 pb-2">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-3">
					<h5 class="fw-bold">Síguenos en</h5>
					<div class="social-media">
						<i class="fab fa-facebook fa-3x"></i>
						<i class="fab fa-instagram fa-3x"></i>
						<i class="fab fa-youtube fa-3x"></i>
					</div>
				</div>
				<div class="col-12 col-md-4 workdays">
					<h5 class="fw-bold">Horario de atención</h5>
					<ul>
						<li>Lunes a viernes 7:00 am - 3:00 pm</li>
						<li>Sábado: 7:00 am - 2:30 pm</li>
						<li>Domingos y festivos 8:00 am - 3:00 pm</li>
					</ul>
				</div>
				<div class="col-12 col-md-5">
					<h5 class="fw-bold">Donar para salvar vidas</h5>
					<div class="mb-3 d-flex">
						<input type="text" class="form-control" name="donar" placeholder="Ingresa el valor de la donación">
						<button class="btnbase btnprimary">
							<i class="fas fa-arrow-right"></i>
						</button>
					</div>
					<div class="payment-method">
						<i class="fab fa-cc-visa"></i>
						<i class="fab fa-cc-paypal"></i>
						<i class="fab fa-cc-amazon-pay"></i>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<hr>
					<p class="mt-4">© 2021  -  NIT: 890905211-1  -  Código DANE: 05001  -  Código Postal: 050015  -  Belén Altavista Calle 8A # 112-82 </p>
				</div>
			</div>
		</div>
	</footer>

    <script type="module" src="<?= base_url('public/js/openmodal.js')?>"></script>
    <script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>