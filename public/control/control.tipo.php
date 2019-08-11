<?php
/**
 * 
 */
class tipoControl
{
	public function index()
	{
		$tipo = new Tipo;
		$dados = $tipo->listarTodos();
		$_REQUEST['dados'] = $dados;

		include('view/view.tipos.php');
	}

	public function cadastro()
	{
		include('view/view.cadastroTipo.php');
	}

	public function cadastrar()
	{
		$tipo = new Tipo;

		if($tipo->inserir($_POST)){
			$_REQUEST['dados'] = 'cadastrado';
		}
		
		include('view/modal.confirmacao.php');
		$this->index();
	}

	public function pesquisar()
	{
		$s = isset($_POST['pesquisa'])?$_POST['pesquisa']:NULL;
		$tipo = new Tipo;
		$dados = $tipo->pesquisar($s);

		$_REQUEST['dados'] = $dados;

		include('view/view.tipos.php');
	}

	public function edite()
	{
		$id = isset($_GET['id'])?$_GET['id']:NULL;

		$tipo = new Tipo;
		$dados = $tipo->listar($id);
		$_REQUEST['dados'] = $dados;

		include('view/view.editarTipo.php');
	}

	public function atualizar()
	{
		$tipo = new Tipo;

		if($tipo->atualizar($_POST,$_GET['id'])){
			$_REQUEST['dados'] = 'atualizado';
		}
		
		include('view/modal.confirmacao.php');
		$this->index();
	}
}
?>