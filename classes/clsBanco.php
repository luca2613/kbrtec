<?php 
class clsBanco
{
	private $servidor;
	private $usuario;
	private $senha;
	private $scheme;
	private $banco;

	public function getServidor()
	{
		return $this->servidor;
	}
	public function setServidor($servidor)
	{
		$this->servidor = $servidor;
	}
	public function getUsuario()
	{
		return $this->usuario;
	}
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}
	public function getSenha()
	{
		return $this->senha;
	}
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}
	public function getScheme()
	{
		return $this->scheme;
	}
	public function setScheme($scheme)
	{
		$this->scheme = $scheme;
	}

	function __construct($s = "localhost", $u = "root", $p = "", $db = "db_kbrtec")
	{
		$this->setServidor($s);
		$this->setUsuario($u);
		$this->setSenha($p);
		$this->setScheme($db);
	}

	function Conectar()
	{
		$this->banco = new mysqli(
			$this->getServidor(),
			$this->getUsuario(),
			$this->getSenha(),
			$this->getScheme()
		);
		if($this->banco->connect_error)
		{
			die("erro de conexão com o banco" . $this->banco->connect_error);
		}
	}

	function getBanco()
	{
		return $this->banco;
	}
	function Desconectar()
	{
		$this->banco->close();
	}

}

?>