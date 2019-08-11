<div class="container">
<div class="bg-light p-3 mt-3 rounded-lg">
<h1 class="text-center">Cadastre uma nova categoria</h1>

<form method="POST" action="?c=cadastrar" class="form-row">
	<div class="input-group col">
	<div class="input-group-append"><label for="titulo" class="input-group-text">Titulo da categoria</label></div>
	<input type="text" name="titulo" id="titulo" class="form-control" required>
	</div>

	<div class="input-group col">
	<div class="input-group-append"><label for="percent" class="input-group-text">Porcentagem de tributos</label></div>
	<input type="number" name="percent" id="percent" min="0" max="100" class="form-control" required>
	</div>

	<button class="btn btn-success mx-2" type="submit">Cadastrar</button>
	<br>
</form>
</div>
</div>