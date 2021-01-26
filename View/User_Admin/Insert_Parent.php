<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="insert" method="post" action="">
        <input name="name" type="text">
        <input name="last_name" type="text">
        <input name="DNI" type="text">
        <input name="role" type="text">
        <input name="password" type="text">
        <input type="button" class="button" value="Generate" onClick="randomPassword(8);" tabindex="2">
    </form>


    <script>
        function randomPassword(length) {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
            insert.password.value = pass;
        }
    </script>
</body>

</html>