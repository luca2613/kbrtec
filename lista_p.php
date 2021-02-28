<?php 
require_once("session.php"); 
$banco = $classe_banco->getBanco();

if(isset($_POST["categoria_id"])) {

	if($_POST["categoria_id"] != "") {
	$comando = "select * ";
	$comando .= "from produto where ";
	$comando .= "cd_categoria = '".$_POST["categoria_id"]."'";
	}
	else {
		$comando = "select * from produto";
	}

	$resultado = $banco->query($comando);
	$tudo = "";
	$texto = "";
	while($row = $resultado->fetch_assoc()) {

		$texto .= "<img src='".$row["cd_imagem_produto"]."' width='150px' height='150px'>";
		$texto .= "<p>" . $row["nm_produto"] . "</p>";
		$texto .= $row["ds_produto"];
		$texto .= "<p>" . "R$ " .$row["vl_produto"] . "</p>";
			if($row["ic_produto"] == 0) {
				$texto .=  "<p>" . "Ativo" . "</p>";
			}
			else {
				$texto .= "<p>" . "Inativo" . "</p>";
			}
		$texto .= "<p>" . "<a href='delete-produto.php?d=" . $row["cd_produto"] . "'data-confirm='deseja excluir esse produto?'>" . "Excluir" ."</a>" . "</p>" ;
		$texto .= "<p>" . "<a href='edit-produto.php?p=". $row["cd_produto"] . "'>" . "Editar" . "</a>" . "</p>";

		$tudo .= $row["cd_produto"] . ';' . $row["nm_produto"] . ';' . $row["cd_categoria"] . ';' . $row["cd_subcategoria"] . ';' . $row["ds_produto"] . ';' . $row["cd_imagem_produto"] . ';' . $row["vl_produto"] . ';' . $row["nm_tag_produto"] . ';' . $row["ic_produto"] . "\n"; 
	}

	$resp = "data:text/csv;charset=utf-8,cd_produto;nm_produto;cd_categoria;cd_subcategoria;ds_produto;cd_imagem_produto;vl_produto;nm_tag_produto;ic_produto\n";
			$resp .= $tudo;

	echo "<p>" . "<a href='".$resp."' download='tabela_produto.csv'>" . "Extrar arquivo csv" ."</a>" . "</p>";
	echo $texto;

}

?>