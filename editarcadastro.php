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
            background-image: url(./logi.png) ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
        }
        .box{
            text-align: center;
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
            text-align: center;
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
            width: 50%;
            border: none;
            padding: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 15px;
           
        }
        a:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
   
    <div class="box">
        <form action="salvareditar.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome;?> required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value=<?php echo $email;?> required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
               
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value=<?php echo $cpf;?> required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value=<?php echo $telefone;?> required>
                    <label for="telefone" class="labelInput">Telefone</label>
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
                <input type="date" name="datanasc" id="datanasc" value=<?php echo $datanasc;?> required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value=<?php echo $endereco;?> required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" value=<?php echo $senha;?> required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                
                <br><br>
                <label for="dataconsulta"><b>Data da Consulta</b></label>
                <input type="date" name="dataconsulta" id="dataconsulta" value=<?php echo $dataconsulta;?> >
                <br><br>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="prorealizados" id="prorealizados" class="inputUser" value=<?php echo $prorealizados;?> >
                    <label for="prorealizados" class="labelInput">Procedimentos Realizados</label>
                </div>
                <br><br>
                
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="proandamento" id="proandamento" class="inputUser" value=<?php echo $proandamento;?> >
                    <label for="proandamento" class="labelInput">Procedimentos em Andamento</label>
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