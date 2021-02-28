<?php 
class clsProduto extends clsBanco
{
	private $conexao;
	private $cd_produto;
	private $nm_produto;
	private $cd_categoria;
	private $cd_subcategoria;
	private $ds_produto;
	private $cd_imagem_produto;
	private $vl_produto;
	private $nm_tag_produto;
	private $ic_produto;


	public function get_cd_produto()
	{
		return $this->cd_produto;
	}
	public function set_cd_produto($cd_produto)
	{
		$this->cd_produto = $cd_produto;
	}

	public function get_nm_produto()
	{
		return $this->nm_produto;
	}
	public function set_nm_produto($nm_produto)
	{
		$this->nm_produto = $nm_produto;
	}

	public function get_cd_categoria()
	{
		return $this->cd_categoria;
	}
	public function set_cd_categoria($cd_categoria)
	{
		$this->cd_categoria = $cd_categoria;
	}

	public function get_cd_subcategoria()
	{
		return $this->cd_subcategoria;
	}
	public function set_cd_subcategoria($cd_subcategoria)
	{
		$this->cd_subcategoria = $cd_subcategoria;
	}

	public function get_ds_produto()
	{
		return $this->ds_produto;
	}
	public function set_ds_produto($ds_produto)
	{
		$this->ds_produto = $ds_produto;
	}

	public function get_cd_imagem_produto()
	{
		return $this->cd_imagem_produto;
	}
	public function set_cd_imagem_produto($cd_imagem_produto)
	{
		$this->cd_imagem_produto = $cd_imagem_produto;
	}

	public function get_vl_produto()
	{
		return $this->vl_produto;
	}
	public function set_vl_produto($vl_produto)
	{
		$this->vl_produto = $vl_produto;
	}

	public function get_nm_tag_produto()
	{
		return $this->nm_tag_produto;
	}
	public function set_nm_tag_produto($nm_tag_produto)
	{
		$this->nm_tag_produto = $nm_tag_produto;
	}

	public function get_ic_produto()
	{
		return $this->ic_produto;
	}
	public function set_ic_produto($ic_produto)
	{
		$this->ic_produto = $ic_produto;
	}

	public function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function selectDinamico()
	{
		$banco = $this->conexao->getBanco();
		$comando = "select * from ";
		$comando .= "categoria";
		$resultado = $banco->query($comando);
		$texto = "";
		if($resultado->num_rows > 0) {
			while($row = $resultado->fetch_assoc()) {
				$texto .= "<option value='".$row["cd_categoria"]."'>".$row["nm_categoria"]."</option>";
			}
			return $texto;
		}
		$this->conexao->Desconectar();
		
	}

	public function cadastrarProduto()
	{
		$banco = $this->conexao->getBanco();
		$comando = "insert into produto values 
		(
		'".$this->get_cd_produto()."',
		'".$this->get_nm_produto()."',
		'".$this->get_cd_categoria()."',
		'".$this->get_cd_subcategoria()."',
		'".$this->get_ds_produto()."',
		'".$this->get_cd_imagem_produto()."',
		'".$this->get_vl_produto()."',
		'".$this->get_nm_tag_produto()."',
		'".$this->get_ic_produto()."'

		)";

		if($banco->query($comando) == true) {
			return "Cadastrado!";
		}
		else {
			return "Erro!";
		}
		$this->conexao->Desconectar();
		
	}

	public function alterarProduto($d)
	{
		$banco = $this->conexao->getBanco();
		$comando = "update produto set ";
		$comando .= "nm_produto = '".$this->get_nm_produto()."', ";
		$comando .= "cd_categoria = '".$this->get_cd_categoria()."', ";
		$comando .= "cd_subcategoria = '".$this->get_cd_subcategoria()."', ";
		$comando .= "ds_produto = '".$this->get_ds_produto()."', ";
		$comando .= "cd_imagem_produto = '".$this->get_cd_imagem_produto()."', ";
		$comando .= "vl_produto = '".$this->get_vl_produto()."', ";
		$comando .= "nm_tag_produto = '".$this->get_nm_tag_produto()."', ";
		$comando .= "ic_produto = '".$this->get_ic_produto()."' ";
		$comando .= "where cd_produto = '".$d."'";

		if($banco->query($comando) == true) {
			header("location:index.php");
		}
		else {
			return "erro";
		}
	}

	public function deleteProduto($p) 
	{
		$banco = $this->conexao->getBanco();
		$comando = "delete from produto where ";
		$comando .= "cd_produto = '".$p."'";
		if($banco->query($comando) == true) {
			header("location:index.php");
		}
	}

	public function retornarEmail($user)
	{
		$banco = $this->conexao->getBanco();
		$this->conexao->Conectar();
		$comando = "select nm_email_usuario from usuario ";
		$comando .= "where cd_usuario = '".$user."'";
		$resultado = $banco->query($comando);
		$row = $resultado->fetch_assoc();
		$nm_email = $row["nm_email_usuario"];
		return $nm_email;
	}
}

?>