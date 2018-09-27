<?php
session_start();
require_once 'banco.php';
$id = $_SESSION['id_usuario'];
$sql = "SELECT senha FROM usuario WHERE id = '$id'";
$resultado = mysqli_query($link, $sql);
$dados = $resultado->fetch_array(MYSQLI_ASSOC);
extract ($_POST);
//Prevenção a injeção SQL
if(isset($_POST['novoEmail'])){
	$novoEmail = mysqli_escape_string($link, $_POST['novoEmail']);
}
if(isset($_POST['novoNome'])){
	$novoNome = mysqli_escape_string($link, $_POST['novoNome']);
}
if(isset($_POST['senha'])){
	$senha = mysqli_escape_string($link, $_POST['senha']);
}
if(isset($_POST['novaSenha'])){
	$novaSenha = mysqli_escape_string($link, $_POST['novaSenha']);
}

//verificar se o email é valido
if(filter_var($novoEmail, FILTER_VALIDATE_EMAIL) == false){
    header("location:main.php?verifica=eemail");
    return false;
}
//Verificar se o campo está em branco
if(empty($novoEmail)||empty($senha||empty($novaSenha))){
	header("location:main.php?errocadastro=e");
	return false;
}else{
	if(password_verify($senha, $dados['senha']) == true){
		$hashSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
		if(mysqli_query($link,"update usuario set email = '$novoEmail', nome = '$novoNome',senha = '$hashSenha' where id = '$id';")){
			header("location:main.php?verifica=u");
		}else{
			echo mysqli_error();
			exit;
		}
	}else{
		header("location:main.php?verifica=inc");
	}
}
?>