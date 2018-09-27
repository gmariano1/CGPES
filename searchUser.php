<?php
    //verifica sessão e conexão
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
    if($dados['perfil'] == 'T'){
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
  <!--Javascript -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/ajax.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <meta charset="utf-8">
    <title>Busca Usuário</title>
</head>
<body>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="main.php" class="servidor">Voltar</a></li>
  </ol>
</nav>
<?php
require_once 'banco.php';
$buscaUser = $_POST['buscaUser'];
//Prevenção a injeção SQL
if (isset($buscaUser)) {
    $buscaUser = mysqli_escape_string($link, $buscaUser);
    $result = mysqli_query($link, "SELECT * FROM usuario WHERE (`email` LIKE '%" . $buscaUser . "%') OR (`id` LIKE '%" . $buscaUser . "%')");
    $cont = mysqli_num_rows($result);
}
        //Cabeçalho da tabela
        echo '<table class="table table-bordered">
            <thead>
                <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">E-mail <span class="glyphicon glyphicon-envelope"></span></th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>';
            
            if ($cont > 0) {
                
                echo "<tbody>";
                    //Monta tabela de busca   
                    while ($row = $result->fetch_array(MYSQLI_NUM)) {
                        echo '
                        <tr>
                            <th scope="row">'.$row[0].'</th>
                            <td>'.$row[1].'</td>
                            <td>'.$row[3].'</td>
                            <td><a href="excluirUsuario.php?id='.$row[0].'"><span class="glyphicon glyphicon-remove" id="excluir"></span></a></td>
                            <td><a href="formUpdateUsuario.php?id='.$row[0].'"><span class="glyphicon glyphicon-pencil" id="editar"></span></a></td>
                        </tr>';

                         }
                    echo '</tbody>';  
                } else { 
                    //Tabela Vazia
                echo '<div class="alert alert-info" role="alert">Não há Registros!!!</div>';
            }
           
        echo "</table>";
        
        echo "</body>
        </html>";