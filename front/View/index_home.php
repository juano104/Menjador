<html>

<head>
    <title>Home</title>
</head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.3/themes/base/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.8.3/jquery-ui.js"></script>
<script>
    
    $(function() {
        $(".datepicker").datepicker({
            dateFormat: 'yy/mm/dd',
            minDate: 0
        });
        $("#datepickers").datepicker({
            dateFormat: 'yy/mm/dd',
            minDate: 0
        });
        $("#datepickere").datepicker({
            dateFormat: 'yy/mm/dd',
            minDate: 0
        });
    });
</script>

<body>
    <form>
        <div id="tabs">
            <ul>
                <li><a class="atabs" href="#tabs-1">Reservation</a></li>
                <li><a class="atabs" href="#tabs-2">Choose type</a></li>
                <li><a class="atabs" href="#tabs-3">Day type</a></li>
                <li><a class="atabs" href="#tabs-4">Monthly/Yearly</a></li>
                <li><a class="atabs" href="#tabs-5">Summary</a></li>
            </ul>

            <div id="tabs-1">
                <h3>For who is it?</h3> <br>
                <input type="hidden" name="parent_DNI" id="parent_DNI" value="<?php echo $parent_DNI ?>">
                <?php
                if ($count > 0) {
                    $userArr = array();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $e = array(
                            "ID" => $ID,
                            "name" => $name,
                            "last_name" => $last_name
                        );
                        array_push($userArr, $e);

                        echo "<input class='radioname' type='radio' value='" . $ID . "' name='radioname' id='" . $name . "'>";
                        echo "<label for=" . $name . ">" . $name . " " . $last_name . "</label><br>";
                    }
                }
                ?>
                <br>
                <button type="button" class="b1n">NEXT</button>

            </div>
            <div id="tabs-2">
                <h3>Type</h3>
                <div>
                    <table class="tabler" border="1">
                        <thead>
                            <tr>
                                <th class="n">Name</th>
                                <th class="t">Type of Reservation</th>
                                <th class="d">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <input type="radio" value="OneDay" name="type" id="Oneday">
                <label for="Oneday">Loose Days</label>
                <input type="radio" value="Monthly" name="type" id="Monthly">
                <label for="Monthly">Monthly</label>
                <input type="radio" value="Yearly" name="type" id="Yearly">
                <label for="Yearly">Yearly</label>

                <br>

                <button type="button" class="b2p">PREVIOUS</button>
                <button type="button" class="b2n">NEXT</button>
            </div>
            <div id="tabs-3">
                <h3>One Day</h3>
                <div>
                    <table class="tabler" border="1">
                        <thead>
                            <tr>
                                <th class="n">Name</th>
                                <th class="t">Type of Reservation</th>
                                <th class="d">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d1">
                    <label for="datepicker1">Date:</label>
                    <input name="date1" type="text" class="datepicker">
                </div><br>

                <div class="d2">
                    <label for="datepicker2">Date 2:</label>
                    <input name="date2" type="text" class="datepicker">
                </div><br>
                <div class="d3">
                    <label for="datepicker3">Date 3:</label>
                    <input name="date3" type="text" class="datepicker">
                </div><br>
                <div class="d4">
                    <label for="datepicker4">Date 4:</label>
                    <input name="date4" type="text" class="datepicker">
                </div><br>
                <div class="d5">
                    <label for="datepicker5">Date 5:</label>
                    <input name="date5" type="text" class="datepicker">
                </div><br>
                <br>
                <button type="button" class="newdate">New Date</button>
                <button type="button" class="deldate">Remove Date</button>
                <br><br>
                <button type="button" class="b3p">PREVIOUS</button>
                <button type="button" class="b3n">NEXT</button>
            </div>
            <div id="tabs-4">
                <h3>Monthly/Yearly</h3>
                <div>
                    <table class="tabler" border="1">
                        <thead>
                            <tr>
                                <th class="n">Name</th>
                                <th class="t">Type of Reservation</th>
                                <th class="d">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <p>Start Date(yyyy/mm/dd): <input name="startdate" type="text" id="datepickers"></p>
                <p>End Date(yyyy/mm/dd): <input name="enddate" type="text" id="datepickere"></p>
                <input type="checkbox" id="monday" name="monday" value="0">
                <label for="monday">Monday</label><br>

                <input type="checkbox" id="tuesday" name="tuesday" value="0">
                <label for="tuesday">Tuesday</label><br>

                <input type="checkbox" id="wednesday" name="wednesday" value="0">
                <label for="wednesday">Wednesday</label><br>

                <input type="checkbox" id="thursday" name="thursday" value="0">
                <label for="thursday">Thursday</label><br>

                <input type="checkbox" id="friday" name="friday" value="0">
                <label for="friday">Friday</label><br>
                <br>
                <button type="button" class="b4p">PREVIOUS</button>
                <button type="button" class="b4n">NEXT</button>
            </div>
            <div id="tabs-5">
                <h3>Your Reservation:</h3>
                <div>
                    <table class="tabler" border="1">
                        <thead>
                            <tr>
                                <th class="n">Name</th>
                                <th class="t">Type of Reservation</th>
                                <th class="d">Date</th>
                                <th class="sd">Start Date</th>
                                <th class="ed">End Date</th>
                                <th class="dow">Days of Week</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <br>
                <input id="submit" name="submit" type="submit" value="Reserve">
                <br> <br>
                <button type="button" class="b5p">PREVIOUS</button>
            </div>

        </div>
    </form>
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
                $("#tabs").tabs({
                    active: 1,
                    disabled: [0, 2, 3, 4],
                    selected: 1
                });
                $("#tabs").tabs("option", "active", 1);

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
            });

            $(".b2n").click(function() {

                var type = $("input[name='type']:checked").val();

                if (type == "Monthly" || type == "Yearly") {
                    $("#tabs").tabs({
                        active: 3,
                        disabled: [0, 1, 2, 4],
                        selected: 3
                    });

                    $("#tabs").tabs("option", "active", 3);

                    var extraType = $("<td>" + type + "</td>");
                    $(".tabler > tbody > tr").append(extraType);
                    $(".t").show();
                    $(".d").hide();
                    $(".sd").hide();
                    $(".ed").hide();
                    $(".dow").hide();
                } else {
                    $("#tabs").tabs({
                        active: 2,
                        disabled: [0, 1, 3, 4],
                        selected: 2
                    });

                    $("#tabs").tabs("option", "active", 2);
                    var newType = $("<td>" + type + "</td>");
                    $(".tabler > tbody > tr").append(newType);
                    $(".t").show();
                    $(".d").hide();
                    $(".sd").hide();
                    $(".ed").hide();
                    $(".dow").hide();
                }
            });
            $(".b2p").click(function() {
                $("#tabs").tabs({
                    active: 0,
                    disabled: [1, 2, 3, 4],
                    selected: 0
                });
                $("#tabs").tabs("option", "active", 0);
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
                        dateArray.push(day15);
                    }
                    var newDate = $("<td>" + dateArray + "</td>");
                    $(".tabler > tbody > tr").append(newDate);
                    $(".d").show();

                } else {
                    alert("Please enter a date");
                }
            });
            $(".b3p").click(function() {
                $("#tabs").tabs({
                    active: 1,
                    disabled: [0, 2, 3, 4],
                    selected: 1
                });
                $("#tabs").tabs("option", "active", 1);


                $('.tabler > tbody > tr > td:last-child').remove();
                $(".t").hide();
                $("input[name='type']:checked").prop('checked', false);
                $("input[name='date']").val("");
            });

            $(".b4n").click(function() {
                $("#tabs").tabs({
                    active: 4,
                    disabled: [0, 1, 2, 3],
                    selected: 4
                });
                $("#tabs").tabs("option", "active", 4);

                var sday = $("#datepickers").val();
                var eday = $("#datepickere").val();
                var DoW = new Array();
                if (sday != "" && eday != "") {
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
                }

            });
            $(".b4p").click(function() {
                $("#tabs").tabs({
                    active: 1,
                    disabled: [0, 2, 3, 4],
                    selected: 1
                });
                $("#tabs").tabs("option", "active", 1);

                $('.tabler > tbody > tr > td:last-child').remove();
                $(".t").hide();
                $("input[name='type']:checked").prop('checked', false);
                $("input[name='startdate']").val("");
                $("input[name='enddate']").val("");
                $("input[type='checkbox']:checked").prop('checked', false);
            });

            $(".b5p").click(function() {
                var day = $("#datepicker").val();
                if (day != "") {
                    $("#tabs").tabs({
                        active: 2,
                        disabled: [0, 1, 3, 4],
                        selected: 2
                    });
                    $("#tabs").tabs("option", "active", 2);
                    $('.tabler > tbody > tr > td:last-child').remove();
                    $(".d").hide();
                } else {
                    $("#tabs").tabs({
                        active: 3,
                        disabled: [0, 1, 2, 4],
                        selected: 3
                    });
                    $("#tabs").tabs("option", "active", 3);

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

</body>

</html>