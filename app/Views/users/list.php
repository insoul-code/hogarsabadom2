<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios</title>
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
                            <a class="nav-link" href="<?= site_url('/productos/listado')?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('/animales/listado')?>">Animales</a>
                        </li>
                        <div class="only-mobile">
                            <a href="<?= site_url('auth/register')?>" class="btnbase btnlink m-3">Registro</a>
							<a href="<?= site_url('auth')?>" class="btnbase btnprimary">Iniciar sesión</a>
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
        <?php if(session('rolLogged') == 'admin'):?>
            <h2 class="my-4">Listado de usuarios</h2>
        <?php endif ?>
        <?php if(session('mensaje')):?>
            <div class="alert alert-success">
                <h6><?= session('mensaje')?></h6>
            </div>
            <?php unset ($_SESSION['mensaje']); ?>
        <?php endif ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card-form">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user):?>
                                <tr>
                                    <th scope="row"><?= $user['id']; ?></th>
                                    <td><?= ucfirst($user['name']); ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['rol']; ?></td>
                                    <td>
                                        <button href="" class="btnbase btnprimary-outline me-2" data-bs-toggle="modal" data-bs-target="#confirmacion<?= $user['id']?>"><i class="far fa-trash-alt"></i></button>
                                        <button href="" class="btnbase btnprimary-outline" data-bs-toggle="modal" data-bs-target="#edicion<?= $user['id']?>"><i class="far fa-edit"></i></button>
                                    </td>
                                </tr>
                                <section>
                                    <div class="modal fade" id="confirmacion<?= $user['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header fondoPrincipal text-white">
                                                    <h5 class="modal-title">Eliminar usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro que desea eliminar el usuario?</p>
                                                <p><?= $user['id']?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
                                                <a href="<?= site_url('users/eliminar/'.$user['id'])?>" class="btn btn-danger">Sí, eliminar</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="modal fade" id="edicion<?= $user['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header fondoPrincipal text-white">
                                                    <h5 class="modal-title">Editando usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <form action="<?= site_url('/users/editar/'.$user["id"])?>" method="POST">
                                                            <div class="mb-3">
                                                                <label for="nombreuser" class="form-label">Nombre completo</label>
                                                                <input type="text" class="form-control" name="name" value="<?= $user['name']?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="emailuser" class="form-label">Email</label>
                                                                <input type="text" class="form-control" name="email" value="<?= $user['email']?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="roluser" class="form-label">Rol</label>
                                                                <input type="text" class="form-control" name="rol" value="<?= $user['rol']?>">
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btnbase btnprimary" type="submit">Actualizar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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