load(){

 var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("tabela").innerHTML = this.responseText;
                      }
                  };

                  xmlhttp.open("GET", "php/page1.php?", true);
                  xmlhttp.send();



}