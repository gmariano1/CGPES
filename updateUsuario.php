<?php
include("banco.php");
extract ($_POST);

if(isset($_POST['novoEmail'])){
	$novoEmail = mysqli_escape_string($link, $_POST['novoEmail']);
}
if(isset($_POST['novoNome'])){
	$novoNome = mysqli_escape_string($link, $_POST['novoNome']);
}
if(isset($_POST['novaSenha'])){
	$novaSenha = mysqli_escape_string($link, $_POST['novaSenha']);
}
if(isset($_POST['novoPerfil'])){
	$novoPerfil = mysqli_escape_string($link, $_POST['novoPerfil']);
}
//verificar se o email é valido
if(filter_var($novoEmail, FILTER_VALIDATE_EMAIL) == false){
    header("location:main.php?verifica=e&id=".$id);
    return false;
}
//verificar se o perfil é valido
if($novoPerfil != 'A' && $novoPerfil != 'T'){
	header("location:main.php?verifica=p&id=".$id);
	return false;
}
if(empty($novoEmail)||empty($novaSenha||empty($novoPerfil))){
	header("location:main.php?errocadastro=e&id=".$id);
	return false;
}else{
	$hashSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
	if(mysqli_query($link,"update usuario set email = '$novoEmail', nome = '$novoNome', senha = '$hashSenha', perfil = '$novoPerfil' where id = '$id';")){
		header("location:main.php?verifica=u");
	}else{
		echo mysqli_error();
		exit;
	}
}
?>