<?php
/**
 * 
 */
class Query extends Conexao
{
	public function alterar($query)
	{
		$res = $this->executar($query);

		if(pg_result_error($res) === false){
			return false;
		}else{
			return true;
		}
	}

	public function list($query)
	{
		$res = $this->executar($query);

		return pg_fetch_assoc($res);
	}

	public function listAll($query)
	{
		$res = $this->executar($query);

		return pg_fetch_all($res);
	}
}
?>