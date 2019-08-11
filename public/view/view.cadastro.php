<?php
$dados = $_REQUEST['dados'];
?>


<div class="container">
<div class="bg-light p-3 mt-3 rounded-lg">
<h1 class="text-center">Cadastre um novo produto</h1>

<form method="POST" action="?c=cadastrar" class="form-row">
	<div class="input-group col">
	<div class="input-group-append"><label for="titulo" class="input-group-text">Titulo do produto</label></div>
	<input type="text" name="titulo" id="titulo" class="form-control" required>
	</div>

	<div class="input-group col">
	<div class="input-group-append"><label for="preco" class="input-group-text">Preço</label></div>
	<input type="number" name="preco" id="preco" step=".01" class="form-control" required>
	</div>

	<select name="tipo" class="form-control col">
		<?php foreach($dados as $t): ?>
		<option value="<?php echo$t['id']; ?>"><?php echo$t['titulo']; ?></option>
		<?php endforeach; ?>
	</select>
	<button class="btn btn-success mx-2" type="submit">Cadastrar</button>
	<br>
</form>
</div>
<a href="tipos.php?c=cadastro"><button class="btn btn-primary my-2 float-right">Cadastre um novo tipo de produto</button>
</div>