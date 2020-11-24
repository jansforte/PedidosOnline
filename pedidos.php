<?php 
include 'clases/conexion/conexion.php';
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
<title>Pedidos</title>
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
				  <li class="nav-item active">
					<a class="nav-link" href="pedidos">Pedidos <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
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
			<div class="card-deck">
			  <div class="card">
			  <div class="card-header">
			    Listado de Pedidos
			  </div>
			  <?php
			  		$sentencia=$pdo->prepare("SELECT * FROM pedido WHERE Status='Pendiente'");
					$sentencia->execute();
					$listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
				?>
				<?php if ($listaproductos!=0) { ?>
			  <table class="table">
			    <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Pedido</th>
			      <th scope="col">Enviar</th>
			      <th scope="col">Visualizar</th>
			      <th scope="col">Eliminar</th>
			    </tr>
			    </thead>
			    <tbody>
			    <?php
					foreach ($listaproductos as $producto) { 
						?>
			    <tr>
			    <form method="POST" action="acciones.php">
			    	<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto["ID"], COD, KEY);?>">
			        <th scope="row"><?php echo $producto["ID"]; ?></th>
			      <td><?php echo $producto["Nombre"]; ?></td>
			      <td>
			        <button type="submit" name="btnAccion"
					value="Enviar" class="btn btn-primary">Despachar Pedido</button>
			      </td>
			      <td>
			      	<button type="button" name="visualizar" 
			          			class="btn btn-primary" 
			          				name="visualizar"
									value="pedido"
									data-toggle="modal" 
									data-target="#pedidos<?php echo $producto["ID"];?>">Visualizar</button> 

										<!-- Modal -->
						<?php
									$sentencia2=$pdo->prepare("SELECT * FROM detallepedido where IDPedido='".$producto["Pedido"]."'");
									$sentencia2->execute();
									$listaproductos2=$sentencia2->fetchAll(PDO::FETCH_ASSOC);
								?>
						<div class="modal fade" id="pedidos<?php echo $producto["ID"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Detalles Pedido</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
								 <form method="POST" action="pedir.php">
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="inputName">Nombre</label>
								      <input type="name" class="form-control" id="inputName" value="<?php echo $producto["Nombre"]; ?>" require>
								    </div>
								    <div class="form-group col-md-6">
								      <label for="inputTel">Telefono</label>
								      <input type="number" class="form-control" id="inputTel" value="<?php echo $producto["Telefono"]; ?>" required>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputAddress">Direccion</label>
								    <input type="text" class="form-control" id="inputAddress" value="<?php echo $producto["Direccion"]; ?>" required>
								  </div>
								  <div class="form-group">
								    <label for="inputBarrio">Barrio</label>
								    <input type="text" class="form-control" id="inputBarrio" value="<?php echo $producto["Barrio"]; ?>" placeholder="Alameda" required>
								  </div>
								    <div class="form-group">
								      <label for="inputCity">Ciudad</label>
								      <input type="text" class="form-control" id="inputCity"value="<?php echo $producto["Ciudad"]; ?>"required>
								    </div>
								    <div class="form-group">
								      <label for="inputCity">Precio</label>
								      <input type="text" class="form-control" id="inputCity"value="<?php echo $producto["Total"]; ?>"required>
								    </div>
								     <div class="form-group">
								      <label for="inputCity">Cod. producto</label>
								      <input type="text" class="form-control" id="inputCity"value="
								      <?php	foreach ($listaproductos2 as $producto2) { echo $producto2["IDProducto"].",";} ?>"required>
								    </div>

						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						      </div>
						    </div>
						  </div>
						</div>

			      </td>
			      <td>
			        <div >
			          <button type="submit" name="btnAccion"
						value="Eliminar"  class="btn btn-danger">Eliminar</button>
			          </form>
			        </div>
			      </td>
			    </tr>
			   
			    <?php }	?>
			    </tbody>
			  </table>
			<?php } ?>
			</div>
			</div>
		</div>


</div>
<?php include 'templates/footer.php'?>
