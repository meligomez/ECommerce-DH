<?php
include_once("header.php");
// include_once("users.php");
// $usuarioLogueado=new User();
include_once("DB.php");
// if(isset($_SESSION))
// {
  $baseDeDatos=new DB();
//   session_start(); 
//   if(isset($_SESSION["userLogueado"]) && isset($_SESSION["idUser"]))
//   {
    $usuarioLogueado=$baseDeDatos->verPerfilDelUsuario((int) $_SESSION["idUser"]);
  
//   }
// }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Editar Perfil</title>
</head>
<?php  ?>
<body>
    <div class="content-edit-perfil">
        <div class="menu-edit-perfil">
            <ul class="list-menu-perfil">
                <div class="user-editar-perfil">
                    <img src="../img/profile.svg" alt="" width="20%">
                    <li>Perfil</li>
                </div>
               
                <div class="user-editar-preferencias">
                    <img src="../img/preferences.svg" alt="" width="20%">
                    <li>Preferencias</li>
                </div>
                <div class="user-medio-pago">
                    <img src="../img/credit-card.svg" alt="" width="20%">
                    <li>Mis Medios de Pago</li>
                </div>
                
            </ul>
        </div>
        <div class="info-perfil">
            <img src="../img/sin-foto.jpg" alt="">
            <h2><?=$usuarioLogueado->nombreYApellido;?></h2>
            <p>Nombre de Usuario:<?=$usuarioLogueado->nombreDeUsuario;?></p> 
            <p>Nivel de comprador</p>
            <form action="">
                <input type="button" value="Editar Foto">
            </form>   
        </div>
       <form action="" method="post">
            <div class="detalle-perfil">
                    <p>Información del Usuario:</p>
                    <ul>
                        <li>
                            <img src="../img/user.svg" alt="" width="6%">
                            <input type="text" name="" id="">
                        </li>
                        <li>
                            <img src="../img/card.svg" alt="" width="6%">
                            <input type="email" name="" id="">
                        </li>
                        <li>
                            <img src="../img/lock.svg" alt="" width="6%">
                            <input type="password" name="" id="">   
                        </li>
                        <li>
                            <img src="../img/smartphone-call.svg" alt="" width="6%">
                            <input type="tel" name="" id="">
                        </li>
                    </ul>
                </div>
                <div class="detalle-preferencias">
                    <p>Preferencias: </p>
                            <select name="select" class="select-vehiculos">
                                <option value="value1" selected>Marca</option> 
                                <option value="value2">Renault</option> 
                                <option value="value3">Volkswagen</option>
                                <option value="value4">Mercedes Benz</option>
                            </select>
                            <select name="select" class="select-vehiculos">
                                <option value="value1" selected>Tipo de Vehículo</option> 
                                <option value="value2">Moto</option> 
                                <option value="value3">Auto</option>
                                <option value="value4">Vans</option>
                            </select>
                            <select name="select" class="select-vehiculos">
                                <option value="value1" selected>Color</option> 
                                <option value="value2">Blanco</option> 
                                <option value="value3">Negro</option>
                                <option value="value4">Gris</option>
                            </select> 
                </div>
                
                <div class="detalle-medio-pago">
                    <p>Agregar/Editar detalles medio de Pago:</p>
                        <select name="select" class="select-vehiculos">
                                <option value="value1" selected>Medio de Pago</option> 
                                <option value="value2">Tarjeta de Débito</option> 
                                <option value="value3">Transferencia</option>
                                <option value="value4">Tarjeta de Crédito</option>
                        </select>
                </div>
                <div class="btn-editar-perfil">
                    <input type="submit" value="Guardar Cambios">
                </div>
       </form>

    </div>
    <?php include_once("footer.php") ?>
</body>
</html>