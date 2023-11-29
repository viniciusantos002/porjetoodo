<?php
include_once('index.php');

//consulta no banco de dados//
$res = "SELECT id, titulo, data_evento, data_fim FROM eventos";
$resueve = mysqli_query($conexao, $res);

//Criando um array para os eventos//
$events = array();

while ($row_events = mysqli_fetch_array($resueve)) {
    $events[] = array(
        //informações do evento que serão armazenadas no banco de dados//
        'id' => $row_events['id'],
        'title' => $row_events['titulo'],
        'start' => $row_events['data_evento'],
        'end' => $row_events['data_fim'],
        'salvo' => true
    );
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendário de Eventos</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background: linear-gradient(to bottom, #87CEEB, #f7f7f7);
            }

            .container {
                max-width: 100%;
                margin: 30px;
            }

            h1 {
                text-align: center;
                color: dodgerblue;
            }

            .delete-button {
                cursor: pointer;
                color: #fff;
                background-color: #dc3545;
                border: none;
                padding: 5px 10px;
                border-radius: 15px;
                margin-top: 5px;
                position: absolute;
                top: -5px;
                right: 2px;

            }
            #btnVoltar {
                margin-top: 10px;
                padding: 15px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-align: center;
                display: block;
                margin: 0 auto; 
            }

            #calendario {
                max-width: 100%;
                margin-top: 20px;
            }


        </style>

    </head>
    <body>
        <h1> Caléndario de Eventos </h1>
        <br><br>
        <button id="btnVoltar">Voltar</button> <br><br>
        <div id="calendario"></div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.js"></script>


        <script>

            //Configurando o full calender//
            $(document).ready(function () {
                $('#calendario').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: moment().format('YYYY-MM-DD'),
                    locale: 'pt-br',
                    navLinks: true,
                    eventLimit: true,
                    events: <?php echo json_encode($events); ?>,
                    selectable: true,
                    selectHelper: true,
                    //Função para adicionar os eventos//
                    select: function (start, end) {
                        var titulo = prompt('Informe o título do evento:');
                        if (titulo) {
                            var eventData = {
                                title: titulo,
                                start: start.format('YYYY-MM-DD HH:mm:ss'),
                                end: end.format('YYYY-MM-DD HH:mm:ss')
                            };
                            $.ajax({
                                //Manda para outra aba para adicionar evento//
                                url: 'addevento.php',
                                type: 'POST',
                                data: eventData,
                                success: function (response) {
                                    alert(response);
                                    $('#calendario').fullCalendar('refetchEvents');
                                }
                            });
                        }
                    },
                    editable: true,

                    //Função para atualizar os eventos já existentes//
                    eventResize: function (event) {
                        updateEvent(event);
                    },
                    eventDrop: function (event) {
                        updateEvent(event);
                    },
                    //Função para renderizar Eventos//
                    eventRender: function (event, element) {

                        if (event.salvo) {
                            element.addClass('highlight-event');
                            //Botão para deletar os eventos//
                            element.find('.fc-title').append('<button class="delete-button" onclick="deleteEvent(' + event.id + ')">Excluir</button>');
                        }
                    }
                });

                function updateEvent(event) {
                    var eventData = {
                        id: event.id,
                        start: event.start.format('YYYY-MM-DD HH:mm:ss'),
                        end: event.end.format('YYYY-MM-DD HH:mm:ss')
                    };
                    $.ajax({
                        url: 'alterandoevento.php',
                        type: 'POST',
                        data: eventData,
                        success: function (response) {
                            alert(response);
                        }
                    });

                }

                //Função para deletar os eventos cadastrados//         
                window.deleteEvent = function (eventId) {
                    if (confirm('Tem certeza de que deseja deletar este evento?')) {
                        $.ajax({
                            url: 'deletarevento.php',
                            type: 'POST',
                            data: {id: eventId},
                            success: function (response) {
                                alert(response);
                                $('#calendario').fullCalendar('refetchEvents');
                                location.reload();
                            }

                        });
                    }
                };
                $('#btnVoltar').click(function () {
                    window.location.href = 'paginaadm.php';
                });
            });
        </script>
    </body>
</html>
