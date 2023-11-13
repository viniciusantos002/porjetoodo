<?php

session_start();
include_once ('index.php');

// Consulta para obter o nome do usuário
$consulta = "SELECT id , nome FROM usuarios"; // Corrija esta consulta conforme necessário

$resultadoConsulta = mysqli_query($conexao, $consulta);

if ($resultadoConsulta) {
    $usuario = mysqli_fetch_assoc($resultadoConsulta);

    echo "Bem-vindo " . $usuario['nome'];
} else {
    echo "Erro na consulta: " . mysqli_error($conexao);
}

// Consulta secundária com filtro
if (!empty($_GET['search'])) {
    $date = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$date%' or nome LIKE '%$date%' or email LIKE '%$date%' ORDER BY id ASC";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";
}

$resultado = mysqli_query($conexao, $sql);

// Agora você pode usar $resultado para exibir os resultados da segunda consulta

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
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}



li a:hover {
  background-color: white;
}


 body{
           background-color: blue;
           background-image: url(./fundoadm.png)  ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:100%;
           text-align: center;
        }
        .table-bg{
            opacity: 0.8;
            background: rgba(65 , 105 , 237);
            border-radius: 15px 15px 10px 10px;
        }

        .box-search{
            display: flex;
            justify-content: center;
            
        }
        table{
            text-align: center;
        }
        caption{
            text-align: center;
        }

</style>
</head>
<body>
     <header>
        <h1>Clínica Odontológica</h1>
    </header>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<ul>
  <li><a class="active" href="paginaadm.php">Home</a></li>
  <li><a class="" href="financeiro.php">Financeiro</a></li>
  <li><a class="" href="telacadastro.php">Cadastrar Cliente</a></li>
  <li><a class="" href="chat.php">Chat</a>
  </li>
  <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
</ul>
       
     
     
    
    <div class="m-5">
          <h3> Dados dos Clientes </h3>
        <table class="table text-white table-bg"> 
            <thead>
 
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Data da Consulta</th>
                    <th scope="col">Procedimentos realizados</th>
                    <th scope="col">Procedimentos em andamento</th>
                    <th scope="col">Nivel de Acesso</th>
                    <th scope="col">Avaliação </th>
                    <th scope="col">Editar cadastro</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($resultado)) {
                        
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['cpf']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['genero']."</td>";
                        echo "<td>".$user_data['datanasc']."</td>";
                        echo "<td>".$user_data['endereco']."</td>";
                        echo "<td>".$user_data['dataconsulta']. "</td>";
                        echo "<td>".$user_data['prorealizados']. "</td>";
                        echo "<td>".$user_data['proandamento']. "</td>";
                        echo "<td>".$user_data['nivel']."</td>";
                        echo "<td>".$user_data['avaliacao']."</td>";
                       
                        
                       
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='editarcadastro.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a>
                            </td>
                           <td> 

                            <a class='btn btn-sm btn-danger' href='deletar.php?id=$user_data[id]' title='Deletar'>
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
         
    </body>
       
</html>