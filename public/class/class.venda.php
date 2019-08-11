<?php
/**
 * 
 */
class Venda extends Query
{
	public $subtotal = 0;
	public $tributos = 0;
	public $total = 0;

	public function listar($class,$session)
	{
		if(isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])){
		$i = 0;
		$dados = [];
		foreach($_SESSION['carrinho'] as $id => $quantidade){
			$dado = $class->listar($id);
			$precoTotal = ($dado[0]['preco']*$quantidade);
			$tributo = (($dado[0]['preco']/100)*$dado[0]['percent'])*$quantidade;
			$totalTributo = ($tributo+$precoTotal);

			$dados[$i] = $dado[0];
			$dados[$i]['quantidade'] = $quantidade;
			$dados[$i]['precoTotal'] = number_format($precoTotal, 2);
			$dados[$i]['tributo'] = number_format($tributo, 2);
			$dados[$i]['total'] = number_format($totalTributo, 2);

			$i++;

			$this->subtotal += $precoTotal;
			$this->tributos += $tributo;
			$this->total += $totalTributo;
		}


		return $dados;
		}
	}

	public function criar($val)
	{
		return $_SESSION['carrinho'][$val['id']] = $val['quantidade'];
	}

	public function remover($id)
	{
		unset($_SESSION['carrinho'][$id]);
		return true;
	}

	public function esvaziar()
	{
		unset($_SESSION['carrinho']);
		return true;
	}

	public function finalizar()
	{
		if(isset($_SESSION['carrinho'])) {
			$produto = new Produto;
			$dados = $this->listar($produto,$_SESSION);
			$total = 0;
			foreach ($dados as $value) {
				$total += $value['total'];			}
			$this->esvaziar();
			return $total;
		}
	}

	public function getTotal()
	{
		$var['total'] = number_format($this->total,2);
		$var['subtotal'] = number_format($this->subtotal,2);
		$var['tributos'] = number_format($this->tributos,2);

		return $var;
	}
}
?>