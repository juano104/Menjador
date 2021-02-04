<?php
include_once "../../Controller/User_Parent/Read.php";
?>

<html>

<head>
    <title>Home</title>
</head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.3/themes/base/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.8.3/jquery-ui.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy/mm/dd'
        });
        $("#datepickers").datepicker({
            dateFormat: 'yy/mm/dd'
        });
        $("#datepickere").datepicker({
            dateFormat: 'yy/mm/dd'
        });
    });
</script>

<body>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Reservation</a></li>
            <li><a href="#tabs-2">Choose type</a></li>
            <li><a href="#tabs-3">Day type</a></li>
            <li><a href="#tabs-4">Monthly/Yearly</a></li>
            <li><a href="#tabs-5">Summary</a></li>
        </ul>
        <form action="../../Controller/User_Parent/Booking.php" method="post">
            <div id="tabs-1">
                <h3>For who is it?</h3> <br>
                <input type="hidden" name="parent_DNI" value="<?php echo $parent_DNI ?>">
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
            </div>
            <div id="tabs-2">
                <h3>Type</h3>
                <div>
                    <table class="table" border="1">

                    </table>
                </div>
                <input type="radio" value="OneDay" name="type" id="Oneday">
                <label for="Oneday">One Day</label>
                <input type="radio" value="Monthly" name="type" id="Monthly">
                <label for="Monthly">Monthly</label>
                <input type="radio" value="Yearly" name="type" id="Yearly">
                <label for="Yearly">Yearly</label>
            </div>
            <div id="tabs-3">
                <h3>One Day</h3>
                <div>
                    <table class="table" border="1">

                    </table>
                </div>
                <div class="infostudent"></div>
                <p>Date(yyyy/mm/dd): <input name="date" type="text" id="datepicker"></p>
            </div>
            <div id="tabs-4">
                <h3>One Day</h3>
                <div>
                    <table class="table" border="1">

                    </table>
                </div>
                <div class="infostudent"></div>
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
            </div>
            <div id="tabs-5">
                <h3>Your Reservation:</h3>
                <div>
                    <table class="table" border="1">

                    </table>
                </div>
                <input id="submit" name="submit" type="submit" value="Reserve">
            </div>
            <!--<div id="tabs-5">
                Tab 5 Content
            </div>-->
            <br />
            <input type="button" id="btnPrevious" value="Previous" style="display:none" />
            <input type="button" id="btnNext" value="Next" />
        </form>
    </div>




</body>

