<?php

include_once '../controladores/controlador_añadir_usuario.php';
?>


<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <head>
  <title>Formulario de entrada del datos</title>
  </head>
  <body class="container-fluid" style="background-color: #2ECC71;">
<h2>Añadir Usuario</h2>
  <form  method="post" style="zoom:85%">
  Correo:<input type="text" id="correo" name="correo" value="<?= requestValue('correo') ?>">
  <br>
  <br>
  Contraseña: <input type="password" id="contrasena" name="contrasena" value="<?= requestValue('contrasena') ?>">
  <br>
  <br>
  <input type="submit" value="Añadir Usuario" name="enviar" >
</form>
  
<?php if(isset($errores) && !empty($errores)): ?>

<?php

foreach ($errores as $v) {
    echo "<p style='color:#FF0000';>" . $v. "</p>";
}
?>

<?php endif;?>
</body>
</html>