<?php
session_start();

function eliminarSesionOCookie(){
  session_destroy();
  setcookie("usuario",null,time()-1);
  header("Location: login.php ");
}
if(isset($_POST["inputDeslogueo"]))
{
  eliminarSesionOCookie();
  header('Location: /ECommerce-DH/html/login.php');
}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<header>
  <nav class="header_menu">
    <ul class="lista_titulo">
      <li class="titulo"><a href="home.php">Lagard</a></li>
    </ul>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu ≡
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button">VEHICULOS</button>
        <button class="dropdown-item" type="button">ACCESORIOS</button>
        <button class="dropdown-item" type="button" <?php echo isset($_SESSION["userLogueado"])?"style='display:none;'":"" ?> >INGRESA</button>
      </div>
    </div>
    <ul class="lista_menu">
      <li><a href="login.php" <?php echo isset($_SESSION["userLogueado"])?"style='display:none;'":"" ?> >INGRESA</a></li>
      <li><a href="registroDeUsuarios.php" <?php echo isset($_SESSION["userLogueado"])?"style='display:none;'":"" ?>>REGISTRATE</a></li>
      <li><a href="home.php">VEHICULOS</a></li>
      <li><a href="">NOSOTROS</a></li>
      <div class="dropdown menuLogueado" <?php echo isset($_SESSION["userLogueado"])?"":"style='display:none;' "?>>
        <li class="dropbtn"  <?php echo isset($_SESSION["userLogueado"])?"":"style='display:none;'" ?> >PERFIL
          <div class="dropdown-content">
            <a href="#">Configurar</a>
        </div>
        </li>
      </div>
      <li><a href=""><img src="../img/carrito.png" alt="carro-de-compras"></a></li>
      <li><a href=""><img src="../img/settings.png" alt="configuracion"></a></li>
      <form action="" method="post">
      <li <?php echo isset($_SESSION["userLogueado"])?"":"style='display:none;'" ?>><input type="submit" value="" name="inputDeslogueo" class="logout"> </li>
      </form>
    </ul>
  </nav>
</header>
