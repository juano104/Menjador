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
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
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
    <form action="view/byday" method="POST">
        <input name="day" type="text" id="datepicker" autocomplete="off">
        <label for="datepicker">Date</label>
        <input type="submit" value="SUBMIT">
    </form>

    <div class="container" style="margin-bottom: 10%; margin-top: 5%;">
        <h1>Reservas(<?php echo $booking->getDate() ?>)</h1>
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