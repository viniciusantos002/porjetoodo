<?php

include_once('index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $datainicio = $_POST['start'];
    $datafim = $_POST['end'];

    $sql = "UPDATE eventos SET data_evento='$datainicio', data_fim='$datafim' WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {
        echo 'Evento atualizado com sucesso!';
    } else {
        echo 'Erro ao atualizar o evento: ' . mysqli_error($conexao);
    }
}
?>
