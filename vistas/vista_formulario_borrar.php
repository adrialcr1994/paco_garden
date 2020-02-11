<?php
include_once "../controladores/controlador_borrar_tarea.php";
include_once '../modelo/conexion.php';

if(isset($_GET['del'])){
  
  $id=$_GET['del'];
}
?>

<html>

  <head>
  <title>Formulario de entrada del datos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body class="container-fluid" style="background-color: #2ECC71;">

  <h2>Borrar Tarea</h2>
  <form  method="post" style="zoom:90%">

  ID: <input type="text" id="id" name="id" readonly value="<?= requestValue('id', $tarea['id']) ?>">
  <br>
  <br>
  Estado Tarea: <input type="text" id="estado_tarea" name="estado_tarea" readonly value="<?= requestValue('estado_tarea', $tarea['estado_tarea']) ?>">
  <br>
  <br>
  Explicacion Tarea:
  <br>
  <textarea name="explicacion" rows="5" cols="40" id="explicacion"> <?= requestValue('explicacion', $tarea['anotaciones_anteriores']) ?></textarea>
  <br>
  <br>
  Anotaciones Tarea:
  <br>
  <textarea name="descripcion" rows="5" cols="40" id="descripcion"> <?= requestValue('descripcion', $tarea['anotaciones_posteriores']) ?></textarea>
  <br>
  <br>
  <div><button onclick="preguntar(<?php echo (requestValue('id', $tarea['id'])) ?>)">Eliminar</button></div>
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

    window.location.href ='../controladores/controlador_borrar_tarea.php?del=' + id;
  }

}
</script>
</body>
</html>