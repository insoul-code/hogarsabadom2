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
    <div class="container">
        <?php if(session('rolLogged') == 'admin'):?>
            <h1>Listado de usuarios</h1>
        <?php endif ?>
        <?php if(session('mensaje')):?>
            <div class="alert alert-success">
                <h6><?= session('mensaje')?></h6>
            </div>
            <?php unset ($_SESSION['mensaje']); ?>
        <?php endif ?>
        <div class="row">
            <div class="col-md-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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
                                <td><a href="<?= site_url('auth/logout'); ?>">Salir</a></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<script src="https://kit.fontawesome.com/7b642ec699.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>