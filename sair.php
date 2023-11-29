<?php

session_start();
//Vai remover as variáveis e consequentemente faz logout e redireciona para a telalog.php//
unset($_SESSION['email']);
unset($_SESSION['senha']);
header("Location: telalog.php");
?>