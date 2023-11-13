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
body {
    font-family: Arial, Helvetica, sans-serif;
    
   
    background-image: url(./fundchat.png)  ;
    background-color: #f7f7f7;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
}


.chat-container {
     display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0.8;
    height: 700px;
    width: 1650px;
    background-color: lightblue;
    border-radius: 30px;
    overflow: hidden;
    
}
.chat-messages {
    
    padding: 150px;
    height: 300px;
    overflow-y: scroll;
}
.message {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
     display: flex;
    justify-content: center;
    align-items: center;
}

.chat-input input {
    flex: 1;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 35px;
    
}


.sent-message {
    background-color: #4caf50;
    color: white;
    
}
.chat-input {
    display: flex;
    align-items: center;
    padding: 10px;
    border-top: 1px solid #ccc;
}

.chat-input button {
            cursor: pointer;
            border-radius:  15px;
            outline: none;
            font-size: 20px;
            text-decoration: none;        
            background-color:dodgerblue;
            padding: 5px;
            width: 100%;
            border-radius: 50px;
            color: white;
            
}

@media (max-width: 768px) {
    .chat-container {
        max-width: 100%;
    }
}
h1{
   
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}
 a{
      cursor: pointer;
            border-radius: 35px;
            outline: none;
            font-size: 20px;
            text-decoration: none;        
            background-color:dodgerblue;
            padding: 5px;
            width: 100%;
           
            color: white;
            display: flex;
    justify-content: center;
   
         
        
        }

    </style>
        
</head>    
   <body>

       <h1> Chat </h1>
       <br><br>
               <div class="chat-container">
        <div class="chat-messages">
       <div id="mensagens">
          
       </div>
            
            <div class="chat-input">
             <input type="text" id="nome" placeholder="Seunome" autocomplete="off"/><br/>
            </div>
            <div class="chat-input">
       <input type="text" id="mensagem" placeholder="Mensagem"/>
    
            </div>
            <div class="chat-input button">
             <button id="enviar">Enviar </button>
           
            </div>
            
            <div>
                <div class="chat-input button">
                    
                    <a href="paginacli.php">Voltar </a></div>
            </div>
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
       
   </body>
</html>