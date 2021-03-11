<?php
session_start();

if ($_SESSION["username"] == "") {
    header("Location: https://admin.menjadorescola.me/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Hacer un view para cada read?? -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read_All</title>

    <!-- css -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />

    <!--<link rel="stylesheet" href="../public/css/estils.css">-->
    <link rel="stylesheet" href="../public/css/estils.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

    <!-- js -->



    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/b-1.6.5/b-html5-1.6.5/datatables.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <?php require_once "navbar.php" ?>
    </div>

    <div class="container" style="margin-top: 2%;">
    <div aria-label="breadcrumb" style="margin-bottom: 3%;">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item active">Pagina Escuela Admin</li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Total Reservas</li>
                </ol>
            </div>
        <h1>Reservas Fijas</h1>
        <table id="tableSingle" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="head">ID ESTUDIANTE</th>
                    <th class="head">Fecha</th>
                    <th class="head">Total Dias</th>
                    <th class="head">Clase</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="container" style="margin-bottom: 10%; margin-top: 2%;">
        <h1>Reservas Mixtas</h1>
        <table id="tableMultiple" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="head">ID ESTUDIANTE</th>
                    <th class="head">Fecha Inicio</th>
                    <th class="head">Fecha Final</th>
                    <th class="head">Dias</th>
                    <th class="head">Clase</th>
                </tr>
            </thead>
        </table>
    </div>




    <script>
        $(document).ready(function() {


            var t = $('#tableSingle').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                data: <?php echo json_encode($userArr); ?>,
                columns: [{
                    data: 'student_ID'
                }, {
                    data: 'single_day'
                }, {
                    data: 'count'
                }, {
                    data: 'class_name'
                }],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                },
                select: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'PDF',
                    className: 'btn btn-danger pdf'
                }]
            });

            function loadData() {
                t = $('#tableSingle').DataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    data: <?php echo json_encode($userArr); ?>,
                    columns: [{
                        data: 'student_ID'
                    }, {
                        data: 'single_day'
                    }, {
                        data: 'count'
                    }, {
                        data: 'class_name'
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true,
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        className: 'btn btn-danger pdf'
                    }]
                });

            }



            var t = $('#tableMultiple').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                data: <?php echo json_encode($BookingsArr); ?>,
                columns: [{
                    data: 'student_ID'
                }, {
                    data: 'start_date'
                }, {
                    data: 'end_date'
                }, {
                    data: 'days'
                }, {
                    data: 'class_name'
                }],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                },
                select: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'PDF',
                    className: 'btn btn-danger pdf'
                }]
            });

            function loadData() {
                t = $('#tableMultiple').DataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    data: <?php echo json_encode($BookingsArr); ?>,
                    columns: [{
                        data: 'student_ID'
                    }, {
                        data: 'start_date'
                    }, {
                        data: 'end_date'
                    }, {
                        data: 'days'
                    }, {
                        data: 'class_name'
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true,
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger pdf'
                    }]
                });

            }

        });
    </script>
     <?php require_once "footer.php" ?>
    <!-- Footer -->

</body>

</html>