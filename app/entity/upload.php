<?php

    namespace App\Entity;

    use App\Db\Database;
    use PDO;

    class Upload {

    /**
     * Identificador unico do post
     * @var integer
     */
    public $id;

    /**
    *data da imgem
    * @var string
    */
   public $data_upload;

   /**
    * nome do arquivo
    * @var string
    */
   public $name_file;

   /**
    * Método responsavel por cadastrar um novo post no banco
    * @return boolean
    */
   public function PostarImg() {
       // Definir a data 
       $this->data = date('Y-m-d H:i:s');

       //Inserir a vaga no banco de dados
       $obimg = new Database('upload_files');
       $this->id = $obimg->insert([
           'pathh'              => $this->pathh,
           'data_upload'        => $this->data,
           'name_file'          => $this->name_file,

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

       return(new Database('upload_files'))->select($where, $order, $limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);
   }
}

    