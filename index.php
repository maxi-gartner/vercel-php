<?php

use controladores\configuracion;

spl_autoload_register(function ($clase) {
    if(file_exists(str_replace('\\', '/', $clase) . '.php')){
        require_once str_replace('\\', '/', $clase) . '.php';
    }
});

$sql_usuarios = "SELECT us.id_usuario, us.nombres, us.apellido, us.email, rol.rol FROM tb_usuarios as us inner join tb_roles as rol on us.id_rol = rol.id_rol";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <a href="<?= $URL ?>paginas/pagina1.php">Pagina 1</a>
    <a href="<?= $URL ?>paginas/pagina2.php">Pagina 2</a>
    <a href="<?= $URL ?>paginas/pagina3.php">Pagina 3</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos_usuarios as $dato_usuario): ?>
            <tr>
                <td><?= ++$contador ?></td>
                <td><?= ucfirst($dato_usuario['nombres']) ?></td>
                <td><?= ucfirst($dato_usuario['apellido']) ?></td>
                <td><?= $dato_usuario['email'] ?></td>
                <td><?= ucfirst($dato_usuario['rol']) ?></td>
                <td>
                    <a href="<?= $URL ?>paginas_usuarios/details_user.php?id=<?= $dato_usuario['id_usuario'] ?>">Ver</a>
                    <a href="<?= $URL ?>paginas_usuarios/update_user.php?id=<?= $dato_usuario['id_usuario'] ?>">Editar</a>
                    <form action="<?= $URL ?>app/controllers/usuarios/delete_user_controller.php" method="post" style="display: inline;">
                        <input type="hidden" name="id_usuario" value="<?= $dato_usuario['id_usuario'] ?>">
                        <input type="hidden" name="nombre_usuario" value="<?= $dato_usuario['nombres'] ?>">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>