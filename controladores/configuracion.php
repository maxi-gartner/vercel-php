<?php

namespace controladores;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class configuracion {
    private static $pdo;

    public static function inicializar() {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $servidor = "mysql:dbname=" . $_ENV['BD'] . ";host=" . $_ENV['SERVIDOR'];

        try {
            self::$pdo = new PDO(
                $servidor, 
                $_ENV['USUARIO'], 
                $_ENV['PASSWORD'], 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
            // Aquí quizás deberías lanzar una excepción en lugar de simplemente mostrar el mensaje
        }

        date_default_timezone_set('America/Argentina/Buenos_Aires');
    }

    public static function getPdo() {
        if (!isset(self::$pdo)) {
            self::inicializar();
        }
        return self::$pdo;
    }

    public static function getFechaHora() {
        return date('Y-m-d H:i:s');
    }

    public static function getURL() {
        return "http://localhost/VentasPHPyMySql/";
    }
}
