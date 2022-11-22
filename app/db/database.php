<?php 

namespace App\db;

use \PDO;
use \PDOException;

class database{
    /**
     * Host de conexao com o banco de dados 
     * @var string
     */
    const HOST = 'localhost';
    
    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'projeto';

    /**
     * Usuario banco de dados
     * @var string
     */
    const USER = 'root';
    
    /**
     * Senha de acesso ao banco 
     * @var string
     */
    const PASS = 'Tj$4875l';
    
    /**
     * Nome da tabela a ser manipulada 
     * @var string
     */
    private $table;

    /**
     * Instancia de conexao com o banco de dados
     * @var PDO 
     */
    private $connection;

    /**
     * Define a tabela e instancia e conexao
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }
    
    /**
     * Metodo responsavel por criar uma conexao com o bd
     */
    private function setConnection(){
       try{
           $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
           $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
        die('ERROR: '.$e->getMessage());
       }
    }
    /**
     * Metodo responsavel por executar queries dentro do banco de dados 
     * @param string $query 
     * @param array $params
     * @return PDOStatement 
     */
    public function execute($query,$params = []){
        try{
          $statement = $this->connection->prepare($query);
          $statement->execute($params);
          return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
     
    /**
     * Metodo responsavel por inserir dados no banco 
     * @param array $values [fiel => value]
     * @return integer ID inserido 
     */
    public function insert($values){
     //DADOS DA QUERY
     $fields = array_keys($values);
     $binds =  array_pad([],count($fields),'?');
     //echo "<pre>"; print_r($binds); echo "</pre>"; exit;

     //MONTA A QUERY 
      $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
      
      //EXECUTE O INSERT 
      $this->execute($query,array_values($values)); 
      
     //RETORNA O ID INSERIDO 
      return $this->connection->lastInsertId();
    }

    /**
     * Metodo responsavel por executar uma consulta no banco 
     * @param string $where
     * @param string $order
     * @param string $limit 
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
       //DADOS DA QUERY 
       $where = strlen(($where)) ? 'WHERE '.$where : '';
       $order= strlen(($order)) ? 'ORDER BY '.$order : '';
       $limit = strlen(($limit)) ? 'LIMIT '.$limit : '';
     
        //MONTA A QUERY 
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        echo $query; 
        //EXECUTA A QUERY 
        return $this->execute($query);
    }
       
    /**
     * Metodo responsavel por executar atualizações no banco de dados
     *  @param string $where
     *  @param array $values
     * @return boolean 
     */
    public function update($where,$values){
        //DADOS DA QUERY 
        $fields = array_keys($values);

        //MONTA QUERY 
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        
        //EXECUTAR A QUERY
        echo $query; 
        $this->execute($query,array_values($values));


        return true;
    }
    
        
    /**
     * Metodo responsavel por executar atualizações no banco de dados
     *  @param string $where
     * @return boolean 
     */
    public function delete($where){
       //MONTA A QUERY 
       $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

       //EXECUTA A QUERY 
       $this->execute($query);

       //RETORNA SUCESSO
       return true;
    }
}