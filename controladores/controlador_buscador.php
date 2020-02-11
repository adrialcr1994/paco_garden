<?php

include_once '../modelo/modelo_consultas.php';
include_once '../modelo/conexion.php';
include_once '../vistas/vista_menu.php';


$conexion=Conecta();

if ($_POST) {

    $filtros = [];
  
     for ($i = 0; $i < 3; $i++) {
        $filtros[] = buscador2($_POST['campos'][$i], $_POST['comparacion'][$i], $_POST['valor'][$i]);
    }

   $datos=buscador($filtros,$conexion);

   
  
    
  
    // Enviar $consulta al modelo
  }

  function buscador2($campos, $comparacion, $valor){

    switch($comparacion){

        case 'sinValor':
            return "$campos LIKE '$valor%'";
            case 'igual':
                return "$campos = '$valor'";
                case 'contiene':
                    return "$campos LIKE '%$valor%'";
    }

  }

  include_once '../vistas/vista_buscador.php';