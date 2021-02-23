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

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="http://intranet.menjadorescola.me/">
            Inicio
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Insertar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="InsertarMenu">Insertar Menu</a>
          <a class="dropdown-item" href="InsertarPlato">Insertar Plato</a>
        </div>
      </li>
        <!-- Dropdown -->
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
  </div>
</nav>
<br>