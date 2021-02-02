<?php
include_once "../../Controller/api/User_Parent/Read.php";
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
    });
</script>

<body>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Reservation</a></li>
            <li><a href="#tabs-2">Choose type</a></li>
            <li><a href="#tabs-3">Day type</a></li>
            <li><a href="#tabs-4">Summary</a></li>
            <!--<li><a href="#tabs-5">Monthly/Yearly</a></li>-->
        </ul>
        <form action="../../Controller/api/User_Parent/Booking_Day.php" method="post">
            <div id="tabs-1">
                <h3>For who is it?</h3> <br>
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
                        echo "<div id='" . $name . "'>";
                        echo "<input class='radioname' type='radio' value='" . $name . "' name='radioname' id='" . $name . "'>";
                        echo "<input type='hidden' id='" . $ID . "' name='idstudent' value='" . $ID . "' />";
                        echo "<label for=" . $name . ">" . $name . " " . $last_name . "</label><br>";
                        echo "</div>";
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
                <div class="infostudent"></div>
                <input type="radio" value="One Day" name="day" id="Oneday">
                <label for="day">One Day</label>
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
        $("#submit").on('click', function() {
            var idstudent = $("#idstudent").val();
            var date = $("#datepicker").val();

            var json = {
                "date": date,
                "student_ID": idstudent,
            };

            if (idstudent != "" && date != "") {
                $.ajax({
                    url: "../../Controller/api/User_Parent/Booking_Day.php",
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
        });



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
            if (currentTab == 0) {
                var name = $("input[name='radioname']:checked").val();
                student_info.push(name);
                $(".infostudent").html(student_info);
                var newName = $("<tr><th>Name</th></tr><tr><td><input type='hidden' name='nameform'>" + name + "</td></tr>");
                $(".table").append(newName);
                console.log(student_info);
            }
            if (currentTab == 1) {
                var type = $("input[name='day']:checked").val();
                student_info.push(type);
                //$(".infostudent").html(student_info);
                var newType = $("<tr><th>Type of Reservation</th></tr><tr><td><input type='hidden' name='typeform'>" + type + "</td></tr>");
                $(".table").append(newType);
                $("div#<?php echo $name?> input[type=radio]:checked").each(function() {
                    alert(this.value);
                });
                /*var id = $("#<?php echo $name ?>").children();
                $(".table").append();*/
                console.log(student_info);
            }
            if (currentTab == 2) {
                var day = $("#datepicker").val();
                student_info.push(day);
                //$(".infostudent").html(student_info);
                var newDate = $("<tr><th>Date</th></tr><tr><td><input type='hidden' name='dayform'>" + day + "</td></tr>");
                $(".table").append(newDate);

                //remove from array
                console.log(student_info);
            }
            /*for (var i = 0; i < student_info.length; i++) {
                $(".table").append("<tr><td>" + student_info[i] + "</td></tr>");
            }*/
            /*if (currentTab == 3) {
                    

                    /*var day = $("#datepicker").val();
                    student_info.push(day);
                    $(".infostudent").html(student_info);
                    console.log(student_info);
            }*/

            //
            var tabs = $('#tabs').tabs();
            var c = $('#tabs').tabs("length");
            currentTab++; /*= currentTab == (c - 1) ? currentTab : (currentTab + 1);*/
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
                //var name = $("input[name='radioname']:checked").val();
                //student_info.push(name);
                //$(".infostudent").html(student_info);
                $(".table").empty();
                console.log(student_info);
            } else if (currentTab == 1) {
                //var name = $("input[name='radioname']:checked").val();
                //student_info.push(name);
                //$(".infostudent").html(student_info);
                student_info.slice(2);
                $(".table tr").slice(2).remove();
                console.log(student_info);
            } else if (currentTab == 2) {
                //var type = $("input[name='day']:checked").val();
                //student_info.push(type);
                //$(".infostudent").html(student_info);
                $(".table tr").slice(2).remove();
                console.log(student_info);
            } else if (currentTab == 3) {
                //var day = $("#datepicker").val();
                //student_info.push(day);
                //$(".infostudent").html(student_info);
                $(".table").last().remove();
                console.log(student_info);
            }

            //
            var tabs = $('#tabs').tabs();
            var c = $('#tabs').tabs("length");
            //currentTab--; /*= currentTab == 0 ? currentTab : (currentTab - 1);*/
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