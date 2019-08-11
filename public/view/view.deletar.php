<?php
$dados = $_REQUEST['dados'];
?>

<h1>Deletar produto</h1>

<span>Você tem certeza que deseja deletar esse produto?</span>
<button><a href="?c=deletar&id=<?php echo$dados['id']; ?>">Sim</a></button>