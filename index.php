<?php

use controladores\configuracion;

spl_autoload_register(function ($clase) {
    if(file_exists(str_replace('\\', '/', $clase) . '.php')){
        require_once str_replace('\\', '/', $clase) . '.php';
    }
});


$configuracion = new configuracion;
$configuracion->saludar();
?>