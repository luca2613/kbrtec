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
				<label for="nm_subcategoria">Nome</label>
				<br>
				<input type="text" name="nm_subcategoria" id="nm_subcategoria">
			</p>
			<p>
				<label for="select_categoria">Categoria</label>
				<br>
				<select class="select_subC" name="select_categoria">
					<?php 
					require_once("classes/clsCategoria.php");
					$categoria = new clsCategoria($classe_banco);
					$categoria->selectCategoria();
					 ?>
				</select>
			</p>
			<?php 
			} 
			if(!$d == "") {
				if(isset($_GET["d"])) {
				$d = $_GET["d"];
				$banco = $classe_banco->getBanco();
				$comando = "select * from subcategoria ";
				$comando .= "where cd_subcategoria = '".$d."'";
				$resultado = $banco->query($comando);
				$row = $resultado->fetch_assoc();
				}
				//

			?>
			<p>
				<label for="nm_subcategoria">Nome</label>
				<br>
				<input type="text" name="nm_subcategoria" id="nm_subcategoria" value="<?php echo $row["nm_categoria"] ?>">
			</p>
			<p>
				<label for="select_categoria">Categoria</label>
				<br>
				<select class="select_subC" name="select_categoria">
					<?php 
					require_once("classes/clsCategoria.php");
					$categoria = new clsCategoria($classe_banco);
					$categoria->selectCategoria();
					 ?>
				</select>
			</p>
			<?php } ?>
			<p>
				<?php 
				if($d == "") {
				?>
				<input type="submit" value="Cadastrar" id="btn_subcategoria">
				<?php } ?>
				<?php  
				if(!$d == "") {
				?>
				<input type="submit" value="Editar" id="btn_subcategoria">
				<?php } ?>
			</p>
		</form>
	</main>
</body>
</html>

<?php 
include("classes/clsSubcategoria.php");

$classe_banco->Conectar();
$subcategoria = new clsSubcategoria($classe_banco);
$subcategoria->set_cd_subcategoria("DEFAULT");

if(isset($_POST["nm_subcategoria"])) {
	if(!empty($_POST["nm_subcategoria"])) {
		$nm_subcategoria = $_POST["nm_subcategoria"];
		$subcategoria->set_nm_subcategoria($nm_subcategoria);

		if(isset($_POST["select_categoria"])) {
			if(!empty($_POST["select_categoria"])) {
				$select_categoria = $_POST["select_categoria"];
				$subcategoria->set_cd_Scategoria($select_categoria);
				if($d == "") {
					echo $subcategoria->cadastrarSubcategoria();
				}
				elseif($d != "") {
					echo $subcategoria->alterarSubcategoria($d);
				}
			}
			else {
				echo "Selecione a categoria";
			}
		}
	}
	else {
		echo "Digite o nome da subcategoria";
	}
}



 ?>
