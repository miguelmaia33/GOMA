<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="GOMA challenge">
		<title> GOMA </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<?php include "header.html" ?>
		</header>
		<main>
			<br>
			<h4><sup><a href="func.php"style="margin-left: 150px"><u>INSERIR NOVO</u></a></sup></h4>
			<p style="margin-left: 150px; size: 14px"><b style="color: #00AEEF;">LISTA DE CLIENTES</b> &nbsp ( <var style="color: #00AEEF; font-style: normal" id="output"></var>  resultados no sistema)</p>
			<p align="right" style="margin-right: 160px"><sup><a href="page3.php"><u>ULTIMOS 3 REGISTOS</u></a></sup></p>

			<?php

 	//connector da base de dados
 	include_once "dbc.php";
 
	$sql = "SELECT  idcliente, cliente.nome as nome, mail, telefone, morada, localidade, pais.nome as pais FROM cliente, pais where cliente.pais = pais.idpais ORDER BY idcliente DESC;" ;
 	
    $msg="";
    $result = $conn->query($sql);
  	$increment=1;
  	if ($result->num_rows > 0) {
  		$msg.="<h6 id=\"total\" style=\"display: none\">".$result->num_rows."</h6>";
    	while($row = $result->fetch_assoc()) {
    		if($increment<$result->num_rows){
          		$msg.= "<div style=\"background-color:#EDF6F9;margin-left:12%; margin-right:12%;border-bottom: 1px solid #979797;margin-top: -20px;\"><h3 style=\"color: #4A4A4A\">".$row["nome"]."<br> <h6 style=\"color: #00AEEF\">".$row["mail"].", ".$row["telefone"].", ".$row["morada"].", ".$row["localidade"].", ".$row["pais"]."</h6></div>";
 		  	}else{
 		  	 	$msg.= "<div style=\"background-color:#EDF6F9;margin-left:12%; margin-right:12%;margin-top: -20px;\"><h3 style=\"color: #4A4A4A\">".$row["nome"]."<br> <h6 style=\"color: #00AEEF\">".$row["mail"].", ".$row["telefone"].", ".$row["morada"].", ".$row["localidade"].", ".$row["pais"]."</h6></div>";
 		  	}
 		  	$increment=$increment+1;
        }
       
    } else {
    	$msg.= "0 results";
    }

    echo $msg;
 	$conn->close();
 
		?>
		</main>
		<script>document.getElementById('output').innerHTML = document.getElementById('total').innerHTML;</script>
		<footer>
			<?php include "footer.html" ?>
		</footer>
	</body>
</html>
