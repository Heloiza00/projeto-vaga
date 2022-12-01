<?php

namespace App\Entity;

use App\db\DataBase;
use \PDO;

//  -id -cod -name -descricao -preco -data de validade 

class Produto 
{
   /**
    *  Id do produto
    *  @var interger 
    */ 
   public $id;

   
   /**
    * Código do produto
    *  @var interger
    */
    public $codigo;

    /**
     * Nome do produto 
     * @var string
     */
    public $name;

    /**
     * Descrição do produto
     * @var string
     */
    public $descricao;

    /**
     * Valor 
     * @var float 
     */
    public $preco;

    /**
     * Data de validade do produto 
     * @var string 
     */
    public $data_validade;

    
    /**
     * Metodo responsavel por cadastrar um novo produto no banco
     * @return boolean
     */
    public function cadastrar()
    {
        //INSERIR O PRODUTO NO BANCO
        //$this->data_validade = date('Y-m-d H:i:s');

        $tabela = new DataBase('produto');
        $this->id = $tabela->insert([
                                            'codigo' => $this->codigo,
                                            'name'   => $this->name,
                                            'descricao' => $this->descricao,
                                            'preco' => $this->preco,
                                            'data_validade' => $this->data_validade
                                        ]);


        //RETORNAR SUCESSO 
        return true;
    }

     /**
        * Metodo reponsavel por atualizar o produto  no banco
        * @return boolean
        */
        public function atualizar(){
            return (new DataBase('produto'))->update('id = '.$this->id,[
                                                                       
                                                                        'codigo' => $this->codigo,
                                                                        'name'   => $this->name,
                                                                        'descricao' => $this->descricao,
                                                                        'preco' => $this->preco,
                                                                        'data_validade' => $this->data_validade
                                                                   
                                                                     ]);
       
       //RETORNAR SUCESSO
       return true;
       }


       /**
        * Metodo reponsavel pelo delete do produto
        * @return boolean
        */
        public function excluir(){
            return (new DataBase('produto'))->delete('id = '.$this->id);
        }

       /**
         * Metodo responsavel por obter as vagas do bd 
         * @param string $where 
         * @param string $order
         * @param string $limit 
         * @return array
         */
    public static function getProdutos($where = null, $order = null, $limit = null)
    {
          return (new DataBase('produto'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS,self::class);   //todo retorno vai se tranformar em um array, por meio do metodo fetchAll dp PDO.
    }


    /**
     * Metodo reponsavel por buscar um produto com base em seu ID 
     * @param integer $id
     * @return Produto
     */
    public static function getProduto($id){
        return (new DataBase('produto'))->select('id = '.$id)
                                      ->fetchObject(self::class);
     }
 

       

}