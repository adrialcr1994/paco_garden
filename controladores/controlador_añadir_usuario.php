<?php

include_once '../modelo/modelo_consultas.php';
include_once '../modelo/conexion.php';
include_once '../vistas/vista_menu.php';

session_start();

if (isset($_SESSION['usuarioactual'])){

    if($_SESSION['usuarioactual']=="admin"){

$conexion=Conecta();



    if($_POST){

          $datos_tareas = [
        'correo' => requestValue('correo'),
        'contrasena' => requestValue('contrasena')
        ];

        $errores=filtrado($datos_tareas);

        if(empty($errores)){
            include_once '../controladores/controlador_menu.php';
            ?>
            <script>alert('Usuario Añadido.');window.location.href='../controladores/controlador_tabla_usuarios.php'</script>
            <?php
            return anadirUsuario($datos_tareas, $conexion);
        }else{
            include_once '../vistas/vista_formulario_añadir_usuarios.php';
        }

    } else{
        include_once '../vistas/vista_formulario_añadir_usuarios.php';
    }
    

}else{
    ?>
    <script>alert('Acceso prohibido.');window.location.href='../controladores/controlador_tabla_tareas.php'</script>

    <?php
}
}else{
header("Location: ../index.php");
}

function requestValue($key, $default=''){

    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
}

function filtrado($datos_tareas){

    $errores = [];

    if($datos_tareas['correo']==""){
        $errores[]='Campo de correo requerido';
    }

    if($datos_tareas['contrasena']==""){
        $errores[]='Campo de contraseña requerido';
    }

    return $errores;
}