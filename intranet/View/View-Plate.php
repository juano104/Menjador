<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link href='public/css/fullcalendar.min.css' rel='stylesheet' />
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/moment.min.js"></script>
  <script src="public/js/fullcalendar.min.js"></script>
  


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <style>
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 1000px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <!-- Menu de navegacio -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
      <!-- LOGO -->
      <a href="#" class="navbar-brand">
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
            <a class="nav-link" href="#">
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
  <div id='calendar'></div>
</div>
  <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        dayClick: function(date, allDay, jsEvent, view, start, end) {

          $("#date").val($.fullCalendar.formatDate(date, 'YYYY-MM-DD'));

          if (moment().format('YYYY-MM-DD') === date.format('YYYY-MM-DD') || date.isAfter(moment())) {
            $('#exampleModal #start').val(moment(start).format('YYYY-MM-DD'));
            $('#exampleModal #end').val(moment(end).format('YYYY-MM-DD'));
            $('#exampleModal').modal('show');
          } else {
            alert("No se pueden crear eventos en el pasado");
          }
        },
        eventSources: [{
          url: 'http://intranet.menjadorescola.me/datos',
          method: 'POST'
        }],
        hiddenDays: [0, 6],
        showNonCurrentDates: false,
        eventLimit: true

      })
    });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Afegir menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insertar/menu" method="post">
            <div class="form-group">
              <label for="primerplat">
                PRIMER PLAT: <select class="form-control" name='idaliment[]' style="width: 200px;" id="primerplat">
                  <?php
                  if ($count > 0) {

                    $plateArr = array();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      extract($row);
                      $e = array(
                        "ID" => $ID,
                        "name" => $name,
                        "type" => $type,
                      );

                      if ($type == "1") {
                        array_push($plateArr, $e);
                        echo "<option value='$ID'>" . $name . "</option>";
                      }
                    }
                  }

                  ?>
                </select>
              </label>
            </div>
            <br>
            <div class="form-group">
              <label for="segonplat">
                SEGON PLAT: <select class="form-control" name='idaliment[]' style="width: 200px;" id="segonplat">
                  <?php
                  if ($count3 > 0) {
                    $SPlateArr = array();

                    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                      extract($row);
                      $e = array(
                        "ID" => $ID,
                        "name" => $name,
                        "type" => $type,

                      );
                      if ($type == "2") {
                        array_push($SPlateArr, $e);
                        echo "<option value='$ID'>" . $name . "</option>";
                      }
                    }
                  }

                  ?>
                </select>
              </label>
            </div>
            <br>
            <div class="form-group">
              <label for="postre">
                POSTRE: <select name='idaliment[]' class="form-control" style="width: 200px;" id="postre">
                  <?php
                  if ($count2 > 0) {

                    $DessertArr = array();

                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                      extract($row);
                      $e = array(
                        "ID" => $ID,
                        "name" => $name,
                        "type" => $type,
                      );
                      if ($type == "3") {
                        array_push($DessertArr, $e);
                        echo "<option value='$ID'>" . $name . "</option>";
                      }
                    }
                  }

                  ?>
                </select>
              </label>
            </div>
            <br>
            <input type="hidden" name="date" id="date">

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Afegir">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <a href="http://intranet.menjadorescola.me/datos">DATOS</a>

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