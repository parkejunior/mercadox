<?php
/**
 * 
 */
class vendaControl
{
	public function index()
	{
		$_REQUEST['dados'] = true;
		include('view/view.venda.php');

		$produtos = new Produto;
		$venda = new Venda;
		$dados = $venda->listar($produtos,$_SESSION);
		$_REQUEST['dados'] = $dados;
		$_REQUEST['total'] = $venda->getTotal();

		include('view/view.carrinho.php');
	}

	public function pesquisar()
	{
		$s = isset($_POST['pesquisa'])?$_POST['pesquisa']:NULL;
		$produtos = new Produto;
		$_REQUEST['dados'] = $produtos->pesquisar($s);

		include('view/view.venda.php');

		$venda = new Venda;
		$dados = $venda->listar($produtos,$_SESSION);
		
		$_REQUEST['dados'] = $dados;
		$_REQUEST['total'] = $venda->getTotal();

		include('view/view.carrinho.php');
	}

	public function adicionar()
	{
		$venda = new Venda;

		if($venda->criar($_POST)){
			$_REQUEST['dados'] = 'Adicionado ao carrinho';
		}
		
		include('view/alert.confirmacao.php');
		$this->index();
	}

	public function remover()
	{
		$venda = new Venda;

		if($venda->remover($_GET['id'])){
			$_REQUEST['dados'] = 'Removido do carrinho';
		}
		
		include('view/alert.confirmacao.php');
		$this->index();
	}

	public function esvaziar()
	{
		$venda = new Venda;

		if($venda->esvaziar()){
			$_REQUEST['dados'] = 'Carrinho esvavziado';
		}
		
		include('view/alert.confirmacao.php');
		$this->index();
	}

	public function finalizar()
	{
		$venda = new Venda;
		$_REQUEST['dados'] = $venda->finalizar();

		include('view/view.nota.php');
	}
}
?>