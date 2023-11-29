<?php

include_once('index.php');

if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    $consulta = "SELECT COUNT(*) as count FROM eventos WHERE (start < '$end' AND end > '$start')";

    $resultadoConsulta = mysqli_query($conexao, $consulta);

    if ($resultadoConsulta) {
        $row = mysqli_fetch_assoc($resultadoConsulta);
        $count = $row['count'];

        echo ($count === '0') ? 'disponivel' : 'ocupado';
    } else {
        echo 'Erro na consulta: ' . mysqli_error($conexao);
    }
} else {

    echo 'Parâmetros inválidos';
}
?>
