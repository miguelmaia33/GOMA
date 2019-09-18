  
  function submeter(){

    var send = "";
    var nome = document.getElementById('nome').value;
    var mail = document.getElementById('mail').value;
    var telefone = document.getElementById('telefone').value;
    var morada = document.getElementById('morada').value;
    var localidade = document.getElementById('localidade').value;
    var pais = document.getElementById('pais').value;


    if(nome && mail && telefone && morada && localidade && pais) {
        // guarda as variaveis para mandar po PHP
        send += "nome="+nome;
        send += "&mail="+mail;
        send += "&telefone="+telefone;
        send += "&morada="+morada;
        send += "&localidade="+localidade;
        send += "&pais="+pais;


        //Envia para o PHP para fazer o registo
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() 
        {
         null;
         // tem de ter alguma coisa no corpo da funçao
        };

        xmlhttp.open("GET","php/regcliente.php?"+send,true);
        xmlhttp.send();

        }
  }