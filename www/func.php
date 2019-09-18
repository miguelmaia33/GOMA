<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="GOMA challenge">
		<meta name="author" content="Miguel Maia">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery-3.1.1.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/jquery.sticky-kit.min.js"></script>
    	<script src="js/jquery.scrollbar.min.js"></script>
    	<script src="js/script.js"></script>
        <script type="text/javascript" src="js/js/regcliente.js"></script>

        <?php
    		include_once 'dbc.php';
  		?>
	
		<title> GOMA </title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
	</head>
	<body>
		<style>
			.button{
				border-radius: 8px;
				background: #FFFFFF;
				border-color: #00AEEF;
				border-style:solid;
   				border-width:0.5px;
   				height: 45px;
			}
			.sub_button{
				background: #00AEEF;
				font-family: Roboto, monospace;
				border-radius: 14px;
				border: none;
				padding: 10px 32px;
				color: white;
			}
			.nome{
				grid-area: 1/1/2/3;
			}
			.mail{
				grid-area: mail;
			}
			.tel{
				grid-area: 2/2/3/3;
			}
			.div{
				margin: auto;
  				width: 45%;
			}
			.div2{
				margin: auto;
  				width: 100%;
			}
		</style>
		<header>
			<?php include "header.html" ?>
		</header>
		<main class="blue_text">
			<!-- colocar link para a pagina dos clientes -->
			<h3 align="right" class="div2" style="color: #00AEEF"><sup><a href="page2.php"><u>LISTAR CLIENTES</u></a></sup></h3>
			<h2 align="center">BEM-VINDOS</h2>
	
			<div class="div">
				<p align="center" style="color:#4A4A4A"> <b>GOMA is a company from Portugal that creates integrated web-based solutions. We work with organizations of all sizes to design and build great digital products</b></p>
			</div>

	<div style="width:90%; background: #EDF6F9; height:550px;margin-left: 5%"/>
   	<br>
   	<div style="margin-left: 50%; transform: translate(-50%, -50%); margin-top: 30px;" id="quadradocolorido">
    	<p style="display: none; padding: 20px;" id="resultado"></p>
   	</div>

	<div style="position:absolute; margin-left: 5%">
	  	<h3 align="center" style="margin-left: 30%">INSERIR CLIENTE</h3>
	  	<p style="margin-left: 15%">Nome<br><input id="nome" class="button" type="text" name="nome" size="110%"></p>
	  	<p style="margin-left: 15%">E-mail<br><input id="mail" class="button"type="text" name="e-mail" size="50%"></p>
	  	<p style="margin-left: 15%">Morada<br><input id="morada" class="button" type="text" name="morada" size="110%"></p>
	  	<p style="margin-left: 15%">Localidade<br><input id="localidade" class="button" type="text" name="localidade" size="50%"></p>
	  	<br>
	  	<button style="margin-left: 15%" id="submit" class="sub_button" type="submit" name="submit" onclick="fetch()">SUBMETER</button>
	<div style="position:absolute;left:63%;top:131px;width:100px;height:10%;">
  	<p>Telefone<br><input id="telefone" class="button" name="telefone" size="56%"></p><br><br><br><br><br>
  	<p></p>
  	<div class="container-fluid">
  		<div style="margin: -20%; margin-top: -50%"><p>País</p>
  			<!--<?php include "countrybutton.html" ?></p> -->
  			<label for="country" class="sr-only"></label>
                <select class="button" id="pais" style="margin-top: -10px; width:410px">
                    <option  value="" disabled selected hidden></option>
                    <br>
                    	<!-- mostra as disponibilidades dos países na segunda tabela -->
                        <?php 
                            $sql = "SELECT * FROM pais;";
                            $result = mysqli_query($conn,$sql);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result)){
                    	                echo "<option value='".$row['idpais']."' >" . $row['nome'] . "</option>";
                                    }
                                }else{
                                    echo "error";
                                }
                        ?>
                </select>
  		</div>
  	</div>
  	</div>
  	</div>
				
		<br/>
		</main>
		<footer>
			<?php include "footer.html" ?>
		</footer>
	</body>
	<script>
		function fetch(){
	 
		  	document.getElementById("resultado").style.display = "block";
		  	var n = document.getElementById('nome').value;
		  	var mo = document.getElementById('morada').value;
		  	var l = document.getElementById('localidade').value;
		  	var m = document.getElementById('mail').value;
		  	var t = document.getElementById('telefone').value;
		  	var p = document.getElementById('pais').value;

		  	if(n && mo && l && m && t && p){
			    document.getElementById("resultado").textContent = "Os dados foram inseridos na base de dados";
			    document.getElementById("quadradocolorido").style.backgroundColor = "#7ED321";
			    document.getElementById("quadradocolorido").style.color = "#FFFFFF";
			    document.getElementById("quadradocolorido").style.fontWeight = "bold";
			    document.getElementById("quadradocolorido").style.textAlign = "center";
			    document.getElementById("quadradocolorido").style.fontFamily = "Roboto";

		  	}else{
			    document.getElementById("resultado").textContent = "ERRO, Verifique se preencheu os campos devidamente";
			    document.getElementById("quadradocolorido").style.backgroundColor = "#D0021B";
			    document.getElementById("quadradocolorido").style.color = "#FFFFFF";
			    document.getElementById("quadradocolorido").style.fontWeight = "bold";
			    document.getElementById("quadradocolorido").style.textAlign = "center";
			    document.getElementById("quadradocolorido").style.fontFamily = "Roboto";
			    document.getElementById("quadradocolorido").style.width = "50%";
			    document.getElementById("quadradocolorido").style.height = "60px";
		  	}
		  	submeter();
 
		} 
	</script>
</html>
	

