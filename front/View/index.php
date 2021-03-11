<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="public/css/estils.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>

    </script>

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

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


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
            <div aria-label="breadcrumb" style="margin-bottom: 3%;">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item active">Pagina Padres</li>
                    <li class="breadcrumb-item active" aria-current="page">Realizar Reserva</li>
                </ol>
            </div>
            <form id="paymentForm" method="post" name="form1" class="needs-validation" novalidate>
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
                        <div class="form-group">
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
                                        echo "<input class='radioname' type='radio' required value='" . $ID . "' name='radioname' id='" . $name . "'>";
                                        echo "<label style='margin-left: 2% ;' for=" . $name . ">" . $name . " " . $last_name . "</label><br>";
                                    }
                                }
                            }
                            ?>
                            <div class="invalid-feedback">
                                Porfavor, elija un hijo.
                            </div>
                        </div>
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
                        <div class="form-group">
                            <input type="radio" value="Loose" name="type" required id="Loose">
                            <label for="Loose">Dia Suelto</label>
                            <input type="radio" required value="Fixed" name="type" id="Fixed">
                            <label for="Fixed">Multiples dias</label>
                        </div>
                        <br>

                        <button type="button" class="b2p btn btn-outline-danger">Atras</button>
                        <button type="button" class="b2n btn btn-outline-success">Siguiente</button>
                    </div>
                    <div class="tab-content" id="tabs-3">
                        <h3>Dia Fijo</h3>
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
                        <div class="form-group">
                            <div class="d1">
                                <label for="datepicker1">Fecha 1:</label>
                                <input name="date1" type="text" class="datepicker" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d2">
                                <label for="datepicker2">Fecha 2:</label>
                                <input name="date2" type="text" class="datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d3">
                                <label for="datepicker3">Fecha 3:</label>
                                <input name="date3" type="text" class="datepicker" autocomplete="off">
                            </div>
                        </div>
                        <br>
                        <button type="button" title="Añadir fecha" class="deldate btn btn-danger"><i class="fas fa-calendar-times"></i></button>
                        <button type="button" title="Eliminar fecha" class="newdate btn btn-dark"><i class="fas fa-calendar-plus"></i></button>
                        <br><br>
                        <button type="button" class="b3p btn btn-outline-danger">Atras</button>
                        <button type="button" class="b3n btn btn-outline-success">Siguiente</button>
                    </div>
                    <div class="tab-content" id="tabs-4">
                        <h3>Multiples Dias</h3>
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
                        <div class="col-12" style="padding-left: 0%;">
                            <table class="tabler">
                                <thead>
                                    <tr>
                                        <div class="col-1">
                                            <th class="n">Nombre</th>
                                        </div>
                                        <div class="col-1">
                                            <th class="t">Tipo</th>
                                        </div>
                                        <div class="col-1">
                                            <th class="d">Fecha</th>
                                        </div>
                                        <div class="col-1">
                                            <th class="total">Total</th>
                                        </div>
                                        <div class="col-1">
                                            <th class="sd">Fecha Inicio</th>
                                        </div>
                                        <div class="col-1">
                                            <th class="ed">Fecha Final</th>
                                        </div>
                                        <div class="col-6">
                                            <th class="dow">Dias de la semana</th>
                                        </div>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h3>Metodo de Pago</h3>
                        <br>
                        <button type="button" title="Realizar pago con tarjeta de credito" class="btn btn-dark" data-toggle="modal" data-target="#tarjeta">
                            Tarjeta
                        </button>

                        <button type="button" title="Realizar pago con domiciliacion bancaria" class="btn btn-dark" data-toggle="modal" data-target="#banco">
                            Banco
                        </button>
                        <br>
                        <br>
                        <button type="button" class="b5p btn btn-outline-danger">Atras</button>
                    </div>

                </div>
                <div class="modal fade" id="tarjeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Tarjeta <i class="fas fa-credit-card fa-sm"></i></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class='credit-card-validation'>
                                    <div class="col-12 form-group">
                                        <p>
                                            <label>Titular *</label>
                                            <br>
                                            <input type="text" class="form-control">
                                        <div class="invalid-feedback">
                                            Porfavor, ponga un titular.
                                        </div>
                                        </p>
                                    </div>
                                    <div class="col-6 form-group">
                                        <p>
                                            <label>Numero de Tarjeta *</label>
                                            <br>
                                            <input type="tel" name="cardNumber" class="cardNumber form-control" maxlength="19" placeholder="0000 0000 0000 0000" data-validation-type="custom" data-validation-error-msg="Please enter a valid card number" data-validation-error-msg-container="#cardnumber-error-dialog">
                                        <div class="invalid-feedback">
                                            Porfavor, ponga una Tarjeta.
                                        </div>
                                        </p>
                                    </div>
                                    <p>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label>Fecha de Caducidad *</label>
                                            <br>
                                            <input type="text" name="cardExpiry" maxlength="5" class="cardExpiry form-control" placeholder="mm/yy" data-validation-type="alphanumeric">
                                            <div class="invalid-feedback">
                                                Porfavor, ponga una fecha de caducidad.
                                            </div>
                                        </div>
                                        <div class="col-6 form-group">

                                            <label>CVV *</label>
                                            <br>
                                            <input type="text" name="cardCVV" maxlength="3" class="cardCVV form-control" data-validation-type="numeric" data-validation-error-msg="Please enter a valid CVV number" data-validation-error-msg-container="#cardcvv-error-dialog">
                                            <div class="invalid-feedback">
                                                Porfavor, ponga un CVV.
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                    <ul class="list-unstyled list-inline text-center">
                                        <li class="list-inline-item">

                                            <i class="fab fa-cc-mastercard fa-2x" style="color: #F70017; "></i>

                                        </li>
                                        <li class="list-inline-item">

                                            <i class="fab fa-cc-visa fa-2x" style="color: #002187;"></i>

                                        </li>
                                        <li class="list-inline-item">

                                            <i class="fab fa-cc-paypal fa-2x" style="color: #0096DA;"></i>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                                <input id="submit" name="submit" type="submit" value="Reservar" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            Reserva realizada correctamente!
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="banco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Banco <i class="fas fa-university fa-sm"></i></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Introduce aquí la información de tu cuenta bancaria a la que quieras domiciliar el pago.</p>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="nombreEntidad">Nombre de la Entidad *</label>
                                        <input name="nombreEntidad" id="nombreEntidad" type="text" class="form-control">
                                        <div class="invalid-feedback">
                                            Porfavor, ponga un nombre.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-12">
                                        <label for="IBAN">IBAN *</label>
                                        <input name="IBAN" id="IBAN" type="text" placeholder="Ej: ES21 1465 0100 72 2030876293" class="form-control">
                                        <div class="invalid-feedback">
                                            Porfavor, ponga un IBAN.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-12">
                                        <label for="BIC">BIC *</label>
                                        <input name="BIC" id="BIC" type="text" placeholder="Ej: INGDESMMXXX" class="form-control">
                                        <div class="invalid-feedback">
                                            Porfavor, ponga un BIC.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <input id="submit2" name="submit2" type="submit" value="Reservar" class="btn btn-dark">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>

    </script>

    <script>
        /*
         * Display error message based on current element's data attributes
         */
        function cgToggleError(element, status) {
            var errorMessage = $(element).data('validation-error-msg'),
                errorContainer = $(element).data('validation-error-msg-container');

            $(element).removeClass().addClass(status);

            if (status === 'valid') {
                $(errorContainer).html(errorMessage).hide();
            } else if (status === 'invalid') {
                $(errorContainer).html(errorMessage).show();
            }
        }

        /*
         * Format a date as MM/YY
         */
        function cgFormatExpiryDate(e) {
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8];
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }

            event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
            ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
            ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
            ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
            ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
            ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
            ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
            );
        }

        /*
         * Check if date element is valid and add a visual hint
         */
        function cgDateValidate(whatDate) {
            var currVal = whatDate;

            if (currVal === '') {
                return false;
            }

            var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
            var dtArray = currVal.match(rxDatePattern);

            if (dtArray == null) {
                return false;
            }

            // Check for dd/mm/yyyy format
            var dtDay = dtArray[1],
                dtMonth = dtArray[3],
                dtYear = dtArray[5];

            if (dtMonth < 1 || dtMonth > 12) {
                return false;
            } else if (dtDay < 1 || dtDay > 31) {
                return false;
            } else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31) {
                return false;
            } else if (dtMonth == 2) {
                var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
                if (dtDay > 29 || (dtDay == 29 && !isleap)) {
                    return false;
                }
            }

            return true;
        }

        /*
         * Credit card expiry date formatting (real-time)
         */
        $(document).on('keyup blur', '.cardExpiry', function(event) {
            var currentDate = new Date();
            var currentMonth = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var currentYear = String(currentDate.getFullYear()).slice(-2);

            var cardExpiryArray = $('.cardExpiry').val().split('/');
            var userMonth = cardExpiryArray[0],
                userYear = cardExpiryArray[1];

            if ($('.cardExpiry').val().length !== 5) {
                cgToggleError($(this), 'invalid');
            } else if (userYear < currentYear) {
                cgToggleError($(this), 'invalid');
            } else if (userYear <= currentYear && userMonth < currentMonth) {
                cgToggleError($(this), 'invalid');
            } else if (userMonth > 12) {
                cgToggleError($(this), 'invalid');
            } else {
                cgToggleError($(this), 'valid');
            }

            cgFormatExpiryDate(event);
        });

        /*
         * Credit card CVV disallow letters (real-time)
         */
        $(document).on('keyup', '.cardCVV', function(event) {
            event.target.value = event.target.value.replace(/[^\d\/]|^[\/]*$/g, '');
        });

        /*
         * Credit card CVV length check
         */
        $(document).on('blur', '.cardCVV', function(e) {
            if ($('#cardCVV').val().length < 3) {
                cgToggleError($(this), 'invalid');
            }
        });

        /*
         * Credit card validation
         */
        function cgCheckLuhn(input) {
            var sum = 0,
                numdigits = input.length;
            var parity = numdigits % 2;

            for (var i = 0; i < numdigits; i++) {
                var digit = parseInt(input.charAt(i));
                if (i % 2 == parity) {
                    digit *= 2;
                }
                if (digit > 9) {
                    digit -= 9;
                }
                sum += digit;
            }

            return (sum % 10) == 0;
        }


        /*
         * Credit card Luhn validation (real-time)
         */
        $(document).on('keyup', '.cardNumber', function() {
            var val = this.value,
                val = val.replace(/[^0-9]/g, ''),
                detected = cgDetectCard(val),
                errorClass = 'invalid',
                luhnCheck = cgCheckLuhn(val),
                valueCheck = (val.length == detected[1] || val.length == detected[2]);

            if ($('body').hasClass('inline-ab')) {
                cgToggleError($(this), 'invalid');
            }

            if (luhnCheck && valueCheck) {
                errorClass = 'valid';
                $('#cardType').val(detected[3]);
            } else if (valueCheck || val.length > detected[2]) {
                errorClass = 'invalid';
            }

            if ($('body').hasClass('inline-ab')) {
                cgToggleError($(this), errorClass);
                cgToggleError($(this), 'cc ' + detected[0] + ' ' + errorClass);
            }
            $(this).addClass('cc ' + detected[0] + ' ' + errorClass);
        });

        /*
         * Credit card digit formatting (real-time)
         */
        $(document).on('keypress change blur', '.cardNumber', function() {
            $(this).val(function(index, value) {
                return value.replace(/[^a-z0-9]+/gi, '').replace(/(.{4})/g, '$1 ').trim();
            });
        });
        $(document).on('copy cut paste', '.cardNumber', function() {
            setTimeout(function() {
                $('.cardNumber').trigger('change');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //different dates 
            $(".d2").hide();
            $(".d3").hide();
            /*$(".d4").hide();
            $(".d5").hide();*/

            var visibleDivs = 1;
            var totalDivs = 3;


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
                    var newDate = $("<td>" + dateArray + "</td>");
                    var sum = dateArray.length * <?php echo $_SESSION["price"] ?>; // 8 is the price for everyday
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
                $(".total").hide();
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
                });
            });

        });
    </script>

    <!-- Footer -->
    <?php require_once "footer.php" ?>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">

    <!-- Footer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

</body>

</html>