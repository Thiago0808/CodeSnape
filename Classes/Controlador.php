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

        foreach ($trechos as $t){
            $t->texto = str_replace("&#13;&#10;", "<br />", $t->texto);
        }


        # Incorporar o Template
        require 'template.php';
    }

    // TODO


    function novoTrecho(){
        if (filter_input(INPUT_POST, 'texto')){
            $t = new Trecho();
            $t -> titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> linguagem = filter_input(INPUT_POST, 'linguagem', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($t->salvar()){
                header('Location:index.php');
                exit;
            };
        }

        $page = 'novoTrecho';
        require 'template.php';
    }

    function verTrecho(){
        $page = 'verTrecho';
        require 'template.php';
    }
}