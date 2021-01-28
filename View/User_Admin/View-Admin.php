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

    <link rel="stylesheet" href="estils.css">

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
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">

            <!-- LOGO -->

            <a href="Pagina-Principal.html" class="navbar-brand">
                <img src=" logo.png" alt="" class="d-inline-block align-middle imgres">
            </a>

            <!-- LOGO -->


            <button class="navbar-toggler botores" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Pagina-Principal.html"><i class="fas fa-home"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="Pagina-Montanya.html">Guitarres</a>
                            <a class="dropdown-item" href="Pagina-Carretera.html">Flautes</a>
                            <a class="dropdown-item" href="Pagina-Paseig.html">Altaveus</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- Menu de navegacio -->

    </div>

    <div class="container">
        <h1>Showing Person Table</h1>
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Llinatge</th>
                    <th>DNI</th>
                    <th>Afegir Alumne</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inserir Alumne</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form" name="f1">
                <div class="modal-body">
                
                    <strong>NOM ALUMNE</strong>
                    <input type="text" name="nomalumne" id="nomalumne">
                    <br>
                    <strong>LLINATGE ALUMNE</strong>
                    <input type="text" name="llinatgealumne" id="llinatgealumne">
                    <br>
                    <br>
                    <strong>ALERGIA</strong>
                    <br>

                    <label for='ous'>Ous</label>
                    <input type='checkbox' id='ous' name='ous' value='ous'>

                    <label for='marisc'>Marisc</label>
                    <input type='checkbox' id='marisc' name='marisc' value='marisc'>

                    <label for='peix'>Peix</label>
                    <input type='checkbox' id='peix' name='peix' value='peix'><br>

                    <label for='frutssecs'>Fruts Secs</label>
                    <input type='checkbox' id='frutssecs' name='frutssecs' value='frutssecs'>

                    <label for='llet'>Llet</label>
                    <input type='checkbox' id='llet' name='llet' value='llet'>

                    <label for='cereals'>Cereals</label>
                    <input type='checkbox' id='cereals' name='cereals' value='cereals'>

                    <input id="pareID" name="pareID" type="hidden" value="0">
                    <br>
                    <strong>FECHA DE NAIXAMENT:</strong>
                    <input type="date" name="date" id="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Afegir</button>
                </div>
                </form>
            </div>
        </div>
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
                    "defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Afegir Alumne</button>"
                }],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                },
                select: true
            });

            var obtener_data_editar = function(tbody, table){
                $(tbody).on("click", "button.editar", function(){
                    var data = table.row( $(this).parents("tr") ).data();
                    var DNI = $("#pareID").val(data.DNI);
                });
            }

            obtener_data_editar("#table tbody", t);

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
                        "defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Afegir Alumne</button>"
                    }],
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json"
                    },
                    select: true
                });
                
            }

            

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