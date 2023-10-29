<?php

  session_start();
  
  
  if((!isset($_SESSION['email']) ==true) and (!isset($_SESSION['senha']) ==true))
  {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

      header('Location: telalog.php');
      
  }
  $logado = $_SESSION['email'];
  
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
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<ul>
  <li><a class="active" href="paginaadm.php">Home</a></li>
  <li><a href="#news">Editar Prontuário</a></li>
  <li><a href="#contact">Financeiro</a></li>
  <li><a href="sair.php" class="btn btn-danger">Sair</a></li>
</ul>
       
     <?php
     
     echo"<h1> Bem vindo $logado </h1>";
     ?>
         
    </body>
       
</html>