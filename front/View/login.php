<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/estils.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.3/jquery-ui.js"></script>
    <title>Title</title>

    <style>
        .container {
            margin-top: 0%;
        }
    </style>

</head>

<body>
    <!-- Menu de navegacio -->
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-12 justify-content-center text-center">
                <h1>BIENVENIDO</h1>
            </div>
            <div class="col-12 justify-content-center text-center">
                <img src="public/img/contacto.png" class="img-contacte" alt="">
            </div>
            <div class="col-12 justify-content-center">
                <form action="home" method="POST">
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <label for="username">Usuario</label>
                            <input name="username" id="username" type="text" class="form-control effect-18">
                        </div>
                        <div class="col-1 col-lg-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <label for="password">Contrasenya</label>
                            <input name="password" id="password" type="password" class="form-control effect-18">
                        </div>
                        <div class="col-1 col-lg-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <input type="submit" name="submit" class="form-control enviar" value="Sign in">
                        </div>
                        <div class="col-1 col-lg-2"></div>
                    </div>
                    <div class="form-group row">
                        <button type="button" id="fulano" value="56142879E">Fulanito Fulano</button>
                        <button type="button" id="jaume" value="79481024P">Marc Jaume</button>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <a href="#" target="_blank" rel="noopener noreferrer">Has olvidado la contraseña?</a>
                        </div>
                        <div class="col-1 col-lg-2"></div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $("document").ready(function() {

                $("#fulano").click(function() {
                    $("#username").val($("#fulano").val());
                })
                $("#jaume").click(function() {
                    $("#username").val($("#jaume").val());
                })
            });
            // paso 1 - pedir un número al usuario

            /*var abecedario = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9",".","-","_","$","&","#","@"];
        
        
            //var numero = parseInt(window.prompt("escribe un numero"));
            var numeroAleatorio = 3;
        
            // paso 2 - escribir x caracteres
        
            for(var i = 0; i<numero; i++){
                numeroAleatorio = parseInt(Math.random()*abecedario.length);
                document.write(abecedario[numeroAleatorio]);
            }*/

            // paso 3 - conseguir que cada caracter sea aleatorio.

            // paso 4 - tenemos x caracteres aleatorios
        </script>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>