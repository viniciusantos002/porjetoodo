<?php
// Verifica se o formulário foi enviado ao clicar no botão e vai executar
if (isset($_POST['submit'])) {
    // Inclui o arquivo de conexão com o banco de dados
    include_once('index.php');

    // Obtém os valores do formulário pelo método POST
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $total = $_POST['total'];

    // Insere os dados na tabela finan que foi obtido no formulário
    $resultado = mysqli_query($conexao, "INSERT INTO finan (nome, valor, quantidade) VALUES ('$nome', '$valor', '$quantidade')");

    // Verifica se a inserção foi bem-sucedida
    if ($resultado) {
        // Imprime um script JavaScript para mostrar um alerta
        echo '<script>';
        echo 'alert("Produto cadastrado com sucesso");';
        // Redireciona após o alerta
        echo 'window.location.href="financeiro.php";';
        echo '</script>';
    } else {
        echo 'Erro ao cadastrar produto';
    }
}
?>


<html lang="en">
    <head>

        <title>Financeiro </title>
        <style>
            body {
                font-family: Arial, sans-serif;
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
                color: 	dodgerblue;
                font-size: 20px;
            }

            div{
                text-align: center;
            }

        </style>   
    </head>
    <body>
        <div class="box">
            <form action="cadastraproduto.php" method="POST">
                <fieldset>
                    <legend><b>Adicionando Produto</b></legend>
                    <br><br>
                    <div class="inputBox">
                        <label for="nome" class="labelInput">Nome </label>
                        <input type="text" name="nome" id="nome" class="inputUser" required>

                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="valor" class="labelInput">Valor</label>
                        <input type="text" name="valor" id="valor" class="inputUser" required>

                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="quantidade" class="labelInput">Quantidade</label>
                        <input type="text" name="quantidade" id="quantidade" class="inputUser" required>

                    </div>
                    <br><br>
                    <br><br>
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                    <br>

                    <a href="financeiro.php"> Voltar </a>


                </fieldset>
            </form>
        </div>
    </body>
</html>