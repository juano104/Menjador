<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="myform" method="post" action="">
        <input name="row_password" type="text" size="40">
        <input type="button" class="button" value="Generate" onClick="randomPassword(10);" tabindex="2">
    </form>


    <script>
        function randomPassword(length) {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
            myform.row_password.value = pass;
        }
    </script>
</body>

</html>