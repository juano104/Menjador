<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../public/css/estils.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.3/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.3/jquery-ui.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="public/js/moment.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css">
    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.3/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.3/jquery-ui.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            var date_input = $(".datepicker");
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });
            var date_start = $("#datepickers");
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_start.datepicker({
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });
            var date_end = $("#datepickere");
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_end.datepicker({
                format: 'yyyy/mm/dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });
        })
    </script>

    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }

        .bootstrap-iso form button,
        .bootstrap-iso form button:hover {
            color: white !important;
        }

        .asteriskField {
            color: red;
        }
    </style>
</head>

<body>
    <!-- Menu de navegacio -->

    <?php require_once "navbar.php" ?>

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container  margin">
            <form>
                <div class="col-12 tab" id="tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li><a tabindex="0" class="tab1 tabs nav-link active" href="#tabs-1">Reserva</a></li>
                        <li><a tabindex="-1" class="tab2 tabs nav-link" href="#tabs-2">Tipo de reserva</a></li>
                        <li><a tabindex="-1" class="tab3 tabs nav-link" href="#tabs-3">Dias Sueltos</a></li>
                        <li><a tabindex="-1" class="tab4 tabs nav-link" href="#tabs-4">Dias Fijos</a></li>
                        <li><a tabindex="-1" class="tab5 tabs nav-link" href="#tabs-5">Finalizar</a></li>
                    </ul>

                    <div class="tab-content" id="tabs-1">
                        <h3>Elegeix el fill</h3> <br>
                        <input type="hidden" name="parent_DNI" id="parent_DNI" value="<?php echo $parent_DNI ?>">
                        <?php
                        if ($count > 0) {
                            $userArr = array();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                $e = array(
                                    "ID" => $ID,
                                    "name" => $name,
                                    "last_name" => $last_name,
                                    "password" => $password
                                );
                                array_push($userArr, $e);
                                if ($password == $passwordf) {
                                    echo "<input class='radioname' type='radio' value='" . $ID . "' name='radioname' id='" . $name . "'>";
                                    echo "<label for=" . $name . ">" . $name . " " . $last_name . "</label><br>";
                                }
                            }
                        }
                        ?>
                        <br>
                        <button type="button" class="b1n btn btn-outline-success">Siguiente</button>

                    </div>
                    <div class="tab-content" id="tabs-2">
                        <h3>Tipo</h3>
                        <div class="col-4" style="padding-left: 0%;">
                            <table class="tabler">
                                <thead>
                                    <tr>
                                        <th class="n">Nombre</th>
                                        <th class="t">Tipo</th>
                                        <th class="d">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <input type="radio" value="Loose" name="type" id="Loose">
                        <label for="Loose">Dia Suelto</label>
                        <input type="radio" value="Fixed" name="type" id="Fixed">
                        <label for="Fixed">Multiples dias</label>

                        <br>

                        <button type="button" class="b2p btn btn-outline-danger">Atras</button>
                        <button type="button" class="b2n btn btn-outline-success">Siguiente</button>
                    </div>
                    <div class="tab-content" id="tabs-3">
                        <h3>One Day</h3>
                        <div class="col-4" style="padding-left: 0%;">
                            <table class="tabler">
                                <thead>
                                    <tr>
                                        <th class="n">Nombre</th>
                                        <th class="t">Tipo</th>
                                        <th class="d">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="d1">
                            <label for="datepicker1">Fecha:</label>
                            <input name="date1" type="text" class="datepicker">
                        </div><br>

                        <div class="d2">
                            <label for="datepicker2">Fecha 2:</label>
                            <input name="date2" type="text" class="datepicker">
                        </div><br>
                        <div class="d3">
                            <label for="datepicker3">Fecha 3:</label>
                            <input name="date3" type="text" class="datepicker">
                        </div><br>
                        <div class="d4">
                            <label for="datepicker4">Fecha 4:</label>
                            <input name="date4" type="text" class="datepicker">
                        </div><br>
                        <div class="d5">
                            <label for="datepicker5">Fecha 5:</label>
                            <input name="date5" type="text" class="datepicker">
                        </div><br>
                        <br>
                        <button type="button" class="newdate btn btn-success">Nueva Fecha</button>
                        <button type="button" class="deldate btn btn-danger">Eliminar Fecha</button>
                        <br><br>
                        <button type="button" class="b3p btn btn-outline-danger">Atras</button>
                        <button type="button" class="b3n btn btn-outline-success">Siguiente</button>
                    </div>
                    <div class="tab-content" id="tabs-4">
                        <h3>Fixed</h3>
                        <div class="col-4" style="padding-left: 0%;">
                            <table class="tabler">
                                <thead>
                                    <tr>
                                        <th class="n">Nombre</th>
                                        <th class="t">Tipo</th>
                                        <th class="d">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <p>Fecha (yyyy/mm/dd): <input name="startdate" type="text" id="datepickers"></p>
                        <p>Fecha Final(yyyy/mm/dd): <input name="enddate" type="text" id="datepickere"></p>
                        <input type="checkbox" id="monday" name="monday" value="0">
                        <label for="monday">Lunes</label><br>

                        <input type="checkbox" id="tuesday" name="tuesday" value="0">
                        <label for="tuesday">Martes</label><br>

                        <input type="checkbox" id="wednesday" name="wednesday" value="0">
                        <label for="wednesday">Miercoles</label><br>

                        <input type="checkbox" id="thursday" name="thursday" value="0">
                        <label for="thursday">Jueves</label><br>

                        <input type="checkbox" id="friday" name="friday" value="0">
                        <label for="friday">Viernes</label><br>
                        <br>
                        <button type="button" class="b4p btn btn-outline-danger">Atras</button>
                        <button type="button" class="b4n btn btn-outline-success">Siguiente</button>
                    </div>
                    <div class="tab-content" id="tabs-5">
                        <h3>Tu Reserva:</h3>
                        <div class="col-6" style="padding-left: 0%;">
                            <table class="tabler">
                                <thead>
                                    <tr>
                                        <th class="n">Nombre</th>
                                        <th class="t">Tipo</th>
                                        <th class="d">Fecha</th>
                                        <th class="total">Total</th>
                                        <th class="sd">Fecha Inicio</th>
                                        <th class="ed">Fecha Final</th>
                                        <th class="dow">Dias de la semana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <input id="submit" name="submit" type="submit" value="Reserve">
                        <br> <br>
                        <button type="button" class="b5p btn btn-outline-danger">Atras</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            //different dates 
            $(".d2").hide();
            $(".d3").hide();
            $(".d4").hide();
            $(".d5").hide();

            var visibleDivs = 1;
            var totalDivs = 5;


            function DisplayNextDiv() {
                if (visibleDivs < totalDivs) {
                    visibleDivs += 1;
                    $(".d" + visibleDivs).show();

                }
            }

            function DeleteNextDiv() {
                if (visibleDivs <= totalDivs && visibleDivs > 1) {
                    $(".d" + visibleDivs + " > input[type='text']").val("");
                    $(".d" + visibleDivs).hide();
                    visibleDivs--;
                }
            }

            $(".newdate").click(function() {
                DisplayNextDiv();
                console.log(visibleDivs);
            });
            $(".deldate").click(function() {
                DeleteNextDiv();
                console.log(visibleDivs);
            });

            //tabs
            $("#tabs").tabs({
                active: 0,
                disabled: [1, 2, 3, 4],
                selected: 0
            });

            $(".b1n").click(function() {
                var studentname = $("input[name='radioname']:checked").val();

                if (studentname != null) {
                    $("#tabs").tabs({
                        active: 1,
                        disabled: [0, 2, 3, 4],
                        selected: 1
                    });
                    $("#tabs").tabs("option", "active", 1);
                    $(".tab1").removeClass("active");
                    $(".tab2").addClass("active");
                    $("input[type='radio']:checked").each(function() {
                        var idstudent = $("input[type='radio']:checked").val();
                        //console.log(idstudent);
                        var idVal = $(this).attr("id");
                        var name = idVal;
                        $(".t").hide();
                        $(".d").hide();
                        $(".sd").hide();
                        $(".ed").hide();
                        $(".dow").hide();
                        var newName = $("<tr><td><input type='hidden' name='idstudent' value='" + idstudent + "'>" + name + "</td></tr>");
                        $(".tabler > tbody").append(newName);
                    });
                } else {
                    alert("Porfavor elija un hijo");
                }


            });

            $(".b2n").click(function() {

                var type = $("input[name='type']:checked").val();

                if (type == "Fixed") {
                    $("#tabs").tabs({
                        active: 3,
                        disabled: [0, 1, 2, 4],
                        selected: 3
                    });

                    $("#tabs").tabs("option", "active", 3);
                    $(".tab2").removeClass("active");
                    $(".tab4").addClass("active");

                    var extraType = $("<td>" + type + "</td>");
                    $(".tabler > tbody > tr").append(extraType);
                    $(".t").show();
                    $(".d").hide();
                    $(".sd").hide();
                    $(".ed").hide();
                    $(".dow").hide();
                } else if (type == "Loose") {
                    $("#tabs").tabs({
                        active: 2,
                        disabled: [0, 1, 3, 4],
                        selected: 2
                    });
                    $("#tabs").tabs("option", "active", 2);
                    $(".tab2").removeClass("active");
                    $(".tab3").addClass("active");

                    var newType = $("<td>" + type + "</td>");
                    $(".tabler > tbody > tr").append(newType);
                    $(".t").show();
                    $(".d").hide();
                    $(".sd").hide();
                    $(".ed").hide();
                    $(".dow").hide();
                } else {
                    alert("Porfavor elija un tipo");
                }
            });
            $(".b2p").click(function() {
                $("#tabs").tabs({
                    active: 0,
                    disabled: [1, 2, 3, 4],
                    selected: 0
                });
                $("input[name='radioname']:checked").prop('checked', false);
                $("input[name='type']:checked").prop('checked', false);
                $("#tabs").tabs("option", "active", 0);
                $(".tab2").removeClass("active");
                $(".tab1").addClass("active");
                $(".tabler > tbody").empty();
            });

            $(".b3n").click(function() {
                var dateArray = new Array();

                var day1 = $("input[name='date1']").val();
                var day2 = $("input[name='date2']").val();
                var day3 = $("input[name='date3']").val();
                var day4 = $("input[name='date4']").val();
                var day5 = $("input[name='date5']").val();

                if (day1 != "") {
                    $("#tabs").tabs({
                        active: 4,
                        disabled: [0, 1, 2, 3],
                        selected: 4
                    });
                    $("#tabs").tabs("option", "active", 4);
                    $(".tab3").removeClass("active");
                    $(".tab5").addClass("active");
                    dateArray.push(day1);
                    if (day2 != "") {
                        dateArray.push(day2);
                    }
                    if (day3 != "") {
                        dateArray.push(day3);
                    }
                    if (day4 != "") {
                        dateArray.push(day4);
                    }
                    if (day5 != "") {
                        dateArray.push(day5);
                    }
                    var newDate = $("<td>" + dateArray + "</td>");
                    var sum = dateArray.length * 8;// 8 is the price for everyday
                    var sumtotal = $("<td>" + sum + " € </td>");
                    $(".tabler > tbody > tr").append(newDate);
                    $(".tabler > tbody > tr").append(sumtotal);
                    $(".d").show();
                    $(".total").show();
                    console.log(dateArray.length);

                } else {
                    alert("Porfavor elija un dia");
                }
            });
            $(".b3p").click(function() {
                $("#tabs").tabs({
                    active: 1,
                    disabled: [0, 2, 3, 4],
                    selected: 1
                });
                $("#tabs").tabs("option", "active", 1);
                $(".tab3").removeClass("active");
                $(".tab2").addClass("active");


                $('.tabler > tbody > tr > td:last-child').remove();
                $(".t").hide();
                $("input[name='type']:checked").prop('checked', false);
                $("input[name='date']").val("");
            });

            $(".b4n").click(function() {
                var sday = $("#datepickers").val();
                var eday = $("#datepickere").val();
                var dow = $("input[type='checkbox']")
                var DoW = new Array();

                if (sday != "" && eday != "" && dow != "") {
                    $("#tabs").tabs({
                        active: 4,
                        disabled: [0, 1, 2, 3],
                        selected: 4
                    });
                    $("#tabs").tabs("option", "active", 4);
                    $(".tab4").removeClass("active");
                    $(".tab5").addClass("active");


                    var mon = $("input[name='monday']");
                    var tue = $("input[name='tuesday']");
                    var wed = $("input[name='wednesday']");
                    var thu = $("input[name='thursday']");
                    var fri = $("input[name='friday']");

                    var m = $("label[for='monday']").text();
                    var t = $("label[for='tuesday']").text();
                    var w = $("label[for='wednesday']").text();
                    var th = $("label[for='thursday']").text();
                    var f = $("label[for='friday']").text();
                    if (mon.is(":checked")) {
                        mon.val("1")
                        DoW.push(m);
                    };
                    if (tue.is(":checked")) {
                        tue.val("1")
                        DoW.push(t);
                    };
                    if (wed.is(":checked")) {
                        wed.val("1")
                        DoW.push(w);
                    };
                    if (thu.is(":checked")) {
                        thu.val("1")
                        DoW.push(th);
                    };
                    if (fri.is(":checked")) {
                        fri.val("1")
                        DoW.push(f);
                    };
                    //End daysofweek
                    var newSDate = $("<td>" + sday + "</td>");
                    var newEDate = $("<td>" + eday + "</td>");

                    function runDoW(arr) {
                        var txt = '';
                        for (var x = 0; x < arr.length; x++) {
                            if (x == arr.length - 1) {
                                txt += arr[x];
                            } else {
                                txt += arr[x] + ", ";
                            }

                        }
                        return txt;
                    }
                    var DoWt = $("<td>" + runDoW(DoW) + "</td>");
                    $(".sd").show();
                    $(".ed").show();
                    $(".dow").show();
                    $(".tabler > tbody >tr").append(newSDate);
                    $(".tabler > tbody >tr").append(newEDate);
                    $(".tabler > tbody >tr").append(DoWt);
                } else {
                    alert("Porfavor elija los dias");
                }

            });
            $(".b4p").click(function() {
                $("#tabs").tabs({
                    active: 1,
                    disabled: [0, 2, 3, 4],
                    selected: 1
                });
                $("#tabs").tabs("option", "active", 1);
                $(".tab4").removeClass("active");
                $(".tab2").addClass("active");

                $('.tabler > tbody > tr > td:last-child').remove();
                $(".t").hide();
                $("input[name='type']:checked").prop('checked', false);
                $("input[name='startdate']").val("");
                $("input[name='enddate']").val("");
                $("input[type='checkbox']:checked").prop('checked', false);
            });

            $(".b5p").click(function() {
                var day = $("#datepicker").val();
                var type = $("input[name='type']:checked").val();
                if (type != "Fixed") {
                    $("#tabs").tabs({
                        active: 2,
                        disabled: [0, 1, 3, 4],
                        selected: 2
                    });
                    $("#tabs").tabs("option", "active", 2);
                    $(".tab5").removeClass("active");
                    $(".tab3").addClass("active");
                    $('.tabler > tbody > tr > td:last-child').remove();
                    $(".total").hide();
                    $('.tabler > tbody > tr > td:last-child').remove();
                    $(".d").hide();
                } else {
                    $("#tabs").tabs({
                        active: 3,
                        disabled: [0, 1, 2, 4],
                        selected: 3
                    });
                    $("#tabs").tabs("option", "active", 3);
                    $(".tab5").removeClass("active");
                    $(".tab4").addClass("active");

                    $('.tabler > tbody > tr > td:last-child').remove();
                    $('.tabler > tbody > tr > td:last-child').remove();
                    $('.tabler > tbody > tr > td:last-child').remove();
                    $(".sd").hide();
                    $(".ed").hide();
                }
            });


            //ajax json function:
            $("#submit").on("click", function(e) {

                e.preventDefault();

                var idstudent = $("input[name='idstudent']").val();
                var date1 = $("input[name='date1']").val();
                var date2 = $("input[name='date2']").val();
                var date3 = $("input[name='date3']").val();
                var date4 = $("input[name='date4']").val();
                var date5 = $("input[name='date5']").val();
                var startdate = $("#datepickers").val();
                var enddate = $("#datepickere").val();
                var parent_DNI = $("#parent_DNI").val();

                //Days of the Week\
                var monday = $("input[name='monday']").val();
                var tuesday = $("input[name='tuesday']").val();
                var wednesday = $("input[name='wednesday']").val();
                var thursday = $("input[name='thursday']").val();
                var friday = $("input[name='friday']").val();

                $.ajax({
                    url: "insert",
                    type: "POST",
                    dataType: "json",
                    data: {
                        idstudent: idstudent,
                        date1: date1,
                        date2: date2,
                        date3: date3,
                        date4: date4,
                        date5: date5,
                        startdate: startdate,
                        enddate: enddate,
                        parent_DNI: parent_DNI,
                        monday: monday,
                        tuesday: tuesday,
                        wednesday: wednesday,
                        thursday: thursday,
                        friday: friday
                    },
                    ContentType: "application/json",
                    success: function(response) {
                        alert(JSON.stringify(response));
                    },
                    error: function(err) {
                        alert(JSON.stringify(err));
                    }
                });
            });

        });
    </script>

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
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit.
                    </p>
                </div>
                <!-- Social buttons -->
                <div class="col-md-2 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">Xarxes</h5>
                    <br>
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-fb mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-tw mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-gplus mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Social buttons -->
                </div>
            </div>
            <!-- Grid row -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                © 2020 Copyright:
                <a href="#">Music</a>
            </div>
            <!-- Copyright -->
        </div>
    </footer>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">

    <!-- Footer -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    -->

</body>

</html>