<?php 
session_start();

if(!$_SESSION['u_usuario']) {
	echo "<script>alert('No tiene acceso');</script>";
	echo "<script>window.location.replace('http://127.0.0.1/PROYECTO/index');</script>";
	die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Productos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script  src="js/jquery-1.12.1.min.js"></script>
<script  src="js/bootstrap.js"></script>

</head>
<body>
<div class "container">
		<div class = "div1">
			<img class="img-1" src = "img/Imagen1.png"/> 
		</div>
	
		<div class = "menu">
		
			<nav class="navbar navbar-expand-lg navbar-dark  bg-dark" >
			
			  <a class="navbar-brand" href="index" >Empresa</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				  <li class="nav-item ">
					<a class="nav-link" href="pedidos">Pedidos</a>
				  </li>
				  <li class="nav-item active">
					<a class="nav-link" href="productos">Productos</a>
				  </li>
  					<li class="nav-item">
					<a class="nav-link" href="cerrar_sesion">Cerrar sesion</a>
				  </li>
				</ul>

			  </div>
			  
			</nav>
		</div>
		<div class = "contenido">
			<div class="card-deck col-md-8">
				<div class="card ">
			  	<div class="card-header">
			  		Registro de Producto
			  	</div>
			  	<table class="table">
			  		<tr class="center">
					<form method="POST" action="acciones">
					    <div class="form-group col-md-8">
					      <label for="inputEmail4">Nombre Producto</label>
					      <input type="text" class="form-control" id="inputText" name="Nombre" required>
					    </div>
					  <div class="form-group col-md-8">
					  	  <label for="inputEmail4">Direccion de la imagen</label>
						  <input type="text" class="form-control" id="inputText" name="Imagen" required>
					  </div>
					  <div class="form-group col-md-8">
					    <label for="inputAddress2">Precio</label>
					    <input type="number" class="form-control" id="inputNumber" placeholder="0" name="Precio" required>
					  </div>
					  <div class="form-group col-md-8">
					    <label for="message-text" class="col-form-label">Descripción</label>
            			<textarea class="form-control" id="message-text" name="Descripcion" placeholder="Ingrese aqui una descripcion del producto" required></textarea>
					  </div>
					   <button type="submit" name="btnAccion"
						value="Registrar" class="btn btn-primary col-md-8">Registrar</button>
					</form>
					</tr>
				</table>
			</div>
			</div>
		</div>
<?php include 'templates/footer.php'?>