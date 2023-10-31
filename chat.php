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
   </head>
   
   <body>
       <h1> Chat </h1>
       
       <label for="nome"> Nome:</label><br/>
       <input type="text" id="nome" placeholder="Seunome" autocomplete="off"/><br/>
       
       <div id="mensagens">
           
       </div>
       
       <input type="text" id="mensagem" placeholder="Mensagem"/>
       <button id="enviar">Enviar </button>
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
           
           setInterval(atualizaMensagens, 3000);
       </script>    