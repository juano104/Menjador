<?php

//echo $_SESSION["username"];
//print_r($_SESSION["username"]);
if ($_SESSION["username"] == "") {
    header("Location: https://admin.menjadorescola.me/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="public/css/estils.css">

    <!--DATATABLE-->
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="public/css/estils.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <!-- button Datatable -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css">
    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Inline CSS based on choices in "Settings" tab -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }

        .bootstrap-iso form button,
        .bootstrap-iso form button:hover {
            color: white !important;
        }

        .asteriskField {
            color: red;
        }
    </style>


    <script>
        $(document).ready(function() {
            var date_input = $('input[id="day"]'); //our date input has the name "day"
            var container = $('.datepicker').length > 0 ? $('.datepicker').parent() : "body";
            date_input.datepicker({
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
</head>

<body>
    <div class="container-fluid">
        <!-- Menu de navegacio -->
        <?php require_once "navbar.php" ?>
        <!-- Menu de navegacio -->
    </div>
    <div class="bootstrap-iso">
        <div class="container">
        <div aria-label="breadcrumb" style="margin-bottom: 3%;">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item active">Pagina Escuela Admin</li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Reservas</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--<h3>Selecciona una fecha</h3>-->
                    <label for="day">Seleccione Fecha:</label>
                    <form action="" class="form-horizontal" method="post" style="margin: 0;">
                        <div class="form-group ">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input autocomplete="off" name="day" type="text" id="day" class="datepicker">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input name="_honey" style="display:none" type="text">
                                <button class="btn btn-dark " name="submit" type="submit">
                                    Ver reservas
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="price">Actualizar Precio:</label>
                    <form action="actualizar" class="form-horizontal" method="post" style="margin: 0;">
                        <div class="form-group ">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input autocomplete="off" name="price" type="text" id="price" placeholder="<?php echo $_SESSION['price'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button class="btn btn-dark " name="submit" type="submit">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 10%; margin-top: 5%;">
        <h1>Reservas para <?php echo $booking->getDate() ?></h1>
        <table id="tableReservas" class="display responsive nowrap table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="head">ID</th>
                    <th class="head">Nombre</th>
                    <th class="head">Apellidos</th>
                    <th class="head">Alergias</th>
                    <th class="head">Clase</th>
                </tr>
            </thead>
        </table>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">


    <script>
        $(document).ready(function() {
            //DT
            var t = $('#tableReservas').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                data: <?php echo json_encode($arrday); ?>,
                columns: [{
                    data: 'ID'
                }, {
                    data: 'name'
                }, {
                    data: 'last_name'
                }, {
                    data: 'allergy'
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
                }],
                responsive: true,

            });

            function loadData() {
                t = $('#tableReservas').DataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    responsive: true,
                    "bAutoWidth": false,
                    data: <?php echo json_encode($arrday); ?>,
                    columns: [{
                        data: 'ID'
                    }, {
                        data: 'name'
                    }, {
                        data: 'last_name'
                    }, {
                        data: 'allergy'
                    }, {
                        data: 'class_name'
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger pdf'
                    }],
                    responsive: true,
                });

            }
        });
    </script>
     <?php require_once "footer.php" ?>
</body>

</html>