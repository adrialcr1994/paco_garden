<?php

function Conecta()
{

    $usuario     = "adrian";
    $contrasena  = "210394";
    $servidor    = "localhost";
    $basededatos = "practica";

    if (!($link=mysqli_connect($servidor,$usuario,$contrasena,$basededatos)))
    {
    echo "Error conectando a la base de datos.";
    exit();
    }

    return $link;
}


