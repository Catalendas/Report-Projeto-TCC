<?php

namespace App\Session;

class Login {

    /**
     * Método responsavel por inicair a sessão
     */
    private static function init(){
        // Verifica o status da sessão
        if(session_status() != PHP_SESSION_ACTIVE){
            // Inicia a sessão
            session_start();
        }
    }

    /**
     * Método responsavel por retornar os dados do usuario logado
     * @return array
     */
    public static function getUsuarioLogado() {

        // Inicia a sessão
        self::init();

        // Retorna dados do usuario
        return self::isLogged() ? $_SESSION['usuario'] : null;

    }

    /**
     * Métodos responsavel por logar usuario
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario) {
        // Inicia a sessão
        self::init();

        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'email' => $obUsuario->email
        ];

        // Redireciona usuario pra index
        header('location: index.php');
        exit;
    } 

    /**
     * Método responsavel por deslogar o usuario
     */
    public static function logout(){

        // Inicia a sessão
        self::init();

        // Remove a sessão do usuario
        unset($_SESSION['usuario']);

        // Redireciona usuario para o login
        header('location: login.php');
        exit;
    }

    /**
     * Método resonsável por verificar se o usuário está logado
     * @return boolen
     */
    public static function isLogged(){
        // Inicia a sessão
        self::init();

        // Validação da sessão
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Método responsavel por obrigar o usuario a estar logado para acessar
     */
    public static function requireLogin(){

        if(!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    
    /**
     * Método responsavel por obrigar o usuario a estar deslogado para acessar
     */
    public static function requireLogout(){

        if(self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }

}