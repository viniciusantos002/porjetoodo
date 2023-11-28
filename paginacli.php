<?php

session_start();
include_once ('index.php');


$consulta = "SELECT id, nome FROM usuarios ";

$resultadoConsulta = mysqli_query($conexao, $consulta);

if ($resultadoConsulta) {
    $usuario = mysqli_fetch_assoc($resultadoConsulta);

    
} else {
    echo "Erro na consulta: " . mysqli_error($conexao);
}



?>

<html>
    
    <body>
        <style>
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    background: linear-gradient(to bottom, #87CEEB, #f7f7f7);
    
}

header {
    
    color: white;
    text-align: center;
    padding: 10px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #1E90FF;
 
}

li {
  float: left;
}

li a {
   
  display: block;
  color: whitesmoke;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}



li a:hover {
  background-color: white;
  color:#1E90FF;
}



.content {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1{
    color: 	#008B8B;
}
h3{
    color: 	#008B8B;
}


</style>

<body>
     <header>
         <h1> Clínica odontológica Sorria </h1>
    </header>
    
    <!-- Adicionando a nav bar -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<ul>    
  <li><a class="active" href="paginacli.php">Home</a></li>
  <li><a class="" href="chatcli.php">Chat para contato</a></li>
  <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
</ul>
       
     <div>
     <br><br>
      <hAqui na nossa clínica fazemos vários procedimos para deixar seus dentes saudaveis e brancos , abaixo alguns dos procedimento que fazemos em nossa clínica   <br> <br>
     
     <h1> Clinico geral</h1>
     
      <h5>Esse especialista é o que vai fazer a avaliaçao de seus dentes para verificar como anda o estado deles, além disso ele pode realizar outros procedimentos como :
      </h5>
     
     <br><br>
     
     <h6> -Restaurações </h6>
     <h6> -Aplicação de fluor </h6>
     <h6> -Tratamento de canal </h6>
     <h6> -Cirurgia simples </h6>
     <h6> -Aplicação de selante</h6>
     <h6> -Limpeza</h6>
     <h6> -Colocação e retirada de aparelho</h6>
     
     </div>
    
         
    </body>
       
</html>