<?php

include_once('index.php');

//Verificação do método solicitado//
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Obtendo os dados do evento que foi inserido//
    $titulo = $_POST['title'];
    $datainicio = $_POST['start'];
    $datafim = $_POST['end'];
    //inserindo os dados no banco //
    $sql = "INSERT INTO eventos (titulo, data_evento, data_fim) VALUES ('$titulo', '$datainicio', '$datafim')";
    //Realiza uma consulta no banco e verifica se foi realizada//
    if (mysqli_query($conexao, $sql)) {
        echo 'Evento adicionado com sucesso!';
    } else {
        echo 'Erro ao adicionar o evento: ' . mysqli_error($conexao);
    }
}
?>
