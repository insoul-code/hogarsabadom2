<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animalandia</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>

<body class="fondo">
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fondo-white shadownav p-0">
			<div class="container">
				<a class="navbar-brand nunito color-principal" href="#">
					<img src="<?= base_url('public/img/pawshome-logo.png') ?>" alt="Logo PawHome">
					<span class="color-principal bold">PawHome</span>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"><img src="<?= base_url('public/img/menu.svg') ?>" alt=""></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-center-desktop">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/productos/listado') ?>">Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('/animales/listado') ?>">Animales</a>
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
							<li><a class="dropdown-item" href="#">Perfil</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Salir</a></li>
						</ul>
					</li>
					<?php endif ?>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="container mt-5">
			<div class="row align-items-center">
				<div class="col-md-9">
					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?= base_url('public/img/banner4.jpg') ?>" class="d-block w-100" alt="co1">
							</div>
							<div class="carousel-item">
								<img src="<?= base_url('public/img/banner2.jpg') ?>" class="d-block w-100" alt="co2">
							</div>
							<div class="carousel-item">
								<img src="<?= base_url('public/img/banner3.jpg') ?>" class="d-block w-100" alt="co3">
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
				<div class="col-md-3">
					<img src="<?= base_url('public/img/banner-adopcion.jpg') ?>" class="d-block w-100" alt="co2">
				</div>
			</div>
		</div>
	</section>

	<main>
		<div class="container">
			<div class="row d-flex justify-content-center mt-5 mb-5">
				<div class="col-md-5">
					<h3 class="fw-bold">Somos <span class="color-principal">PawHome</span></h3>
					<p class="">
						Casa hogar Animalandia, atiende desde 1996 animales y fauna silvestre en estado de abandono, ofreciendo atención integral, además somos fabricantes de comida y accesorios para todo tipo de mascota
					</p>
				</div>
				<div class="col-md-7">
					<div class="d-flex justify-content-end">
						<div class="card-cont-animal dog zoom">
							<a href="<?= site_url('/animal/buscar/'.'1')?>">
								<img src="<?= base_url('public/img/dog.png') ?>" alt="icono1" class="img-fluid">
							</a>
							<p class="text-center">Perros</p>
						</div>
						<div class="card-cont-animal cat zoom">
							<a href="<?= site_url('/animal/buscar/'.'2')?>">
								<img src="<?= base_url('public/img/cat.png') ?>" alt="icono1" class="img-fluid">
							</a>
							<p class="text-center">Gatos</p>
						</div>
						<div class="card-cont-animal bird zoom">
							<a href="<?= site_url('/animal/buscar/'.'3')?>">
								<img src="<?= base_url('public/img/bird.png') ?>" alt="icono1" class="img-fluid">
							</a>
							<p class="text-center">Aves</p>
						</div>
						<div class="card-cont-animal horse zoom">
							<a href="<?= site_url('/animal/buscar/'.'4')?>">
								<img src="<?= base_url('public/img/horse.png') ?>" alt="icono1" class="img-fluid">
							</a>
							<p class="text-center">Caballos</p>
						</div>
						<div class="card-cont-animal reptil zoom">
							<a href="<?= site_url('/animal/buscar/'.'5')?>">
								<img src="<?= base_url('public/img/reptil.png') ?>" alt="icono1" class="img-fluid">
							</a>
							<p class="text-center">Reptiles</p>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="container-fluid">
			<a href="">
				<div class="row fondoAdopcion">
				</div>
			</a>
		</div>
		<div class="container mb-5">
			<div class="row mt-5">
				<div class="col-12 col-md-6">
					<img src="<?= base_url('public/img/adopcion4.jpg') ?>" alt="adopta" class="img-fluid w-100 rounded">
				</div>
				<div class="col-12 col-md-6 align-self-center">

					<h3 class="fw-bold">Hogar <span class="color-principal">PawHome</span></h3>
					<p class="">
						En toda Colombia, animales como perros, caballo, gatos, aves y reptiles viven en las calles. La mayoría de las ciudades no tienen hospitales para los animales sin dueño, lo que significa que los animales heridos o enfermos a menudo mueren por condiciones tratables. Pero en Medeliín, Bogotá y Calí, una llamada a nuestra línea de ayuda salva una vida.
					</p>
					<div class="call-us">
						<h6>Ayudemos a los que no tienen voz <span class="color-principal">+573204567845</span></h6>
						<a href="" class="btnbase btnprimary">¡Llamar ahora!</a>
					</div>

				</div>
			</div>
		</div>
	</main>

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
					<p class="mt-4">© 2021 - NIT: 890905211-1 - Código DANE: 05001 - Código Postal: 050015 - Belén Altavista Calle 8A # 112-82 </p>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>