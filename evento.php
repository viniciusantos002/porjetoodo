<?php

include_once('index.php');

$sql = "SELECT id, titulo as titulo, data_evento as data_evento, data_fim as data_fim FROM eventos";
$resultado = mysqli_query($conexao, $sql);

$eventos = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $eventos[] = $row;
}

echo json_encode($eventos);
?>
