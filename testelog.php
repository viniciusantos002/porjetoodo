<?php
  session_start();
 //print_r($_REQUEST);
   
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    include_once ('index.php'); 
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    
    
    $sql= "SELECT *FROM usu WHERE email = '$email' and senha = '$senha' ";
    
    $resultado = $conexao->query($sql);

    if(mysqli_num_rows($resultado)<1)
    {
        //vai destruir as variaveis email e senha caso não exista no banco de dados 
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location:telalog.php');
    }
    else{
        $_SESSION['email']= $email;
        $_SESSION['senha']= $senha;
        header('Location: paginaadm.php');
    }
}

else{
    
    header('Location:telalog.php');
    
}

 ?>