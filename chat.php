<?php
    $pdo = new PDO('sqlite: bd.cadastrocli');
    $pdo->exec('CREATE TABLE IF NOT EXISTS mensagens (id INTEGER PRIMARY KEY,mensagem TEXT)');
    
    if(isset($_POST['mensagem']))
    {
        $mensagem = filter_input(INPUT_POST, 'mensagem' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $stm = $pdo->prepare('INSERT INTO mensagens (mensagem) VALUES (?)');
        $stm->execute([$mensagem]);
        
        die;
    }
    if(isset($_GET['mensagens'])) {
        $resu = $pdo->query('SELECT mensagem FROM mensagens')->fetchAll();
        
        $mensagens  ='<ul>';
        
        foreach ($resu as $registro){
            $mensagens .= '<li>' .$registro['mensagem'] . '</li>';
        }
        $mensagens .='</ul>';
        
        echo $mensagens;
        die;
    }
    
?>

<html lang="pt-br">
   
    
<head>
    <style>
         body{
            font-family: Arial, Helvetica, sans-serif;
            background-size: 100%;
            
        }
        div{
            background-color: rgba(0, 191 , 255 );
            opacity: 0.7;
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
            padding: 5px;
            border-radius: 25px;
            outline: none;
            font-size: 25px;
            
        }
        
        </style>
</head>    
   <body>

       <h1> Chat </h1>
       
       
      
       <input type="text" id="nome" placeholder="Seunome" autocomplete="off"/><br/>
       
       
       <input type="text" id="mensagem" placeholder="Mensagem"/>
       <button id="enviar">Enviar </button>
       <div id="mensagens">
           
       </div>
       <script>
           const inputNome = document.getElementById("nome");
           const inputMensagem = document.getElementById("mensagem");
           
           document.getElementById("enviar").addEventListener("click",() => {
              //verificar se o usuario informou os dados
              if(!inputNome.value || !inputMensagem.value)
                  return;
              var mensagem = `${inputNome.value}: ${inputMensagem.value}`;
              
              fetch('chat.php',{
                  method: 'POST',
                  headers: {
                      'Content-Type' : 'application/x-www-form-urlencoded'
                  },
                  body: "mensagem=" + encodeURIComponent(mensagem)
              }).then(() => {
                  inputMensagem.value = '';
                  inputMensagemfocus();
                  atualizamensagens();
              });
           });
           
           function atualizaMensagens(){
               const divMensagens = document.getElementById('mensagens');
               
               fetch('chat.php?mensagens=true')
                       .then((response) =>{
                           return response.text();
               })
                       .then((mensagens) => {
                           divMensagens.innerHTML = mensagens;
               })
                       .catch((error) => {
                           console.erro("Erro ao buscar mensagens",error);
               });  
           }
           atualizaMensagens();
           
           setInterval(atualizaMensagens, 2000);
       </script>    