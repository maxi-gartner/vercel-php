<?php


define('SERVIDOR', $_ENV['SERVIDOR']);
define('USUARIO', $_ENV['USUARIO']);
define('PASSWORD', $_ENV['PASSWORD']);
define('BD', $_ENV['BD']);


$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    $pdo = new PDO(
        $servidor, 
        USUARIO, 
        PASSWORD, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

use controladores\configuracion;
use controladores\Login;

// Autoload
spl_autoload_register(function ($clase) {
    if(file_exists(str_replace('\\', '/', $clase) . '.php')){
        require_once str_replace('\\', '/', $clase) . '.php';
    }
});

$login = new Login();
$datos_usuarios = $login->obtenerUsuarios();

// Aquí puedes hacer lo que quieras con los datos de los usuarios
// Por ejemplo, imprimirlos
echo "<pre>";
print_r($datos_usuarios);
echo "</pre>";

?>

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