<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once ('index.php');
    
    // Recuperar os dados do formulário (substitua com os nomes dos seus campos de formulário)
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dataconsulta = $_POST['dataconsulta'];

    // Inserir os detalhes da consulta no banco de dados (substitua com sua lógica de inserção)
    $sql = "INSERT INTO consultas (paciente_nome, paciente_email, data_consulta) VALUES ('$nome', '$email', '$dataConsulta')";

    if ($conexao->query($sql) === TRUE) {
        // E-mail de confirmação
        $assunto = "Confirmação de Consulta";
        $mensagem = "Olá $nome,\n\n Sua consulta foi agendada para $dataConsulta.\n\nPor favor, confirme sua presença respondendo a este e-mail.";

        // Enviar e-mail de confirmação
        mail($email, $assunto, $mensagem);

        echo "Consulta agendada com sucesso. Um e-mail de confirmação foi enviado para o seu endereço de e-mail.";
    } else {
        echo "Erro ao agendar a consulta: " . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>
