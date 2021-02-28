<?php 
class clsListagem extends clsBanco
{
	private $conexao;

	function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function listarSubcategorias($cd_usuario)
	{
		$banco = $this->conexao->getBanco();
		$comando = "select nm_categoria,cd_subcategoria,nm_subcategoria ";
		$comando .= "from subcategoria join categoria on ";
		$comando .= "subcategoria.cd_categoria = categoria.cd_categoria";
		$resultado = $banco->query($comando);
		if($resultado->num_rows > 0) {
			echo "<ul>";
			while($row = $resultado->fetch_assoc()) {
				echo "<li>" . "Código subcategoria: " . $row["cd_subcategoria"] . " / nome subcategoria: " . $row["nm_subcategoria"] . " / Nome categoria: " . $row["nm_categoria"];
				if($cd_usuario == 1) {
					echo "<p>" . "<a href='delete_subcategoria.php?p=" . $row["cd_subcategoria"] . "' >" . "Excluir" ."</a>" . "</p>" ;
					echo "<p>" . "<a href='cadastro_subcategoria.php?d=". $row["cd_subcategoria"] . "'>" . "Editar" . "</a>" . "</p>";
				}
			}
			echo "</ul>";
		}
	}

	public function listarCategorias($cd_usuario)
	{
		$banco = $this->conexao->getBanco();
		$comando = "select * ";
		$comando .= "from categoria";
		$resultado = $banco->query($comando);
		if($resultado->num_rows > 0) {
			echo "<ul>";
			while($row = $resultado->fetch_assoc()) {
				echo "<li>" . "Código: " . $row["cd_categoria"] . " / nome: " . $row["nm_categoria"];
				if($cd_usuario == 1) {
						
					echo "<p>" . "<a href='delete_categoria.php?p=" . $row["cd_categoria"] . "' >" . "Excluir" ."</a>" . "</p>" ;
					echo "<p>" . "<a href='cadastro_categoria.php?d=". $row["cd_categoria"] . "'>" . "Editar" . "</a>" . "</p>";
				}
			}
			echo "</ul>";
		}
	}

	public function listarOption()
	{
		$banco = $this->conexao->getBanco();
		$comando = "select * ";
		$comando .= "from categoria";
		$resultado = $banco->query($comando);
		if($resultado->num_rows > 0) {
			while($row = $resultado->fetch_assoc()) {
				echo "<option value=".$row["cd_categoria"].">". $row["nm_categoria"] ."</option>";
			}
		}
	}

	public function ListarTodosProdutos($cd_usuario)
	{
		$banco = $this->conexao->getBanco();
		$comando = "select * ";
		$comando .= "from produto";
		$resultado = $banco->query($comando);
		$tudo = "";
		$texto = "";
		if($resultado->num_rows > 0) {

			while($row = $resultado->fetch_assoc()) {
				$texto .= "<img src='".$row["cd_imagem_produto"]."' width='150px' height='150px'>";
				$texto .= "<p>" . $row["nm_produto"] . "</p>";
				$texto .= $row["ds_produto"];
				$texto .= "<p>" . "R$ " .$row["vl_produto"] . "</p>";
				if($row["ic_produto"] == 0) {
					$texto .= "<p>" . "Ativo" . "</p>";
				}
				else {
					$texto .= "<p>" . "Inativo" . "</p>";
				}
				if($cd_usuario == 1) {
					$texto .= "<p>" . "<a href='delete_produto.php?p=" . $row["cd_produto"] . "' >" . "Excluir" ."</a>" . "</p>" ;
					$texto .= "<p>" . "<a href='cadastro_produto.php?d=". $row["cd_produto"] . "'>" . "Editar" . "</a>" . "</p>";
				}
				$tudo .= $row["cd_produto"] . ';' . $row["nm_produto"] . ';' . $row["cd_categoria"] . ';' . $row["cd_subcategoria"] . ';' . $row["ds_produto"] . ';' . $row["cd_imagem_produto"] . ';' . $row["vl_produto"] . ';' . $row["nm_tag_produto"] . ';' . $row["ic_produto"] . "\n"; 

			}

			$resp = "data:text/csv;charset=utf-8,cd_produto;nm_produto;cd_categoria;cd_subcategoria;ds_produto;cd_imagem_produto;vl_produto;nm_tag_produto;ic_produto\n";
			$resp .= $tudo;

			echo "<p>" . "<a href='".$resp."' download='tabela_produto.csv'>" . "Extrar arquivo csv" ."</a>" . "<p>";
			echo $texto;
		}
	}
}



 ?>