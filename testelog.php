<?php
session_start();

include_once('index.php'); // Substitua pelo arquivo de conexão com o banco de dados

$email = $_POST['email'];
$senha = $_POST['senha'];


$query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);

    // Verifica se o usuário é um administrador
    if ($usuario['nivel'] == 'Administrador') {
        $_SESSION['Administrador'] = true;
        header('Location:paginaadm.php');
    }
    else{
        $_SESSION['Cliente'] = true;
        header('Location:paginacli.php');
    }
    } else{
        echo'Suas credenciais estão erradas';
    }


   
?>
