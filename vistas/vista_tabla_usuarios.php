<?php
session_start();

if (isset($_SESSION['usuarioactual'])){

    if($_SESSION['usuarioactual']=="admin"){
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
<h1 style="text-align: center;">Tabla de usuarios</h1>

<table id="example" class="table table-bordered table-condensed table-responsive-sm" style="background-color: white; zoom:80%; text-align: center;">
    <thead style="text-align: center;">
        <tr>
            <th style="text-align:center;">Correo</th>
            <th style="text-align:center;">Contraseña</th>
            <th style="text-align:center;">Eliminar</th>
            <th style="text-align:center;">Editar</th>
        </tr>
    </thead>
        <tbody>
        <?php


$resultado = verUsuariosControlador($conexion);

while ($fila=mysqli_fetch_array($resultado)){ 

    ?>

<tr>
    <td><?= $fila['correo'] ?></td>
    <td><?= $fila['contrasena'] ?></td>
    <td style="text-align: center;">
            <a  href='controlador_borrar_usuario.php?id=<?=$fila['correo'] ?>'>
                <img src="boton_eliminar.jpg" height="50" width="50">
            </a>
    </td>
    <td style="text-align: center;">
            <a  href='controlador_actualizar_usuario.php?id=<?=$fila['correo'] ?>'>
                <img src="boton_editar.jpg" height="50" width="50">
            </a>
    </td>
</tr>

<?php } ?>
        </tbody>
    </table>
    </body>
</html>

<?php
}else{
?>    
    <script>alert('Acceso prohibido.');window.location.href='../controladores/controlador_tabla_tareas.php'</script>

    <?php
}
}