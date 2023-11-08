<?php

if (isset($_POST['submit']))
{    
   include_once('index.php');
   
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $cpf = $_POST['cpf'];
   $telefone = $_POST['telefone'];
   $sexo = $_POST['genero'];
   $datanasc = $_POST['datanasc'];
   $endereco = $_POST['endereco'];
   $senha = $_POST['senha'];
   $nivel = $_POST['nivel'];
   
 $resultado = mysqli_query($conexao,"INSERT INTO usu (nome,email,cpf,telefone,sexo,datanasc,endereco,senha,nivel) VALUES ('$nome','$email','$cpf','$telefone','$sexo','$datanasc','$endereco','$senha','$nivel)");

 
 header('Location: telalog.php');
 
}

 

?>

<html lang="en">
<head>
   
    <title>Cadastrar clientes </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./dentista.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
        }
        .box{
            
            opacity: 0.6;
            text-align: center;
            color: white;
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color:	#1E90FF;
            padding: 30px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: blue;
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
           
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-color: blue;
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        
        a{
         background-color: blue;
         width: 100%;
         border:none;
         padding:15px;
         color: white;
         font-size: 15px;
         cursor: pointer;
         border-radius: 10px;
         text-decoration: none;
        
        }
        
    </style>
</head>
<body>
    <div class="box">
        <form action="telacadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                
                <br><br>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome completo</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email" class="labelInput">Email</label>
                    <input type="text" name="email" id="email" class="inputUser" required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="cpf" class="labelInput">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone" class="labelInput">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    
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
                    <label for="endereco" class="labelInput">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha</label>
                    <input type="text" name="senha" id="senha" class="inputUser" required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="nivel" class="labelInput">Nivel de acesso</label>
                    <input type="text" name="nivel" id="nivel" class="inputUser" required>
                    
                </div>
                <input type="submit" name="submit" id="submit">
                <br><br>
                <a href="telalog.php"> Voltar </a>
                
            </fieldset>
        </form>
    </div>
</body>
</html>