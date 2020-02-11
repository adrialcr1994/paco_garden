<?php

include_once '../modelo/conexion.php';

$conexion = Conecta();

$sql="SELECT * FROM tareas ";

$sentencia=mysqli_query($conexion, $sql) or die("Error en la consulta");

$resultado=mysqli_fetch_all($sentencia);

$num_resultado=mysqli_num_rows($sentencia);

$total_articulos_bd=$resultado;

$paginas=$num_resultado/3;

$paginas=ceil($paginas);

$articulos_por_pagina=3;

$iniciar= ($_GET['pagina']-1)*$articulos_por_pagina;


