<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="public/css/estils.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

    <!--<script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy/mm/dd'
            });

        });
    </script>-->
    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>
</head>

<body>
    <div class="container-fluid">
        <!-- Menu de navegacio -->
        <?php require_once "navbar.php" ?>
        <!-- Menu de navegacio -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">

                <!-- Form code begins -->
                <form action="" method="post">
                    <div class="form-group">
                        <!-- Date input -->
                        <label class="control-label" for="date">Date</label>
                        <input class="form-control" id="date" name="day" placeholder="YYYY/MM/DD" type="text" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <!-- Submit button -->
                        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                    </div>
                </form>
                <!-- Form code ends -->

            </div>
        </div>
    </div>
    <!--<div class="container">
        <form action="" method="POST">
            <input name="day" type="text" id="datepicker" autocomplete="off">
            <label for="datepicker">Date</label>
            <input type="submit" value="SUBMIT">
        </form>
    </div>-->

    <div class="container" style="margin-bottom: 10%; margin-top: 5%;">
        <h1>Mis Reservas(<?php echo $booking->getDate() ?>)</h1>
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



    <script>
        $(document).ready(function() {

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
                    }
                    /*, {
                                        data: 'allergy'
                                    }*/
                ],
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
                        }
                        /*, {
                                                data: 'allergy'
                                            }*/
                    ],
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