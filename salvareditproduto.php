<?php
    
    include_once('index.php');
    
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        
        
        $sqlInsert = "UPDATE financeiro
        SET nome='$nome',valor='$valor', quantidade='$quantidade'
        WHERE id=$id";
        $resultado = $conexao->query($sqlInsert);
        print_r($resultado);
    }
    header('Location: financeiro.php');

?>