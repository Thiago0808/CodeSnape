<?php
require 'autoload.php';

use CodeSnape\Classes\Controlador;


$p = filter_input(INPUT_GET, 'p');
$c = new Controlador;

switch ($p) {
    case 'novoTrecho':
        $c->novoTrecho();
        break;
    
    case 'verTrecho':
        $c->verTrecho();
        break;

    case 'deletarTrecho':
        $c->deletarTrecho();
        break;
    
    default:
        $c->inicial();
        break;
}


?>
