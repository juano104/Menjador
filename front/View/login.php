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
    <style>
        .navbar {
            background-color: #F2BF8D !important;
            font-size: 110%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            /*padding: 0px;*/
        }

        .na {
            padding-top: 0% !important;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light static-top">
        <div class="container na">
            <a href="#" class="navbar-brand">
                <!-- Logo Image -->
                <img src="public/img/logo.png" width="100" alt="" class="d-inline-block align-middle mr-2">
            </a>
        </div>
    </nav>
    <br>
    <div class="container margin justify-content-center">
        <div class="row">
            <div class="col-12 justify-content-center text-center">
                <h1>BIENVENIDO</h1>
            </div>
            <div class="col-12 justify-content-center text-center">
                <img src="public/img/contacto.png" class="img-contacte" alt="">
            </div>
            <div class="col-12 justify-content-center">
                <form action="home" method="POST" class="needs-validation" novalidate>
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <label for="username">Usuario</label>
                            <input name="username" id="username" required type="text" class="form-control">
                            <div class="invalid-feedback">
                                Porfavor, ponga un usuario.
                            </div>
                        </div>
                        <div class="col-1 col-lg-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <label for="password">Contrasenya</label>
                            <input name="password" required id="password" type="password" class="form-control">
                            <div class="invalid-feedback">
                                Porfavor, ponga una contraseña.
                            </div>
                        </div>
                        <div class="col-1 col-lg-2"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 col-lg-4"></div>
                        <div class="col-6 col-lg-4">
                            <button type="submit" name="submit" class="btn enviar">Iniciar Sesion</button>
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

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>