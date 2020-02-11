<?php

include_once '../modelo/modelo_consultas.php';
include_once '../modelo/conexion.php';
include_once '../vistas/vista_menu.php';

$conexion=Conecta();

if($_POST){

    $datos_tareas = [
        'id' => requestValue('identificador'),
        'estado_tarea' => requestValue('estado_tarea')
    ];

    $errores=filtrado($datos_tareas);

    if(empty($errores)){
        include_once '../controladores/controlador_menu.php';
        ?>
            <script>alert('Tarea Actualizada.');window.location.href='../controladores/controlador_tabla_tareas.php'</script>
            <?php
        return realizarTarea($conexion, $datos_tareas['id'], $datos_tareas['estado_tarea']);

    }else{

        $tarea=verTarea($conexion, $_GET['id']);
        include_once '../vistas/vista_formulario_completar_tarea.php';
    }

} else{
    
    $tarea=verTarea($conexion, $_GET['id']);
   include_once '../vistas/vista_formulario_completar_tarea.php';
    
}


function requestValue($key, $default=''){

    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
}

function filtrado($datos_tareas){

    $errores = [];

    if($datos_tareas['estado_tarea']=="Progreso" && $datos_tareas['estado_tarea']=="Realizada" && $datos_tareas['estado_tarea']=="Cancelada"){
        $errores[]='Campo de estado es requerido';
    }

    return $errores;
}