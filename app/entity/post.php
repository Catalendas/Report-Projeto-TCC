<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Post {
    
    /**
     * Identificador unico do post
     * @var integer
     */
    public $id;

    /**
     * Descição do post
     * @var string
     */
    public $descricao;

     /**
     * Nome do usuario do post
     * @var string
     */
    public $nome_usuario;

    /**
     * Localide
     * @var string
     */
    public $localidade;

    /**
     * Data de publicação do post
     * @var string
     */
    public $data;

    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;

    /**
     * Caminho da img
     * @var string
     */
    public $caminho;

    /**
     * Método responsavel por cadastrar um novo post no banco
     * @return boolean
     */
    public function Postar() {
        // Definir a data 
        $this->data = date('Y-m-d H:i:s');

        //Inserir a vaga no banco de dados
        $obDatabase = new Database('post');
        $this->id = $obDatabase->insert([
            'nome_user'      => $this->nome_usuario,
            'descricao'      => $this->descricao,
            'localizacao'    => $this->localidade,
            'tempo'          => $this->data,
            'titulo'         => $this->titulo,
            'caminho'        => $this->caminho

        ]);

        //Retornar sucesso
        return true;    
    }

    /**
     * Método responsagel por obter as vagas no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
    */
    public static function getPost($where = null, $order = null, $limit = null){

        return(new Database('post'))->select($where, $order, $limit)
                                    ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}