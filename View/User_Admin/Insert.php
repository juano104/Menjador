<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="insert" method="post" action="../../Controller/api/User_Admin/Insert/Insert_Parent.php">
        Name: <input name="name" type="text"> <br>
        Last Name: <input name="last_name" type="text"><br>
        DNI: <input name="DNI" type="text"><br>
        Role: <input name="role" type="text"><br>
        Password: <input name="password" type="text">
        <input type="button" class="button" value="Generate" onClick="randomPassword(8);" tabindex="2"><br>
        <input type="submit" value="Insert Parent">
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