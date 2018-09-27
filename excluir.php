<?php
include("banco.php");
$id = mysqli_escape_string($link, $_GET['id']);
mysqli_query($link,"delete from servidor where id=".$id.";")or die("Erro ao Excluir: ".mysql_error());
header("location:main.php?verifica=x");

