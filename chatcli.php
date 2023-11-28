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
    font-family: Arial, sans-serif;
    margin: 0;
     background-color: rgba(173, 216, 230, 0.9);
}

.chat-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 70px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.chat-messages {
    max-height: 3000px;
    overflow-y: auto;
    border: 3px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

.chat-input {
    margin-bottom: 10px;
   
}

input, button, a {
    padding: 10px;
    font-size: 16px;
    margin: 5px;
    width: 100%;
}

.button {
    width: calc(115% - 100px); 
    
}

button {
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 50px;
}

button:hover {
    background-color: #45a049;
}



h1 {
    text-align: center;
    margin-top: 20px;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 24px;
}


    </style>
        
</head>    
   <body>

       <h1> Mande mensagem para um de nossos funcionários se tiver alguma dúvida </h1>
       <br><br>
       
               <div class="chat-container">
        <div class="chat-messages">
            
            <h1>Chat</h1>
            
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
                    <button id  ="enviar" onclick="window.location.href='paginacli.php';"> Voltar </button>
                   
            </div>
       </div>
       <script>
           const inputNome = document.getElementById("nome");
           const inputMensagem = document.getElementById("mensagem");
           
           document.getElementById("enviar").addEventListener("click",() => {
             
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
           
           setInterval(atualizaMensagens, 5000);
       </script>    
       
   </body>
</html>