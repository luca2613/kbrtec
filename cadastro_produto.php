<?php 
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
	<meta charset="utf-8">
	<title>Config Produto</title>
	<link rel="stylesheet" href="css/estilo.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<?php include("head.php");?>
	<main>
		<form method="post" action=""  enctype="multipart/form-data">
			<?php 
			$d = "";
			if(isset($_GET["d"])) {
				$d = $_GET["d"];
			}
			if($d == "") {

			?>
			<p>
				<label for="nm_produto">Nome</label>
				<br>
				<input type="text" name="nm_produto" required>
			</p>
			<p>
				<label for="sl_categoria">Categoria</label>
				<br>
				<select id="sl_categoria" name="sl_categoria" required>
					<option value="">Selecione a categoria</option>
					<?php 
					require_once("classes/clsProduto.php");
					$produto = new clsProduto($classe_banco);
					echo $produto->selectDinamico();

					?>
				</select>
			</p>
			<p>
				<label for="sl_sub">Subcategoria</label>
				<br>
				<select id="sl_sub" name="sl_sub" required>
					<option value="">Selecione a subcategoria</option>
				</select>
			</p>
			
				<label for="ds_produto">Descrição</label>
				<br>
				<textarea name="ds_produto" id="ds_produto"></textarea>
			
			<p>
				<label for="cd_imagem">Imagem</label>
				<br>
				<input type="file" name="cd_imagem" id="cd_imagem" required>
			</p>
			<p>
				<label for="vl_produto">Valor</label>
				<br>
				<input type="text" name="vl_produto" id="vl_produto" required>
			</p>
			<p>
				<label for="nm_tag">Tag</label>
				<br>
				<input type="text" name="nm_tag">
			</p>
			<p>
				<label>Status</label>
				<br>
				<select class="select_status" name="select_status" required>
					<option value="0">Ativo</option>
					<option value="1">Inativo</option>
				</select>
			</p>
			<?php 
			} 
			if(!$d == "") {
				if(isset($_GET["d"])) {
				$d = $_GET["d"];
				$banco = $classe_banco->getBanco();
				$comando = "select * from produto ";
				$comando .= "where cd_produto = '".$d."'";
				$resultado = $banco->query($comando);
				$row = $resultado->fetch_assoc();
				}
				//
			?>
			<p>
				<label for="nm_produto">Nome</label>
				<br>
				<input type="text" name="nm_produto" required value="<?php echo $row["nm_produto"] ?>">
			</p>
			<p>
				<label for="sl_categoria">Categoria</label>
				<br>
				<select id="sl_categoria" name="sl_categoria" required>
					<option value="">Selecione a categoria</option>
					<?php 
					require_once("classes/clsProduto.php");
					$produto = new clsProduto($classe_banco);
					echo $produto->selectDinamico();

					?>
				</select>
			</p>
			<p>
				<label for="sl_sub">Subcategoria</label>
				<br>
				<select id="sl_sub" name="sl_sub" required>
					<option value="">Selecione a subcategoria</option>
				</select>
			</p>
						
			<label for="ds_produto">Descrição</label>
			<br>
			<textarea name="ds_produto" id="ds_produto"><?php echo $row["ds_produto"]; ?></textarea>
						
			<p>
				<label for="cd_imagem">Imagem</label>
				<br>
				<input type="file" name="cd_imagem" id="cd_imagem" required value="<?php echo $row["cd_imagem_produto"] ?>">
			</p>

			<p>
				<label for="vl_produto">Valor</label>
				<br>
				<input type="text" name="vl_produto" id="vl_produto" required value="<?php echo $row["vl_produto"] ?>">
			</p>
			<p>
				<label for="nm_tag">Tag</label>
				<br>
				<input type="text" name="nm_tag" value="<?php echo $row["nm_tag_produto"] ?>">
			</p>
			<p>
				<label>Status</label>
				<br>
				<select class="select_status" name="select_status" required>
					<option value="0">Ativo</option>
					<option value="1">Inativo</option>
				</select>
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
<script>
ClassicEditor.create(document.getElementById('ds_produto'));

$(document).ready(function(){
	$("#sl_categoria").change(function(){
		var categoria_id = $(this).val();
		$.ajax({
			url:"selectDinamico.php",
			method:"POST",
			data:{categoriaId:categoria_id},
			dataType:"text",
			success:function(data)
			{
				$("#sl_sub").html(data);
			}
		});
	});
});
</script>
<?php 
require_once("email_produto.php");
if(isset($_GET["d"])) {
	$d = $_GET["d"];
}
if(isset($_POST["nm_produto"])) {
	if(!empty($_POST["nm_produto"])) {
		$nm_produto = $_POST["nm_produto"];
		
	}
}

if(isset($_POST["sl_categoria"])) {
	if(!empty($_POST["sl_categoria"])) {
		$sl_categoria = $_POST["sl_categoria"];	
		
	}
}
	
if(isset($_POST["sl_sub"])) {			
	if(!empty($_POST["sl_sub"])) {
		$sl_sub = $_POST["sl_sub"];
		
	}
}


if(isset($_POST["nm_tag"])) {						
	if(!empty($_POST["nm_tag"])) {
		$nm_tag = $_POST["nm_tag"];
		
	}
}

if(isset($_POST["select_status"])) {
	if(!empty($_POST["select_status"])) {
		$select_status = $_POST["select_status"];
		$produto->set_ic_produto($select_status);
		
	}
}			
$produto->set_cd_produto("DEFAULT");

if (isset($_FILES['cd_imagem'])) {
	if(!empty($_FILES["cd_imagem"])) {
		$ext = strtolower(substr($_FILES['cd_imagem']['name'], -4));
		$novo_nome = "img" . time() . $ext;
		$diretorio = "imagens/";
		move_uploaded_file($_FILES['cd_imagem'] ['tmp_name'],$diretorio.$novo_nome);
		$produto->set_cd_imagem_produto($diretorio.$novo_nome);
		$produto->set_nm_produto($nm_produto);
		$produto->set_cd_categoria($sl_categoria);
		$produto->set_cd_subcategoria($sl_sub);
		$produto->set_nm_tag_produto($nm_tag);
		
		if(isset($_POST["ds_produto"])) {				
			
			if(!empty($_POST["ds_produto"])) {
				$ds_produto = $_POST["ds_produto"];
				$troca = array("<p>", "</p>");
				$ds_produto_final = str_replace($troca, "", $ds_produto);
				$produto->set_ds_produto($ds_produto);
				
				if($d == "")  {

					if(isset($_POST["vl_produto"])) {					
						
						if(!empty($_POST["vl_produto"])) {
							
							$vl_produto = $_POST["vl_produto"];
							$vl_produto = str_replace(",", ".", $vl_produto);
							$vl_produto = floatval($vl_produto);
							
							if(is_numeric($_POST["vl_produto"])) {
								
								$produto->set_vl_produto($vl_produto);
								echo $produto->cadastrarProduto();
								enviarEmail($_POST["nm_produto"], $produto->retornarEmail($cd_usuario));
							}
							else {
								echo "digite um preço válido";
							}	
							
						}
					}
				}	
				elseif($d != "") {
					echo $produto->alterarProduto($d);
				}
				
			}
			else {
				echo "preencha todos os campos";
			}
		}
	}
}	

?>