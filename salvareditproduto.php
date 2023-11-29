<?php

//Inclui o arquivo com a conexao com o banco //
include_once('index.php');

//Verifica se o formulário foi submetido com um campo chamado 'update'//
if (isset($_POST['update'])) {
    //Obtém os valores dos campos respectivos e armazena nas variáveis abaixo//
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $total = $_POST['total'];

    //Cria uma consulta para atualizar a tabela finan com os novos valores fornecidos pelo formulário aonde o id corresponde ao valor armazenado na variável $id//
    $sqlInsert = "UPDATE finan
        SET nome='$nome',valor='$valor', quantidade='$quantidade' , total='$total'
        WHERE id=$id";
    //Executa a consulta e armazena o resultado na variável resultado//
    $resultado = $conexao->query($sqlInsert);
    
    echo'<script>alert("Alterações feita com sucesso");window.location.href="financeiro.php";</script>';
}
//Redireciona para a tela financeiro.php//
header('Location: financeiro.php');
?>