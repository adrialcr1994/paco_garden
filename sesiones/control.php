<?php
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     $usuario     = "adrian";
    $contrasena  = "210394";
    $servidor    = "localhost";
    $basededatos = "practica";

    if (!($conexion_bd=mysqli_connect($servidor,$usuario,$contrasena,$basededatos)))
    {
    echo "Error conectando a la base de datos.";
    exit();
    }

     /* El query valida si el usuario ingresado existe en la base de datos. */
     $consulta  = "SELECT correo FROM usuarios WHERE correo='". $_POST["correo"] ."'";
     $resultado = mysqli_query($conexion_bd, $consulta) or die("Error en la consulta");
     $nmyusuario = mysqli_num_rows($resultado);

     //Si existe el usuario, validamos también la contraseña ingresada
     if($nmyusuario != 0){
          $consulta = "SELECT correo FROM usuarios
               WHERE correo = '". $_POST["correo"] ."' 
               AND contrasena = '". $_POST["clave"] ."'";
          $resultado = mysqli_query($conexion_bd, $consulta) or die("Error en la consulta");
          $array=mysqli_fetch_row($resultado);
          $nmyclave = mysqli_num_rows($resultado);

          //Si el usuario y clave ingresado son correctos, creamos la sesión del mismo.
          if($nmyclave != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = "SIP";
               $_SESSION["usuarioactual"] =$_POST["correo"]; //correo del usuario logueado.
               //Direccionamos a nuestra página principal del sistema.
               header ("Location: ../controladores/controlador_tabla_tareas.php");
          }
          else{
               echo"<script>alert('La contraseña no existe.');window.location.href='../index.php'</script>"; 
          }
     }else{
          echo"<script>alert('El correo no existe.');window.location.href='../index.php'</script>";
     }
     mysqli_close($conexion_bd);
?>
