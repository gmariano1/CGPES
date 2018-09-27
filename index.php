<?php
//inicio de sessão
session_start();
//Verificação de login
if(isset($_SESSION['logado'])){
    header("location:main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="imagens/log.png" rel="icon" type="image/x-icon" />
    <!--CSS -->
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/glyphicon.css">
</head>
<body class="text-center">
	<div class="container">
	<!--Inicio do formulário de login -->
	    <form class="form-signin" action="log.php" method="post">
	      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
	      <div class="input-group">
    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    	<input id="email" type="text" class="form-control" name="email" placeholder="Email" required autofocus>
  	    </div>
  	    <div class="input-group">
    	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    	<input id="password" type="password" class="form-control" name="senha" placeholder="Senha" required>
  		</div>
	    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	<!--Fim do formulário de login -->
	    </form>
	    <?php 
	    	//mensagens de erro
	    	extract($_GET);
	    	if(isset($vazio))
	    		echo '<div>Usuário ou senha em branco!</div>';
	    	
	    	if(isset($erro))
	    		echo '<div class="alert alert-danger fade in alert-dismissible show">Usuário ou senha incorreto!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
	    	
	    ?>
	</div>
	<!--Javascript -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

  </body>
</html>
