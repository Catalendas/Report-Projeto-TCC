<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario {

    /**
     * Identificados unico do usuario
     * @var integer
     */
    public $id;

    /**
     * Nome do usuario
     * @var string
     */
    public $nome;

    /**
     * Email do usuario
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuario
     * @var string
     */
    public $senha;

    /**
     * Método responsavel por cadastrar um novo usuario no banco
     * @return boolean
     */
    public function cadastrar() {

        // Database
        $obDatabase = new Database('usuarios');

        // Insere um novo usuario
        $this->id = $obDatabase->insert([
            'nome'  =>$this->nome,
            'email' =>$this->email,
            'senha' =>$this->senha
        ]);

        // Sucesso
        return true;
    }

    /**
     * Método responsavel por retornar uma instancia com base no seu email
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email) {

        return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);

    }
}