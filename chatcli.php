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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Chat Responsivo</title>
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f7f7f7;
}

.chat-container {
    width: 100%;
    max-width: 400px;
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

.chat-messages {
    padding: 20px;
    height: 300px;
    overflow-y: scroll;
}

.message {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
}

.received-message {
    background-color: #f2f2f2;
}

.sent-message {
    background-color: #4caf50;
    color: white;
    align-self: flex-end;
}

.chat-input {
    display: flex;
    align-items: center;
    padding: 10px;
    border-top: 1px solid #ccc;
}

.chat-input input {
    flex: 1;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.chat-input button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    margin-left: 10px;
    border-radius: 5px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .chat-container {
        max-width: 100%;
    }
}
</style>

<body>
    <div class="chat-container">
        <div class="chat-messages">
            <div class="message received-message">Olá! Como posso ajudar?</div>
            <div class="message sent-message">Olá! Preciso de ajuda com um problema.</div>
            <!-- Mensagens adicionais seriam inseridas aqui -->
        </div>
        
        <div class="chat-input">
            <input id="nome" type="text" placeholder="Digite seu nome aqui">
           
        </div>
        <div class="chat-input">
            <input id="mensagem" type="text" placeholder="Digite sua mensagem">
            <button id="enviar">Enviar</button>
        </div>
        <button id="enviar">Enviar</button>
        
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
    </div>
</body>

</html>
