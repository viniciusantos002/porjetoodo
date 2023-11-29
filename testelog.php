<?php

session_start();

include_once('index.php');
//Vai pegar os dados que foram digitados nos campos da tela de login//
$email = $_POST['email'];
$senha = $_POST['senha'];

//Selecionando dados da tabela usuarios aonde verifica se os campos estão iguais//
$query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
//Executando as consulta//
$resultado = mysqli_query($conexao, $query);

//Verifica se a consulta retorna algum usuario com email e senha fornecidos//
if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
//Se o nivel do usuario for admministrador ele vai mandar para a tela paginaadm.php//
    if ($usuario['nivel'] == 'Administrador') {
        $_SESSION['Administrador'] = true;
        header('Location:paginaadm.php');
    }
    //Se caso o nivel for cliente ele vai mandar para a tela paginacli.php//
    else {

        $_SESSION['Cliente'] = true;
        header('Location:paginacli.php');
    }
    //Caso não retorne resultado , exibe um alerta dizendo que os dados estão inválidos e retorna para a telalog.php//
} else {
    echo'<script>alert("Dados inválidos.");window.location.href="telalog.php";</script>';
}
?>
