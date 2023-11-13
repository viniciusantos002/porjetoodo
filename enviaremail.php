<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Presença</title>
</head>

<body>

    <h2>Confirmação de Presença</h2>

    <form action="confirmacaoemail.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="mensagem">Mensagem</label>
        <input type="text" id="mensagem" name="mensagem"><br>
        <input type="submit" value="Confirmar Presença">
    </form>

</body>

</html>
