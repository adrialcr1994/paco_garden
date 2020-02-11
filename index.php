<html>
	<head>
		<title>Inicio de sesion</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">	
	</head>
	<body style="text-align: center; padding-left: 500px; padding-top: 100px; background-color: #16A085">
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="paco_garden.jpg" alt="Card image cap">
		<div class="card-body">
		<form action="./sesiones/control.php" method="post" id="form"><br>
			<h3>Login</h3>
			<br>
			Correo: <input type="text" name="correo" id="correo" /><br><br>
			Clave: <input type="password" name="clave" id="clave" /><br><br>
			<input type="submit" value="Entrar" class="btn btn-primary">
		</form>
		</div>
		</div>
	</body>
</html>
