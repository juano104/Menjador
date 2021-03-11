<?php
session_start();
if ($_SESSION["username"] == "") {
  header("Location: https://intranet.menjadorescola.me/");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link href='public/css/fullcalendar.min.css' rel='stylesheet' />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <link rel="stylesheet" href="public/css/estils.css">
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/moment.min.js"></script>
  <script src="public/js/fullcalendar.min.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <style>

  </style>
</head>

<body>

  <div class="container-fluid">
    <!-- Menu de navegacio -->
    <?php require_once "navbar.php" ?>
    <!-- Menu de navegacio -->
  </div>

  <canvas id="canvas" width="0%" height="0%"></canvas>
  <div class="container margin">
    <div aria-label="breadcrumb" style="margin-bottom: 3%;">
      <ol class="breadcrumb bg-transparent px-0">
        <li class="breadcrumb-item active">Pagina Restaurante</li>
        <li class="breadcrumb-item active" aria-current="page">Administrar Menu</li>
      </ol>
    </div>

    <div class="container margin" style="margin-bottom: 2%;">
      <!-- Menu de navegacio -->
      <?php require_once "View-Insert-Plate.php" ?>
      <!-- Menu de navegacio -->
    </div>

    <h5>Descargar Menu:</h5><a class="btn btn-danger" href="#" id="print"><i class="fas fa-file-pdf"></i></a>

    <h1>Inserir Menu</h1>
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
          url: 'https://intranet.menjadorescola.me/datos',
          method: 'POST'
        }],
        hiddenDays: [0, 6],
        showNonCurrentDates: false,
        eventLimit: true,
        eventOrder: "type",
        eventColor: '#ffffff00'

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
          <form action="insertar/menu" method="post" class="needs-validation" novalidate>
            <div class="form-group">
              <label for="primerplat">
                PRIMER PLAT: <select required class="form-control" name='idaliment[]' style="width: 200px;" id="primerplat">
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
                <div class="invalid-feedback">
                  Porfavor, ponga un plato.
                </div>
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
          <input type="submit" class="btn btn-dark" value="Afegir">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require_once "footer.php" ?>
  <!-- Footer -->

  <script>
    $("#print").click(function() {
      //#AEFC is my div for FullCalendar
      html2canvas($('#calendar'), {
        logging: true,
        useCORS: true,
        onrendered: function(canvas) {
          var imgData = canvas.toDataURL("image/png");
          var doc = new jsPDF();
          doc.addImage(imgData, 'png', 15, 40, 180, 160);
          doc.save('sample-file.pdf');

        }
      });
    });
  </script>


</body>

</html>