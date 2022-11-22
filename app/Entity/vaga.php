<?php

namespace App\Entity;

use App\db\database;
use \PDO;

class Vaga
{

    /**
     * Identificador único de vaga
     * @var interger
     */
    public $id;

    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;

    /**
     *  Descricao da Vaga
     * @var string 
     */
    public $descricao;

    /**
     * Define se a vaga ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data de publicacao da vaga
     * @var string
     */
    public $data;

    /**
     * Metodo responsavel por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        // DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');
        //INSERIR A VAGA NO BANCO
        $obDatabase = new database('vagas');
        $this->id = $obDatabase->insert([
                                            'titulo' => $this->titulo,
                                            'descricao' => $this->descricao,
                                            'ativo' => $this->ativo,
                                            'data' => $this->data
                                        ]);


        //RETORNAR SUCESSO
        return true;
    }
       
       /**
        * Metodo reponsavel por atualizar a vaga no banco
        * @return boolean
        */
    public function atualizar(){
         return (new database('vagas'))->update('id = '.$this->id,[
                                                                    'titulo' => $this->titulo,
                                                                    'descricao' => $this->descricao,
                                                                    'ativo' => $this->ativo,
                                                                    'data' => $this->data
                                                                
                                                                  ]);
    }

    
       /**
        * Metodo reponsavel por excluir a vaga no banco
        * @return boolean
        */
    public function excluir(){
        return (new database('vagas'))->delete('id = '.$this->id);
    }

        /**
         * Metodo responsavel por obter as vagas do bd 
         * @param string $where 
         * @param string $order
         * @param string $limit 
         * @return array
         */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
          return (new database('vagas'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS,self::class);   //todo retorno vai se tranformar em um array, por meio do metodo fetchAll dp PDO.
    }
    /**
     * Metodo reponsavel por buscar uma vaga com base em seu ID 
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id){
       return (new database('vagas'))->select('id = '.$id)
                                     ->fetchObject(self::class);
    }


    
}
