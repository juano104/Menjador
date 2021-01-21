<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1> Exemple DataTablesJS - AJAX, Select & Bootrap 4. </h1>
        <p>Selecciona per editar una fila de la taula.</p>
        <div id="alert_message"></div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-outline-primary" id="b1">COMENÇA AMB S</button>
                <button type="button" class="btn btn-outline-danger" id="b2">TOTS</button>
                <button type="button" class="btn btn-outline-danger" id="b3">ID VISIBLE</button>
                <button type="button" class="btn btn-outline-danger" id="b4">MODAL EDIT</button>
                <button type="button" class="btn btn-outline-danger" id="b5">MODAL DELETE</button>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <table id="taula" class="table table-striped table-bordered">
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
        </div>
        <br />
    </div>

    <script>
        $(document).ready(function() {
            var t = $('#taula').DataTable({
                ajax: {
                    url: 'Read.php',
                    dataSrc: '',
                    type: "GET",
                },
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'last_name'
                    },
                    {
                        data: 'DNI'
                    },
                    {
                        data: 'birth_date'
                    },
                    {
                        data: 'role'
                    }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
                },
                select: true
            });


            function loadData() {
                t = $('#taula').DataTable({
                    ajax: {
                        url: 'Read.php',
                        dataSrc: '',
                        type: "GET",
                    },
                    columns: [{
                            data: 'name'
                        },
                        {
                            data: 'last_name'
                        },
                        {
                            data: 'DNI'
                        },
                        {
                            data: 'birth_date'
                        },
                        {
                            data: 'role'
                        }
                    ],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"
                    },
                    select: true
                });
            }

            t.column(0).visible(false);


        });
    </script>
</body>

</html>