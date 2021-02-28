<?php 
class clsSubcategoria extends clsBanco
{
	private $conexao;
	private $cd_subcategoria;
	private $cd_Scategoria;
	private $nm_subcategoria;

	public function get_cd_subcategoria()
	{
		return $this->cd_subcategoria;
	}
	public function set_cd_subcategoria($cd_subcategoria)
	{
		$this->cd_subcategoria = $cd_subcategoria;
	}

	public function get_cd_Scategoria()
	{
		return $this->cd_Scategoria;
	}
	public function set_cd_Scategoria($cd_Scategoria)
	{
		$this->cd_Scategoria = $cd_Scategoria;
	}

	public function get_nm_subcategoria()
	{
		return $this->nm_subcategoria;
	}
	public function set_nm_subcategoria($nm_subcategoria)
	{
		$this->nm_subcategoria = $nm_subcategoria;
	}

	public function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function cadastrarSubcategoria()
	{	
		$banco = $this->conexao->getBanco();
		$comando = "insert into subcategoria ";
		$comando .= "values ";
		$comando .= "('".$this->get_cd_subcategoria()."', '".$this->get_cd_Scategoria()."', '".$this->get_nm_subcategoria()."')";
		

		if($banco->query($comando) == true) {
			return "Subcategoria cadastrada!";
		}
		else {
			return "erro!";
		}
		
	}

	public function alterarSubcategoria($c)
	{
		$banco = $this->conexao->getBanco();
		$comando = "update subcategoria set ";
		$comando .= "cd_subcategoria = '".$this->get_cd_Scategoria()."', ";
		$comando .= "nm_subcategoria = '".$this->get_nm_categoria()."' ";
		$comando .= "where cd_categoria = '".$c."'";

		if($banco->query($comando) == true) {
			header("location:index.php");
		}
		else {
			return "erro";
		}
	}

	public function deleteSubcategoria($p) 
	{
		$banco = $this->conexao->getBanco();
		$comando2 = "delete from produto where ";
		$comando2 .= "cd_subcategoria = '".$p."'";

		$comando = "delete from subcategoria where ";
		$comando .= "cd_subcategoria = '".$p."'";

		if($banco->query($comando2) == true)
		{
			if($banco->query($comando) == true) {
				header("location:index.php");
			}
			else {
				return "erro" . $banco->error;
			}
		}		

	}	
}

?>