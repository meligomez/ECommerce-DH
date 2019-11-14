<?php
class DBJson{
     //traigo los usuarios del json
    public function insertarUsuario($usuario)
    {
        $usuariosEnJSON = file_get_contents("..\json\usuarios.json");
        // convierto el json en array
        $usuarios = json_decode($usuariosEnJSON);
        // agrego el nuevo usuario al array de la base de datos
        // validar que el usuario no exista

            if(existeUsuario($_POST["usuario"]))
            {
              $errorUsuarioYaExiste="El nombre de usuario ya está en uso, por favor ingrese otro";
            }else
            {
             echo "entra";
            // nos guardarmos los datos del post en un array
            // $usuario=[
            //   "id"=> md5($_POST["usuario"]),
            //   "usuario" => $_POST["usuario"],
            //   "nombreYapellido" => $_POST["nombreYapellido"],
            //   "email" => $_POST["email"],
            //   "fotoPerfil"=>$_POST["fotoPerfil"],
            //   "contrasenia" =>  $contrasenia
            // ];
             $usuarios[] = $usuario;
            //convierto el nuevo array completo a json
            $nuevosUsuariosEnJSON = json_encode($usuarios);

            //escribo el nuevo json en el archivo .json
            file_put_contents("..\json\usuarios.json",$nuevosUsuariosEnJSON);
         }
     }

     function idByUsername($unUser,$unaPsw)
     {
       $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
       $usuarios =json_decode($urlJsonUsuarios,true);
         foreach ($usuarios as $unUsuario) 
         { 
             if($unUsuario["usuario"]==$unUser && password_verify($unaPsw,$unUsuario["contrasenia"]))
             {
               return $unUsuario["id"];
             }
         }
     }

     //Creo un metodo para validar el usuario y la contraseña
function validarUserYPsw($unUser,$unaPsw)
{
  global $errorUserYPsw;
  global $errorNoExisteUsuario;
  $userCo;
  //Recorro el json de usuarios y encontrar ese usuario y validar la psw 
  $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
  $usuarios =json_decode($urlJsonUsuarios,true);
    foreach ($usuarios as $unUsuario ) 
    {
      if($unUsuario["usuario"]==$unUser)
      {
        if(password_verify($unaPsw,$unUsuario["contrasenia"]))
        {
          return true;
        }
        $errorUserYPsw="No coincide el usuario y la contraseña, valide los datos ingresados";
        return false;
      }
      $errores=true;
    }
  $errorNoExisteUsuario="No existe el usuario indicado, valide los datos ingresados";
  return false;
}


}

?>