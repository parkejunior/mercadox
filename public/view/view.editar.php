<?php
$dados = $_REQUEST['dados'];
$dadosTipo = $_REQUEST['dadosTipo'];
?>

<div class="container">
<div class="bg-light rounded-lg mt-3">
<h1 class="text-center">Edite as informações de um produto</h1>

<div class="p-3">
<form method="POST" action="?c=atualizar&id=<?php echo$dados['id'] ?>" class="form-row">
	<div class="input-group col">
	<div class="input-group-append"><label for="titulo" class="input-group-text">Titulo</label></div>
	<input type="text" name="titulo" id="titulo" value="<?php echo$dados['titulo']; ?>" class="form-control" required>
	</div>

	<div class="input-group col">
	<div class="input-group-append"><label for="preco" class="input-group-text">Preço</label></div>
	<input type="number" name="preco" id="preco" step=".01" value="<?php echo$dados['preco']; ?>" class="form-control" required>
	</div>

	<select name="tipo" class="form-control col">
		<?php foreach($dadosTipo as $t): ?>
		<option value="<?php echo$t['id']; ?>" <?php echo $t['id'] == $dados['idtipo']? 'selected':NULL; ?>>
			<?php echo$t['titulo']; ?>
		</option>
		<?php endforeach; ?>
	</select>
	<button type="submit" class="btn btn-success mx-2">Atualizar</button>
	<br>
</form>
</div>
<a href="tipos.php?c=cadastro"><button class="btn btn-primary my-2 float-right">Cadastre um novo tipo de produto</button></a>
</div>
</div>