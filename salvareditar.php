<?php
    
    include_once('index.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $datanasc = $_POST['datanasc'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];
        
        $sqlInsert = "UPDATE usu
        SET nome='$nome',email='$email', cpf='$cpf',telefone='$telefone',sexo='$sexo',datanasc='$datanasc',endereco='$endereco' , senha='$senha'
        WHERE id=$id";
        $resultado = $conexao->query($sqlInsert);
        print_r($resultado);
    }
    header('Location: paginaadm.php');

?>