<?php

    namespace App\Db;

    use PDO;
    use \PDOException;

    class Database {

        /**
         * Host de conexão com o banco de dados
         * @var string
         */
        private const HOST = "localhost";

        /**
         * Nome do banco de dados
         * @var string
         */
        private const NAME = "tcc";

        /**
         * Usuario do banco de dados
         * @var string
         */
        private const USER = "root";

        /**
         * Senha do banco de dados
         * @var string
         */
        private const PASS = "";
        
        /**
         * Nome da tabela a ser manipulada
         * @var string
         */
        private $table;

        /**
         * Instancia de conexão com o banco de dados
         * @var PDO
         */
        private $connection;

        /**
         * Define a tabela e intancia a conexão
         * @param string $table
         */
        public function __construct($table = null) {

            $this->table = $table;
            $this->setConection();
        }

        /** 
         * Metodo responsavel por criar uma conexão com o banco de dados
         * 
         */
        private function setConection(){

            try{

                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {

                die('ERROR:: '. $e->getMessage());

            }
        }

        /**
         * Métodos responsavel por executar queries do banco de dados
         * @param string
         * @param array
         * @return PDOStatement 
         */
        public function execute($query,$params = []) {
            try {
                
                $statemant = $this->connection->prepare($query);
                $statemant->execute($params);

                return $statemant;

            } catch (PDOException $e) {
                die('ERROR: '.$e->getMessage());
            }
        }

        /**
         * Metodo responsavelpor inserir dados no banco
         * @param array
         * @return integer
         */
        public function insert($values){

            // Dados da query
            $fields = array_keys($values);
            $binds = array_pad([],count($fields),'?');

            //Monta a query
            $query = 'INSERT INTO '.$this->table.'('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

            // Executa o insert
            $this->execute($query, array_values($values));

            // Retorna o Id inserido
            return $this->connection->lastInsertId();
        }

        /**
         * Método responsavel por executar uma consulta
         * @param string $where
         * @param string $order
         * @param string $limit
         * @param string $fields
         * @return PDOStatement
         */
        public function select($where = null, $order = null, $limit = null, $fields = '*'){
            // Dados da query
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';

            // Monta a query
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

            return $this->execute($query);
        }
    }