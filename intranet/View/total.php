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
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/moment.min.js"></script>
    <script src="public/js/fullcalendar.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

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

        <h5>Descargar Calendari:</h5><a class="btn btn-danger" href="#" id="print"><i class="far fa-file-pdf"></i></a>

        <div id='calendar'></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                eventSources: [
                    {
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
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit.</p>

                </div>

                <!-- Social buttons -->
                <div class="col-md-2 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">Xarxes</h5>
                    <br>
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-fb mx-1">
                                <i class="fab fa-facebook-f"> </i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-tw mx-1">
                                <i class="fab fa-twitter"> </i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-gplus mx-1">
                                <i class="fab fa-google-plus-g"> </i>
                            </a>
                        </li>

                    </ul>
                    <!-- Social buttons -->

                </div>

            </div>
            <!-- Grid row -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">� 2020 Copyright:
                <a href="https://mdbootstrap.com/">Music</a>
            </div>
            <!-- Copyright -->

    </footer>
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