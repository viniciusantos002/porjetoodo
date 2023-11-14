<?php

session_start();
include_once ('index.php');

// Consulta para obter o nome do usuário
$consulta = "SELECT id, nome FROM usuarios "; // Corrija esta consulta conforme necessário

$resultadoConsulta = mysqli_query($conexao, $consulta);

if ($resultadoConsulta) {
    $usuario = mysqli_fetch_assoc($resultadoConsulta);

    
} else {
    echo "Erro na consulta: " . mysqli_error($conexao);
}



?>

<html>
    
    <head>
    </head>
    <body>
        <style>
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
  position: relative;  
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}



li a:hover {
  background-color: white;
}


 body{
            background-image: url(./fundoadm.png)  ;
           background-color: white;
           justify-content: center;
           align-items: center;
            background-size:100%;
           text-align: center;
           overflow-y: scroll;
           height: 100%;
        }
        .table-bg{
            opacity: 0.8;
            background: rgba(65 , 105 , 237);
            border-radius: 15px 15px 10px 10px;
        }

        .box-search{
            display: flex;
            justify-content: center;
            
        }
        table{
            text-align: center;
        }    
        h4{
            text-align: right;
        }
        
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        div{ 
            opacity: 0.9;
            text-align: center;
            border-radius: 35px 35px 35px 35px;
            text-decoration: none;
            background: rgba(65 , 105 , 237);
            height: 800px;
            width: 1600px;
            padding: 20px;
        }
</style>
</head>
<body>
     <header>
        <h1>Clínica Odontológica</h1>
            
    </header>
    

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<ul>
  <li><a class="active" href="paginacli.php">Home</a></li>
  <li><a class="" href="editadadoscli.php">Seus Dados</a></li>
  <li><a class="" href="chatcli.php">Chat para contato</a></li>
  <li><a class="" href="avaliacao.php">Avalie nosso atendimento</a></li>
  <li><a class="" href="notifica.php">Notificações </a></li>
  <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
</ul>
       
             
         
    </body>
       
</html>