<?php
$dados = $_REQUEST['dados'];
?>

<div id="modal"></div>

<div class="container">
<div class="d-flex justify-content-between my-3">
	<div>
		<?php include'view.pesquisa.php'; ?>
	</div>
	<div>
		<a href="?c=cadastro"><button class="btn btn-primary">Cadastrar produto</button></a>
	</div>
</div>

<?php if(is_array($dados)): ?>
<table class="table bg-light table-striped rounded-lg">
	<tr>
		<th>Produto</th>
		<th>Preço</th>
		<th>Tipo</th>
		<th>Porcentagem</th>
		<th>Tributo</th>
		<th>Total</th>
		<th>Opções</th>
	</tr>

	<?php foreach($dados as $val): ?>
	<tr>
		<td><?php echo$val['titulo']; ?></td>
		<td>R$ <?php echo$val['preco']; ?></td>
		<td><?php echo$val['categoria']; ?></td>
		<td><?php echo$val['percent']; ?>%</td>
		<td>R$ <?php echo$val['tributo']; ?></td>
		<td>R$ <?php echo$val['total']; ?></td>
		<td>
			<a href="?c=edite&id=<?php echo$val['id']; ?>"><button class="btn btn-success">Editar</button></a>
			<button class="btn btn-danger" onclick="deletar(<?php echo$val['id']; ?>);">Deletar</button>
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