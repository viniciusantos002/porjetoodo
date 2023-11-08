<?php
    include_once('index.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usu WHERE id=$id";
        $resultado = $conexao->query($sqlSelect);
        if($resultado->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($resultado))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $cpf = $user_data['cpf'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $datanasc = $user_data['datanasc'];
                $endereco = $user_data['endereco'];
                $dataconsulta = $user_data['dataconsulta'];
                $senha = $user_data['senha'];
                $prorealizados = $user_data['prorealizados'];
                $proandamento = $user_data['proandamento'];
                $nivel = $user_data['nivel'];
            }
        }
        else
        {
            header('Location: paginaadm.php');
        }
    }
    else
    {
        header('Location: paginaadm.php');
    }
?>

<html lang="en">
<head>
    
    <title>Editar Cliente </title>
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
            top: 85%;
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
         width: 290px;
         border:none;
         padding:15px;
         color: white;
         font-size: 15px;
         cursor: pointer;
         border-radius: 10px;
         text-decoration: none;
        justify-content: center;
        display: flex;
        
        
        }
        
    </style>    
</head>
<body>
   
    <div class="box">
        <form action="salvareditar.php" method="POST">
            <fieldset>
                
                <legend><b>Editar Cliente</b></legend>
                <br><br>
              
                    <label for="nome" class="labelInput">Nome completo</label>
                     <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome;?> required>

                </div>
                <br><br>
               
                    <label for="email" class="labelInput">Email</label>
                    <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value=<?php echo $email;?> required>
                   
                </div>
                <br><br>
                 
                <label for="cpf" class="labelInput">CPF</label>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value=<?php echo $cpf;?> required>
                  
                </div>
                <br><br>
                <label for="telefone" class="labelInput">Telefone</label>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value=<?php echo $telefone;?> required>
                    
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '';?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '';?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '';?> required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento</b></label>
                <br><br>
                <input type="date" name="datanasc" id="datanasc" value=<?php echo $datanasc;?> required>
                <br><br><br>
                <div class="inputBox">
                    <label for="endereco" class="labelInput">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" value=<?php echo $endereco;?> required>
                    
                </div>
                <br><br>
                
                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha</label>
                    <input type="text" name="senha" id="senha" class="inputUser" value=<?php echo $senha;?> required>
                    
                    
                </div>
                <br><br>
                
                <br><br>
                <label for="dataconsulta"><b>Data da Consulta</b></label>
                <br><br>
                <input type="date" name="dataconsulta" id="dataconsulta" value=<?php echo $dataconsulta;?> >
                <br><br>
                <br><br>
                <div class="inputBox">
                    <label for="prorealizados" class="labelInput">Procedimentos Realizados</label>
                    <input type="text" name="prorealizados" id="prorealizados" class="inputUser" value=<?php echo $prorealizados;?> >
                    
                </div>
                <br><br>
                
                <br><br>
                
                <div class="inputBox">
                    <label for="proandamento" class="labelInput">Procedimentos em Andamento</label>
                    <input type="text" name="proandamento" id="proandamento" class="inputUser" value=<?php echo $proandamento;?> >
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="nivel" class="labelInput"> Nivel de acesso </label>
                    <input type="text" name="nivel" id="nivel" class="inputUser" value=<?php echo $nivel;?> >
                </div>
                <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
                <br><br>
                <a href="paginaadm.php">Voltar</a>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>