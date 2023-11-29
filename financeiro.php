<?php
//Inicia uma sessão//
session_start();
//Inclui o arquivo de conexão com banco //
include_once('index.php');
//Faz uma consulta na tabela finan//
$sql = "SELECT * FROM finan";
//Armazena o resultado da consulta na variável resultado//
$resultado = $conexao->query($sql);
//Vê se o parâmetro está presente na URL , caso estiver presente vai realizar uma pesquisa na tabela finan , caso não estiver , realiza uma consulta padrão sem filtro //
if (!empty($_GET['search'])) {
    $date = $_GET['search'];
    $sql = "SELECT * FROM finan WHERE id LIKE '%$date%' or nomep LIKE '%$date%' or produto LIKE '%$date%' ORDER BY id ASC";
} else {
//Pega od dados da tabela finan e coloca em ordem crescente//
    $sql = "SELECT * FROM finan ORDER BY id ASC";
}
//Executa a consulta e sobrescreve o valor da variável resultado
$resultado = $conexao->query($sql);
//Inicia a variável com valor 0//
$somatotal = 0;
?>



<html>



    <body>
        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #1E90FF;

            }

            li {
                float: left;
            }

            li a {
                position: relative;
                display: block;
                color: whitesmoke;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }



            li a:hover {
                background-color: white;
                color:#1E90FF;
            }


            body{
                background-color: blue;
                background-image: url(./fundoadm.png)  ;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size:100%;
                text-align: center;
            }


            .box-search{
                display: flex;
                justify-content: center;

            }
            table{
                opacity: 0.9;
                background-color:#32CD32;
                text-align: center;
                width: 100%;
                margin-top: 20px;
                border-radius: 0px 0px;
                overflow: hidden;
            }
            th,td{
                padding: 12px;
                text-align: center;

            }
            td{
                color:black;
                font-weight: bold;
            }
            th{

                font-weight: bold;

            }

            tr:nth-child(even){
                background-color:#006400;
            }
            .btn{
                margin-right: 5px;
                text-align: center;
            }
            caption{
                text-align: center;
            }

            h1{
                color: dodgerblue;
            }
            h3{
                color: #006400 ;
            }
            a{
                text-align: center;
            }


        </style>
        <header>
            <h1>Clínica Odontológica Sorria</h1>
        </header>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <ul>
            <li><a class="active" href="paginaadm.php">Home</a></li>
            <li><a class="" href="financeiro.php">Financeiro</a></li>
            <li><a class="" href="telacadastro.php">Cadastrar Cliente</a></li>
            <li><a class="" href="chat.php">Chat</a></li>
            <li><a class="" href="calendario.php">Eventos marcados</a></li>
            <li><a class="sair" href="sair.php" class="btn btn-danger">Sair</a></li>
        </ul>

        <br>


    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Financeiro </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <h3> Controle de gastos da clínica </h3>
            <div class="m-5">


                <table class="table text-white table-bg">
                    <thead>
                        <tr>
                            <th scope="col">Nome do produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Total</th>
                            <th scope="col">Editar Produto</th>
                            <th scope="col">Excluir Produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Inicia um loop que percorre cada linha do resultado da tabela finan e armazena os valores nas variáveis correspondentes//
                        while ($row = $resultado->fetch_assoc()) {
                            $id = $row["id"];
                            $nome = $row["nome"];
                            $valor = $row["valor"];
                            $quantidade = $row["quantidade"];
                            //Calcula o valor da tabela total pegando o valor e multiplicando pela quantidade e armazena o resultado na variável total//
                            $total = $valor * $quantidade;

                            //Atualiza o valor calculado anteriormente na tabela finan//    
                            $update_sql = "UPDATE finan SET total = $total WHERE id = $id";
                            //Executa a atualização na tabela //    
                            $conexao->query($update_sql);
                            //Vai pegar a coluna total atualizada e fazer a soma de todos os valores//
                            $somatotal += $total;
                            //Mostra os dados da tabela de acordo com as variáveis //
                            echo "<tr>";
                            echo "<td>" . $nome . "</td>";
                            echo "<td>" . $valor . "</td>";
                            echo "<td>" . $quantidade . "</td>";
                            echo "<td>" . $total . "</td>";
                            //Essa parte estão os botões que vão pegar o id do produto e editar ou excluir ele //
                            echo "<td>
                        
                        <a class='btn btn-sm btn-primary' href='editarproduto.php?id=$id'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a> 
                    </td>
                    <td>
                        <a class='btn btn-sm btn-danger' href='deletepro.php?id=<?php echo $id; ?>' title='Deletar' onclick='confirmarExclusao()'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </td>";
                        }

                        echo "<tr class='total-row'>";

                        echo"  <th colspan='3' style='text-align:right;'>Total da soma dos gastos:</th>
                            <th>$somatotal</th>
                            <th colspan='2' style='text-align:right;'>Adicionar produto <a class='btn btn btn-success' href='cadastraproduto.php?'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-plus-square-fill' viewBox='0 0 16 16'>
                                                        <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z'/>
                                                    </svg>           
                                                </a>
                                                </th>
                            <td></td>
                            <td></td>
                        </tr>";
                        ?>
                    </tbody>
                </table>
            </div>

            <script>
                //Essa função vai chamar uma janela de alert e vai perguntar se deseja excluir o produto do banco de dados// 
                function confirmarExclusao() {
                    var resposta = window.confirm('Tem certeza que deseja excluir este produto?');

                    if (!resposta) {
                        event.preventDefault();
                    }
                }
            </script>

        </body>
    </html>
