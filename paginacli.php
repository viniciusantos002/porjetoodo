<?php
//Inicia a sessão//
session_start();
//Inclui o arquivo de conexão com banco de dados//
include_once ('index.php');
//Realiza uma consulta no banco de dados com os campo id , nome , email da tabela usuarios 
$consulta = "SELECT id , nome , email FROM usuarios";
//Pega o resultado e armazena na variavel resultadoConsulta//

$resultadoConsulta = mysqli_query($conexao, $consulta);

//Verifica se o parâmetro search está presente na URL , se estiver o valor é atribuído a variável $date ,  se não estiver gera uma consulta SQL para selecionar todos os campos da tabela usuários ordenados pelo ID em ordem crescente//  
if (!empty($_GET['search'])) {
    $date = $_GET['search'];
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";
}
//Executa a consulta e armazena o resultado na variável $resultado//
$resultado = mysqli_query($conexao, $sql);

// Recupera o nome do usuário da sessão//
$nome = $_SESSION['nome'];
?>

<html>

    <body>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                background: linear-gradient(to bottom, #87CEEB, #f7f7f7);
            }

            header {

                color: white;
                text-align: center;
                padding: 10px;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #1E90FF;

            }

            li {
                float: left;
            }

            li a {

                display: block;
                color: whitesmoke;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }



            li a:hover {
                background-color: white;
                color:#1E90FF;
            }



            .content {
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .container {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h3 {
                color: 	#008B8B;
            }

            h5 {
                color: #008B8B;
                text-align: left;
                font-size: 20px;

            }

            h6 {
                cursor: pointer;
                text-decoration: none;
                text-align: center;
                color: dodgerblue;

            }

            h7 {
                display: none;
                margin-top: 10px;
                color: #333;
                text-align: center;
                font-weight: bold;
            }
            h1 {
                color: dodgerblue;
                text-align: center;
            }
            p  {
                color: #008B8B;
                font-size: 35px;
            }

        </style>

    <body>
        <header>
            <h1> Clínica odontológica Sorria  </h1>

        </header>

        <!-- Adicionando a nav bar -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <ul>    
            <li><a class="active" href="paginacli.php">Home</a></li>
            <li><a class="" href="chatcli.php">Chat para contato</a></li>
            <li><a class="sair" href="sair.php" class="btn btn-danger" >Sair</a></li>
        </ul>
        <h1> Bem-vindo(a)  </h1>

        <div class="container"> 
            <br><br>
            <p>Aqui na nossa clínica fazemos vários procedimos para deixar seus dentes saudaveis e brancos , abaixo alguns dos procedimento que fazemos em nossa clínica   <br> <br>
            </p>
            <h1> Clinico geral</h1>
            <br>

            <h5>Esse especialista é o que vai fazer a avaliaçao de seus dentes para verificar como anda o estado deles, além disso ele pode realizar outros procedimentos como :
            </h5>

            <br><br>

            <h6 onclick="toggleInfo('restauracoes')"> Restaurações </h6>

            <h7 id="restauracoes">A restauração dentária é um tratamento recomendado em uma situação em que um dente é danificado estruturalmente. Assim, se uma pessoa quebra ou lasca um dente, é preciso fazer uma restauração para corrigir esse problema.
                Isso porque um dente quebrado ou lascado não é apenas um incômodo estético. É verdade que essa situação pode ser altamente prejudicial para a autoestima, mas pode, também, causar danos para a saúde do indivíduo.
                Afinal, os dentes têm uma função mastigatória que é fundamental para o bom funcionamento do sistema digestivo. Por isso, a restauração dentária é essencial para cuidar dessa questão.
            </h7>
            <br>
            <h6 onclick="toggleInfo('aplicacao')"> Aplicação de fluor </h6>

            <h7 id="aplicacao"> É um procedimento preventivo que faz fortalecer os dentes que apresentam médio e alto risco de cárie
            </h7>
            <br>
            <h6 onclick="toggleInfo('tratamento')"> Tratamento de canal </h6>

            <h7 id="tratamento"> O tratamento de canal é um processo no qual ocorre a retirada da polpa do dente. A polpa é um tecido mole que fica logo abaixo da dentina e do esmalte dentário. Ela é composta por nervos, vasos sanguíneos e fibras. No entanto, em algumas situações, a polpa do dente pode ser infeccionada ou morta, o que gera a necessidade de sua remoção.
                E é aí que entra a importância do tratamento de canal. Nesse procedimento, a polpa dentária é retirada e o espaço restante é saneado, instrumentado e seco para o seu devido preenchimento.
            </h7>
            <br>
            <h6 onclick="toggleInfo('selante')"> Aplicação de selante</h6>

            <h7 id="selante"> Tratamentos complementares para ajudar a proteger seus dentes às vezes é necessário, e uma possibilidade é através da aplicação do selante dentário. Selante dentário é uma resina utilizada para ser colada na superfície do esmalte dental, na região dos sulcos dos dentes, chamada de superfície oclusal.
            </h7>
            <br>
            <h6 onclick="toggleInfo('aparelho')"> Colocação e retirada de aparelho é divida nas 6 etapas abaixo</h6>


            <h6 onclick="toggleInfo('diagnostico')"> 1.Diagnóstico </h6>

            <h7 id="diagnostico"> Todo tratamento ortodôntico começa com a primeira consulta ao ortodontista, mas o diagnóstico vai muito além do exame clínico inicial. Normalmente, essa etapa envolve a avaliação criteriosa do paciente e a solicitação de exames complementares para identificar o problema e criar um plano de ação para o tratamento.
                Após estudar o caso, o profissional deve informar ao paciente sobre as alterações encontradas, determinar o diagnóstico e apresentar as opções de tratamento.            
            </h7>
            <br>
            <h6 onclick="toggleInfo('instalar')"> 2.Instalação do aparelho </h6>

            <h7 id="instalar"> A colocação do aparelho representa o início do tratamento propriamente dito. Após a decisão do paciente, podem ser feitos novos exames e fotos para registrar a situação inicial, e, então, o aparelho ortodôntico é instalado nos dentes.
                Cada tipo de aparelho é colocado de uma maneira diferente, mas a partir desse momento os dentes já começam a se movimentar, promovendo a correção do problema.
                Durante o tratamento, é importante manter uma higiene impecável, prevenindo cáries e outras doenças que prejudicam a saúde bucal.
            </h7>
            <br>
            <h6 onclick="toggleInfo('alinhar')"> 3.Alinhamento </h6>

            <h7 id="alinhar"> O alinhamento é uma das principais etapas do tratamento ortodôntico, visto que os dentes devem estar nivelados e alinhados para que a movimentação seja eficaz. Por isso, a primeira correção normalmente é feita com fios leves e finos, que promovem giros para que os dentes se alinhem na posição correta.
                Em alguns casos, pode ser indicada a extração de algum dente, mas para a maioria das pessoas o alinhamento ocorre naturalmente, sem maiores problemas.
            </h7>
            <br>
            <h6 onclick="toggleInfo('correcao')"> 4.Correção </h6>

            <h7 id="correcao">Com dentes alinhados e nivelados, passa-se então para a correção do problema. Fios de aço, mais grossos que os utilizados na etapa anterior e combinados com elásticos, são responsáveis por promover a movimentação dos dentes para fechamento de espaços, ajuste de desvios, fechamento de mordidas abertas ou qualquer objetivo definido inicialmente.
                Essa é uma das etapas do tratamento ortodôntico mais demoradas, mas, após algum tempo, já é possível observar resultados promissores.
            </h7>
            <br>
            <h6 onclick="toggleInfo('finalizar')"> 5.Finalização</h6>

            <h7 id="finalizar">Quando os dentes se aproximam da posição correta, é chegada a hora da finalização, que pode exigir o uso de elásticos verticais, dobra nos arcos ou instalação de brackets e acessórios.
                Ainda que o paciente se sinta satisfeito com seu sorriso, apressar essa etapa pode colocar a perder todo o sucesso do tratamento. A fase final é a mais trabalhosa para o profissional e requer colaboração e paciência do paciente.
            </h7>
            <br>
            <h6 onclick="toggleInfo('conter')"> 6.Contenção </h6>

            <h7 id="conter">Depois da remoção do aparelho ortodôntico, o tratamento ainda não terminou! Os primeiros meses são considerados uma fase de adaptação dos dentes às novas posições, e o ortodontista pode indicar a colocação de contenções fixas ou removíveis para aumentar a estabilidade da arcada. As consultas podem ser mais espaçadas, mas são essenciais para o acompanhamento do caso.
                Nem sempre é possível estimar a duração de cada uma das etapas do tratamento ortodôntico: cada organismo reage de uma maneira diferente, e por isso cada paciente tem sua própria necessidade de tempo para que o problema seja corrigido de forma eficiente e duradoura. De qualquer maneira, passar por todas essas etapas é fundamental para obter os melhores resultados.
            </h7>     
            <br>    
            <h5> Essas só são uma das especialidades que temos em nossa clínica , caso tenha alguma dúvida entre em contato conosco através do chat que está na parte de cima da página. 
            </h5>
        </div>
        <script>
            function toggleInfo(id) {
                var element = document.getElementById(id);
                element.style.display = (element.style.display === 'none' || element.style.display === '') ? 'block' : 'none';
            }
        </script>

    </body>

</html>