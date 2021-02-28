<?php include("session.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Config categoria</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("head.php"); ?>
	<main>
		<form method="post" action="">
			<?php 
			$d = "";
			if(isset($_GET["d"])) {
				$d = $_GET["d"];
			}
			if($d == "") {

			?>
			<p>
				<label for="nm_categoria">Nome</label>
				<br>
				<input type="text" name="nm_categoria" id="nm_categoria">
			</p>


			<?php 
			} 
			if(!$d == "") {
				if(isset($_GET["d"])) {
				$d = $_GET["d"];
				$banco = $classe_banco->getBanco();
				$comando = "select * from categoria ";
				$comando .= "where cd_categoria = '".$d."'";
				$resultado = $banco->query($comando);
				$row = $resultado->fetch_assoc();
				}
				//

			?>

			<p>
				<label for="nm_categoria">Nome</label>
				<br>
				<input type="text" name="nm_categoria" id="nm_categoria" value="<?php echo $row["nm_categoria"] ?>">
			</p>
			<?php } ?>
			<p>
				<?php 
				if($d == "") {
				?>
				<input type="submit" value="Cadastrar">
				<?php } ?>
				<?php  
				if(!$d == "") {
				?>
				<input type="submit" value="Editar">
				<?php } ?>
			</p>			
		</form>
	</main>
</body>
</html>
<?php 
require_once("classes/clsCategoria.php");

if(isset($_GET["d"])) {
	$d = $_GET["d"];
}

$categoria = new clsCategoria($classe_banco);
$categoria->set_cd_categoria("DEFAULT");

if(isset($_POST["nm_categoria"])) {
	if(!empty($_POST["nm_categoria"])) {
		$nm_categoria = $_POST["nm_categoria"];
		$categoria->set_nm_categoria($nm_categoria);
		if($d == "") {
			echo $categoria->cadastrarCategoria();
		}
		elseif($d != "") {
			echo $categoria->alterarCategoria($d);
		}
		
	}
	else {
		echo "Digite o nome da categoria";
	}
}

?>