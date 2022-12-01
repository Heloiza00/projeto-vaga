<?php
require (__DIR__.'/../vendor/autoload.php');


use App\Entity\Produto;

$produto = Produto::getProdutos();
//echo" <pre>"; print_r($produto); echo "</pre>"; exit;

include (__DIR__.'/../includes/header.php');
include (__DIR__.'/../includes/menu.php');
include (__DIR__.'/listagem.php');
include (__DIR__.'/../includes/footer.php');