<?php

//Inclui o aquivo de conexão com o banco de dados//
include_once('index.php');
//Verifica se o formulário foi submetido com base no botão de envio chamado update//
if (isset($_POST['update'])) {
    //Recuperando os dados usando o metodo POST//
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $datanasc = $_POST['datanasc'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    $dataconsulta = $_POST['dataconsulta'];
    $proandamento = $_POST['proandamento'];
    $prorealizados = $_POST['prorealizados'];
    $nivel = $_POST['nivel'];
    $anotacoes = $_POST['anotacoes'];

    //Atualiza os valores de cima na tabela usuários//
    $sqlInsert = "UPDATE usuarios
        SET nome='$nome',email='$email', cpf='$cpf' ,telefone='$telefone',genero='$sexo',datanasc='$datanasc',endereco='$endereco' , senha='$senha' , prorealizados='$prorealizados' , proandamento='$proandamento' , dataconsulta='$dataconsulta' , nivel='$nivel' , anotacoes='$anotacoes'
        WHERE id=$id";
    //Executa a consulta no banco SQL//
    $resultado = $conexao->query($sqlInsert);
}
//Redireciona para a tela paginaadm.php//
header('Location: paginaadm.php');
?>