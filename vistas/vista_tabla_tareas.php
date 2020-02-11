<?php

if(!$_GET){
    header('Location:controlador_tabla_tareas.php?pagina=1');
    exit;
}

include_once '../controladores/controlador_tabla_tareas.php';
include_once '../controladores/controlador_paginacion.php';

session_start();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>Document</title>

    
</head>
<body style="background-color: #2ECC71; text-align: center;" class="container-fluid" >
<h1 style="text-align: center;">Tabla de tareas</h1>
<h4>Usuario Actual: <?=$_SESSION['usuarioactual'] ?><h4>

<table id="example" class="table table-bordered table-condensed table-responsive-sm" style="background-color: white; zoom:80%; text-align: center;">
    <thead style="text-align: center;">
        <tr>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Persona Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Poblacion</th>
            <th>Codigo Postal</th>
            <th>Provincia</th>
            <th>Estado Tarea</th>
            <th>Fecha Creacion</th>
            <th>Encargado</th>
            <th>Fecha de Realizacion</th>
            <th>Explicacion Tarea</th>
            <th>Anotaciones</th>
            <th>Actualizar Tarea</th>
            <th>Eliminar Tarea</th>
            <th>Completar Tarea</th>
        </tr>
    </thead>
        <tbody>
        <?php


$resultado = verTareasControlador($conexion, $iniciar, $articulos_por_pagina);

while ($fila=mysqli_fetch_array($resultado)){ 

    ?>

<tr>
    <td><?= $fila['id'] ?></td>
    <td><?= $fila['descripcion'] ?></td>
    <td><?= $fila['persona_de_contacto'] ?></td>
    <td><?= $fila['telefonos'] ?></td>
    <td><?= $fila['correo_electronico'] ?></td>
    <td><?= $fila['direccion'] ?></td>
    <td><?= $fila['poblacion'] ?></td>
    <td><?= $fila['codigo_postal'] ?></td>
    <td><?= $fila['provincia'] ?></td>
    <td><?= $fila['estado_tarea'] ?></td>
    <td><?= $fila['fecha_creacion'] ?></td>
    <td><?= $fila['operacion_encargado'] ?></td>
    <td><?= $fila['fecha_realizacion'] ?></td>
    <td><?= $fila['anotaciones_anteriores'] ?></td>
    <td><?= $fila['anotaciones_posteriores'] ?></td>
    <td style="text-align: center;">
            <a  href='controlador_actualizar_tarea.php?id=<?=$fila['id'] ?>'>
                <img src="boton_editar.jpg" height="50" width="50">
            </a>
    </td>
    <td style="text-align: center;">
            <a  href='controlador_borrar_tarea.php?id=<?=$fila['id'] ?>'>
                <img src="boton_eliminar.jpg" height="50" width="50">
            </a>
    </td>
    <td style="text-align: center;">
            <a  href='controlador_completar_tarea.php?id=<?=$fila['id'] ?>'>
                <img src="boton_completar.jpg" height="50" width="50">
            </a>
    </td>

</tr>

<?php } ?>
        </tbody>
    </table>

    <nav arial-label="pagina de navegacion ejemplo">

        <ul class="pagination">

            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'hide' : '' ?>">
            <a class="page-link" href="controlador_tabla_tareas.php?pagina=<?= $_GET['pagina'] - 1 ?>">Anterior</a>
            </li>
            <?php for($i=0; $i<$paginas; $i++):?>

            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?>">
            <a class="page-link" href="controlador_tabla_tareas.php?pagina=<?php echo ($i+1) ?>"><?php echo ($i+1) ?></a>
            </li>
            
            <?php endfor?>

            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'hide' : '' ?>"><a class="page-link" href="controlador_tabla_tareas.php?pagina=<?= $_GET['pagina'] + 1 ?>">Siguiente</a></li>
        </ul>

    </nav>
    </body>
</html>