<?php

require_once ('index.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$delete = $conexao->query("DELETE FROM financeiro WHERE id='$id'");

if (mysqli_affected_rows($conexao) > 0)
    ;
header("Location:financeiro.php");
?>