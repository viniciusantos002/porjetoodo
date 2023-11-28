<?php

include_once('index.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['id'];

   //Deletar da tabela o evento selecionado//
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
