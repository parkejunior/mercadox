<?php
$dados = $_REQUEST['dados'];
$total = $_REQUEST['total'];
?>

<div class="container">
<div class="bg-dark rounded-lg mt-3">
<h3 class="text-white d-inline ml-3">Carrinho</h3>

<?php if(is_array($dados)): ?>
<a href="?c=esvaziar"><button class="btn btn-sm btn-danger m-2">Esvaziar carrinho</button></a>
<table class="table table-light table-striped">
	<tr>
		<th>Produto</th>
		<th>Quantidade</th>
		<th>Preço</th>
		<th>Subtotal</th>
		<th>Tributos</th>
		<th>Total</th>
		<th>Tributo sobre item</th>
		<th>Opções</th>
	</tr>
	<?php foreach($dados as $val): ?>
	<tr>
		<td><?php echo$val['titulo']; ?></td>
		<td><?php echo$val['quantidade']; ?></td>
		<td>R$ <?php echo$val['preco']; ?></td>
		<td>R$ <?php echo$val['precoTotal']; ?></td>
		<td>R$ <?php echo$val['tributo']; ?></td>
		<td>R$ <?php echo$val['total']; ?></td>>
		<td><?php echo$val['percent']; ?>%</td>
		<td>
		<a href="?c=remover&id=<?php echo$val['id']; ?>"><button class="btn btn-danger">Remover</button></a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php else: ?>
<div class="p-2 text-center bg-white">
<h3>Seu carrinho está vazio!</h3>
</div>
<?php endif; ?>

<div class="text-white d-flex justify-content-between align-items-end p-2 bg-success rounded-bottom">
	<span>Subtotal<h1>R$ <?php echo$total['subtotal']; ?></h1></span>
	<span>Tributos<h1>R$ <?php echo$total['tributos']; ?></h1></span>
	<span>Total<h1>R$ <?php echo$total['total']; ?></h1></span>
	
	<a <?php echo is_array($dados)?'href="?c=finalizar"':'disabled'; ?> class="btn btn-outline-light"><h2>Finalizar compra</h2></a>
</div>

</div>
</div>