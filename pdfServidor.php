<?php

include_once 'banco.php';

$sql = "SELECT * FROM servidor";
$result = mysqli_query($link, $sql);
$cont = mysqli_num_rows($result);
$html = "";
if($cont > 0){

	$html .= '<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
	<table class="table table-bordered">
                <thead>
                    <tr class="table-info">
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail <span class="glyphicon glyphicon-envelope"></span></th>
                        <th scope="col">TRT</th>
                    </tr>
                </thead>';
    $html .= "<tbody>";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $html .= '
                        <tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['nome'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['trt'].'</td>
                            ';
                    }
                    $html .= '     </tbody>
                                </table>
                                
                ';

}else{
	$html .= '<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <div class="alert alert-info" role="alert">Não há Registros!!!</div>
            
            ';
}



include 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->load_html($html);

// Renderizando o HTML como PDF

$dompdf->render();

// Enviando o PDF para o browser

$dompdf->stream(
		"lista-servidores.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);