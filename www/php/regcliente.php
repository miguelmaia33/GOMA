<?php
 include_once "../dbc.php";

    //guarda as variaveis

    $msg = "";
    $nome = $_GET['nome'];
    $mail = $_GET['mail'];
    $telefone = $_GET['telefone'];
    $morada = $_GET['morada'];
    $localidade = $_GET['localidade'];
    $pais = $_GET['pais'];    
 
    $sql = "INSERT INTO cliente(nome,mail,telefone,morada,localidade,pais) VALUES('".$nome."','".$mail."','".$telefone."','".$morada."','".$localidade."','".$pais."');";
                if ($conn->query($sql) === TRUE) {
                    $msg = "sucesso";
                }else{

                    $msg = "<br>Error record util: " . $sql . "<br>" . $conn->error;
                }

    echo $msg;
?>