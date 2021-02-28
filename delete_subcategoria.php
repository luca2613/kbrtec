<?php 
require_once("session.php");
require_once("classes/clsSubcategoria.php");
$subcategoria = new clsSubcategoria($classe_banco);
if(isset($_GET["p"])) {
	$p = $_GET["p"];
}

$subcategoria->deleteSubcategoria($p);
?>