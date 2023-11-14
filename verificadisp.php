<?php
include_once('index.php'); // Certifique-se de incluir o arquivo de conexão com o banco de dados

// Verifique se os parâmetros necessários foram recebidos via POST
if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    // Consulta SQL para verificar se há eventos que se sobrepõem ao intervalo fornecido
    $consulta = "SELECT COUNT(*) as count FROM eventos WHERE (start < '$end' AND end > '$start')";

    $resultadoConsulta = mysqli_query($conexao, $consulta);

    if ($resultadoConsulta) {
        $row = mysqli_fetch_assoc($resultadoConsulta);
        $count = $row['count'];

        // Se count for 0, significa que o horário está disponível; caso contrário, está ocupado
        echo ($count === '0') ? 'disponivel' : 'ocupado';
    } else {
        // Em caso de erro na consulta, retorne uma mensagem de erro
        echo 'Erro na consulta: ' . mysqli_error($conexao);
    }
} else {
    // Se os parâmetros não foram recebidos, retorne uma mensagem de erro
    echo 'Parâmetros inválidos';
}
?>
