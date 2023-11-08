<?php
    include_once('index.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM financeiro WHERE id=$id";
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
       body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./dentista.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
        }
        .box{
            opacity: 0.6;
            text-align: center;
            color: white;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color:	#1E90FF;
            padding: 30px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: blue;
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
           
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-color: blue;
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        
        a{
         background-color: blue;
         width: 290px;
         border:none;
         padding:15px;
         color: white;
         font-size: 15px;
         cursor: pointer;
         border-radius: 10px;
         text-decoration: none;
        justify-content: center;
        display: flex;
        
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
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
                <br><br>
                <a href="financeiro.php">Voltar</a>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>