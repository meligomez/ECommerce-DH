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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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
      <li><a href="login.php" <?php echo (isset($_SESSION["userLogueado"])  || isset($_COOKIE["usuario"]))?"style='display:none;'":"" ?> >INGRESA</a></li>
      <li><a href="registroDeUsuarios.php" <?php echo (isset($_SESSION["userLogueado"])  || isset($_COOKIE["usuario"]))?"style='display:none;'":"" ?>>REGISTRATE</a></li>
      <li><a href="home.php">VEHICULOS</a></li>
      <li><a href="">NOSOTROS</a></li>
      <div class="dropdown menuLogueado" <?php echo (isset($_SESSION["userLogueado"])  || isset($_COOKIE["usuario"]))?"":"style='display:none;' "?>>
        <li class="dropbtn"  <?php echo (isset($_SESSION["userLogueado"])  || isset($_COOKIE["usuario"]))?"":"style='display:none;'" ?> >PERFIL
          <div class="dropdown-content">
            <a href="#">Configurar</a>
        </div>
        </li>
      </div>
      <li><a href=""><img src="../img/carrito.png" alt="carro-de-compras"></a></li>
      <li><a href=""><img src="../img/settings.png" alt="configuracion"></a></li>
      <li id="logout" <?php echo (isset($_SESSION["userLogueado"]) || isset($_COOKIE["usuario"]) )?"":"style='display:none;'" ?>>
        <form action="" method="post">
          <input type="submit" value="" name="inputDeslogueo" style="background: none;border: none;background-image: url(../img/logout.png);
                                                                       background-size: cover;margin: 0px;background-position: center;width: 30px;margin-top: 54%;">
        </form>
      </li>
    </ul>
  </nav>
</header>
