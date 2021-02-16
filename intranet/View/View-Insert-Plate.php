<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Hacer un view para cada read?? -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Plates</title>

    <!-- css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css" />


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="../public/css/estils.css">
    <!-- js -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <!-- Menu de navegacio -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
            <!-- LOGO -->
            <a href="http://intranet.menjadorescola.me" class="navbar-brand">
                <img src="public/img/logo.png" alt="" class="d-inline-block align-middle imgres">
            </a>
            <!-- LOGO -->
            <button class="navbar-toggler botores" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="principal">
                            Principal(Ver los platos)
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="insertar">
                            Insertar los platos o menus
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="http://intranet.menjadorescola.me">
                            <i class="fas fa-home"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fas fa-user"></i>
                        </a>
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

    <div class="container">
        <h1>INSERIR PLAT</h1>
        <form action="insertar/plate" class="form-inline" method="post">
        <div class="form-group mb-2">
            <label for="nomplat">

                <input type="text" name="nomplat" id="nomplat">
            </label>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="tipus">
                <select class="custom-select mr-sm-3" name="tipus" id="tipus">
                    <option selected disabled>Tipus plat...</option>
                    <option value="1">Primer Plat</option>
                    <option value="2">Segon Plat</option>
                    <option value="3">Postre</option>
                </select>
            </label>
        </div>
            <input type="submit" class="btn btn-secondary mb-2" value="Afegir">
        </form>
    </div>
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

</body>

</html>