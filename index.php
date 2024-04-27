<?php
INLCUDE('./controladores/configuracion.php');

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
    <title>Document</title>
</head>
<body>
    <h1>hello world</h1>
    <a href="./paginas/pagina1.php">Pagina 1</a>
    <a href="./paginas/pagina2.php">Pagina 2</a>
    <a href="./paginas/pagina3.php">Pagina 3</a>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><center>Nro</center></th>
                    <th><center>Nombre</center></th>
                    <th><center>Apellido</center></th>
                    <th><center>Email</center></th>
                    <th><center>Rol</center></th>
                    <th><center>Acciones</center></th>
                  </tr>
                  <tbody>
                    <?php 
                    $contador = 0;
                    foreach ($datos_usuarios as $dato_usuario) {
                        $id_user = $dato_usuario['id_usuario'];
                        $nro = $contador += 1;
                        $nombre = $dato_usuario['nombres'];
                        $apellido = $dato_usuario['apellido'];
                        $email = $dato_usuario['email'];
                        $rol = $dato_usuario['rol'];
                        ?>
                        <tr>
                          <td><center><?= $nro ?></center></td></td>
                          <td><?= ucfirst($nombre) ?></td>
                          <td><?= ucfirst($apellido) ?></td>
                          <td><?= $email ?></td>
                          <td><?= ucfirst($rol) ?></td>
                          <td>
                            <center>
                            <div class="btn-group">
                              <a href="<?php echo $URL ?>paginas_usuarios/details_user.php?id=<?= $id_user ?>" type="button" class="btn btn-info"><i class="fas fa-eye"></i> Ver</a>
                              <a href="<?php echo $URL ?>paginas_usuarios/update_user.php?id=<?= $id_user ?>" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Editar</a>
                              <form action="../app/controllers/usuarios/delete_user_controller.php" method="post" style="display: inline;">
                                  <input type="hidden" name="id_usuario" value="<?= $id_user ?>">
                                  <input type="hidden" name="nombre_usuario" value="<?= $nombre ?>">
                                  <button type="button" class="btn btn-danger deleteButton" value="<?= $nombre ?>" id="<?php echo $id_user ?>"><i class="fas fa-trash"></i> Borrar</button>
                              </form>
                            </div>
                            </center>
                          </td>
                        </tr>
                        <?php
                    }
                    ?>
                  </tbody>
                </table>
</body>
</html>