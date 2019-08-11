<?php
class Conexao
{
	private $host = "localhost";
	private $dbname = "mercadox";
	private $user = "postgres";
	private $pass = "root";

	private function conectar()
	{
		$pg_str = "host=$this->host dbname=$this->dbname user=$this->user password=$this->pass";
		$con = pg_connect($pg_str) or die("Error na conexão com PostgreSQL");

		return $con;
	}

	protected function executar($query)
	{
		$con = $this->conectar();
		$result = pg_query($con, $query);

		return $result;
	}
}
?>