<?php 
$dados = $_REQUEST['dados'];
?>

<div class="container">
<div class="d-flex justify-content-between my-3">
	<div>
		<?php include'view.pesquisa.php'; ?>
	</div>
</div>

<?php if(is_array($dados)): ?>
<table class="table table-striped bg-light rounded-lg">
	<tr>
		<th>Produto</th>
		<th>Preço</th>
		<th>Tipo</th>
		<th>Porcentagem</th>
		<th>Tributo</th>
		<th>Total com tributos</th>
		<th>Quantidade</th>
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
		<form action="?c=adicionar" method="POST">
		<td>
			<input type="hidden" name="id" value="<?php echo$val['id']; ?>">
			<input type="number" name="quantidade" value="1" min="1" class="form-control">
		</td>
		<td>
			<button type="submit" class="btn btn-success">Colocar no carrinho</button>
		</td>
		</form>
	</tr>
	<?php endforeach; ?>
</table>
<?php elseif($dados): ?>
<div class="bg-light rounded-lg p-2 text-center">
<h3>Pesquise por algum produto!</h3>
</div>
<?php else: ?>
<div class="bg-light rounded-lg p-2 text-center">
<h3>Nenhum resultado!</h3>
</div>
<?php endif; ?>
</div>