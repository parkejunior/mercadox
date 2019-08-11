<?php
/**
 * 
 */
class produtoControl
{
	public function index()
	{
		$produtos = new Produto;
		$dados = $produtos->listarTodos();
		$_REQUEST['dados'] = $dados;

		include('view/view.produtos.php');
	}

	public function cadastro()
	{
		$tipo = new Tipo;
		$_REQUEST['dados'] = $tipo->listarTodos();

		include('view/view.cadastro.php');
	}

	public function cadastrar()
	{
		$produtos = new Produto;
		if($produtos->inserir($_POST)){
			$_REQUEST['dados'] = 'cadastrado';
		}
		
		include('view/modal.confirmacao.php');

		$this->index();
	}

	public function pesquisar()
	{
		$s = isset($_POST['pesquisa'])?$_POST['pesquisa']:NULL;
		$produtos = new Produto;
		$_REQUEST['dados'] = $produtos->pesquisar($s);

		include('view/view.produtos.php');
	}

	public function delete()
	{
		$dados['id'] = isset($_GET['id'])?$_GET['id']:NULL;
		$_REQUEST['dados'] = $dados;

		include('view/view.deletar.php');
	}

	public function deletar()
	{
		$id = isset($_GET['id'])?$_GET['id']:NULL;

		$produtos = new Produto;
		if($produtos->deletar($id)){
			$_REQUEST['dados'] = 'deletado';
		}
		
		include('view/modal.confirmacao.php');

		$this->index();
	}

	public function edite()
	{
		$id = isset($_GET['id'])?$_GET['id']:NULL;

		$produtos = new Produto;
		$dados = $produtos->listar($id);
		$_REQUEST['dados'] = $dados[0];

		$tipo = new Tipo;
		$dados = $tipo->listarTodos();
		$_REQUEST['dadosTipo'] = $dados;

		include('view/view.editar.php');
	}

	public function atualizar()
	{
		$produtos = new Produto;

		if($produtos->atualizar($_POST,$_GET['id'])){
			$_REQUEST['dados'] = 'atualizado';
		}
		
		include('view/modal.confirmacao.php');

		$this->index();
	}
}
?>