<?php 
require_once("session.php");
require_once("classes/clsProduto.php");
$produto = new clsProduto($classe_banco);
if(isset($_GET["p"])) {
	$p = $_GET["p"];
}

$produto->deleteProduto($p);
?>