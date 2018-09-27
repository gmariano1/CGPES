<?php
include("banco.php");
extract($_GET);
mysqli_query($link,"delete from usuario where id=".$id.";")or die("Erro ao Excluir: ".mysql_error());
header("location:main.php?verifica=x");
