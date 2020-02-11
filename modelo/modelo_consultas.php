<?php

include_once 'conexion.php';


$conexion = Conecta();

function select($conexion)
{

    $consulta = "SELECT cod,nombre FROM tbl_provincias";

    $resultado = mysqli_query($conexion, $consulta) or die("Error en la consulta");

    while ($columna = mysqli_fetch_array($resultado)) {

        echo "<option value=" . $columna['cod'] . ">" . utf8_encode($columna['nombre']) . "</option>";

    }
}

function anadirTarea($datos_tareas, $conexion)
{
    

    $consulta = "INSERT INTO tareas (descripcion, persona_de_contacto, telefonos, correo_electronico, direccion, poblacion, codigo_postal, provincia, estado_tarea, fecha_creacion, operacion_encargado, fecha_realizacion, anotaciones_anteriores, anotaciones_posteriores)
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'SYSDATE()', ?, ?, ?, ?)";


    $prepared = $conexion->prepare($consulta);

    if ($prepared === false) {
        echo '<script>console.log("Error prepared")</script>';
    }

    $prepared->bind_param(
        "ssisssiisssss", 
        $datos_tareas['descripcion'],
        $datos_tareas['persona_contacto'], 
        $datos_tareas['telefono'],
        $datos_tareas['correo'],
        $datos_tareas['direccion'],
        $datos_tareas['poblacion'],
        $datos_tareas['codigo_postal'],
        $datos_tareas['provincia'],
        $datos_tareas['estado_tarea'],
        $datos_tareas['trabajador'],
        $datos_tareas['fecha_realizacion'],
        $datos_tareas['texto_explicativo'],
        $datos_tareas['texto_operarios']
    );

    $prepared->execute() or die("error en la consulta");
    $prepared->close();


}

function actualizarTarea($datos_tareas, $conexion)
{
    $consulta = "UPDATE tareas SET "
       ." descripcion=?, "
       ." persona_de_contacto=?, "
       ." telefonos=?, "
       ." correo_electronico=?, "
       ." direccion=?, "
       ." poblacion=?, "
       ." codigo_postal=?, "
       ." provincia=?, "
       ." estado_tarea=?, "
       ." operacion_encargado=?, "
       ." fecha_realizacion=?, "
       ." anotaciones_anteriores=?, "
       ." anotaciones_posteriores=? "
       ." WHERE id = ?";

    $prepared = $conexion->prepare($consulta);
     /* Comprobamos si la preparación se finalizó con éxito o hubo error */
     if ($prepared === false) {
        echo '<script>console.log("Error prepared")</script>';
    }
    $prepared->bind_param(
        "ssisssiisssssi", 
        $datos_tareas['descripcion'],
        $datos_tareas['persona_contacto'], 
        $datos_tareas['telefono'],
        $datos_tareas['correo'],
        $datos_tareas['direccion'],
        $datos_tareas['poblacion'],
        $datos_tareas['codigo_postal'],
        $datos_tareas['provincia'],
        $datos_tareas['estado_tarea'],
        $datos_tareas['trabajador'],
        $datos_tareas['fecha_realizacion'],
        $datos_tareas['texto_explicativo'],
        $datos_tareas['texto_operarios'],
        $datos_tareas['id']
    );

    $prepared->execute() or die("error en la consulta");
    $prepared->close();
}

function eliminarTarea($datos_tareas, $conexion)
{

    $consulta = "DELETE FROM tareas " 
    . "WHERE id = ?";

    $prepared = $conexion->prepare($consulta);

    if ($prepared === false) {
        echo '<script>console.log("Error prepared")</script>';
    }

    $prepared->bind_param(
        "i", 
        $datos_tareas['id']
    );

    $prepared->execute() or die("error en la consulta");
    $prepared->close();

}

function verTareas($conexion,$iniciar,$articulos_por_pagina)
{

    $consulta  = "SELECT * FROM tareas LIMIT $iniciar, $articulos_por_pagina";
    $resultado = mysqli_query($conexion, $consulta) or die("Error en la consulta");

    if (!$resultado) {
        echo ("no se ejecuto la consulta");
        exit;
    } else {
        return $resultado;
    }
}

function verTarea($conexion, $id)
{

    $consulta  = "SELECT * FROM tareas WHERE id='$id'";
    
    $resultado = mysqli_query($conexion, $consulta) or die("Error en la consulta");

    $resultado =mysqli_fetch_array($resultado);

    if (!$resultado) {
        echo ("no se ejecuto la consulta");
        exit;
    } else {
        return $resultado;
    }
}

function realizarTarea($conexion, $id, $estado){

    $consulta  = "UPDATE tareas SET estado_tarea='$estado' WHERE id='$id'";
    
    mysqli_query($conexion, $consulta) or die("Error en la consulta");

}

function buscador($filtros, $conexion){

    $consulta= "SELECT * FROM tareas WHERE ";
    $consulta .= $filtros[0] . ' AND ' . $filtros[1] . ' AND ' . $filtros[2];

    $resultado = mysqli_query($conexion, $consulta) or die("Error en la consulta");

    while($valor=mysqli_fetch_array($resultado)){
        $array[]=$valor;
    }

    if (!$array) {
        echo ("no se ejecuto la consulta");
        exit;
    } else {
        return $array;
    }

}

function verUsuarios($conexion)
{

    $consulta  = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conexion, $consulta) or die("Error en la consulta");

    if (!$resultado) {
        echo ("no se ejecuto la consulta");
        exit;
    } else {
        return $resultado;
    }
}

function eliminarUsuario($datos_tareas, $conexion)
{

    $consulta = "DELETE FROM usuarios " 
    . "WHERE correo = ?";

    $prepared = $conexion->prepare($consulta);

    if ($prepared === false) {
        echo '<script>console.log("Error prepared")</script>';
    }

    $prepared->bind_param(
        "s", 
        $datos_tareas['id']
    );

    $prepared->execute() or die("error en la consulta");
    $prepared->close();

}

function verUsuario($conexion, $correo)
{

    $consulta  = "SELECT * FROM usuarios WHERE correo='$correo'";
    
    $resultado = mysqli_query($conexion, $consulta) or die("Error en la consulta");

    $resultado =mysqli_fetch_array($resultado);

    if (!$resultado) {
        echo ("no se ejecuto la consulta");
        exit;
    } else {
        return $resultado;
    }
}

function anadirUsuario($datos_tareas, $conexion){

    $consulta = "INSERT INTO usuarios (correo, contrasena)
    VALUES (?, ?)";

$prepared = $conexion->prepare($consulta);

if ($prepared === false) {
    echo '<script>console.log("Error prepared")</script>';
}

$prepared->bind_param(
    "ss", 
    $datos_tareas['correo'],
    $datos_tareas['contrasena']
);

$prepared->execute() or die("error en la consulta");
$prepared->close();

}

function actualizarUsuario($datos_tareas, $conexion)
{
    $consulta = "UPDATE usuarios SET "
       ." correo=?, "
       ." contrasena=? "
       ." WHERE id = ?";

    $prepared = $conexion->prepare($consulta);
     /* Comprobamos si la preparación se finalizó con éxito o hubo error */
     if ($prepared === false) {
        echo '<script>console.log("Error prepared")</script>';
    }
    $prepared->bind_param(
        "ssi", 
        $datos_tareas['correo'],
        $datos_tareas['contrasena'],
        $datos_tareas['id']
    );

    $prepared->execute() or die("error en la consulta");
    $prepared->close();
}
