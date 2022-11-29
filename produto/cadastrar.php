<?php
require (__DIR__.'/../vendor/autoload.php');

define('TITLE','Cadastrar Produto');

use App\Entity\Produto;

$obProduto = new Produto;

//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

//Validacao do POST
if (isset($_POST['codigo'],  $_POST['name'], $_POST['descricao'], $_POST['preco'])) {
   
   
    $obProduto->codigo = $_POST['codigo'];
    $obProduto->name = $_POST['name'];
    $obProduto->descricao = $_POST['descricao'];
    $obProduto->preco = $_POST['preco'];
    $obProduto->cadastrar();

    header('location: listar.php?status=success'); 
    exit;
}

include (__DIR__ . '/../includes/header.php');
include (__DIR__ . '/formulario.php');
include (__DIR__ . '/../includes/footer.php');
