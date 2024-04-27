<?php
$RUTA = __DIR__ . "/../"; // Obtener la ruta absoluta del directorio padre
require_once($RUTA . 'vendor/autoload.php'); // Incluir el archivo usando la ruta absoluta

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable($RUTA); // Usar la misma ruta para cargar el archivo .env
$dotenv->load();


date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaHora = date('Y-m-d H:i:s');
?>
