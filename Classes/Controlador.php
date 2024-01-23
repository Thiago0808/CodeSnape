<?php

namespace CodeSnape\Classes;

# Cada método dp controlador é uma página ou funcionalidade so sistema
# Se for uma página, carrega uma view (pasta pages)

class Controlador{

    # Página Inicial
    function inicial(){
        #definr a página
        $page = "inicial";

        $trechos = Trecho::lista();


        # Incorporar o Template
        require 'template/template1.php';
    }

    // TODO


    function novoTexto(){
        if (filter_input(INPUT_POST, 'texto')){
            $t = new Texto();
            $t -> titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> premium = filter_input(INPUT_POST, 'premium', FILTER_SANITIZE_SPECIAL_CHARS);

            if  ( (strlen($t->texto) > 50)  && (filter_input(INPUT_POST, 'mais') != "mais") ){
                header('Location: index.php?p=novoTexto&msg='.urlencode('Limite de Caracteres Ultrapassado! Pague os R$20.00 para comentar tanto!'));
                exit;
            };

            if (filter_input(INPUT_POST, 'valor_pago')){
                $t -> valor_pago = filter_input(INPUT_POST, 'valor_pago', FILTER_SANITIZE_SPECIAL_CHARS);
            }

            $t -> usuario_id = $_SESSION['id'];
            if ($t->salvar()){
                header('Location:index.php');
                exit;
            };
        }

        $page = 'novoTexto';
        require 'template/template1.php';
    }
}