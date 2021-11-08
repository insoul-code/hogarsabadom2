<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="<?= base_url('public/styles/estilos.css') ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Delius+Swash+Caps&display=swap" rel="stylesheet">
</head>
<body class="bg-auth">
    <div class="container">
        <div class="row justify-content-center align-items-center content-align">
        <div class="col-md-4">
                <a href="<?= site_url('/')?>">
                    <img src="<?= base_url('public/img/pawshome-logo2.png') ?>" class="mb-3" alt="Logo PawHome">
                </a>
                <h1>Registrate</h1>
                <p>Registrate para tener una experiencia diferenciadora.</p>
                <a  href="<?= site_url('/')?>" class="btnbase btnprimary-outline"><i class="fas fa-home  me-2"></i>Volver al home</a>
            </div>
            <div class="col-md-4">
                <div class="card-form p-3">
                    <form action="<?= base_url('auth/save');?>" method="POST" autocomplete="off">
                    <?= csrf_field();?>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('fail'); ?>
                        </div>
                    <?php endif ?>
                    <?php if(!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif ?>
                    <div class="form-group my-3">
                            <label for="">Nombre completo</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" value="<?= set_value('name'); ?>">
                            <small class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?> </small>
                        </div>
                        <div class="form-group my-3">
                            <label for="">Correo electrónico</label>
                            <input type="text" class="form-control" name="email" placeholder="Ingresa tu email" 
                            value="<?= set_value('email'); ?>">
                            <small class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?> </small>
                        </div>
                        <div class="form-group my-3">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" name="pass" placeholder="Ingresa tu contraseña" value="<?= set_value('pass'); ?>">
                            <small class="text-danger"><?= isset($validation) ? display_error($validation, 'pass') : '' ?> </small>
                        </div>
                        <div class="form-group my-3">
                            <label for="">Confirmar contraseña</label>
                            <input type="password" class="form-control" name="cpass" placeholder="Ingresa tu contraseña para confirmar" value="<?= set_value('cpass'); ?>">
                            <small class="text-danger"><?= isset($validation) ? display_error($validation, 'cpass') : '' ?> </small>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btnbase btnprimary w-100">Registrarme</button>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="<?= site_url('auth');?>" class="btnbase btnlink">Ya tengo una cuenta, Iniciar sesión ahora</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
