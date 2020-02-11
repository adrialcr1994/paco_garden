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
        'id' => requestValue('identificador'),
        'correo' => requestValue('correo'),
        'contrasena' => requestValue('contrasena')
    ];

    $errores=filtrado($datos_tareas);

    if(empty($errores)){
        include_once '../controladores/controlador_menu.php';
        ?>
            <script>alert('Usuario Actualizado.');window.location.href='../controladores/controlador_tabla_usuarios.php'</script>
            <?php
        return actualizarUsuario($datos_tareas, $conexion);
    }else{
        
        $tarea=verUsuario($conexion, $_GET['id']);
        include_once '../vistas/vista_formulario_actualizar_usuarios.php';
    }

} else{
    $tarea=verUsuario($conexion, $_GET['id']);
    include_once '../vistas/vista_formulario_actualizar_usuarios.php';
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
        $errores[]='Campo correo requerido';
    }
    if($datos_tareas['contrasena']==""){
        $errores[]='Campo contraseña requerido';
    }

    return $errores;
}