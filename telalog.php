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
            background-color: 	#008B8B;
            opacity: 0.8;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 105px;
            color: whitesmoke;
            text-align: center;
            
        }
        input{
            padding: 15px;
            border-radius: 35px;
            outline: none;
            font-size: 20px;
        }
        .inputsubmit{
            padding: 15px;
            outline: none;
            font-size: 20px;
            text-decoration: none;        
            background-color: blue;
            width: 100%;
            border-radius: 35px;
            color: white;
            
            
        }
        .inputsubmit:hover{
            background-color: #1E90FF;
            cursor: pointer;
        }
        a{
            border: none;
            outline: none;
            font-size: 20px;
            text-decoration: none;        
            background-color: blue;
            padding: 15px;
            width: 100%;
            border-radius: 35px;
            color: white;
            
        }
        a:hover{
            background-color: #1E90FF;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div>
        <h1>LOGIN</h1>
        <form action="testelog.php" method="POST">
            <input type="text" name="email" placeholder="Email" required>
        <br><br>
        <input type="password" name="senha" placeholder="Senha" required>
        <br><br>
        <input class="inputsubmit" type="submit" name="submit" value="Enviar">
        </form>
        <h3> Ainda não pssui cadastro? </h3>
        
        <a href="clientecadastrando.php"> Clique aqui </a> 
    </div>
</body>
</html>