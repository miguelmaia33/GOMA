<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="GOMA challenge">
		<title> GOMA </title>
	</head>
	<body>
		<header>
			<?php include "header.html" ?>
		</header>
		<main>
			<br>
			<h4><sup><a href="func.php"style="margin-left: 150px"><u>INSERIR NOVO</u></a></sup></h4>
			<p style="margin-left: 150px; size: 14px"><b style="color: #00AEEF;">LISTA DE CLIENTES</b></p>
			<br>

			<?php
 	include_once "dbc.php";
 
	$sql = "SELECT * FROM (SELECT idcliente, cliente.nome as nome, mail, telefone, morada, localidade, pais.nome as pais FROM goma.cliente, goma.pais where cliente.pais = pais.idpais ORDER BY idcliente DESC LIMIT 3) as Clientes ORDER BY nome" ;
 
    $msg="";
    $result = $conn->query($sql);
  	$increment=0;
  	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		if($increment==0 || $increment==1){
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
		<footer>
			<?php include "footer.html" ?>
		</footer>
	</body>
</html>