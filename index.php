<?php

$dbHost='Localhost';
$dbUsername='root';
$dbPassword='';
$dbName='cadastrocli';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//if($conexao->connect_errno)
//{
  //  echo"Erro";
    
//}
//else{
  //  echo"Conexão realizada com sucesso";
//}

?>