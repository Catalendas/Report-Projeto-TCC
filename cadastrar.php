<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

// Obriga o usuario a estar logado
Login::requireLogout();

$alertCadastro = '';

// Validacao do post
if(isset($_POST["acao"])){

    switch($_POST['acao']){
        case 'cadastrar':

            if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
        
                // Busca usuario por email
                $obUsuario= Usuario::getUsuarioPorEmail($_POST['email']);
                if($obUsuario instanceof Usuario){
                    $alertCadastro = 'O e-mail digitado já está em uso';
                    break;
                }
        
                // Novo Usuario
                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->cadastrar();
                
                // Loga o usuario
                Login::login($obUsuario);
        
            }

            break;
    }



}

include __DIR__.'/includes/form-cadastro.php';
