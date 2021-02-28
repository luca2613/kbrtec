<?php 
require_once("session.php");
require_once("classes/clsCategoria.php");
$categoria = new clsCategoria($classe_banco);
if(isset($_GET["p"])) {
	$p = $_GET["p"];
}

echo $categoria->deleteCategoria($p);
?>