<?php

include_once '../controladores/controlador_paginacion.php';
include_once '../modelo/modelo_consultas.php';
include_once '../modelo/conexion.php';
include_once '../vistas/vista_menu.php';
include_once '../vistas/vista_tabla_tareas.php';



$conexion = Conecta();

function verTareasControlador($conexion, $iniciar, $articulos_por_pagina){
    return verTareas($conexion, $iniciar, $articulos_por_pagina);
}
