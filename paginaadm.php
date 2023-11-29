<?php
session_start();
//Inclui a conexão com o banco de dados//
include_once ('index.php');

//Consulta o banco de dados //
$consulta = "SELECT id , nome FROM usuarios";

$resultadoConsulta = mysqli_query($conexao, $consulta);
//Verifica se o parâmetro não está vazio
if (!empty($_GET['search'])) {
    $date = $_GET['search'];
} else {
    //Ordena os registros em ordem crescente//
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";
}
//O resultado da consulta é armazenado na variavel resultado//
$resultado = mysqli_query($conexao, $sql);
?>

<html>

    <head>



    </head>
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
                background-color: white;
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

                color:#008B8B;
            }

            tr:nth-child(even){
                background-color:#20B2AA;
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
                color: dodgerblue;
            }
            a{
                text-align: center;
            }

        </style>
    </head>
<body>
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
        <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
    </ul>




    <div class="m-5">
        <h3>Lista dos Clientes Cadastrados</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>

                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Endereço</th>                                             
                        <th scope="col">Prontuário ou Editar dados </th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user_data = mysqli_fetch_assoc($resultado)) {
                        //Formata a data para o formato que usamos no Brasil//

                        $dataformatada = date('d/m/Y', strtotime($user_data['datanasc']));
                        $dataform = date('d/m/Y', strtotime($user_data['dataconsulta']));

                        //Mostra os dados do banco //

                        echo "<tr>";

                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['cpf'] . "</td>";
                        echo "<td>" . $user_data['telefone'] . "</td>";
                        echo "<td>" . $user_data['genero'] . "</td>";
                        echo "<td>" . $dataformatada . "</td>";
                        echo "<td>" . $user_data['endereco'] . "</td>";

                        echo "<td>
                                <a class='btn btn-sm btn-primary' href='editarcadastro.php?id=$user_data[id]'>
                                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clipboard2-pulse' viewBox='0 0 16 16'>
  <path d='M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z'/>
  <path d='M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z'/>
  <path d='M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128z'/>
                                  </svg>  
                                  
                                </a>
                            </td>
                            <td>
                                <a class='btn btn-sm btn-danger' href='javascript:void(0);' onclick='confirmDelete($user_data[id])' title='Deletar'>
    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
    </svg>
                                </a>
                            </td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--Alerta para confirmar se quer excluir o usuario  -->
    <script>
        function confirmDelete(userId) {
            var result = confirm("Tem certeza de que deseja excluir o usuário?");
            if (result) {
                window.location.href = 'delete.php?id=' + userId;
            } else {
                alert("Usuário não foi deletado");
            }
        }
    </script>

</body>

</html>