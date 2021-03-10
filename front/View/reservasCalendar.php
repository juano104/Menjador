<?php
session_start();
if(empty($_SESSION["username"])){
    header("Location: https://www.menjadorescola.me/");
}
//print_r($_SESSION["username"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="public/css/estils.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href='public/css/fullcalendar.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.3/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.3/jquery-ui.js"></script>-->
    <script src="public/js/jquery.min.js"></script>

    <script src="public/js/moment.min.js"></script>
    <script src="public/js/fullcalendar.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <style>
        #calendar {
            margin-bottom: 5%;
        }
    </style>

</head>

<body>
    <!-- Menu de navegacio -->
    <?php require_once "navbar.php" ?>

    <canvas id="canvas" width="0%" height="0%"></canvas>
    <div class="container margin">
    <div aria-label="breadcrumb" style="margin-bottom: 3%;">
            <ol class="breadcrumb bg-transparent px-0">
                <li class="breadcrumb-item active">Pagina Padres</li>
                <li class="breadcrumb-item active" aria-current="page">Ver tus reservas</li>
            </ol>
        </div>
        <H6>DESCARGAR: </H6>
        <a class="btn btn-danger" href="#" id="print" style="margin-bottom: 5%;"><i class="fas fa-file-pdf"></i></a>
        <div id='calendar'></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                eventSources: [{
                    url: 'https://www.menjadorescola.me/ReadReservas',
                    method: 'POST'
                }],
                eventClick: function(event, element) {
                    alert(event.title);
                    alert(event.start);
                },
                hiddenDays: [0, 6],
                showNonCurrentDates: false,
                eventLimit: true,
                eventOrder: "type",
                eventColor: '#f2c9a0'
            })
        });
    </script>
    <!-- Footer -->
    <?php require_once "footer.php" ?>
    <!-- Footer -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    -->
    <script>
        $("#print").click(function() {
            //#AEFC is my div for FullCalendar
            html2canvas($('#calendar'), {
                logging: true,
                useCORS: true,
                onrendered: function(canvas) {
                    var imgData = canvas.toDataURL("image/png");
                    var doc = new jsPDF();
                    doc.addImage(imgData, 'png', 15, 40, 180, 160);
                    doc.save('sample-file.pdf');

                }
            });
        });
    </script>
</body>

</html>