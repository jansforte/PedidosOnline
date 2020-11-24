<!DOCTYPE html>
<html lang="es">
<head>
<title>Principal</title>
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
				  <li class="nav-item">
					<a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="mostrarCarrito">Carrito(<?php
						include 'carrito.php';
						echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); ?>)</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="historia">Historia</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="contactar">Contactenos</a>
				  </li>
				  <li class="nav-item ">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
				  </li>
				  
				</ul>

			  </div>
			  
			</nav>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Inicio de sesión</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action = "login" method = "POST">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Usuario</label>
				    <input type="text" name = "usuario" class="form-control" id="exampleInputEmail1" aria-describedby="text" required="">
				    </small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" name = "pass" required="">
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary" value = "ingresar">Ingresar</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>