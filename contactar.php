<?php include 'templates/header.php'?>		
		<div class = "contenido">
			<div class="card-deck ">
				<div class="card ">
			  	<div class="card-header">
			  		Contactenos
			  	</div>
				<form>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEmail4">Nombre</label>
				      <input type="text" class="form-control" id="inputText">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputPassword4">Asunto</label>
				      <input type="text" class="form-control" id="inputPassword4">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="message-text" class="col-form-label">Descripción</label>
            		<textarea class="form-control" id="message-text"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Enviar</button>
				</form>
				</div>
			</div>
		</div>
<?php include 'templates/footer.php'?>