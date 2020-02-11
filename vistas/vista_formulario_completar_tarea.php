<html>
    <head>
          <meta charset="UTF-8">
          <title>Completar tarea</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body class="container-fluid" style="background-color: #2ECC71;">
    <h2>Modificar Estado</h2>
          <form method="POST" style="zoom:90%;">
             Tarea: <input type="text" id="identificador" readonly="readonly" name="identificador" value="<?= requestValue('identificador', $tarea['id']) ?>"><br><br>
             Estado Actual: <input type="text" id="estado_actual" readonly="readonly" name="estado_actual" value="<?= requestValue('estado_actual', $tarea['estado_tarea']) ?>">
              <br>
              <br>
                  <fieldset>
                   
                    <br>
                    <label><input type="radio" name="estado_tarea" value="Progreso" <?php if (requestValue('estado_tarea', $tarea['estado_tarea']) == 'P') { ?>checked<?php } ?>/> Pendiente </label> <br>
                    <label><input type="radio" name="estado_tarea" value="Realizada" <?php if (requestValue('estado_tarea', $tarea['estado_tarea']) == 'R') { ?>checked<?php } ?>> Realizada</label> <br>
                    <label><input type="radio" name="estado_tarea" value="Cancelada" <?php if (requestValue('estado_tarea', $tarea['estado_tarea']) == 'C') { ?>checked<?php } ?>> Cancelada</label>
                  </fieldset>
              <br>
                  <p><input type="submit" name="Completar" value="Enviar"/></p>

            <?php if(isset($errores) && !empty($errores)): ?>

                  <div class="errores"> <?php

                        foreach ($errores as $v) {
                              echo "<p>" . $v . "</p>";
                        }
            ?>
</div>

            <?php endif;?>
            </form>
    </body>
  </html>