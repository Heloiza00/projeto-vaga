<?php
require (__DIR__ . '/../vendor/autoload.php');

define('TITLE','Editar vaga');

use \App\Entity\vaga;
/*
//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
     header('location: listar.php?status=error');
     exit;
}
*/
//CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']);
/*
echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
*/

//VALIDAÇÃO DA VAGA
if(!$obVaga instanceof Vaga){
    header('location: listar.php?status=error');
    exit;
}

//Validacao do POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
   

    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->atualizar();


    header('location: listar.php?status=success'); 
    exit;
}

include (__DIR__ . '/../includes/header.php');
include (__DIR__ . '/formulario.php');
include (__DIR__ . '/../includes/footer.php');
