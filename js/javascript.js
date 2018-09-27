/*Função que substitui url para excluir servidor pelo id*/
function getIDServidor(id){
	document.getElementById("getIDServidor").href = "excluir.php?id=" + id;
}
/*Função que substitui url para excluir usuário pelo id*/
function getIDUsuario(id){
	document.getElementById("getIDUsuario").href = "excluirUsuario.php?id=" + id;
}
