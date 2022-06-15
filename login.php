<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

// Obriga o usuario a estar logado
Login::requireLogout();

$alertLogin = '';

if(isset($_POST["acao"])){


  switch($_POST["acao"]) {
    case "logar":
      // Busca usuario por email
      $obUsuario= Usuario::getUsuarioPorEmail($_POST['email']);
    
      // Valida a instancia e a senha
      if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)){
        $alertLogin = 'E-mail ou senha invalidos';
        break;
      }
    
      // Loga o usuario
     Login::login($obUsuario);
      break;
  }

  
}

include __DIR__.'/includes/form-login.php';
