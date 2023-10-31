<!DOCTYPE html>
<html lang="en">
<head>
        
    <title>Login </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./dente.png)  ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            
        }
        div{
            background-color: rgba(0, 191 , 255 );
            opacity: 0.5;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 55px;
            color: whitesmoke;
            text-align: center;
        }
        input{
            padding: 15px;
            border-radius: 15px;
            outline: none;
            font-size: 20px;
        }
        .inputsubmit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 50px;
            color: white;
            font-size: 20px;
            
        }
        .inputsubmit:hover{
            background-color: cyan;
            cursor: pointer;
        }
        a{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 20px;
        }
        a{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 50px;
            color: white;
            font-size: 20px;
            
        }
        a:hover{
            background-color: cyan;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="testelog.php" method="POST">
        <input type="text" name="email" placeholder="Email">
        <br><br>
        <input type="password" name="senha" placeholder="Senha">
        <br><br>
        <input class="inputsubmit" type="submit" name="submit" value="Enviar">
        </form>
        <h3> Ainda não pssui cadastro </h3>
        
        <a href="telacadastro.php"> Clique aqui </a> 
    </div>
</body>
</html>