<?php

session_start();
include_once ('index.php');

if (!empty($_POST['avaliacao'])) {
    $estre = $_POST['avaliacao'];

    $res = "INSERT INTO usuarios  (avaliacao) VALUE ('$estre')";
    $resulestre = mysqli_query($conexao, $res);

    if (mysqli_insert_id($conexao)) {
        $_SESSION['msg'] = "Obrigado pela sua avaliação";
        header("Location:avaliacao.php");
    } else {
        $_SESSION['msg'] = "Erro ao fazer a avaliação";
        header("Location:avaliacao.php");
    }
} else {
    $_SESSION['msg'] = "Necessário selecionar uma estrela";
    header("Location:avaliacao.php");
}
?>