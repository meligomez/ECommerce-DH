<?php
include_once("header.php");
// include_once("users.php");
// $usuarioLogueado=new User();
include_once("DB.php");
if(isset($_SESSION))
{
  $baseDeDatos=new DB();
  if(isset($_SESSION["userLogueado"]) && isset($_SESSION["idUser"]))
  {
    $usuarioLogueado=$baseDeDatos->verPerfilDelUsuario($_SESSION["idUser"]);
  
  }
}
if($_POST){
    $baseDeDatos->eliminarUser($_SESSION["idUser"]);
}

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
<body class="editarPerfil">
    <div class="content-edit-perfil">
        <div class="menu-edit-perfil">
            <ul class="list-menu-perfil">
                <div class="user-editar-perfil">
                    <img src="../img/profile.svg" alt="" width="20%">
                    <li><a href="#detalle-perfil">Perfil</a></li>
                </div>
               
                <div class="user-editar-preferencias">
                    <img src="../img/preferences.svg" alt="" width="20%">
                    <li><a href="#detalle-preferencias">Preferencias</a></li>
                </div>
                <div class="user-medio-pago">
                    <img src="../img/credit-card.svg" alt="" width="20%">
                    <li><a href="#detalle-medio-pago">Mis Medios de Pago</a></li>
                </div>
                
            </ul>
        </div>
        <div class="info-perfil">
            <img src=<?=$usuarioLogueado->foto;?> alt="">
            <h2><?=$usuarioLogueado->nombreYApellido;?></h2>
            <p>Nombre de Usuario:  <input type="text" name="nombreApellido" class="nombreApellido" value=<?=$usuarioLogueado->nombreDeUsuario;?>> 
            <form action="">
                Cambiar imagen: <input type="file" class="btn-upload-image" value="Editar Foto">
            </form>   
        </div>
       <div class="contenedor-form-edit">
            <form action="" method="post">
            <section class="detalle-perfil" id="detalle-perfil">
                    <h4><p>Información del Usuario:</p></h4>
                    <ul>
                        <li>
                            <img src="../img/user.svg" alt="" width="6%">
                            <input type="text" name="nombreApellido" id="" value=<?=$usuarioLogueado->nombreYApellido;?>>
                        </li>
                        <li>
                            <img src="../img/card.svg" alt="" width="6%">
                            <input type="email" name="email" id=""  value=<?=$usuarioLogueado->email;?>>
                        </li>
                        <li>
                            <img src="../img/lock.svg" alt="" width="6%">
                            <input type="password" name="passwordOld" id="" placeholder="Ingrese la contraseña actual">   
                        </li>
                        <li>
                            <img src="../img/lock.svg" alt="" width="6%">
                            <input type="password" name="passwordNew" id="" placeholder="Ingrese la nueva contraseña">   
                        </li>
                        <li>
                            <img src="../img/smartphone-call.svg" alt="" width="6%">
                            <input type="tel" name="telefono" id="" placeholder="Ingrese su teléfono">
                        </li>
                    </ul>
            </section>
            <section class="detalle-preferencias" id="detalle-preferencias">
                   <h4> <p>Preferencias: </p></h4>
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
            </section>
                
            <section class="detalle-medio-pago" id="detalle-medio-pago">
                    <h4><p>Agregar/Editar detalles medio de Pago:</p></h4>
                        <select name="select" class="select-vehiculos">
                                <option value="value1" selected>Medio de Pago</option> 
                                <option value="value2">Tarjeta de Débito</option> 
                                <option value="value3">Transferencia</option>
                                <option value="value4">Tarjeta de Crédito</option>
                        </select>
            </section>
                <div class="btn-editar-perfil">
                    <hr>
                    <input type="submit" value="Guardar Cambios">
                </div> 
            </form>
       </div>
            <!-- <div class="btn-eliminar-perfil">
                <hr>
                <form action="editarPerfil.php" method="post">
                    <div class="v1"></div>
                    <input type="submit" value="Eliminar Usuario">
                </form>
           </div> -->

    </div>
    <!-- -->
</body>
</html>