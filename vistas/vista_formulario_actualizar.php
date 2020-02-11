<?php

include_once '../controladores/controlador_actualizar_tarea.php';
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
  Descripcion:<input type="text" id="descripcion" name="descripcion" value="<?= requestValue('descripcion', $tarea['descripcion']) ?>">
  <br>
  <br>
  Persona de contacto: <input type="text" id="persona_contacto" name="persona_contacto" value="<?= requestValue('persona_contacto', $tarea['persona_de_contacto']) ?>">
  <br>
  <br>
  Telefonos: <input type="text" id="telefonos" name="telefonos" value="<?= requestValue('telefono', $tarea['telefonos']) ?>">
  <br>
  <br>
  Correo Electronico: <input type="email" id="correo" name="correo" value="<?= requestValue('correo', $tarea['correo_electronico']) ?>">
  <br>
  <br>
  Direccion: <input type="text" id="direccion" name="direccion"  value="<?= requestValue('direccion', $tarea['direccion']) ?>">
  <br>
  <br>
  Poblacion: <input type="text" id="poblacion" name="poblacion" value="<?= requestValue('poblacion', $tarea['poblacion']) ?>">
  <br>
  <br>
  Codigo Postal: <input type="text" id="codigo_postal" name="codigo_postal" value="<?= requestValue('codigo_postal', $tarea['codigo_postal']) ?>">
  <br>
  <br>
  Provincias:
  <select id="opciones" name="opciones" value="<?= requestValue('provincia', $tarea['opciones']) ?>">

  <?=

include_once '../modelo/modelo_consultas.php';
select($conexion);

?>

  </select>
  <br>
  <br>
  Estado de la tarea:<input type="text" id="estado" name="estado" readonly value="<?= requestValue('estado', $tarea['estado_tarea']) ?>">
  <br>
  <br>
  Encargado de realizar la tarea: <input type="text" id="trabajador" name="trabajador" value="<?= requestValue('trabajador', $tarea['operacion_encargado']) ?>">
  <br>
  <br>
  Fecha de realizacion:<input type="date" id="fecha_realizacion" name="fecha_realizacion" value="<?= requestValue('fecha_realizacion', $tarea['fecha_realizacion']) ?>">
  <br>
  <br>
  Texto explicativo:
  <br>
  <textarea name="explicacion" rows="5" cols="40" id="explicacion"> <?= requestValue('explicacion', $tarea['anotaciones_anteriores']) ?></textarea>
  <br>
  <br>
  Texto operarios:
  <br>
  <textarea name="texto_operarios" rows="5" cols="40" id="texto_operarios"> <?= requestValue('texto_operarios', $tarea['anotaciones_posteriores']) ?></textarea>
  <br>
  <br>
  <input type="submit" value="Actualizar Tarea" >
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