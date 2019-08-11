function deletar(id) {
	$('#modal').load('view/modal.deletar.php',function() {
		$('#modalDeletarLink').attr('href',"?c=deletar&id="+id);
		$("#modalDeletar").modal();
	});
}