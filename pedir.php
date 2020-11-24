<?php 
include 'clases/conexion/conexion.php';
include 'templates/header.php'; 
?>
	<?php
		if($_POST){
			$total = 0;
			$SID = session_id();
			$Nombre = $_POST['inputName'];
			$Tel = $_POST['inputTel'];
			$Dir = $_POST['inputAddress'];
			$Barrio = $_POST['inputBarrio'];
			$Ciudad = $_POST['inputCity'];

			foreach ($_SESSION['CARRITO'] as $indice => $producto) {
				$total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
			}
			$sentencia = $pdo->prepare("
				INSERT INTO `pedido`(`Pedido`, `Nombre`, `Telefono`, `Direccion`, `Barrio`, `Ciudad`, `Fecha`, `Total`) VALUES (:Pedido,:Nombre,:Telefono,:Direccion,:Barrio,:Ciudad,NOW(),:Total)");
			$sentencia->bindParam(":Pedido",$SID);
			$sentencia->bindParam(":Nombre",$Nombre);
			$sentencia->bindParam(":Telefono",$Tel);
			$sentencia->bindParam(":Direccion",$Dir);
			$sentencia->bindParam(":Barrio",$Barrio);
			$sentencia->bindParam(":Ciudad",$Ciudad);
			$sentencia->bindParam(":Total",$total);

			$sentencia->execute();
			$idPedido=$pdo->lastInsertId();

			foreach ($_SESSION['CARRITO'] as $indice => $producto) {
				$sentencia = $pdo->prepare("INSERT INTO `detallepedido`(`IDPedido`, `IDProducto`, `Precio`, `Cantidad`) VALUES (:IDPedido,:IDProducto,:Precio,:Cantidad)");
				$sentencia->bindParam(":IDPedido",$idPedido);
				$sentencia->bindParam(":IDProducto",$producto['ID']);
				$sentencia->bindParam(":Precio",$producto['PRECIO']);
				$sentencia->bindParam(":Cantidad",$producto['CANTIDAD']);
				$sentencia->execute();
			}

		}
		session_unset();
		header("Location: index.php");
		die();
	?>
<?php include 'templates/footer.php'?>