<?php

//Inclui a conexão com o banco//
require_once ('index.php');
//Obtem o valor do parâmetro id da consulta GET, realiza uma filtragem para garantir que seja um número inteiro e armazena o resultado na variável id// 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//Executa uma consulta que remove o registro selecionado da tabela finan //
$delete = $conexao->query("DELETE FROM finan WHERE id='$id'");

//Verifica se a consulta que deleta os dados afetou 1 ou mais linhas no banco 
if (mysqli_affected_rows($conexao) > 0)
    ;
//Se caso a condição em cima for executada , exibe um alerta informando que o produto foi excluído com sucesso//  
echo'<script>alert("Produto excluido com sucesso");window.location.href="financeiro.php";</script>';
?>