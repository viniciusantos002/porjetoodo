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
        $dataconsulta = $_POST['dataconsulta'];
        $proandamento = $_POST['proandamento'];
        $prorealizados = $_POST['prorealizados'];
        $nivel = $_POST['nivel'];
        
        $sqlInsert = "UPDATE usuarios
        SET nome='$nome',email='$email', cpf='$cpf',telefone='$telefone',genero='$sexo',datanasc='$datanasc',endereco='$endereco' , senha='$senha' , prorealizados='$prorealizados' , proandamento='$proandamento' , dataconsulta='$dataconsulta' , nivel='$nivel'
        WHERE id=$id";
        $resultado = $conexao->query($sqlInsert);
        print_r($resultado);
    }
    header('Location: paginacli.php');

?>