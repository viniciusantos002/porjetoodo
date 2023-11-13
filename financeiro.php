<?php

  session_start();
  include_once ('index.php');
  
  $sql = "SELECT * FROM finan";
        $resultado = $conexao->query($sql);
     
 
  
   if(!empty($_GET['search']))
    {
        $date = $_GET['search'];
        $sql = "SELECT * FROM finan WHERE id LIKE '%$date%' or nomep LIKE '%$date%' or produto LIKE '%$date%' ORDER BY id ASC";
        
    }
    else
    {
        $sql = "SELECT * FROM finan ORDER BY id ASC";
       

       
    }
    $resultado = $conexao->query($sql);
  
?>
<html>
    
    <head>
        
             <header>
        <h1>Clínica Odontológica</h1>
    </header>
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
            background-image: url(./financeiro.png)  ;
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
</style>
</head>
<body>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<ul>
  <li><a class="active" href="paginaadm.php">Home</a></li>
  <li><a class="" href="financeiro.php">Financeiro</a></li>
  <li><a class="" href="chat.php">Chat</a></li>
  <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
</ul>
       

     
     
     <br>
    <i class="bi bi-file-plus-fill"></i>
     
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Total</th>
                    <th scope="col">Adicionar Produto</th>
                    <th scope="col">Editar Produto</th>
                    <th scope="col">Exluir Produto</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
      // Exibição dos resultados
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $id = $row["id"];
        $nome = $row["nome"];
        $valor = $row["valor"];
        $quantidade = $row["quantidade"];

        // Realiza a multiplicação
        $total = $valor * $quantidade;

        // Atualiza a tabela com o resultado
        $update_sql = "UPDATE finan SET total = $total WHERE id = $id";
        $conexao->query($update_sql);
        
  
    }
}
                   
                        
                        echo "<tr>";
                        echo "<td>".$id."</td>";
                        echo "<td>".$nome."</td>";
                        echo "<td>".$valor."</td>";
                        echo "<td>".$quantidade."</td>";
                        echo "<td>".$total."</td>";
                        
                        
                       
                        echo "<td>
                            <a class'btn btn btn-success' href='cadastraproduto.php?'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='27' height='36' fill='currentColor' class='bi bi-plus-square-fill' viewBox='0 0 16 16'>
  <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z'/>
</svg>           

                           </a>
                           </td>
                           
                          <td>
                        <a class='btn btn-sm btn-primary' href='editarproduto.php?'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                          </td>
                          
                          <td>
                            <a class='btn btn-sm btn-danger' href='deletarproduto.php?' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    

                    ?>
            </tbody>
        </table>
    </div>
         
    </body>
       
</html>