<?php

include_once '../modelo/modelo_consultas.php';
include_once '../modelo/conexion.php';
include_once '../vistas/vista_menu.php';
include_once '../vistas/vista_tabla_usuarios.php';



$conexion = Conecta();

function verUsuariosControlador($conexion){
    return verUsuarios($conexion);
}