<?php 
include 'clases/conexion/conexion.php';
include 'templates/header.php'; 
?>
		<div class = "contenido">
			<br>
			<?php if ($mensaje!="") { ?>
				<div class="alert alert-success">
					<?php
						echo($mensaje);?>
					<a href="mostrarCarrito" class="badge badge-success">Ver carrito</a>
				</div>
			<?php } ?>
			<div class="row">
				<?php
					$sentencia=$pdo->prepare("SELECT * FROM producto");
					$sentencia->execute();
					$listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
				?>
				<?php
					foreach ($listaproductos as $producto) { ?>
					<div class="col-3">
						<div class="card-deck">
					  	<div class="card">
						  <img src="<?php echo $producto["Imagen"];?>" 
							title="<?php echo $producto["Nombre"];?>" 
							class="card-img-top" 
							alt="<?php echo $producto["Nombre"];?>"
							data-toggle="popover"
							data-trigger="hover"
							data-content="<?php echo $producto["Descripcion"];?>"
							height="317px"
							>
							<div class="card-body">
							  <span><?php echo $producto["Nombre"];?></span>
							  <h5 class="card-title">$<?php echo $producto["Precio"];?></h5>
							  <p class="card-text"><?php echo $producto["Descripcion"];?></p>

							  <form method="POST" action="">
							  	<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto["ID"], COD, KEY);?>">
							  	<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto["Nombre"], COD, KEY);?>">
							  	<input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">
							  	<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto["Precio"], COD, KEY);?>">
							  	<button class="btn btn-primary"
							  	name="btnAccion"
							  	value="Agregar"
							  	type="submit">
							  	Agregar al pedido
							    </button>
							  </form>
						  
							</div>	
						  </div>
						</div>
					</div>
				<?php }	?>
			</div>
		</div>

		<script>
			$(function () {
  				$('[data-toggle="popover"]').popover()
			})
		</script>
<?php include 'templates/footer.php'?>