<script type="text/javascript">
    $(document).ready(function() {
        //ajax json function:
        /*$("#submit").on('click', function() {
            var idstudent = $("#idstudent").val();
            var date = $("#datepicker").val();

            var json = {
                "date": date,
                "student_ID": idstudent,
            };

            if (idstudent != "" && date != "") {
                $.ajax({
                    url: "../../Controller/User_Parent/Booking_Day.php",
                    type: "POST",
                    data: json,
                    dataType: "json",
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            alert('Data added successfully !');
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured !");
                        }

                    }
                });
            } else {
                alert('Please fill all the field !');
            }
        });*/



        //button functions
        var student_info = new Array();
        var currentTab = 0;
        $(function() {
            $("#tabs").tabs({
                select: function(e, i) {
                    currentTab = i.index;
                }
            });
        });
        $("#btnNext").click(function() {
            currentTab++;
            /*$("div#id input[type=radio]:checked").each(function() {
                alert(this.value);
            });*/
            if (currentTab == 1) { //this is grabbing the kid's name 
                $("input[type='radio']:checked").each(function() {
                    var idVal = $(this).attr("id");
                    //alert($("label[for='" + idVal + "']").text());
                    var name = idVal;
                    student_info.push(name);
                    //$(".infostudent").html(student_info);
                    var newName = $("<tr><th>Name</th></tr><tr><td><input type='hidden' name='nameform'>" + name + "</td></tr>");
                    $(".table").append(newName);
                    console.log(student_info);
                });
            }
            if (currentTab == 2) { //this is grabbing the type of reservation
                var type = $("input[name='type']:checked").val();

                if (type == "Monthly" || type == "Yearly") {
                    student_info.push(type);
                    var extraType = $("<tr><th>Type of Reservation</th></tr><tr><td><input type='hidden' name='typeform'>" + type + "</td></tr>");
                    $(".table").append(extraType);
                    console.log(student_info);
                    currentTab++;
                } else {
                    student_info.push(type);
                    var newType = $("<tr><th>Type of Reservation</th></tr><tr><td><input type='hidden' name='typeform'>" + type + "</td></tr>");
                    $(".table").append(newType);
                    console.log(student_info);
                }


            }
            if (currentTab == 3) { //grabbing the dates one day
                var day = $("#datepicker").val();
                if (day != "") {
                    student_info.push(day);
                    //$(".infostudent").html(student_info);
                    var newDate = $("<tr><th>Date</th></tr><tr><td><input type='hidden' name='dayform'>" + day + "</td></tr>");
                    $(".table").append(newDate);

                    //remove from array
                    console.log(student_info);
                    currentTab++;
                }


            }
            if (currentTab == 4) { //grabbing the dates monthly/yearly
                var sday = $("#datepickers").val();
                var eday = $("#datepickere").val();
                var DoW = new Array();

                //$(".infostudent").html(student_info);
                if (sday != "" && eday != "") {
                    var mon = $("input[name='monday']:checked");
                    var tue = $("input[name='tuesday']:checked");
                    var wed = $("input[name='wednesday']:checked");
                    var thu = $("input[name='thursday']:checked");
                    var fri = $("input[name='friday']:checked");

                    var m = $("label[for='monday']").text();
                    var t = $("label[for='tuesday']").text();
                    var w = $("label[for='wednesday']").text();
                    var th = $("label[for='thursday']").text();
                    var f = $("label[for='friday']").text();
                    if (mon) {
                        mon.val("1")
                        student_info.push(mon.val("1"));
                        DoW.push(m);
                    };
                    if (tue) {
                        tue.val("1")
                        student_info.push(tue.val("1"));
                        DoW.push(t);
                    };
                    if (wed) {
                        wed.val("1")
                        student_info.push(wed.val("1"));
                        DoW.push(w);
                    };
                    if (thu) {
                        thu.val("1")
                        student_info.push(thu.val("1"));
                        DoW.push(th);
                    };
                    if (fri) {
                        fri.val("1")
                        student_info.push(fri.val("1"));
                        DoW.push(f);
                    };
                    //End daysofweek
                    student_info.push(sday);
                    student_info.push(eday);
                    var newSDate = $("<tr><th>Start Date</th></tr><tr><td><input type='hidden' name='dayform'>" + sday + "</td></tr>");
                    var newEDate = $("<tr><th>End Date</th></tr><tr><td><input type='hidden' name='dayform'>" + eday + "</td></tr>");

                    console.log(DoW);

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
                    var DoWt = $("<tr><th>End Date</th></tr><tr><td><input type='hidden' name='dayform'>" + runDoW(DoW) + "</td></tr>");
                    $(".table").append(newSDate);
                    $(".table").append(newEDate);
                    $(".table").append(DoWt);
                }

                //remove from array
                console.log(student_info);
            }

            //
            var tabs = $('#tabs').tabs();
            var c = $('#tabs').tabs("length");
            tabs.tabs('select', currentTab);
            $("#btnPrevious").show();
            if (currentTab == (c - 1)) {
                $("#btnNext").hide();
            } else {
                $("#btnNext").show();
            }
        });

        $("#btnPrevious").click(function() {
            currentTab--;
            if (currentTab == 0) {
                student_info.length = 0;
                $(".table").empty();
                console.log(student_info);
            } else if (currentTab == 1) {
                student_info.pop();
                //student_info.splice(student_info.length - 2, 1);
                /*$('.table tr:last').remove();
                $('.table tr:last').remove();*/
                $(".table tr").find('td:last-child').remove();
                $(".table tr").find('td:last-child').remove();
                //$(".table tr").slice(2).remove();
                $("input[name='day']:checked").prop('checked', false);
                console.log(student_info);
            } else if (currentTab == 2) {
                student_info.pop();
                /*$('.table tr:last').remove();
                $('.table tr:last').remove();*/
                $(".table tr").slice(2).remove();
                console.log(student_info);
            }


            //
            var tabs = $('#tabs').tabs();
            var c = $('#tabs').tabs("length");

            tabs.tabs('select', currentTab);
            if (currentTab == 0) {
                student_info = [];
                $("#btnNext").show();
                $("#btnPrevious").hide();
            }
            if (currentTab < (c - 1)) {
                $("#btnNext").show();
            }
        });
    });
</script>

</html>