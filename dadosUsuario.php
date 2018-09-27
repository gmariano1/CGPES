<?php
include("banco.php");
//Prevenção a injeção SQL
if(isset($_POST['email'])){
	$email = mysqli_escape_string($link, $_POST['email']);
}
if(isset($_POST['nome'])){
	$nome = mysqli_escape_string($link, $_POST['nome']);
}
if(isset($_POST['senha'])){
	$senha = mysqli_escape_string($link, $_POST['senha']);
}
if(isset($_POST['perfil'])){
	$perfil = mysqli_escape_string($link, $_POST['perfil']);
}

//verificar se a variável está vazia ou não
if(empty($nome)||empty($email)||empty($senha)||empty($perfil)){
	header("location:main.php?errocadastro=e".$email);
	return false;
}
//verificar se o perfil está dentro do que é adequado(A ou T)
if($perfil != 'A' && $perfil != 'T'){
	header("location:main.php?errocadastro=".$perfil);
	return false;
}
//transformar a senha em um hash
$novaSenha = password_hash($senha, PASSWORD_DEFAULT);
//inserção dos dados a tabela 'usuario'
$sql = "INSERT INTO usuario (nome, email, senha, perfil)
VALUES ('$nome', '$email', '$novaSenha', '$perfil')";
$resultado = mysqli_query($link,$sql);
if($resultado)
	header("location:main.php?verifica=s");
else
	header("location:main.php?verifica=f");