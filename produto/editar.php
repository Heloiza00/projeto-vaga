<?php
require (__DIR__ .'/../vendor/autoload.php');

define('TITLE','Editar vaga');

use App\Entity\Produto;

/*
//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
     header('location: index.php?status=error');
     exit;
}
*/
//CONSULTA 
$obProduto = Produto::getProduto($_GET['id']);
/*
echo "<pre>"; print_r($obProduto); echo "</pre>"; exit;
*/

//VALIDAÇÃO DO PRODUTO
if(!$obProduto instanceof Produto){
    header('location: index.php?status=error');
    exit;
}

//Validacao do POST
if (isset($_POST['cod'],  $_POST['name'], $_POST['descricao'], $_POST['preco'])) {
   

    $obProduto->codigo = $_POST['codigo'];
    $obProduto->name = $_POST['name'];
    $obProduto->descricao = $_POST['descricao'];
    $obProduto->preco = $_POST['preco'];
    $obProduto->atualizar();


    header('location: index.php?status=success'); 
    exit;
}

include (__DIR__ . '/../includes/header.php');
include (__DIR__ . '/formulario.php');
include (__DIR__ . '/../includes/footer.php');
