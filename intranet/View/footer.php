<footer class="page-footer font-small stylish-color-dark pt-4">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
            <!-- Grid row -->
            <div class="row">
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">ENLACES</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="http://www.iesmanacor.cat/" style="color: white;">IES Manacor Web</a>
                        </li>
                        <li>
                            <a href="https://www.menjadorescola.me/menu" style="color: white;">Menu</a>
                        </li>
                        <li>
                            <a href="https://www.menjadorescola.me/login" style="color: white;">Realizar Reserva</a>
                        </li>
                        <li>
                            <a href="https://www.menjadorescola.me/reservas" style="color: white;">Mis Reservas</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <div class="col-md-4 mx-auto">
                    <!-- Content -->

                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">UBICACIÓN</h5>

                    <div class="row">
                        <div class="col-2"></div>
                        <div id="mapid" class="col-8" style="width:400px;height:250px;"></div>
                        <div class="col-2"></div>
                    </div>

                    <script>
                        var map = L.map('mapid').
                        setView([39.56093185, 3.20064345557848],
                            15);

                        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                            maxZoom: 18
                        }).addTo(map);

                        L.control.scale().addTo(map);

                        var marker = L.marker([39.56093185, 3.20064345557848]).addTo(map);
                    </script>
                </div>
                <!-- Social buttons -->
                <div class="col-md-3 mx-auto">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-center">REDES SOCIALES</h5>
                    <br>
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item">
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>
                        </li>
                    </ul>
                    <!-- Social buttons -->
                </div>
            </div>
            <!-- Grid row -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                © 2021 Copyright:
                <a href="#" style="color: white;">MenjadorEscola</a>
            </div>
            <!-- Copyright -->
        </div>
    </footer>