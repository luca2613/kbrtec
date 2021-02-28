<?php include("session.php");?>
<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
	<meta charset="utf-8">
	<title>Cadastrar produto</title>
	<link rel="stylesheet" href="css/estilo.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<?php include("head.php");?>
	<main>
		<form method="post" action=""  enctype="multipart/form-data">
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
					$produto_update = new clsProduto($classe_banco);
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
			<p>
				<input type="submit" value="Cadastrar">
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