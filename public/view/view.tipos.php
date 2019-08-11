<?php
$dados = $_REQUEST['dados'];
?>
<div class="container">
<div class="d-flex justify-content-between my-3">
	<div>
		<?php include'view.pesquisa.php'; ?>
	</div>
	<div>
		<a href="?c=cadastro"><button class="btn btn-primary">Cadastrar tipo de produto</button></a>
	</div>
</div>
<?php if(is_array($dados)): ?>
<table class="table table-striped bg-light rounded-lg">
	<tr>
		<th>Titulo</th>
		<th>Porcentagem do tributo</th>
		<th>Opções</th>
	</tr>

	<?php foreach($dados as $val): ?>
	<tr>
		<td><?php echo$val['titulo']; ?></td>
		<td><?php echo$val['percent']; ?>%</td>
		<td>
			<a href="?c=edite&id=<?php echo$val['id']; ?>"><button class="btn btn-success">Editar</button></a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php else: ?>
<div class="bg-light rounded-lg p-2 text-center">
<h3>Nenhum resultado!</h3>
</div>
<?php endif; ?>
</div>