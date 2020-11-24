<?php

	session_start();
	
	$usuario =$_POST['usuario'];
	$pass = $_POST['pass'];

	include("clases/conexion/conexion.php");
	$proceso = $pdo ->prepare("SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Password = '$pass' ");
	$proceso ->execute();

	$listaproductos=$proceso->fetchAll(PDO::FETCH_ASSOC);
	
	if($listaproductos){
		$_SESSION['u_usuario']=$usuario;
		echo "<script>alert('se ha iniciado sesion correctamente');</script>";
		header("Location: pedidos");
	}else{
		echo "<script>alert('Usuario o contraseña incorrecta');</script>";
		echo "<script>window.location.replace('http://127.0.0.1/PROYECTO/index');</script>";
	}
	?>	