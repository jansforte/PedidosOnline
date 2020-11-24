<?php
include 'clases/conexion/config.php'; 
include 'templates/header.php'; ?>
		<div class = "contenido">
			<br>
			<h3>Lista del Pedido</h3>
			<?php if (!empty($_SESSION['CARRITO'])) { ?>
			<table class="table table-light table-bordered">
				<tbody>
					<tr>
						<th width="40%" class="text-center">Descripcion</th>
						<th width="15%"class="text-center">Cantidad</th>
						<th width="20%"class="text-center">Precio</th>
						<th width="20%"class="text-center">Total</th>
						<th width="5%"class="text-center">---</th>
					</tr>
					<?php 
						$total = 0;
						foreach ($_SESSION['CARRITO'] as $indice => $producto) {?>
					<tr>
						<td width="40%"><?php echo $producto['NOMBRE']; ?></td>
						<td width="15%"class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
						<td width="20%"class="text-center"><?php echo $producto['PRECIO']; ?></td>
						<td width="20%"class="text-center"><?php echo number_format($producto['CANTIDAD']*$producto['PRECIO'],2); ?></td>
						<td width="5%">
							<form method="POST" action="">
							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto["ID"], COD, KEY);?>">
							<button class="btn btn-danger" 
									type="submit"
									name="btnAccion"
									value="Eliminar"
									>Eliminar</button>
							</form>
						</td>
					</tr>
					<?php 
						$total = $total + $producto['CANTIDAD']*$producto['PRECIO'];
						} ?>
					<tr>
						<td colspan="3" align="right"><h3>Total</h3></td>
						<td align="right"><h3><?php echo number_format($total,2);?></h3></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5">
							<button class="btn btn-primary btn-lg btn-block" 
									type="button"
									name="btnAccion"
									value="pedido"
									data-toggle="modal" 
									data-target="#pedidos"
									>Realizar pedido</button>
						</td>
					</tr>
				</tbody>
			</table>
			<?php }else{?>
				<div class="alert alert-success">
					No se ha realizado ningun pedido...
			</div>
			<?php }?>

			<!-- Modal -->
		<div class="modal fade" id="pedidos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Realizar Pedido</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				 <form method="POST" action="pedir">
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputName">Nombre</label>
				      <input type="name" class="form-control" id="inputName" name="inputName" require>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputTel">Telefono</label>
				      <input type="number" class="form-control" id="inputTel" name="inputTel" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputAddress">Direccion</label>
				    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Carrera 5 n 9-19" required>
				  </div>
				  <div class="form-group">
				    <label for="inputBarrio">Barrio</label>
				    <input type="text" class="form-control" id="inputBarrio" name="inputBarrio" placeholder="Alameda" required>
				  </div>
				    <div class="form-group">
				      <label for="inputCity">Ciudad</label>
				      <input type="text" class="form-control" id="inputCity" name="inputCity" required>
				    </div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="submit" class="btn btn-primary"
		        	name="btnAccion"
					value="Pedir">Pedir</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>


		</div>
<?php include 'templates/footer.php'?>