<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
    <!-- Adicione um link para um arquivo de estilo CSS se desejar estilizar a janela de alerta -->
</head>
<body>

    <style>
        
        .botao-excluir{
            padding: 15px 40px;
            background-color: #dc3545;
            color:#fff;
            border:15px;
            cursor:pointer;
            font-size: 16px;
            border-radius: 15px;
        }
    </style>    
<script>
    // Função JavaScript para exibir a janela de alerta
    function confirmarExclusao() {
        var resposta = confirm("Tem certeza que deseja excluir o usuário?");
        if (resposta) {
            // Se o usuário clicar em "OK", redireciona para o script de exclusão
            window.location.href = 'delete.php?id=<?php echo $id; ?>';
        } else {
            // Se o usuário clicar em "Cancelar", redireciona de volta para a página inicial
            window.location.href = 'paginaadm.php';
        }
    }
</script>

<!-- Botão ou link que aciona a função de confirmação -->
<button class="botao-excluir" onclick="confirmarExclusao()">Excluir Usuário</button>

</body>
</html>
