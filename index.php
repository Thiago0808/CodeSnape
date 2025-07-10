<?php
require 'autoload.php';
session_start();

use CodeSnape\Classes\Controlador;


$p = filter_input(INPUT_GET, 'p');
$c = new Controlador;

if (!isset($_SESSION['id'])){
    switch ($p) {
    case 'cadastro':
        $c->cadastro();
        break;
    
    default:
        $c->login();
        break;
    }
}
else{
    switch ($p) {
        case 'login':
            $c->login();
            break;
        
        case 'logout':
            $c->logout();
            break;

        case 'cadastro':
            $c->cadastro();
            break;
            
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

        case 'deletarConta':
            $c->deletarConta();
            break;
        
        default:
            $c->inicial();
            break;
    }
}




?>
