<?php
 
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  $FROM = 'santos.kratos55@gmail.com';
  
  /*cabeçalhos */
$Headers      = "MIME-Version: 1.1\n";
$Headers     .= "Content-type: text/html; charset=utf-8\n";
$Headers     .= "From: Meu Site <$FROM>\n";
$Headers     .= "Return-Path: $FROM\n";
$Headers     .= "Reply-to: $email\n";
  
 $assunto = 'Assunto do Email';
 
 $mailenviado = mail($email,$assunto,$mensagem,$Headers);
 
 if($mailenviado) {
     header('Location: obrigado.php');
     
 }
 else{
     echo'Erro ao enviar o email';
 }
    ?>