<?php
require (__DIR__.'/../vendor/autoload.php');

use \App\Entity\vaga;

$vagas = Vaga::getVagas();

include (__DIR__.'/../includes/header.php');
include (__DIR__.'/../includes/menu.php');
include (__DIR__.'/listagem.php');
include (__DIR__.'/../includes/footer.php');