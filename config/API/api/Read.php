<?php

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

//Headers
include_once '../config/Database.php';
include_once '../class/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$stmt = $user->read();
$count = $stmt->rowCount();

//echo json_encode($count);


if ($count > 0) {

    $userArr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "name" => $name,
            "last_name" => $last_name,
            "DNI" => $DNI,
            "birth_date" => $birth_date,
            "role" => $role,
        );

        array_push($userArr, $e);
    }
    $json = json_encode($userArr);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>

    <!-- css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <!-- js -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container">
        <h1> Exemple DataTablesJS - AJAX, Select & Bootrap 4. </h1>
        <p>Select to edit a row in the table.</p>
        <div id="alert_message"></div>

        <button type="button" class="btn btn-outline-primary" id="b1">INCLUDES LETTER "S"</button>
        <button type="button" class="btn btn-outline-danger" id="b2">ALL</button>
        <button type="button" class="btn btn-outline-danger" id="b3">ID VISIBLE</button>
        <button type="button" class="btn btn-outline-danger" id="b4">EDIT MODAL</button>
        <button type="button" class="btn btn-outline-danger" id="b5">DELETE MODAL</button>

    </div>
    <div class="container">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last_Name</th>
                    <th>DNI</th>
                    <th>Birth_date</th>
                    <th>Role</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        var jsonData = <?php echo $json; ?>
        $(document).ready(function() {
            var t = $('#table').DataTable({
                ajax: {
                    url: 'http://40.68.231.216/Menjador/config/API/api/Read.php',
                    dataSrc: '',
                    type: "GET",
                },
                //data: jsonData,
                columns: [{
                    data: 'name'
                }, {
                    data: 'last_name'
                }, {
                    data: 'DNI'
                }, {
                    data: 'birth_date'
                }, {
                    data: 'role'
                }],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
                },
                select: true
            });

            function loadData() {
                t = $('#table').DataTable({
                    ajax: {
                    url: 'http://40.68.231.216/Menjador/config/API/api/Read.php',
                    dataSrc: '',
                    type: "GET",
                },
                    //data: jsonData,
                    columns: [{
                        data: 'name'
                    }, {
                        data: 'last_name'
                    }, {
                        data: 'DNI'
                    }, {
                        data: 'birth_date'
                    }, {
                        data: 'role'
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
                    },
                    select: true
                });
            }

            //t.column(0).visible(false);

            /*$.ajax({
                'url': "cds.php",
                'method': "GET",
                'contentType': 'application/json'
            }).done(function(data) {
                $('#table').dataTable({
                    "aaData": data,
                    "columns": [{
                        "data": "idsong"
                    }, {
                        "data": "name"
                    }]
                })
            })*/

            $("#b1").click(function() {
                t.search("S").draw();
            });

            $("#b2").click(function() {
                t.search("").draw();
            });

            $("#b3").click(function() {
                var b = t.column(0).visible();
                t.column(0).visible(!b);
            });
        });
    </script>

</body>

</html>