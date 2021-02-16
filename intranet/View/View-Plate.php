<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link href='public/css/fullcalendar.min.css' rel='stylesheet' />
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
      max-width: 800px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <div id='calendar'></div>

  <script>
    $(function() {
      $('#calendar').fullCalendar({
        dayClick: function(date, allDay, jsEvent, view, start, end) {

          $("#date").val($.fullCalendar.formatDate(date, 'YYYY-MM-DD'));

          var check = moment(start).format('YYYY-MM-DD');
          var today = moment(new Date()).format('YYYY-MM-DD');


          if (check >= today) {
            $('#exampleModal #start').val(moment(start).format('YYYY-MM-DD'));
            $('#exampleModal #end').val(moment(end).format('YYYY-MM-DD'));
            $('#exampleModal').modal('show');
          } else {
            alert("No se pueden crear eventos en el pasado!");
          }
        },
        events: 'http://intranet.menjadorescola.me/principal',
        hiddenDays: [0, 6],
        showNonCurrentDates: false

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


</body>

</html>