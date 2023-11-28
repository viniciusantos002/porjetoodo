<?php
    include_once('index.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM finan WHERE id=$id";
        $resultado = $conexao->query($sqlSelect);
        if($resultado->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($resultado))
            {
                $nome = $user_data['nome'];
                $valor = $user_data['valor'];
                $quantidade = $user_data['quantidade'];
               
                
            }
        }
        else
        {
            header('Location: financeiro.php');
        }
    }
    else
    {
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
    background-color: #f7f7f7;
}

.box {
    opacity: 0.8;
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

fieldset {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
}

.labelInput {
    display: block;
    margin-bottom: 5px;
}

.inputBox {
    margin-bottom: 20px;
}

.inputUser {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    margin: 5px 0;
    box-sizing: border-box;
}
.button-container {
    text-align: center;
}


#submit {
    padding: 15px;
            border: none;
            outline: none;
            font-size: 20px;
            text-decoration: none;        
            background-color: blue;
            border: none;
            padding: 15px;
            width: 50%;
            border-radius: 50px;
            color: white;
           
            
}

#submit:hover {
    background-color: #1E90FF;
    cursor: pointer;
}

a {
            padding: 15px;
            outline: none;
            font-size: 20px;
            text-decoration: none;        
            background-color: blue;
            width: 65%;
            border-radius: 50px;
            color: white;
            
}

a:hover {
    background-color: #1E90FF;
    text-decoration: underline;
    text-decoration: none;
    cursor: pointer;
}
title{
    text-align: center;
}
        
    </style>
</head>
<body>
   

<html lang="en">
<head>
    
    <title>Editar Produto </title>
    <style>
       body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./dentista.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
           }
       
        
    </style>
</head>
<body>
   
    <div class="box">
        <form action="salvareditproduto.php" method="POST">
            <fieldset>
                <legend><b>Editar Produto</b></legend>
                <br>
                <div class="inputBox">
                     <label for="nome" class="labelInput">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome;?> required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="valor" class="labelInput">Valor</label>
                    <input type="text" name="valor" id="valor" class="inputUser" value=<?php echo $valor;?> required>
                    
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="quantidade" class="labelInput">Quantidade</label>
                    <input type="text" name="quantidade" id="quantidade" class="inputUser" value=<?php echo $quantidade;?> required>
                    
                </div>
                <br><br>
                <div class="button-container">
				<input type="hidden" name="id" value=<?php echo $id;?>>
                                <input type="submit" name="update" id="submit" value="Alterar ">
                <br><br>
                <a href="financeiro.php">Voltar</a>
                </div>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>