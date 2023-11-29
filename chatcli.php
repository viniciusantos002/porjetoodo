<?php
$pdo = new PDO('sqlite: bd.cadastrocli');
//Cria uma tabela no banco caso não exista//
$pdo->exec('CREATE TABLE IF NOT EXISTS mensagens (id INTEGER PRIMARY KEY,mensagem TEXT)');

//verifica se uma variável chamada mensagem está presente na requisição POST//
if (isset($_POST['mensagem'])) {
    //Filtra e sanitiza a mensagem recebida usando filter_input com FILTER_SANITIZE_FULL_SPECIAL_CHARS//
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //Prepara uma instrução SQL para inserir a mensagem na tabela mensagens//
    $stm = $pdo->prepare('INSERT INTO mensagens (mensagem) VALUES (?)');
    $stm->execute([$mensagem]);
    //Finaliza o script para interromper a execução após a inserção da mensagem//
    die;
}

//Verifica se uma variável chamada mensagens está presente na requisição GET//
if (isset($_GET['mensagens'])) {
    //Realiza uma requisição na tabela mensagens//
    $resu = $pdo->query('SELECT mensagem FROM mensagens')->fetchAll();
    $mensagens = '<ul>';
    //Cria uma lista contendo as mensagens salva no banco e mostra na tela//
    foreach ($resu as $registro) {
        $mensagens .= '<li>' . $registro['mensagem'] . '</li>';
    }
    $mensagens .= '</ul>';

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
                border-radius: 35px;

            }



            .chat-messages {
                max-height: 3000px;
                overflow-y: auto;
                border: 5px solid dodgerblue;
                padding: 40px;
                margin-bottom: 10px;
            }

            .chat-input {
                margin-bottom: 20px;

            }

            input, button, a {
                padding: 10px;
                font-size: 16px;
                margin: 5px;
                width: 100%;
                border-radius: 35px;
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
                color: dodgerblue;
                letter-spacing: 2px;
                font-size: 24px;
            }


        </style>

    </head>    
    <body>


        <br><br>

        <div class="chat-container">
            <div class="chat-messages">
                <h1> Chat </h1>
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
                        <button  onclick="window.location.href = 'paginacli.php';"> Voltar </button>
                    </div>
                </div>
                <script>
                    const inputNome = document.getElementById("nome");
                    const inputMensagem = document.getElementById("mensagem");

                    //Constrói uma mensagem combinando os valores que estão armazenados no nome e mensagem //
                    document.getElementById("enviar").addEventListener("click", () => {

                        if (!inputNome.value || !inputMensagem.value)
                            return;
                        var mensagem = `${inputNome.value}: ${inputMensagem.value}`;
                        //Usa a função fetch para realizar uma requisição POST para o chat.php passando  a mensagem como corpo da requisição //
                        fetch('chatcli.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: "mensagem=" + encodeURIComponent(mensagem)
                        }).then(() => {
                            inputMensagem.value = '';
                            inputMensagem.focus();
                            //Após o envio , limpa o campo mensagem e chama a função atualizamensagens//
                            atualizamensagens();
                        });
                    });
                    //Essa função realiza uma requisição GET para o chatcli.php?mensagens=true , ao receber a resposta converte o conteúdo da div com ID mensagens com o novo conteudo recebido do server//
                    function atualizaMensagens() {
                        const divMensagens = document.getElementById('mensagens');

                        fetch('chatcli.php?mensagens=true')
                                .then((response) => {
                                    return response.text();
                                })
                                .then((mensagens) => {
                                    divMensagens.innerHTML = mensagens;
                                })
                                .catch((error) => {
                                    console.error("Erro ao buscar mensagens", error);
                                });
                    }
                    //Essa função redireciona o navegador para paginacli.php alterando o valor da propriedade window.location.href//
                    function redirecionar() {
                        window.location.href = 'paginaadm.php';
                    }
                    //Atualiza  as mensagens a cada 2000 milisegundos//
                    setInterval(atualizaMensagens, 2000);
                    
                </script>    

                </body>
                </html>