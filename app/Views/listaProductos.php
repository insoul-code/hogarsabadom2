<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
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
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="my-4">Listado de productos</h2>
            <?php if(session('rolLogged') == 'admin'):?>
                <a href="<?= site_url('/productos')?>" class="btnbase btnprimary-outline"><i class="fas fa-plus-circle me-2"></i>Registrar producto</a>
            <?php endif ?>
        </div>
        <?php 
            if(session('mensajeCorrect')):
        ?>
            <div class="alert alert-success">
                <h6><?= session('mensajeCorrect')?></h6>
            </div>
        <?php unset ($_SESSION['mensajeCorrect']); ?>
        <?php endif ?>
        <?php 
            if(session('mensajeIncorrect')):
        ?>
            <div class="alert alert-danger">
                <h6><?= session('mensajeIncorrect')?></h6>
            </div>
        <?php unset ($_SESSION['mensajeIncorrect']); ?>
        <?php endif ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="<?= site_url('/producto/filtro')?>" method="POST">
                    <select class="form-select w-50 mb-1" name="tipo">
                                    <option selected>Seleccione el tipo de animal</option>
                                    <option value="1">Perro</option>
                                    <option value="2">Gato</option>
                                    <option value="3">Ave</option>
                                    <option value="4">Caballo</option>
                                    <option value="5">Reptil</option>
                                </select>
                    <div class="col-md-6">
                        <button class="btnbase btnprimary w-10">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-5 g-4 mb-5">
            <?php foreach($productos as $producto):?>
                <div class="col card-product">
                    <div class="card h-100">
                        <img src="<?= $producto['foto']?>" class="card-img-top h-100" alt="foto">
                        <div class="card-body">
                            <h5><?= $producto['nombre']?></h5>
                            <p>$<?php echo number_format($producto['precio'],0,",",".");?>
                            </p>
                            <div class="d-flex">
                                <img src="
                                <?php
                                    switch ($producto['tipo']) {
                                        case 1:
                                            echo base_url('public/img/dog.png');
                                            break;
                                        case 2:
                                            echo base_url('public/img/cat.png');
                                            break;
                                        case 3:
                                            echo base_url('public/img/bird.png');
                                            break;
                                        case 4:
                                            echo base_url('public/img/horse.png');
                                            break;
                                        case 5:
                                            echo base_url('public/img/reptil.png');
                                            break;
                                    }
                                ?>
                                " class="image-type" alt="Imagen tipo de animal">
                                <span>
                                    <?php
                                     if ($producto['tipo'] == 1) {
                                        echo "Perro";
                                    } elseif ($producto['tipo'] == 2) {
                                        echo "Gato";
                                    } elseif ($producto['tipo'] == 3) {
                                        echo "Ave";
                                    } elseif ($producto['tipo'] == 4) {
                                        echo "Caballo";
                                    } elseif ($producto['tipo'] == 5) {
                                        echo "Reptil";
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <?php if(session('rolLogged') == 'admin'):?>
                            <div class="card-footer">
                                <button href="" class="btnbase btnprimary-outline" data-bs-toggle="modal" data-bs-target="#confirmacion<?= $producto['id']?>"><i class="far fa-trash-alt"></i></button>
                                <button href="" class="btnbase btnprimary-outline" data-bs-toggle="modal" data-bs-target="#edicion<?= $producto['id']?>"><i class="far fa-edit"></i></button>
                            </div>
                        <?php endif ?>
                    </div>
                    <section>
                        <div class="modal fade" id="confirmacion<?= $producto['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header fondoPrincipal text-white">
                                        <h5 class="modal-title">Eliminar producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                    <p>¿Está seguro que desea eliminar el producto?</p>
                                    <p><?= $producto['id']?></p>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
                                    <a href="<?= site_url('productos/eliminar/'.$producto['id'])?>" class="btn btn-danger">Sí, eliminar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="modal fade" id="edicion<?= $producto['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header fondoPrincipal text-white">
                                        <h5 class="modal-title">Editando producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?= $producto['foto']?>" alt="Foto producto" class="img-responsive img-fluid w-100">
                                        </div>
                                        <div class="col-9">
                                            <form action="<?= site_url('/productos/editar/'.$producto["id"])?>" method="POST">
                                            <div class="mb-3">
                                                <label for="nombreproducto" class="form-label">Nombre del producto</label>
                                                <input type="text" class="form-control" name="product" value="<?= $producto['nombre']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombreproducto" class="form-label">Precio</label>
                                                <input type="text" class="form-control" name="price" value="<?= $producto['precio']?>">
                                            </div>
                                            <div class="mb-4">
                                            <label for="" class="form-label">Selecciona un tipo<span class="text-danger">*</span></label>
                                            <select class="form-select" name="tipo">
                                                <option selected>¿Para cuál animal es te producto?</option>
                                                <option value="1">Perro</option>
                                                <option value="2">Gato</option>
                                                <option value="3">Ave</option>
                                                <option value="4">Caballo</option>
                                                <option value="5">Reptil</option>
                                            </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombreproducto" class="form-label">Descripción</label>
                                                <textarea name="descripcion" id="" cols="30" rows="5" class="form-control"><?= $producto['descripcion']?></textarea>
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
                </div>
            <?php endforeach?>
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