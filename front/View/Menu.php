<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <H6>DESCARGAR: </H6>
        <a class="btn btn-danger" href="#" id="print" style="margin-bottom: 5%;"><i class="far fa-file-pdf"></i></a>
        <div id='calendar'></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                eventSources: [{
                    url: 'https://intranet.menjadorescola.me/datos',
                    method: 'POST'
                }],
                hiddenDays: [0, 6],
                showNonCurrentDates: false,
                eventOrder: "type",
                eventColor: '#ffffff00'

            })
        });
    </script>
    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark pt-4">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
            <!-- Grid row -->
            <div class="row">
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-2 mx-auto">
                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="http://www.iesmanacor.cat/">IES Manacor Web</a>
                        </li>
                        <li>
                            <a href="https://www.menjadorescola.me/menu">Menu</a>
                        </li>
                        <li>
                            <a href="https://www.menjadorescola.me/login">Realizar Reserva</a>
                        </li>
                        <li>
                            <a href="https://www.menjadorescola.me/reservas">Mis Reservas</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <div class="col-md-4 mx-auto">
                    <!-- Content -->
                    <div class="row d-flex justify-content-center">
                    <div class="col-2"></div>
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 col-8">Ubicación</h5>
                    <div class="col-2"></div>
                    </div>
                    <div class="row">
                    <div class="col-2"></div>
                    <div id="mapid" class="col-8" style="width:400px;height:250px;"></div>
                    <div class="col-2"></div>
                    </div>

                    <script>
                        var map = L.map('mapid').
                        setView([39.56093185, 3.20064345557848],
                            15);

                        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                            maxZoom: 18
                        }).addTo(map);

                        L.control.scale().addTo(map);

                        var marker = L.marker([39.56093185, 3.20064345557848]).addTo(map);
                    </script>
                </div>
                <!-- Social buttons -->
                <div class="col-md-2 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">Xarxes</h5>
                    <br>
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-fb mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-tw mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-gplus mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Social buttons -->
                </div>
            </div>
            <!-- Grid row -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                © 2020 Copyright:
                <a href="#">Music</a>
            </div>
            <!-- Copyright -->
        </div>
    </footer>
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