<?php

if (isset($_POST['submit']))
{
   // print_r($_POST['nome']); 
   //print_r('<br>'); 
    
    //print_r($_POST['email']);
    //print_r('<br>'); 
    
    //print_r($_POST['cpf']);
    //print_r('<br>'); 
    
    //print_r($_POST['telefone']);
    //print_r('<br>'); 
    
    //print_r($_POST['genero']);
    //print_r('<br>'); 
    
    //print_r($_POST['datanasc']);
    //print_r('<br>'); 
    
    //print_r($_POST['endereco']);
    //print_r('<br>'); //
    
    //print_r($_POST['senha']);
    //print_r('<br>'); //
    
   include_once('index.php');
   
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $cpf = $_POST['cpf'];
   $telefone = $_POST['telefone'];
   $sexo = $_POST['genero'];
   $datanasc = $_POST['datanasc'];
   $endereco = $_POST['endereco'];
   $senha = $_POST['senha'];
   
 $resultado = mysqli_query($conexao,"INSERT INTO usu (nome,email,cpf,telefone,sexo,datanasc,endereco,senha) VALUES ('$nome','$email','$cpf','$telefone','$sexo','$datanasc','$endereco','$senha')");
}

?>

<html lang="en">
<head>
   
    <title>Formulário </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        a{
         background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
         width: 100%;
         border:none;
         padding:15px;
         color: white;
         font-size: 20px;
         cursor: pointer;
         border-radius: 10px;
        
        }
        
    </style>
</head>
<body>
    <div class="box">
        <form action="telacadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <p>Sexo</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="datanasc"><b>Data de Nascimento</b></label>
                <input type="date" name="datanasc" id="datanasc" required>
                <br><br><br>
                <br><br>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
                <br><br>
                <a href="telalog.php"> Voltar </a>
                
            </fieldset>
        </form>
    </div>
</body>
</html>