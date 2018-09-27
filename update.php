<?php
include("banco.php");
extract ($_POST);
//verificar se o email é valido
if(filter_var($novoEmail, FILTER_VALIDATE_EMAIL) == false){
    header("location:main.php?verifica=e&id=".$id);
    return false;
}

//verificar se o trt é entre 1 e 24
if($novoTrt < 1 || $novoTrt > 24){
	header("location:main.php?verifica=t&id=".$id);
    return false;
}

//verificar se os campos estão vazios
if(empty($novoNome)||empty($novoEmail||empty($novoTrt))){
	header("location:main.php?errocadastro=e&id=".$id);
	return false;
}else{
	//atualização dos dados
	if(mysqli_query($link,"update servidor set nome = '$novoNome', email = '$novoEmail', trt = '$novoTrt' where id = '$id';")){
		header("location:main.php?verifica=u");
	}else{
		echo mysqli_error();
		exit;
	}
}
?>