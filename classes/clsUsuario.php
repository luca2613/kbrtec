
<?php 
class clsUsuario extends clsBanco
{
	private $cd_usuario;
	private $cd_nivel_usuario;
	private $nm_usuario;
	private $nm_senha_usuario;
	private $nm_email_usuario;
	private $conexao;

	public function get_cd_usuario()
	{
		return $this->cd_usuario;
	}
	public function set_cd_usuario($cd_usuario)
	{
		$this->cd_nivel_usuario = $cd_usuario;
	}
	public function get_cd_nivel_usuario()
	{
		return $this->cd_nivel_usuario;
	}
	public function set_cd_nivel_usuario($cd_nivel_usuario)
	{
		$this->cd_nivel_usuario = $cd_nivel_usuario;
	}
	public function get_nm_usuario()
	{
		return $this->nm_usuario;
	}
	public function set_nm_usuario($nm_usuario)
	{
		$this->nm_usuario = $nm_usuario;
	}
	public function get_nm_senha_usuario()
	{
		return $this->nm_senha_usuario;
	}
	public function set_nm_senha_usuario($nm_senha_usuario)
	{
		$this->nm_senha_usuario = $nm_senha_usuario;
	}
	public function get_nm_email_usuario()
	{
		return $this->nm_email_usuario;
	}
	public function set_nm_email_usuario($nm_email_usuario)
	{
		$this->nm_email_usuario = $nm_email_usuario;
	}

	public function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function selectNivelUsuario()
	{
		$banco = $this->conexao->getBanco();
		$comando = "select * from nivel_usuario";
		$resultado = $banco->query($comando);
		if($resultado->num_rows > 0) {
			while($row = $resultado->fetch_assoc()) {
				echo "<option value=".$row["cd_nivel_usuario"].">". $row["nm_nivel_usuario"] ."</option>" ;
			}
		}
	}

	public function listarUsuario()
	{
		$banco = $this->conexao->getBanco();
		$comando = "select * from usuario";
		$resultado = $banco->query($comando);
		if($resultado->num_rows > 0) {
			while($row = $resultado->fetch_assoc()) {
				echo "<p>" . $row["nm_usuario"] . " / " . $row["nm_email_usuario"] . "</p>";
			}
		}
	}

	public function cadastrarUsuario()
	{
		$banco = $this->conexao->getBanco();
		$comando = "insert into usuario ";
		$comando .= "values ";
		$comando .= "('".$this->get_cd_usuario()."', '".$this->get_cd_nivel_usuario()."', '".$this->get_nm_usuario()."', '".$this->get_nm_senha_usuario()."', '".$this->get_nm_email_usuario()."')";

		if($banco->query($comando) == true) {
			header("location:index.php");
		}
		else {
			return "erro";
		}
	}

}

