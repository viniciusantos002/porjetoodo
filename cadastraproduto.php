<?php

if (isset($_POST['submit']))
{    
   include_once('index.php');
   
   $nome = $_POST['nome'];
   $valor = $_POST['valor'];
   $quantidade = $_POST['quantidade'];
   $total = $_POST['total'];
   
   
 $resultado = mysqli_query($conexao,"INSERT INTO financeiro (nome,valor,quantidade) VALUES ('$nome','$valor' , '$quantidade')");
  $fina=" UPDATE financeiro SET total = valor * quantidade";

 
 header('Location: financeiro.php');
 
}

 

?>

<html lang="en">
<head>
   
    <title>Financeiro </title>
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
         width: 100%;
         border:none;
         padding:15px;
         color: white;
         font-size: 15px;
         cursor: pointer;
         border-radius: 10px;
         text-decoration: none;
        
        }
        
    </style>   
</head>
<body>
    <div class="box">
        <form action="cadastraproduto.php" method="POST">
            <fieldset>
                <legend><b>Financeiro</b></legend>
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
                <input type="submit" name="submit" id="submit">
                <br><br>
                
                
            </fieldset>
        </form>
    </div>
</body>
</html>