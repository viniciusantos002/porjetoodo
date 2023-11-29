<?php

include_once('index.php');

$sql = "SELECT id, title, start, end FROM eventos";
$resultado = mysqli_query($conexao, $sql);

$eventos = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $eventos[] = $row;
}

echo json_encode($eventos);
?>
