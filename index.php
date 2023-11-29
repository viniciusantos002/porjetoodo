<?php
//Especifica os parâmetros da conexão com banco de dados //
$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'cadastrocli';

//É uma instâcia que apresenta a conexão com o banco de dados//
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Se houver erro na conexão exibe uma mensagem de erro//
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

?>