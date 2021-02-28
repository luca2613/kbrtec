<?php 
include("session.php");
$topico = "produtos";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Painel - Restaurante</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<?php include("head.php"); ?>
	<div class="container">
	

		<?php 
		require_once("classes/clsListagem.php");
		require_once("classes/clsUsuario.php");
		$listagem = new clsListagem($classe_banco);
		$classe_usuario = new clsUsuario($classe_banco);
		?>

	
		<?php  
		if(isset($_GET["topico"])) {
			$topico = $_GET["topico"];
		}

		if($topico == "produtos") {
	
		
		?>

			<div class="todos_produtos">
				<p>Produtos</p>
				<select id="categoria">
				<option value="">Todos produtos</option>
				<?php 
				$listagem->listarOption();
			    ?>
				</select>
					<div id="mostrarT">
					<?php 

					$listagem->listarTodosProdutos($cd_usuario);
				 	?>
					</div>
			</div>

			<?php
			}
			if($topico == "categorias") {
				echo "<p>categorias</p>";
			?>

			<div class="mostrarCategorias">
				<?php 
				$listagem->listarCategorias($cd_usuario);
				?>
			</div>

			<?php
			}
			if($topico == "subcategorias") {
				echo "<p>subcategoria</p>";
			?>
			<div class="mostrarCategorias">
				<?php 
				$listagem->listarSubcategorias($cd_usuario);
				?>
			</div>
			<?php } ?>
			<?php
			if($topico == "usuarios") {
				echo "<p>Usuarios</p>";
			?>
			<div class="mostrarUsuarios">
				<?php 
				$classe_usuario->listarUsuario();
				?>
			</div>
			<?php } ?>
		
	</div>
	</main>
</body>
</html>
<script>
$(document).ready(function(){
	$("#categoria").change(function(){
		var categoria_id = $(this).val();
		$.ajax({
			url:"lista_p.php",
			method:"POST",
			data:{categoria_id:categoria_id},
			success:function(data)
			{
				$("#mostrarT").html(data);
			}
		});
	});
});
</script>