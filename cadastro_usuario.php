<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Config Usuario</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<?php include("head.php"); ?>
	<main>
		<form method="post" action="">
			<p>
				<label for="cd_nivel_usuario">Nivel usuario</label>
				<br>
				<select class="cd_nivel_usuario" name="cd_nivel_usuario">
					<?php 
					require_once("classes/clsUsuario.php");
					$classe_usuario = new clsUsuario($classe_banco);
					$classe_usuario->selectNivelUsuario();
					?>
				</select>
			</p>
			<p>
				<label for="nm_categoria">Nome</label>
				<br>
				<input type="text" name="nm_usuario" id="nm_usuario" required>
			</p>
			<p>
				<label for="nm_senha_usuario">Senha</label>
				<br>
				<input type="password" name="nm_senha_usuario" id="nm_senha_usuario" required>
			</p>
			<p>
				<label for="nm_email_usuario">Email</label>
				<br>
				<input type="text" name="nm_email_usuario" id="nm_email_usuario" required>
			</p>
			<p>
				<input type="submit" id="btn_cadastro_usuario" value="Cadastrar">
			</p>

		</form>
	</main>
</body>
</html>

<?php 

$classe_banco->Conectar();

$classe_usuario->set_cd_usuario("DEFAULT");

if(isset($_POST["cd_nivel_usuario"])) {
	if(!empty($_POST["cd_nivel_usuario"])) {
		$cd_nivel_usuario = $_POST["cd_nivel_usuario"];
		$classe_usuario->set_cd_nivel_usuario($cd_nivel_usuario);

		if(isset($_POST["nm_usuario"])) {
			if(!empty($_POST["nm_usuario"])) {
				$nm_usuario = $_POST["nm_usuario"];
				$classe_usuario->set_nm_usuario($nm_usuario);

				if(isset($_POST["nm_senha_usuario"])) {
					if(!empty($_POST["nm_senha_usuario"])) {
						$nm_senha_usuario = $_POST["nm_senha_usuario"];
						$classe_usuario->set_nm_senha_usuario($nm_senha_usuario);

						if(isset($_POST["nm_email_usuario"])) {
							if(!empty($_POST["nm_email_usuario"])) {
								$nm_email_usuario = $_POST["nm_email_usuario"];
								$classe_usuario->set_nm_email_usuario($nm_email_usuario);
								$classe_usuario->cadastrarUsuario();
							}
						}
					}
				}
			}
		}
	}
}

?>