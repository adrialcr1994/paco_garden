<?php

include_once '../controladores/controlador_actualizar_usuario.php';
?>
<html>

  <head>
  <title>Formulario de entrada del datos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body class="container-fluid" style="background-color: #2ECC71;">
  <h2>Actualizar Tarea</h2>
  <form  method="post" style="zoom:90%">
  <input type="hidden" id="identificador" name="identificador" value="<?= requestValue('identificador', $tarea['id']) ?>">
  <br>
  Correo:<input type="text" id="correo" name="correo" value="<?= requestValue('correo', $tarea['correo']) ?>">
  <br>
  <br>
  Contraseña: <input type="text" id="contrasena" name="contrasena" value="<?= requestValue('contrasena', $tarea['contrasena']) ?>">
  <br>
  <br>
  <input type="submit" value="Actualizar Usuario" >
  <br>
  <br>

  <?php if(isset($errores) && !empty($errores)): ?>

<div class="errores"> <?php

foreach ($errores as $v) {
    echo "<p style='color:#FF0000';>" . $v . "</p>";
}
?>
</div>

<?php endif;?>
</form>
</body>
</html>