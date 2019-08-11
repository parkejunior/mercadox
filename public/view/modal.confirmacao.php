<?php
$dados = $_REQUEST['dados'];
?>

<div class="modal fade" id="modalCustom">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-success">
			Confirmação
		</div>
		<div class="modal-body">
			O item foi <?php echo$dados; ?> com sucesso!
		</div>
		<div class="modal-footer">
			<button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		</div>
	</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#modalCustom').modal();
	});
</script>