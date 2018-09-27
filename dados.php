<?php
include("banco.php");
//Prevenção a injeção SQL
if(isset($_POST['nome'])){
	$nome = mysqli_escape_string($link, $_POST['nome']);
}
if(isset($_POST['email'])){
	$email = mysqli_escape_string($link, $_POST['email']);
}
if(isset($_POST['trt'])){
	$trt = mysqli_escape_string($link, $_POST['trt']);
}

//verificar se a variável está vazia ou não
if(empty($nome)||empty($email)||empty($trt)){
	header("location:main.php?errocadastro=e");
	return false;
}

//verificar se o email é valido
if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
    header("location:main.php?verifica=e");
    return false;
}

//verificar se o trt é entre 1 e 24
if($trt < 1 || $trt > 24){
	header("location:main.php?verifica=t");
    return false;
}

//inserção dos valores na tabela 'servidor'
$sql = "INSERT INTO servidor (nome, email, trt)
VALUES ('$nome', '$email', '$trt')";
$resultado = mysqli_query($link,$sql);
if($resultado)
	header("location:main.php?verifica=s");
else
	header("location:main.php?verifica=f");