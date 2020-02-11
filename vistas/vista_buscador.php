
<html>

  <head>
  <title>Formulario de entrada del datos</title>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
  <body class="container-fluid" style="background-color: #2ECC71; text-align:center;">

<h1 style="text-align: center;">Buscador</h1>
<br>
<div class="buscador">
<?php

for($i=0;$i<3;$i++){
?>
<form  method="post" style="zoom:90%;">
<select class="select-css" name="campos[<?= $i ?>]">
    <option value='sinValor'>Seleccione campo</option>
        <option value='descripcion'>Descripcion</option>
        <option value='persona_de_contacto'>Persona de contacto</option>
        <option value='telefonos'>Telefono de contacto</option>
        <option value='correo_electronico'>Email</option>
        <option value='estado_tarea'>Estado</option>
        <option value='operacion_encargado'>Operario encargado</option>
    </select>
    <select class="select-css" name="comparacion[<?= $i ?>]">
        <option value='sinValor'>Seleccione comparador</option>
        <option value='igual'>Igual</option>
        <option value='contiene'>Contiene</option>
    </select>
    <input class="cuadroTextoValor" type="text" name='valor[<?= $i ?>]' value=""><br><br>
   <?php } ?> <input class="botonBuscar"type="submit" name="buscar" value="Buscar">
    </form>

<?php

echo "<table class='table table-bordered table-condensed table-responsive-sm' style='background-color: white; zoom:80%; text-align:center;'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Descripcion</th>";
echo "<th>Persona Contacto</th>";
echo "<th>Telefono</th>";
echo "<th>Correo</th>";
echo "<th>Direccion</th>";
echo "<th>Poblacion</th>";
echo "<th>Codigo Postal</th>";
echo "<th>Provincia</th>";
echo "<th>Estado Tarea</th>";
echo "<th>Fecha Creacion</th>";
echo "<th>Encargado</th>";
echo "<th>Fecha Realizacion</th>";
echo "<th>Explicacion Tarea</th>";
echo "<th>Anotaciones</th>";
echo "</tr>";

if(isset($datos)){
    foreach($datos as $valor){

            echo "<tr>";
                echo "<td>". $valor['id']. "</td>";
                echo "<td>". $valor['descripcion']. "</td>";
                echo "<td>". $valor['persona_de_contacto']. "</td>";
                echo "<td>". $valor['telefonos']. "</td>";
                echo "<td>". $valor['correo_electronico']. "</td>";
                echo "<td>". $valor['direccion']. "</td>";
                echo "<td>". $valor['poblacion']. "</td>";
                echo "<td>". $valor['codigo_postal']. "</td>";
                echo "<td>". $valor['provincia']. "</td>";
                echo "<td>". $valor['estado_tarea']. "</td>";       
                echo "<td>". $valor['fecha_creacion']. "</td>";
                echo "<td>". $valor['operacion_encargado']. "</td>";
                echo "<td>". $valor['fecha_realizacion']. "</td>";
                echo "<td>". $valor['anotaciones_anteriores']. "</td>";
                echo "<td>". $valor['anotaciones_posteriores']. "</td>";
            echo "</tr>";
       
   }

   echo "</table>";
}
   ?>
</div>

<div class="col-md-12 text-center">
    <ul class="pagination pagination-lg pager" id="developer_page"></ul>
</div>
<script>
    $(document).ready(function() {
        $('#developers').pageMe({
            pagerSelector: '#developer_page',
            showPrevNext: true,
            hidePageNumbers: false,
            perPage: 3
        });
    });
</script>

</body>
</html>