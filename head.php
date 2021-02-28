<header>
	<div class="logo">
		<h1>Sistema - Supermercado</h1>
	</div>
	<div class="sair">
		<a href="sair.php">Sair</a>
	</div>
</header>
<main>
	<div class="barra_lateral">
	<?php 
	if($cd_usuario == 1) {
		echo "<section>";
		echo "<ul>";
		echo "<li><a href='index.php?topico=produtos'>Listar produtos</a></li>";
		echo "<li><a href='cadastro_produto.php'>Cadastrar produtos</a></li>";

		echo "</ul>";




		echo "<ul>";
		echo "<li><a href='index.php?topico=categorias'>Listar categorias</a></li>";
		echo "<li><a href='cadastro_categoria.php'>Cadastrar categorias</a></li>";

		echo "</ul>";


		echo "<ul>";
		echo "<li><a href='index.php?topico=subcategorias'>Listar subcategorias</a></li>";
		echo "<li><a href='cadastro_subcategoria.php'>Cadastrar subcategorias</a></li>";
		
		echo "</ul>";
		echo "</section>";

		echo "<ul>";
		echo "<li><a href='index.php?topico=usuarios'>Listar Usuarios</a></li>";
		echo "<li><a href='cadastro_usuario.php'>Cadastrar usuarios</a></li>";

		echo "</ul>";
	}
	else {
		echo "<section>";
		echo "<ul>";
		echo "<li><a href='index.php?topico=produtos'>Listar produtos</a></li>";
		echo "</ul>";

		echo "<ul>";
		echo "<li><a href='index.php?topico=categorias'>Listar categorias</a></li>";
		echo "</ul>";

		echo "<ul>";
		echo "<li><a href='index.php?topico=subcategorias'>Listar subcategorias</a></li>";
		echo "</ul>";
		echo "</section>";
	}

	?>
	</div>