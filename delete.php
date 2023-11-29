<?php

//Inclui o arquivo de conexão com o banco de dados//
include_once ('index.php');
//Obtem o parâmentro id da consulta GET , usada para garantir que o valor seja um número inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//Consulta SQL é executada para excluir o usuario da tabela usuarios com base no id que foi fornecido//
$delete = $conexao->query("DELETE FROM usuarios WHERE id='$id'");
//Verificando o número de linhas afetadas
if (mysqli_affected_rows($conexao) > 0)
    ;
//Se a condição for verdadeira exibe uma janela de alert informando que o usuario foi excluido//
echo'<script>alert("Usuário excluido com sucesso");window.location.href="paginaadm.php";</script>';
?>