<?php 
include 'clases/conexion/conexion.php';

if (isset($_POST['btnAccion'])) {
	switch ($_POST['btnAccion']) {
		case 'Enviar':
			if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) )) {
				$ID=openssl_decrypt($_POST['id'], COD, KEY);
				$sentencia2=$pdo->prepare("UPDATE `pedido` SET `Status` = 'Enviado' WHERE `pedido`.`ID` = $ID");
				$sentencia2->execute();
				echo "<script>alert('El pedido se despachó correctamente');</script>";
				}
			break;

		case 'Eliminar':
			if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) )) {
				$ID=openssl_decrypt($_POST['id'], COD, KEY);
				$sentencia2=$pdo->prepare("DELETE FROM pedido where ID=".$ID."");
				$sentencia2->execute();
				echo "<script>alert('El pedido se eliminó correctamente');</script>";
			}
			break;
		case 'Registrar':
			$Nombre = $_POST['Nombre'];
			$Imagen = $_POST['Imagen'];
			$Descripcion = $_POST['Descripcion'];
			$Precio = $_POST['Precio'];
			
			$sentencia = $pdo->prepare("INSERT INTO `producto`(`Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES (:Nombre,:Precio,:Descripcion,:Imagen)");
			
			$sentencia->bindParam(":Nombre",$Nombre);
			$sentencia->bindParam(":Precio",$Precio);
			$sentencia->bindParam(":Descripcion",$Descripcion);
			$sentencia->bindParam(":Imagen",$Imagen);

			$sentencia->execute();
			echo "<script>alert('El producto se registró correctamente');</script>";
			break;
	}
}
echo "<script>window.location.replace('http://127.0.0.1/PROYECTO/pedidos');</script>";
?>