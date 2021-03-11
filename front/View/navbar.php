<?php
$today = date("Y-m-d");
?>

<style>
    /*.navbar {
        background-color: #F4A261 !important;
        font-size: 110%;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }*/
    .na{
        padding-top: 0% !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light static-top">
    <div class="container na">
        <a href="#" class="navbar-brand">
            <!-- Logo Image -->
            <img src="public/img/logo.png" width="100" alt="Logo Menjador" class="d-inline-block align-middle mr-2">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                    <a class="nav-link" href="login">
                        Realizar Reserva
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="menu">
                        Menu
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="reservas">
                        Mis reservas
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout">LogOut</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>