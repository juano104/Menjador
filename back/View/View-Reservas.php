<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="public/css/estils.css">

    <!--DATATABLE-->
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="public/css/estils.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>


    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css">
    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Inline CSS based on choices in "Settings" tab -->

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
            var date_input = $('input[name="day"]'); //our date input has the name "day"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form action="" class="form-horizontal" method="post">
                        <div class="form-group ">
                            <label class="control-label col-sm-2 requiredField" for="date">
                                Date
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" id="date" name="day" placeholder="YYYY/MM/DD" type="text" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input name="_honey" style="display:none" type="text">
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Submit
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
        <table id="tableReservas" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Allergy</th>
                </tr>
            </thead>
        </table>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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
                }],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                },
                select: true

            });

            function loadData() {
                t = $('#tableReservas').DataTable({
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
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true
                });

            }
        });
    </script>
</body>

</html>