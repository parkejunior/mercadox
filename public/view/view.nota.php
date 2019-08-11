<?php $dados = $_REQUEST['dados']; ?>

<?php if($dados == true): ?>
<div class="container px-0 mt-3 bg-light rounded-lg">
	<h1 class="display-3 bg-warning text-center rounded-lg">Compra emitida!</h1>
	<h1 class="text-success display-2 text-center">Total a pagar: R$ <?php echo$dados; ?></h1>
	<a class="btn btn-success m-3" href="vendas.php">Fazer uma nova venda</a>
</div>
<?php endif; ?>