<?php
//Iniciar sessão
session_start();
//Adicionar banco de dados
require_once 'banco.php';
//Extrair dados 
extract($_POST);
//Prevenção a injeção SQL
if(isset($_POST['email'])){
	$email = mysqli_escape_string($link, $_POST['email']);
}
if(isset($_POST['senha'])){
	$senha = mysqli_escape_string($link, $_POST['senha']);
}
//Verificar se o campo está em branco
if(empty($email) || empty($senha)){
	header("location:index.php?vazio");
	return false;
}

$sql = "SELECT email FROM usuario WHERE email='$email'";
$resultado = mysqli_query($link, $sql);
//Verificar se usuario existe
if(mysqli_num_rows($resultado) == 1){
	$sql = "SELECT senha FROM usuario WHERE email='$email'";
	$resultado = mysqli_query($link, $sql);
	$hash = $resultado->fetch_array(MYSQLI_ASSOC);
	//Verificar se senha confere
	if($hashSenha = password_verify($senha, $hash['senha']) == true){
		$sql = "SELECT * FROM usuario WHERE email='$email'";
		$resultado = mysqli_query($link, $sql);
		//Logar
		if(mysqli_num_rows($resultado) == 1){
			$dados = mysqli_fetch_array($resultado);
			$_SESSION['logado'] = true;
			$_SESSION['id_usuario'] = $dados['id'];
			header("location:main.php");
		}
	}else{
		header("location:index.php?erro");
		return false;
	}
	
}else{
	header("location:index.php?erro");
	return false;
}
?>
