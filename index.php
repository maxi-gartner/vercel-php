<?php
/* include('./controladores/configuracion.php'); */

/* $sql_usuarios = "SELECT us.id_usuario, us.nombres, us.apellido, us.email, rol.rol FROM tb_usuarios as us inner join tb_roles as rol on us.id_rol = rol.id_rol";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC); */
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

        </tbody>
    </table>
</body>
</html>