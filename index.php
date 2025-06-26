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

    case 'editarTrecho':
        $c->editarTrecho();
        break;

    case 'deletarTrecho':
        $c->deletarTrecho();
        break;

    case 'inicialTag':
        $c->inicialTag();
        break;
    
    case 'novaTag':
        $c->novaTag();
        break;
        
    case 'editarTag':
        $c->editarTag();
        break;

    case 'deletarTag':
        $c->deletarTag();
        break;
    
    default:
        $c->inicial();
        break;
}


?>
