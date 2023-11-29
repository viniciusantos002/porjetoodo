<?php
// Inclui o arquivo de conexão com o banco
include_once('index.php');

// Verifica se o parâmetro id na consulta GET não está vazio
if (!empty($_GET['id'])) {
    // Atribui o valor do parâmetro à variável id
    $id = $_GET['id'];
    // Faz uma consulta no banco de dados da tabela finan e pega todas as colunas onde o ID é igual ao valor contido na variável id
    $sqlSelect = "SELECT * FROM finan WHERE id=$id";
    // Executa a consulta e armazena o resultado na variável resultado
    $resultado = $conexao->query($sqlSelect);

    // Verifica se há uma ou mais linhas no resultado da consulta
    if ($resultado->num_rows > 0) {
        // Se houver linhas, armazena os dados nas variáveis nome, valor e quantidade
        while ($user_data = mysqli_fetch_assoc($resultado)) {
            $nome = $user_data['nome'];
            $valor = $user_data['valor'];
            $quantidade = $user_data['quantidade'];
        }
    } else {
        // Se não houver resultado na consulta, redireciona para a tela financeiro.php
        header('Location: financeiro.php');
    }
} else {
    // Se o parâmetro id não estiver presente na consulta GET, redireciona para a tela financeiro.php
    header('Location: financeiro.php');
}
?>



<html lang="en">
    <head>

        <title>Editar Produto </title>
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


    <html lang="en">
        <head>

            <title>Editar Produto </title>

        </head>
        <body>

            <div class="box">
                <form id="formid" action="salvareditproduto.php" method="POST">
                    <fieldset>
                        <legend><b>Editar Produto</b></legend>
                        <br>
                        <div class="inputBox">
                            <label for="nome" class="labelInput">Nome</label>
                            <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome; ?> required>

                        </div>
                        <br><br>
                        <div class="inputBox">
                            <label for="valor" class="labelInput">Valor</label>
                            <input type="text" name="valor" id="valor" class="inputUser" value=<?php echo $valor; ?> required>

                        </div>
                        <br><br>
                        <div class="inputBox">
                            <label for="quantidade" class="labelInput">Quantidade</label>
                            <input type="text" name="quantidade" id="quantidade" class="inputUser" value=<?php echo $quantidade; ?> required>

                        </div>
                        <br><br>
                        <div class="button-container">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>
                            <input type="submit" name="update" id="submit" value="Alterar" >
                            <br>
                            <a href="financeiro.php">Voltar</a>
                            <br>
                        </div>
                        <br><br>
                    </fieldset>
                </form>


            </div>
        </body>
    </html>
    
<script>
    // Aguarda o carregamento completo do documento//
    document.addEventListener('DOMContentLoaded', function () {
        // Adiciona um listener para o evento submit no formulário//
        document.getElementById('formid').addEventListener('submit', function () {
            // Exibe um alerta confirmando as alterações//
            alert('Alterações realizadas com sucesso!');
        });
    });
</script>
