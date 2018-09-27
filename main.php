<?php
    //Inicio Sessão
    session_start();
    //Conexão ao banco
    require_once 'banco.php';
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuario WHERE id = '$id'";
    $resultado = mysqli_query($link, $sql);
    $dados = $resultado->fetch_array(MYSQLI_ASSOC);
    //Verificação de login
    if(!isset($_SESSION['logado'])){
    	header("location:index.php");
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<!--CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/glyphicon.css">
  <link rel="icon" href="imagens/cgpes.png" type="image/x-icon">
  <?php require 'modal/modal.php'; ?>
  <meta charset="utf-8">
	<title>CGPES</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1"><a class="titulo" href=""><h1 class="display-4">CGPES</h1></a></span>
  <ul class="nav justify-content-end">
    <li class="nav-item"><?php echo '<a data-toggle="modal" data-whatever="'.$dados['id'].'" data-whatevernome="'.$dados['nome'].'"
                            data-whateveremail="'.$dados['email'].'" data-target="#update-user">'?><button type="button" class="btn btn-outline-primary btn-lg"><span class="glyphicon glyphicon-user"></span><?php echo("Olá, ". ucwords($dados['nome'])); ?></button></a></li>
  	<a href="logout.php"><button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span>Sair</button></a>
  </ul>
</nav>

<ul class="nav nav-tabs" id="cgpes">
    <li><a data-toggle="tab" class="nav-link home" href="#home">CGPES</a></li>
    <li><a data-toggle="tab" href="#servidor" class="nav-link servidor">Servidor</a></li>
   <?php if($dados['perfil'] == 'A'){ echo '<li><a data-toggle="tab" href="#usuario" class="nav-link usuario">Usuário</a></li>'; } ?>
</ul>
      <div class="tab-content">
      <div class="tab-pane" id="home"></div>
    

    <?php 
        /*
        paginação
        if(isset($_GET['pageno']))
          $pageno = $_GET['pageno'];
        else
          $pageno = 1;
        $no_de_registros_por_pagina = 10;
        $offset = ($pageno-1) * $no_de_registros_por_pagina;

        $sql_total_paginas = "SELECT count(id) FROM servidor";
        $result_page = mysqli_query($link, $sql_total_paginas);
        $total_rows = $result_page->fetch_array(MYSQLI_NUM)[0];
        $total_paginas = ceil($total_rows / $no_de_registros_por_pagina);
        $sql = "SELECT * FROM employee LIMIT $offset, $no_de_registros_por_pagina";
        $page_data = mysqli_query($link, $sql);
        */

        echo '<div class="tab-pane" id="servidor">';
        $result = mysqli_query($link, "select * from servidor;");
        $cont = mysqli_num_rows($result);
        
        if ($cont > 0) {
        	
            echo'
            
            <table class="table table-bordered">
                <thead>
                    <tr class="table-info">
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail <span class="glyphicon glyphicon-envelope"></span></th>
                        <th scope="col">TRT</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>';
                // monta a tabela de servidores
                echo '<tbody>';
                
                     while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo '
                        <tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['nome'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['trt'].'</td>
                            <td><a class="excluir" onclick="getIDServidor('.$row['id'].')" data-toggle="modal" data-target="#excluir"><span class="glyphicon glyphicon-remove" id="excluir"></span></a></td>
                            <td><a class="editar" data-toggle="modal" data-whatever="'.$row['id'].'" data-whatevernome="'.$row['nome'].'"
                            data-whateveremail="'.$row['email'].'" data-whatevertrt="'.$row['trt'].'" data-target="#update-servidor"><span class="glyphicon glyphicon-pencil" id="editar"></span></a></td>
                        </tr>';
               
            //fecha while
                    }
                    echo '     </tbody>
                                </table>
                                <nav class="navbar navbar-expand-sm bg-info navbar-info">
          <form class="form-inline" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" minlength="1" name="busca" required placeholder="Search" id="busca">
            <button class="btn btn-outline-info" type="submit">Search</button>
          </form>
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a data-toggle="modal" data-target="#incluir-servidor"><button type="button" class="btn btn-outline-info"><span class="glyphicon glyphicon-user"></span>Incluir servidor</button></a>
            </li>
            <a href="pdfServidor.php" target="_blank"><button class="btn btn-outline-info" type="button">Imprimir</button></a>
          </ul>
          
                ';
          ?>
          <nav>
            <ul class="pagination servidor">
              <li class="page-item"><a class="page-link servidor" href="?pageno=1">Primeira</a></li>
              <li class="page-item"><a class="page-link servidor" href="#">Anterior</a></li>
              <li class="page-item"><a class="page-link servidor" href="#">Próxima</a></li>
              <li class="page-item"><a class="page-link servidor" href="#">Última</a></li>
            </ul>
          </nav>
        </nav>
        <?php
            //fecha if
        } else {
            
            echo '<div class="alert alert-info" role="alert">Não há Registros!!!</div>
            
            ';

        } //fecha else
        extract($_GET);
        if (isset($verifica)) {
            if ($verifica == "s")
                echo('<div class="container"><div class="alert alert-success fade in alert-dismissible show">Cadastrado com Sucesso!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div></div>');
            else
            if ($verifica == "x")
                echo('<div class="container"><div class="alert alert-success fade in alert-dismissible show" role="alert">Excluido com Sucesso!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div></div>');
            else
            if ($verifica == "u")
                echo('<div class="container"><div class="alert alert-success fade in alert-dismissible show" >Alterado com Sucesso!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div></div>');
        }
        echo "</div>";
        if($dados['perfil'] == 'A'){
        			
                      echo '<div class="tab-pane fade" id="usuario">';
                      include("banco.php");
                      $resultado = mysqli_query($link, $sql);
                      $dados = $resultado->fetch_array(MYSQLI_ASSOC);
                      $result = mysqli_query($link,"select * from usuario;");
                      $cont = mysqli_num_rows($result);
                      if ($cont>0) { 
                        
                        echo '<table class="table table-bordered"> ';
                        echo '<thead>';
                        echo '  <tr class="table-success">';
                        echo '    <th scope="col">ID</th>';
                        echo '    <th scope="col">Nome</th>';
                        echo '    <th scope="col">E-mail <span class="glyphicon glyphicon-envelope"></span></th>';
                        echo '    <th scope="col">Perfil</th>';
                        echo '    <th scope="col">Excluir</th>';
                        echo '    <th scope="col">Editar</th>';
                        echo '  </tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){ 
                            echo '<tr>';
                            echo '<th scope="row">'.$row['id'].'</th>';
                            echo '<td>'.$row['nome'].'</td>';
                            echo '<td>'.$row['email'].'</td>';
                            echo '<td>'.$row['perfil'].'</td>';
                            echo '<td><a class="excluir" onclick="getIDUsuario('.$row['id'].')" data-toggle="modal" data-target="#exclr"><span class="glyphicon glyphicon-remove" id="excluir"></span></a></td>';
                            echo '<td><a class="editar" data-toggle="modal" data-whatever="'.$row['id'].'" data-whatevernome="'.$row['nome'].'"
                            data-whateveremail="'.$row['email'].'" data-target="#update-usuario"><span class="glyphicon glyphicon-pencil" id="editar"></span></a></td>
                            ';
                            echo '</tr>';
                        };

                        echo '</tbody>';
                        echo '</table>
                        ';
                        echo '<nav class="navbar navbar-expand-sm bg-success navbar-success">
                            <form class="form-inline" action="searchUser.php" method="post">
                              <input class="form-control mr-sm-2" type="text" minlength="1" name="buscaUser" required placeholder="Search" id="buscaUser">
                              <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <ul class="nav justify-content-end">
                              <li class="nav-item">
                                <a data-toggle="modal" data-target="#incluir-usuario"><button type="button" class="btn btn-outline-success"><span class="glyphicon glyphicon-user"></span>Incluir usuário</button></a>
                              </li>
                              <a href="pdfUsuario.php" target="_blank"><button class="btn btn-outline-success">Imprimir</button></a>
                            </ul>
                      <nav>
                      
                        ';
                        ?>

                        <ul class="pagination usuario">
                          <li class="page-item"><a class="page-link usuario" href="?pageno=1">Primeira</a></li>
                          <li class="page-item"><a class="page-link usuario" href="#">Anterior</a></li>
                          <li class="page-item"><a class="page-link usuario" href="#">Próxima</a></li>
                          <li class="page-item"><a class="page-link usuario" href="#">Última</a></li>
                        </ul>
                      </nav>
                    </nav>

                    <?php
                      } else {
                         echo '<div class="alert alert-info" role="alert">Não há Registros!!!</div>';
                      }

        }
        

        //mensagens de sucesso ou erro
        extract($_GET);
        if (isset($verifica)) {
            if ($verifica == "s")
                echo('<div class="container"><div class="alert alert-success fade in alert-dismissible show">Cadastrado com Sucesso!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div></div>');
            else
            if ($verifica == "x")
                echo('<div class="container"><div class="alert alert-success fade in alert-dismissible show" role="alert">Excluido com Sucesso!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div></div>');
            else
            if ($verifica == "u")
                echo('<div class="container"><div class="alert alert-success fade in alert-dismissible show" >Alterado com Sucesso!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div></div>');
        }
        ?>
        </div>
        <!--Javascript -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/ajax.js"></script>
  <script src="js/javascript.js"></script>
  <script src="js/bootstrap.js"></script>
    </body>
</html>
	  