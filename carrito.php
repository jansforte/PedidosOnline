<?php 
session_start();

$mensaje="";

if (isset($_POST['btnAccion'])) {
	switch ($_POST['btnAccion']) {
		case 'Agregar':
			if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) )) {
				$ID=openssl_decrypt($_POST['id'], COD, KEY);
				$mensaje.="Ok ID correcto".$ID."<br/>";
			}else{
				$mensaje.="Ups"."<br/>";
			}
			if (is_string( openssl_decrypt($_POST['nombre'], COD, KEY) )) {
				$NOMBRE=openssl_decrypt($_POST['nombre'], COD, KEY);
				$mensaje.="Ok nombre correcto"."<br/>";
			}else{
				$mensaje.="Ups nombre"."<br/>";
			}
			if (is_numeric( openssl_decrypt($_POST['cantidad'], COD, KEY) )) {
				$CANTIDAD=openssl_decrypt($_POST['cantidad'], COD, KEY);
				$mensaje.="Ok cantidad correcto"."<br/>";
			}else{
				$mensaje.="Ups cant"."<br/>";
			}
			if (is_numeric( openssl_decrypt($_POST['precio'], COD, KEY) )) {
				$PRECIO=openssl_decrypt($_POST['precio'], COD, KEY);
				$mensaje.="Ok precio correcto"."<br/>";
			}else{
				$mensaje.="Ups precio"."<br/>";
			}

			if(!isset($_SESSION['CARRITO'])){
				$producto = array(
					'ID' => $ID,
					'NOMBRE' =>$NOMBRE,
					'CANTIDAD' =>$CANTIDAD,
					'PRECIO' =>$PRECIO);
				$_SESSION['CARRITO'][0]=$producto;
				$mensaje= "Producto agregado al Carrito";
			}else{

				$idProductos=array_column($_SESSION['CARRITO'], "ID");
				if (in_array($ID, $idProductos)) {
					echo "<script>alert('El producto ya fue agregado al Carrito');</script>";
				} else {
					$NumeroProductos=count($_SESSION['CARRITO']);
					$producto = array(
						'ID' => $ID,
						'NOMBRE' =>$NOMBRE,
						'CANTIDAD' =>$CANTIDAD,
						'PRECIO' =>$PRECIO);
					$_SESSION['CARRITO'][$NumeroProductos]=$producto;
					$mensaje= "Producto agregado al Carrito";
				}
			}
			$mensaje= "Producto agregado al Carrito";
			break;

		case 'Eliminar':
			if (is_numeric( openssl_decrypt($_POST['id'], COD, KEY) )) {
				$ID=openssl_decrypt($_POST['id'], COD, KEY);
				foreach ($_SESSION['CARRITO'] as $indice => $producto) {
					if ($ID==$producto['ID']) {
						unset($_SESSION['CARRITO'][$indice]);
						echo "<script>alert('Elemento eliminado de la lista de pedido');</script>";
					}
				}
			}
			break;
		
		default:
			# code...
			break;
	}
}
?>