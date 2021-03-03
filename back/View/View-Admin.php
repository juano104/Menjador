<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Hacer un view para cada read?? -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read_All</title>

    <!-- css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />

    <link rel="stylesheet" href="../public/css/estils.css">

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
</head>

<body>

    <div class="container-fluid">
        <?php require_once "navbar.php" ?>
    </div>

    <style>
        
    </style>

    <div class="container" style="margin-bottom: 10%; margin-top: 2%;">
        <h1>Administrar Pares</h1>
        <button class='btn btn-dark' name='afegirpare' data-toggle='modal' data-target='#ModalPare'><i class='fas fa-plus-circle'></i></button>
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="head">Name</th>
                    <th class="head">Llinatge</th>
                    <th class="head">DNI</th>
                    <th class="head">Fills</th>
                    <th class="head"></th>
                </tr>
            </thead>
        </table>
    </div>

    <!--MODAL FORMULARI PARE-->
    <div class="modal fade" id="ModalPare" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insertar Padre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert/parent" method="post" id="form" name="f1">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nompare"><strong>NOMBRE PADRE:</strong></label>
                            <input type="text" class="form-control" name="nompare" id="nompare">
                        </div>
                        <div class="form-group">
                            <label for="llinatgepare"><strong>APELLIDO PADRE:</strong></label>
                            <input type="text" class="form-control" name="llinatgepare" id="llinatgepare">
                        </div>
                        <div class="form-group">
                            <label for="dnipare"><strong>DNI PADRE:</strong></label>
                            <input type="text" class="form-control" name="dnipare" id="dnipare">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" id="afegir" class="btn btn-success" value="Afegir Pare">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--MODAL FORMULARI FILL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insertar Alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert/student" method="post" id="form" name="f1">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomalumne"><strong>NOMBRE ALUMNO</strong><input class="form-control" type="text" name="nomalumne" id="nomalumne"></label>
                        </div>
                        <div class="form-group">
                            <label for="llinatgealumne"><strong>APELLIDO ALUMNO</strong><input class="form-control" type="text" name="llinatgealumne" id="llinatgealumne">
                            </label>
                        </div>

                        <strong>ALERGIA</strong>
                        <br>
                        <div class="form-check-inline">
                            <label class="form-check-label" for='ous'>Huevos</label>
                            <input class="form-check-input" type='checkbox' id='ous' name='alergia[]' value='1'>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for='marisc'>Marisco</label>
                            <input class="form-check-input" type='checkbox' id='marisc' name='alergia[]' value='2'>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for='peix'>Pescado</label>
                            <input class="form-check-input" type='checkbox' id='peix' name='alergia[]' value='3'>
                        </div>
                        <br>
                        <div class="form-check-inline">
                            <label class="form-check-label" for='frutssecs'>Frutos Secos</label>
                            <input class="form-check-input" type='checkbox' id='frutssecs' name='alergia[]' value='4'>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for='llet'>Leche</label>
                            <input class="form-check-input" type='checkbox' id='llet' name='alergia[]' value='5'>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for='cereals'>Cereales</label>
                            <input class="form-check-input" type='checkbox' id='cereals' name='alergia[]' value='6'>
                        </div>
                        <input id="pareID" name="pareID" type="hidden" value="0">

                        <div class="form-group">
                            <label for="date"><strong>FECHA DE NACIMIENTO:</strong></label>
                            <input class="form-control" type="date" name="date" id="date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" id="afegir" class="btn btn-success" value="Afegir Alumne">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {


            var t = $('#table').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                data: <?php echo json_encode($userArr); ?>,
                columns: [{
                    data: 'name'
                }, {
                    data: 'last_name'
                }, {
                    data: 'DNI'
                }, {
                    data: 'student_name'
                }, {
                    "defaultContent": "<button type='submit' class='editar btn btn-info' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-user-plus'></i></button>"


                }],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                },
                select: true

            });

            $("#afegir").click(function() {
                alert("Usuari afegit correctament");
            });

            var obtener_data_editar = function(tbody, table) {
                $(tbody).on("click", "button.editar", function() {
                    var data = table.row($(this).parents("tr")).data();
                    var DNI = $("#pareID").val(data.DNI);
                });
            }

            var obtener_data_alumne = function(tbody, table) {
                $(tbody).on("click", "button.editar", function() {
                    var data = table.row($(this).parents("tr")).data();
                    var last_name = $("#llinatgealumne").val(data.last_name);
                });
            }

            obtener_data_editar("#table tbody", t);
            obtener_data_alumne("#table tbody", t);

            function loadData() {
                t = $('#table').DataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    data: <?php echo json_encode($userArr); ?>,
                    columns: [{
                        data: 'name'
                    }, {
                        data: 'last_name'
                    }, {
                        data: 'DNI'
                    }, {
                        data: 'student_name'
                    }, {
                        "defaultContent": "<button type='submit' class='editar btn btn-info' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-user-plus'></i></button>"
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true
                });

            }


            $("<button class='btn btn-success' name='afegirpare' data-toggle='modal' data-target='#ModalPare'><i class='fas fa-plus-circle'></i></button>").appendTo("div.panel-heading");

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

</body>

</html>