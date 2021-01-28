<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="estils.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Title</title>
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

    <div class="container justify-content-center" id="container">
        <form name="insert" method="post" action="Insert_Parent.php">
            <hr>
            <h1>Inserir Pare</h1>
            <strong>NOM PARE:</strong> 
            <input type="text" name="nompare" id="nompare">
            <strong>LLINATGE PARE:</strong> 
            <input type="text" name="llinatgepare" id="llinatgepare">
            <strong>DNI PARE:</strong> 
            <input type="text" name="dnipare" id="dnipare">
            <hr>
            <br>
            <input name="submit" type="submit" id="boton" value="Insert Users">
        </form>
    </div>
    <div id="contenedor" class="container"></div>
    <div class="container">
        <button type="button" class="btn btn-primary" id="btnAddMore">Afergir Alumne</button>
    </div>

    

    <!-- Footer -->
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
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="https://mdbootstrap.com/">Music</a>
            </div>
            <!-- Copyright -->

    </footer>
    <!-- Footer -->


    <script>
        $(document).ready(function() {


            var formulari = $("form");
            var btnAddMore = $("#btnAddMore");

            var contenidor = $("#contenidor");
            var AfegirAlergia = $("#AfegirAlergia");

            btnAddMore.click(function() {
                var plantilla = "<div class='alumne' id='alu'>" +
                    "<h1>Inserir Alumne</h1>" +
                    "NOM ALUMNE:" +
                    '<input type="text" name="nomalumne[]" id="nomalumne"">' +
                    "LLINATGE ALUMNE:" +
                    '<input type="text" name="llinatgealumne[]" id="nomalumne"">' +
                    "<br>" +
                    "<br>" +
                    "ALERGIA:" +
                    "<br>" +
                    "<label for='ous'>Ous</label>" +
                    "<input type='checkbox' id='ous' name='ous[]' value='ous'>" +

                    "<label for='marisc'>Marisc</label>" +
                    "<input type='checkbox' id='marisc' name='marisc[]' value='marisc'>" +

                    "<label for='peix'>Peix</label>" +
                    "<input type='checkbox' id='peix' name='peix[]' value='peix'><br>" +

                    "<label for='frutssecs'>Fruts Secs</label>" +
                    "<input type='checkbox' id='frutssecs' name='frutssecs[]' value='frutssecs'>" +

                    "<label for='llet'>Llet</label>" +
                    "<input type='checkbox' id='llet' name='llet[]' value='llet'>" +

                    "<label for='cereals'>Cereals</label>" +
                    "<input type='checkbox' id='cereals' name='cereals[]' value='cereals'>" +
                    "<strong>FECHA DE NAIXAMENT:</strong>" +
                    "<input type='date' name='date[]' id=''>" +
                    "</div>";
                formulari.append(plantilla);
            });

            //AFEGIR ALERGIA
            /*var valor;
            AfegirAlergia.click(function() {

                valor = $("#alergia").val();

                var contador = $("input[type='checkbox']").length;
                if (contador == 0) {
                    $(this).before('<br><label for="alergia_' + contador + '">' + valor + ":" + '</label><input type="checkbox" class="case" id="alergia_' + contador + '" name="alergia[]"/> <br>');
                }else{
                    $(this).before('<label for="alergia_' + contador + '">' + valor + ":" + '</label><input type="checkbox" class="case" id="alergia_' + contador + '" name="alergia[]"/> <br>');
                }
                $(this).prop('checked', true);
            });*/

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>