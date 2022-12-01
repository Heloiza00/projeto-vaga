<?php
require (__DIR__.'/../vendor/autoload.php');


use \App\Entity\vaga;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
     header('location: listar.php?status=error');
     exit;
}

//CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']);


//VALIDAÇÃO DA VAGA
if(!$obVaga instanceof Vaga){
    header('location: listar.php?status=error');
    exit;
}

//echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

//Validacao do POST
if (isset($_POST['excluir'])) {
   
    $obVaga->excluir();

    header('location: listar.php?status=success'); 
    exit;
}

include (__DIR__ . '/../includes/header.php');
include (__DIR__ . '/../includes/confirmar-exclusao.php');
include (__DIR__ . '/../includes/footer.php');
