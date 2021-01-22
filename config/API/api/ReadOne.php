<?php

//Headers
include_once '../config/Database.php';
include_once '../class/Person.php';

//DB
$db = new Database();
$db_conn = $db->connect();

//User
$user = new Person($db_conn);

$user->setDNI(isset($_GET["DNI"]) ? $_GET["DNI"] : die());
$user->readOne();
$userArr = array();

if ($user->getName() != null) {
    // create array
    $userArr = array(
        "name" => $user->getName(),
        "last_name" => $user->getLast_name(),
        "DNI" => $user->getDNI(),
        "birth_date" => $user->getBirth_date(),
        "role" => $user->getRole(),
    );
    echo json_encode($userArr);
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />

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
        <h1>Showing Person Table</h1>
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
        $(document).ready(function() {
            var t = $('#table').DataTable({
                data: <?php echo json_encode($userArr); ?>,
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
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                },
                select: true
            });

            function loadData() {
                t = $('#table').DataTable({
                    data: <?php echo json_encode($userArr); ?>,
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
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true
                });
            }
        });
    </script>

</body>

</html>