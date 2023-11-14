<?php
include_once('index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['title'];
    $datainicio = $_POST['start'];
    $datafim = $_POST['end'];

    $sql = "INSERT INTO eventos (titulo, data_evento, data_fim) VALUES ('$titulo', '$datainicio', '$datafim')";
    
    if (mysqli_query($conexao, $sql)) {
        echo 'Evento adicionado com sucesso!';
        
    } else {
        echo 'Erro ao adicionar o evento: ' . mysqli_error($conexao);
    }
}
?>
