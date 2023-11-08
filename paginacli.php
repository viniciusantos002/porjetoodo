<?php

  session_start();
  include_once ('index.php');
  
  if((!isset($_SESSION['email']) ==true) and (!isset($_SESSION['senha']) ==true))
  {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

      header('Location: telalog.php');
      
  }
  $logado = $_SESSION['email'];
  
   if(!empty($_GET['search']))
    {
        $date = $_GET['search'];
        $sql = "SELECT * FROM usu WHERE id LIKE '%$date%' or nome LIKE '%$date%' or email LIKE '%$date%' ORDER BY id ASC";
    }
    else
    {
        $sql = "SELECT * FROM usu ORDER BY id ASC";
    }
    $resultado = $conexao->query($sql);
  
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
          <?php
     
     echo"<h4> Seja bem vindo  $logado </h4>";
     
     ?>
    </header>
    

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<ul>
  <li><a class="active" href="paginacli.php">Home</a></li>
  <li><a class="" href="dadoscli.php">Seus Dados</a></li>
  <li><a class="" href="chat.php">Chat para contato</a>
  </li>
  <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
</ul>
       
     <div>
     <br><br>
      Aqui na nossa clínica fazemos vários procedimos para deixar seus dentes saudaveis e brancos , abaixo alguns dos procedimento que fazemos em nossa clínica   <br> <br>
     
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