<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - Restaurante</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post" action="login.php">
		<p>
			<input type="text" name="nome" id="nome" required>	
		</p>
		<p>
			<input type="password" name="senha" id="senha" required>
		</p>
		<p>
			<input type="submit" id="entrar" value="Entrar">
		</p>
	</form>
</body>
</html>

<?php 
require("classes/clsBanco.php");


$classe_banco = new clsBanco();
$classe_banco->Conectar();
$banco = $classe_banco->getBanco();


if(isset($_POST['nome']) and $_POST['senha']) {
	
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$senha_md5 = md5($senha);

	$comando = "select * ";
	$comando .= "from usuario ";
	$comando .= "where nm_usuario = '".$nome."' and ";
	$comando .= "nm_senha_usuario = '".$senha_md5."'";
	$resultado = $banco->query($comando);
	if($resultado->num_rows) {
		$row = $resultado->fetch_assoc();
		session_start();
		$_SESSION["nome"] = $nome;
		$_SESSION["senha"] = $senha_md5;
		$_SESSION["cd_usuario"] = $row["cd_usuario"];
		header("location:index.php");
	}
	else {
		echo "login inválido";
	}
}


	




?>

