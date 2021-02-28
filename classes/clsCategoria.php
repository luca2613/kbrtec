<?php 
class clsCategoria extends clsBanco
{
	private $conexao;
	private $cd_categoria;
	private $nm_categoria;

	public function get_cd_categoria()
	{
		return $this->cd_categoria;
	}
	public function set_cd_categoria($cd_categoria)
	{
		$this->cd_categoria = $cd_categoria;
	}
	public function get_nm_categoria()
	{
		return $this->nm_categoria;
	}
	public function set_nm_categoria($nm_categoria)
	{
		$this->nm_categoria = $nm_categoria;
	}

	public function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function cadastrarCategoria()
	{
		$banco = $this->conexao->getBanco();
		$comando = "insert into categoria ";
		$comando .= "values ('".$this->get_cd_categoria()."', '".$this->get_nm_categoria()."')";

		if($banco->query($comando) == true) {
			return "categoria cadastrada!";
		}
		else {
			return "erro ao cadastrar categoria!";
		}
		
		$this->conexao->Desconectar();
	}

	public function alterarCategoria($c)
	{
		$banco = $this->conexao->getBanco();
		$comando = "update categoria set ";
		$comando .= "nm_categoria = '".$this->get_nm_categoria()."' ";
		$comando .= "where cd_categoria = '".$c."'";

		if($banco->query($comando) == true) {
			header("location:index.php");
		}
		else {
			return "erro";
		}
	}

	public function deleteCategoria($p) 
	{
		$banco = $this->conexao->getBanco();
		$comando3 = "delete from produto where ";
		$comando3 .= "cd_categoria = '".$p."'";

		$comando2 = "delete from subcategoria where ";
		$comando2 .= "cd_categoria = '".$p."'";

		$comando = "delete from categoria where ";
		$comando .= "cd_categoria = '".$p."'";

		if($banco->query($comando3) == true)
		{
			if($banco->query($comando2) == true) {
				if($banco->query($comando) == true) {
					header("location:index.php");
				}
				else {
					return "erro" . $banco->error;
				}
					}
				}

	}

	public function selectCategoria()
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
		$this->conexao->Desconectar();
	}	
}

?>