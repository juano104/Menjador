<?php
session_start();
if ($_SESSION["username"] == "") {
    header("Location: https://intranet.menjadorescola.me/");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='public/css/fullcalendar.min.css' rel='stylesheet' />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estils.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/moment.min.js"></script>
    <script src="public/js/fullcalendar.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <style>

    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- Menu de navegacio -->
        <?php require_once "navbar.php" ?>
        <!-- Menu de navegacio -->
    </div>

    <canvas id="canvas" width="0%" height="0%"></canvas>
    <div class="container margin">
        <div aria-label="breadcrumb" style="margin-bottom: 3%;">
            <ol class="breadcrumb bg-transparent px-0">
                <li class="breadcrumb-item active">Pagina Restaurante</li>
                <li class="breadcrumb-item active" aria-current="page">Ver Total Reservas</li>
            </ol>
        </div>

        <h5>Descargar Calendari:</h5><a class="btn btn-danger" href="#" id="print"><i class="far fa-file-pdf"></i></a>

        <div id='calendar'></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                eventSources: [{
                        url: 'https://intranet.menjadorescola.me/datosCount',
                        method: 'POST'
                    },
                    {
                        url: 'https://intranet.menjadorescola.me/AllergyCount',
                        method: 'POST'
                    }
                ],
                hiddenDays: [0, 6],
                showNonCurrentDates: false,
                eventLimit: true,
                eventOrder: "type",
                eventColor: '#ffffff00'

            })
        });
    </script>


    <?php require_once "footer.php" ?>
    <!-- Footer -->

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