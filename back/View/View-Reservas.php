<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOTAL BY DAY</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="public/css/estils.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script>
        var $j = jQuery.noConflict(true);
    </script>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    
    <!-- js -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy/mm/dd'
            });

        });
    </script>

</head>

<body>
    <form action="" method="POST">
        <input name="day" type="text" id="datepicker" autocomplete="off">
        <label for="datepicker">Date</label>
        <input type="submit" value="SUBMIT">
    </form>

    <div class="container" style="margin-bottom: 10%; margin-top: 5%;">
        <h1>Reservas para <?php echo $booking->getDate() ?></h1>
        <table id="tableReservas" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Allergies</th>
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
                },{
                    data: 'last_name'
                }, {
                    data: 'allergy'
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
                },{
                    data: 'last_name'
                }, {
                    data: 'allergy'
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