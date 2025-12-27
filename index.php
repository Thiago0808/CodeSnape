<?php
require 'autoload.php';
session_start();

use CodeSnape\Classes\Controlador;


$p = filter_input(INPUT_GET, 'p');
$c = new Controlador;

if (!isset($_SESSION['id'])){
    switch ($p) {
    case 'register':
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

        case 'register':
            $c->cadastro();
            break;
            
        case 'newSnippet':
            $c->novoTrecho();
            break;
        
        case 'viewSnippet':
            $c->verTrecho();
            break;

        case 'editSnippet':
            $c->editarTrecho();
            break;

        case 'deleteSnippet':
            $c->deletarTrecho();
            break;

        case 'initialTag':
            $c->inicialTag();
            break;
        
        case 'newTag':
            $c->novaTag();
            break;
            
        case 'editTag':
            $c->editarTag();
            break;

        case 'deleteTag':
            $c->deletarTag();
            break;

        case 'deleteAccount':
            $c->deletarConta();
            break;
        
        default:
            $c->inicial();
            break;
    }
}




?>
