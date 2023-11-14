<?php

include_once('index.php'); // Certifique-se de incluir o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['id'];

    // Execute a query para excluir o evento com base no ID
    $deleteQuery = "DELETE FROM eventos WHERE id = $eventId";
    $result = mysqli_query($conexao, $deleteQuery);

    if ($result) {
        echo "Evento excluído com sucesso!";
        
    } else {
        echo "Erro ao excluir o evento: " . mysqli_error($conexao);
    }
} else {
    echo "Método de requisição inválido. Utilize o método POST.";
}
?>
