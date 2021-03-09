<?php

require "core/Router.php";

$router = new Router;


require "core/routes.php";


$uri = trim($_SERVER["REQUEST_URI"], "/");


require $router->direct($uri);
