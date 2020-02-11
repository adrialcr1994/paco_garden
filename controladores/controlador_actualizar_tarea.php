<?php
/**
 * Controlador para actualizar la tarea
 */

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
        'descripcion' => requestValue('descripcion'),
        'persona_contacto' => requestValue('persona_contacto'),
        'telefono' => requestValue('telefonos'),
        'correo' => requestValue('correo'),
        'direccion' => requestValue('direccion'),
        'poblacion' => requestValue('poblacion'),
        'codigo_postal' => requestValue('codigo_postal'),
        'provincia' => requestValue('opciones'),
        'estado_tarea' => requestValue('estado'),
        'trabajador' => requestValue('trabajador'),
        'fecha_realizacion' => requestValue('fecha_realizacion'),
        'texto_explicativo' => requestValue('explicacion'),
        'texto_operarios' => requestValue('texto_operarios')
        ];

        $errores=filtrado($datos_tareas);

        if(empty($errores)){
            include_once '../controladores/controlador_menu.php';
            ?>
            <script>alert('Tarea Actualizada.');window.location.href='../controladores/controlador_tabla_tareas.php'</script>
            <?php
            return actualizarTarea($datos_tareas, $conexion);
            
        }else{
            
            $tarea=verTarea($conexion, $_GET['id']);
            include_once '../vistas/vista_formulario_actualizar.php';
        }

    } else{
        
        $tarea=verTarea($conexion, $_GET['id']);   
        include_once '../vistas/vista_formulario_actualizar.php';
    }

}else{
    ?>
    <script>alert('Acceso prohibido.');window.location.href='../controladores/controlador_tabla_tareas.php'</script>

    <?php
}
}else{
header("Location: ../index.php");
}

function requestValue($key, $default=''){ //key

    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
}

function filtrado($datos_tareas){

    $errores = [];

    if($datos_tareas['descripcion']==""){
        $errores[]='Campo de descripcion requerido';
    }

    if($datos_tareas['persona_contacto']==""){
        $errores[]='Campo de persona de contacto requerido';
    }

    if($datos_tareas['telefono']==""){
        $errores[]='Campo de telefono requerido';
    }
    
    if(!is_numeric($datos_tareas['telefono'])){
        $errores[]='El telefono solo puede ser un numero';
    }

    if($datos_tareas['correo']==""){
        $errores[]='Campo de correo es requerido';
    }

    if($datos_tareas['direccion']==""){
        $errores[]='Campo de direccion es requerido';
    }

    if($datos_tareas['poblacion']==""){
        $errores[]='Campo de poblacion es requerido';
    }

    if($datos_tareas['codigo_postal']==""){
        $errores[]='Campo de codigo postal es requerido';
    }

    if($datos_tareas['provincia']==""){
        $errores[]='Campo de provincia es requerido';
    }

    if($datos_tareas['estado_tarea']==""){
        $errores[]='Campo de estado es requerido';
    }

    if($datos_tareas['trabajador']==""){
        $errores[]='Campo de trabajador es requerido';
    }

    if($datos_tareas['fecha_realizacion']==""){
        $errores[]='Campo de fecha es requerido';
    }

    if($datos_tareas['texto_explicativo']==""){
        $errores[]='Campo de textoexplicativo es requerido';
    }

    if($datos_tareas['texto_operarios']==""){
        $errores[]='Campo de texto operario es requerido';
    }

    return $errores;
}