<?php
/**
 * 
 */
class Tipo extends Query
{
	private $id;
	private $titulo;
	private $percent;

	public function inserir($val)
	{
		$query = "INSERT INTO tipo (titulo,percent) VALUES ('".$val['titulo']."',".$val['percent'].")";
		return $this->alterar($query);
	}

	public function atualizar($val,$id)
	{
		$query = "UPDATE tipo SET (titulo,percent) = ('".$val['titulo']."',".$val['percent'].")
		WHERE id = $id";
		return $this->alterar($query);
	}

	public function deletar($id)
	{
		$query = "DELETE FROM tipo WHERE id = $id";
		return $this->alterar($query);
	}

	public function listar($id)
	{
		$query = "SELECT * FROM tipo WHERE id = '$id'";
		return $this->list($query);
	}

	public function listarTodos()
	{
		$query = "SELECT * FROM tipo ORDER BY titulo";
		return $this->listAll($query);
	}

	public function pesquisar($val)
	{
		$query = "SELECT * FROM tipo WHERE titulo ILIKE '%$val%' ORDER BY titulo";
		return $res = $this->listAll($query);
	}
}
?>