<?php
include_once "../controladores/controlador_borrar_usuario.php";
include_once '../modelo/conexion.php';

if(isset($_GET['del'])){
  
  $id=$_GET['del'];
}
?>

<html>

  <head>
  <title>Formulario de entrada del datos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  </head>
  <body class="container-fluid" style="background-color: #2ECC71;">

  <h2>Borrar Usuario</h2>
  <form  method="post" style="zoom:90%">

  Correo <input type="text" id="correo" name="correo" readonly value="<?= requestValue('correo', $tarea['correo']) ?>">
  <br>
  <br>
  <div><button onclick="preguntar(<?php echo (requestValue('correo', $tarea['id'])) ?>)">Eliminar</button></div>
  <br>
  <br>
  <?php if(isset($errores) && !empty($errores)): ?>

<div class="errores"> <?php

foreach ($errores as $v) {
    echo "<p>" . $v . "</p>";
}
?>
</div>

<?php endif;?>
</form>

<script>
function preguntar(id){

  if(confirm('¿Estas seguro de que deseas borrar?')){
    
    window.location.href ='../controladores/controlador_borrar_usuario.php?del=' + id;
  }

}
</script>
</body>
</html>