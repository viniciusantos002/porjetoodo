<?php
//Verifica se existe uma variável POST chamada submit//
if (isset($_POST['submit'])) {
    //Inclui o arquivo de conexão com o banco de dados//
    include_once('index.php');
//Obtendo os dados do formulário //
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $datanasc = $_POST['datanasc'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    

    //Verifica se o email que foi obtido pelos dados já esta cadastrado//
    $verifica = "SELECT * FROM usuarios WHERE email='$email' ";
    $resultado = mysqli_query($conexao, $verifica);
    //Envia um alerta mostrando mensagem que o email já está cadastrado  e redireciona para a telacadastro.php//
    if (mysqli_num_rows($resultado) > 0) {
        echo'<script>alert("Já existe um usuário cadastrado com esse email.");window.location.href="telacadastro.php";</script>';
    } else {
    //Se o email não esviter cadastrado no banco ele insere as informações obtidas na tabela usuarios//
        $resultado = "INSERT INTO usuarios (nome,email,cpf,telefone,genero,datanasc,endereco,senha,nivel) VALUES ('$nome','$email','$cpf','$telefone','$sexo','$datanasc','$endereco','$senha','$nivel')";
        $inserir = mysqli_query($conexao, $resultado);

        if ($inserir) {
    //Alerta que o cliente foi cadastrado com sucesso//
            echo'<script>alert("O usuário foi cadastrado com sucesso.");window.location.href="paginaadm.php";</script>';
        } else {
            echo'Erro ao cadastrar cliente';
        }
    }
}
?>


<html lang="en">
    <head>

        <title>Cadastrar clientes </title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                background: linear-gradient(to bottom, #87CEEB, #f7f7f7);
            }

            .box {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 35px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }




            fieldset {
                border: none;
            }

            .inputBox {
                margin-bottom: 20px;

            }

            .labelInput {
                display: block;
                margin-bottom: 5px;
            }

            .inputUser {
                width: 100%;
                padding: 8px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 35px;
            }

            .radioGroup {
                display: flex;
                gap: 10px;
            }

            input[type="radio"] {
                margin-right: 5px;
            }

            input[type="submit"], a {
                cursor: pointer;
                border-radius: 5px;
                outline: none;
                font-size: 16px;
                text-decoration: none;
                background-color: dodgerblue;
                color: white;
                padding: 10px;
                width: 100%;
                text-align: center;
                display: block;
                margin-top: 10px;
            }

            #submit{
                background-color: blue;
                width: 100%;
                border: none;
                padding: 15px;
                color: white;
                font-size: 15px;
                cursor: pointer;
                border-radius: 35px;
            }

            a{
                background-color: blue;
                width: 290px;
                border:none;
                padding:15px 145px;
                color: white;
                font-size: 15px;
                cursor: pointer;
                border-radius: 35px;
                text-decoration: none;
                display: block;
                margin-top: 10px;


            }
            legend{
                text-align: center;
                padding: 10px;
                color: dodgerblue;
                font-size: 20px;

            }

            div{
                text-align: center;
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
                    <input type="radio" id="Feminino" name="genero" value="Feminino" required>
                    <label for="feminino">Feminino</label>

                    <input type="radio" id="Masculino" name="genero" value="Masculino" required>
                    <label for="masculino">Masculino</label>

                    <input type="radio" id="Outro" name="genero" value="Outro" required>
                    <label for="outro">Outro</label>

                    <br><br>
                    <br><br>
                    <label for="datanasc"><b>Data de Nascimento</b></label>
                    <br>
                    <input type="date" name="datanasc" id="datanasc" required>
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
                    <br>
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                    <br>
                    <a href="paginaadm.php"> Voltar </a>

                </fieldset>
            </form>
        </div>
    </body>
</html>