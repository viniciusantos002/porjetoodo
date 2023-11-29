<?php
//Inclui o arquivo de conexão com o banco de dados//
include_once('index.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Uma consulta executada para recuperar os dados do usuario com o id fornecido e armazena na variável resultado//
    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = $conexao->query($sqlSelect);
    //Se retornar 1 ou mais linhas , entraa em um loop while para recuperar os dados do cliente//
    if ($resultado->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($resultado)) {
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $cpf = $user_data['cpf'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['genero'];
            $datanasc = $user_data['datanasc'];
            $endereco = $user_data['endereco'];
            $dataconsulta = $user_data['dataconsulta'];
            $senha = $user_data['senha'];
            $prorealizados = $user_data['prorealizados'];
            $proandamento = $user_data['proandamento'];
            $nivel = $user_data['nivel'];
            $anotacoes = $user_data['anotacoes'];
        }
    } else {
        header('Location: paginaadm.php');
    }
} else {
    header('Location: paginaadm.php');
}
?>

<html lang="en">
    <head>

        <title>Editar Cliente </title>
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
            <form action="salvareditar.php" method="POST">
                <fieldset>

                    <legend><b>Prontuário do paciente</b></legend>
                    <br><br>

                    <label for="nome" class="labelInput">Nome completo</label>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome; ?> required>

                    </div>
                    <br><br>

                    <label for="email" class="labelInput">Email</label>
                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser" value=<?php echo $email; ?> required>

                    </div>
                    <br><br>

                    <label for="cpf" class="labelInput">CPF</label>
                    <div class="inputBox">
                        <input type="tel" name="cpf" id="cpf" class="inputUser" value=<?php echo $cpf; ?> required>

                    </div>
                    <br><br>
                    <label for="telefone" class="labelInput">Telefone</label>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" value=<?php echo $telefone; ?> required>

                    </div>
                    <p>Sexo:</p>
                    <input type="radio" id="Feminino" name="genero" value="Feminino" <?php echo ($sexo == 'Feminino') ? 'checked' : ''; ?> >
                    <label for="feminino">Feminino</label>

                    <input type="radio" id="Masculino" name="genero" value="Masculino" <?php echo ($sexo == 'Masculino') ? 'checked' : ''; ?> >
                    <label for="masculino">Masculino</label>

                    <input type="radio" id="Outro" name="genero" value="Outro" <?php echo ($sexo == 'Outro') ? 'checked' : ''; ?> >
                    <label for="outro">Outro</label>
                    <br><br>
                    <label for="data_nascimento"><b>Data de Nascimento</b></label>
                    <br><br>
                    <input type="date" name="datanasc" id="datanasc" value=<?php echo $datanasc; ?> required>
                    <br><br>
                    <div class="inputBox">
                        <label for="endereco" class="labelInput">Endereço</label>
                        <input type="text" name="endereco" id="endereco" class="inputUser" value=<?php echo $endereco; ?> required>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <label for="senha" class="labelInput">Senha</label>
                        <input type="text" name="senha" id="senha" class="inputUser" value=<?php echo $senha; ?> required>


                    </div>
                    <br><br>
                    <label for="dataconsulta"><b>Data da Consulta</b></label>
                    <br><br>

                    <input type="date" name="dataconsulta" id="dataconsulta" value=<?php echo $dataconsulta; ?> >
                    <br><br>
                    <br><br>
                    <div class="inputBox">
                        <label for="nivel" class="labelInput"> Nivel de acesso </label>
                        <input type="text" name="nivel" id="nivel" class="inputUser" value=<?php echo $nivel; ?> >
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="prorealizados" class="labelInput">Procedimentos Realizados</label>
                        <input type="text" name="prorealizados" id="prorealizados" class="inputUser" value=<?php echo $prorealizados; ?> >

                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="proandamento" class="labelInput">Procedimentos em Andamento</label>
                        <input type="text" name="proandamento" id="proandamento" class="inputUser" value=<?php echo $proandamento; ?> >

                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="anotacoes" class="labelInput"> Anotações </label>
                        <textarea name="anotacoes" id="anotacoes" class="inputUser" ><?php echo $anotacoes; ?></textarea>
                    </div>



                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="update" id="submit" value="Salvar alterações" onclick="showAlert(confirm('Deseja fazer as alterações?'))">
                    <br><br>
                    <a href="paginaadm.php">Voltar</a>
                    <br><br>
                </fieldset>
            </form>
        </div>
        <script>
            function showAlert(success) {
                if (success) {
                    alert('Alterações realizadas com sucesso');
                } else {
                    alert('Não foi realizada alteração ou teve um erro');
                }
            }
        </script>

    </body>
</html>

