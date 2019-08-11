<?php
/**
 * 
 */
class Produto extends Query
{
	public $id;
	public $titulo;
	public $preco;
	public $tipo;
	public $tributo;

	public function inserir($val)
	{
		$query = "INSERT INTO produtos (titulo,preco,idtipo) 
		VALUES ('".$val['titulo']."',".$val['preco'].",".$val['tipo'].")";
		return $this->alterar($query);
	}

	public function atualizar($val,$id)
	{
		$query = "UPDATE produtos 
		SET (titulo,preco,idtipo) = ('".$val['titulo']."',".$val['preco'].",".$val['tipo'].")
		WHERE id = $id";
		return $this->alterar($query);
	}

	public function deletar($id)
	{
		$query = "DELETE FROM produtos WHERE id = $id";
		return $this->alterar($query);
	}

	public function listar($id)
	{
		$query = "SELECT produtos.*,tipo.percent,tipo.titulo as categoria 
		FROM produtos
		LEFT JOIN tipo ON produtos.idtipo = tipo.id
		WHERE produtos.id = '$id'";
		$res = $this->listAll($query);
		return $this->calcularTributo($res);
	}

	public function listarTodos()
	{
		$query = "SELECT produtos.*,tipo.percent,tipo.titulo as categoria 
		FROM produtos
		LEFT JOIN tipo ON produtos.idtipo = tipo.id";
		$res = $this->listAll($query);
		return $this->calcularTributo($res);
	}

	public function pesquisar($val)
	{
		$query = "SELECT produtos.*,tipo.percent,tipo.titulo as categoria 
		FROM produtos
		LEFT JOIN tipo ON produtos.idtipo = tipo.id
		WHERE produtos.titulo ILIKE '%$val%'";
		$res = $this->listAll($query);
		if (is_array($res)){
			return $this->calcularTributo($res);
		}
	}

	public function calcularTributo($val)
	{
		if(!empty($val)){
		foreach ($val as $key => $dado) {
			$val[$key]['tributo'] = number_format((($dado['preco']/100)*$dado['percent']), 2);
			$val[$key]['total'] = number_format(($val[$key]['tributo']+$dado['preco']), 2);
		}

		return $val;
		}
	}

	public function calcularTributoTotal($val)
	{
		foreach ($val as $key => $dado) {
			$precoTotal = ($dado['preco']*$dado['quantidade']);
			$tributo = (($dado['preco']/100)*$dado['percent'])*$dado['quantidade'];
			$totalTributo = ($tributo+$dado['preco'])*$dado['quantidade'];

			var_dump($precoTotal);
			
			$val[$key]['precoTotal'] = number_format($precoTotal, 2);
			$val[$key]['tributo'] = number_format($tributo, 2);
			$val[$key]['total'] = number_format($totalTributo, 2);

		}

		return $val;
	}
}
?>