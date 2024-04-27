<?php

namespace controladores;

use PDO;
use PDOException;

class login {
    public function obtenerUsuarios() {
        try {
            $pdo = Configuracion::getPdo(); // Asumiendo que Configuracion es una clase que proporciona una instancia de PDO
            $sql_usuarios = "SELECT us.id_usuario, us.nombres, us.apellido, us.email, rol.rol FROM tb_usuarios as us inner join tb_roles as rol on us.id_rol = rol.id_rol";
            $query_usuarios = $pdo->prepare($sql_usuarios);
            $query_usuarios->execute();
            return $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar el error adecuadamente
            return array(); // Devolver un array vacío en caso de error
        }
    }
}