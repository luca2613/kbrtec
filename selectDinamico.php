<?php
require_once("session.php"); 
$banco = $classe_banco->getBanco();
$comando = "select * from subcategoria where ";
$comando .= "cd_categoria = '".$_POST["categoriaId"]."'";
$resultado = $banco->query($comando);
$texto = "";
if($resultado->num_rows > 0) {
	while($row = $resultado->fetch_assoc()) {
		$texto .= "<option value='".$row["cd_subcategoria"]."'>".$row["nm_subcategoria"]."</option>";
	}
}
echo $texto;


 ?>