<?php
$dados = $_REQUEST['dados'];
?>

<div class="container">
<div class="bg-light p-3 mt-3 rounded-lg">
<h1 class="text-center">Edite as informações de uma categoria</h1>

<form method="POST" action="?c=atualizar&id=<?php echo$dados['id'] ?>" class="form-row">
	<div class="input-group col">
	<div class="input-group-append"><label for="titulo" class="input-group-text">Titulo da categoria</label></div>
	<input type="text" name="titulo" id="titulo" class="form-control" value='<?php echo$dados['titulo']; ?>' required>
	</div>

	<div class="input-group col">
	<div class="input-group-append"><label for="percent" class="input-group-text">Porcentagem de tributos</label></div>
	<input type="number" name="percent" id="percent" min="0" max="100" class="form-control" value='<?php echo$dados['percent']; ?>' required>
	</div>

	<button class="btn btn-success mx-2" type="submit">Atualizar</button>
	<br>
</form>
</div>
</div>