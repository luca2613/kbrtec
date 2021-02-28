<?php 
require_once("classes/clsBanco.php"); 
session_start();

$classe_banco = new clsBanco();
$classe_banco->Conectar();
	

$nm_usuario_session = $_SESSION["nome"];
$nm_senha_session = $_SESSION["senha"];
$cd_usuario = $_SESSION["cd_usuario"];

if($nm_senha_session == null) {
	header("location:login.php");
}

 ?>

