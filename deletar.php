<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
    
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
   
    function confirmarExclusao() {
        var resposta = confirm("Tem certeza que deseja excluir o usuário?");
        if (resposta) {
           
            window.location.href = 'delete.php?id=<?php echo $id; ?>';
        } else {
          
            window.location.href = 'paginaadm.php';
        }
    }
</script>


<button class="botao-excluir" onclick="confirmarExclusao()">Excluir Usuário</button>

</body>
</html>
