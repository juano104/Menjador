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
</head>

<body>

    <div class="container-fluid">

        <!-- Menu de navegacio -->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger static-top">

            <!-- LOGO -->

            <a href="http://admin.menjadorescola.me" class="navbar-brand">
                <img src="public/img/logo.png" alt="LogoImatge" class="d-inline-block align-middle imgres">
            </a>

            <!-- LOGO -->


            <button class="navbar-toggler botores" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                        <a class="nav-link" href="principal">
                            Principal(ver reservas de un dia concreto)
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservas">
                            todas las reservas(separado por dia o extra)
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="http://admin.menjadorescola.me"><i class="fas fa-home"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Guitarres</a>
                            <a class="dropdown-item" href="#">Flautes</a>
                            <a class="dropdown-item" href="#">Altaveus</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- Menu de navegacio -->

    </div>

    <div class="container" style="margin-bottom: 10%; margin-top: 5%;">
        <h1>Administrar Pares</h1>
        <button class='btn btn-dark' name='afegirpare' data-toggle='modal' data-target='#ModalPare'><i class='fas fa-plus-circle'></i></button>
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Llinatge</th>
                    <th>DNI</th>
                    <th>Fills</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>

    <!--MODAL FORMULARI PARE-->
    <div class="modal fade" id="ModalPare" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inserir Pare</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert/parent" method="post" id="form" name="f1">
                    <div class="modal-body">
                        
                        <label for="nompare"><strong>NOM PARE:</strong></label>
                        <input type="text" name="nompare" id="nompare">
                        <br>
                        
                        <label for="llinatgepare"><strong>LLINATGE PARE:</strong></label>
                        <input type="text" name="llinatgepare" id="llinatgepare">
                        <br>
                        
                        <label for="dnipare"><strong>DNI PARE:</strong></label>
                        <input type="text" name="dnipare" id="dnipare">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" id="afegir" class="btn btn-success" value="Afegir Pare">
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
                    <h5 class="modal-title" id="exampleModalLabel">Inserir Alumne</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert/student" method="post" id="form" name="f1">
                    <div class="modal-body">
                        <label for="nomalumne"><strong>NOM ALUMNE</strong><input type="text" name="nomalumne" id="nomalumne"</label>
                        
                        <br>
                        
                        <label for="llinatgealumne"><strong>LLINATGE ALUMNE</strong><input type="text" name="llinatgealumne" id="llinatgealumne">
                        </label>
                        
                        <br>
                        <br>
                        <strong>ALERGIA</strong>
                        <br>

                        <label for='ous'>Ous</label>
                        <input type='checkbox' id='ous' name='alergia[]' value='1'>

                        <label for='marisc'>Marisc</label>
                        <input type='checkbox' id='marisc' name='alergia[]' value='2'>

                        <label for='peix'>Peix</label>
                        <input type='checkbox' id='peix' name='alergia[]' value='3'><br>

                        <label for='frutssecs'>Fruts Secs</label>
                        <input type='checkbox' id='frutssecs' name='alergia[]' value='4'>

                        <label for='llet'>Llet</label>
                        <input type='checkbox' id='llet' name='alergia[]' value='5'>

                        <label for='cereals'>Cereals</label>
                        <input type='checkbox' id='cereals' name='alergia[]' value='6'>

                        <input id="pareID" name="pareID" type="hidden" value="0">
                        <br>
                        
                        <label for="date"><strong>FECHA DE NAIXAMENT:</strong></label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    "defaultContent": "<button type='submit' class='editar btn btn-success' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-user-plus'></i></button>"


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
                        "defaultContent": "<button type='submit' class='editar btn btn-success' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-user-plus'></i></button>"
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