<?php
$today = date("Y-m-d");
?>
<nav class="navbar navbar-expand-lg navbar-light static-top">
    <!-- LOGO -->
    <a href="Pagina-Principal.html" class="navbar-brand">
        <img src="public/img/logo.png" alt="" class="d-inline-block align-middle imgres">
    </a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://www.menjadorescola.me">
                    Inicio
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="reservas">
                    Mis reservas
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">LogOut</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
<br>