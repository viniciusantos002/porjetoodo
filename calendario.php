<?php 
include_once('index.php');

$res = "SELECT id, titulo, data_evento, data_fim FROM eventos";
$resueve = mysqli_query($conexao, $res);

$events = array();

while ($row_events = mysqli_fetch_array($resueve)) {
    $events[] = array(
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
        #calendario {
            max-width: 100%;
            margin: 0 auto;
        }

        .highlight-event {
            background-color: cyan; /* Cor de destaque para os eventos salvos */
            border: 1px solid #ffc107; /* Cor da borda */
            color: #856404; /* Cor do texto */
            position: relative;
        }

        .delete-button {
            cursor: pointer;
            color: #fff;
            background-color: #dc3545; /* Cor do botão Deletar */
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            margin-top: 5px;
            position: absolute;
            top:0;
            right: 0;
           
        }
         #btnVoltar {
            margin-top: 0px;
            padding: 15px 20px;
            background-color: #007bff; /* Cor do botão Voltar */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }
    </style>
<button id="btnVoltar">Voltar</button> <br><br>
</head>
<body>
    
    <div id="calendario"></div>
    

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.js"></script>
    
    
    <script>
        
        
        $(document).ready(function() {
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
                select: function(start, end) {
                    var titulo = prompt('Informe o título do evento:');
                    if (titulo) {
                        var eventData = {
                            title: titulo,
                            start: start.format('YYYY-MM-DD HH:mm:ss'),
                            end: end.format('YYYY-MM-DD HH:mm:ss')
                        };
                        $.ajax({
                            url: 'addevento.php',
                            type: 'POST',
                            data: eventData,
                            success: function(response) {
                                alert(response);
                                $('#calendario').fullCalendar('refetchEvents');
                            }
                        });
                    }
                },
                editable: true,
                eventResize: function(event) {
                    updateEvent(event);
                },
                eventDrop: function(event) {
                    updateEvent(event);
                },
                eventRender: function(event, element) {
                    // Adicionar a classe 'highlight-event' aos eventos salvos
                    if (event.salvo) {
                        element.addClass('highlight-event');
                        // Adicionar botão Deletar ao evento
                        element.find('.fc-title').append('<button class="delete-button" onclick="deleteEvent(' + event.id + ')">Deletar</button>');
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
                    success: function(response) {
                        alert(response);
                    }
                });
            }

            // Função para deletar um evento
            window.deleteEvent = function(eventId) {
                if (confirm('Tem certeza de que deseja deletar este evento?')) {
                    $.ajax({
                        url: 'deletarevento.php', // Substitua pelo nome correto do seu arquivo PHP de exclusão
                        type: 'POST',
                        data: { id: eventId },
                        success: function(response) {
                            alert(response);
                            $('#calendario').fullCalendar('refetchEvents');
                            location.reload();
                        }
                        
                    });
                }
            };
             $('#btnVoltar').click(function() {
                window.location.href = 'paginaadm.php'; // Substitua 'outra_pagina.php' pela URL desejada
            });
        });
    </script>
</body>
</html>
