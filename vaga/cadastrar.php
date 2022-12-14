<?php
require (__DIR__ . '/../vendor/autoload.php');

define('TITLE','Cadastrar vaga');

use \App\Entity\vaga;
$obVaga = new Vaga;

//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

//Validacao do POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
   
   
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->cadastrar();

    header('location: listar.php?status=success'); 
    exit;
}

include (__DIR__ . '/../includes/header.php');
include (__DIR__ . '/formulario.php');
include (__DIR__ . '/../includes/footer.php');
