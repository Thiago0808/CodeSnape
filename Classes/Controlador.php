<?php

namespace CodeSnape\Classes;

# Cada método dp controlador é uma página ou funcionalidade so sistema
# Se for uma página, carrega uma view (pasta pages)

class Controlador{

    # Página Inicial
    function inicial(){
        #definr a página
        $page = "inicial";

        $filtroTitulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $filtroLinguagens = filter_input(INPUT_POST, 'linguagem', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if (!$filtroLinguagens){
            $filtroLinguagens = [];
        }


        $trechos = Trecho::lista($filtroTitulo, $filtroLinguagens);

        foreach ($trechos as $t){
            $t->texto = str_replace("&#13;&#10;", "<br />", $t->texto);
        }

        # Incorporar o Template
        require 'template.php';
    }

    function novoTrecho(){
        if (filter_input(INPUT_POST, 'texto')){
            $t = new Trecho();
            $t -> titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->linguagens = filter_input(INPUT_POST, 'linguagem', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
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
        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Trecho($id);
            $t->texto = str_replace("&#13;&#10;", "<br />", $t->texto);
        }

        $page = 'verTrecho';
        require 'template.php';
    }

    function deletarTrecho(){
        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Trecho($id);
            $t->deletar();
        }

        header('Location:index.php');
        exit;
    }

    function editarTrecho(){

        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Trecho($id);
            $selecionadas = array_map('trim', explode(',', $t->linguagens));
        }

        if (filter_input(INPUT_POST, 'texto')){
            $t = new Trecho();
            $t->id = $id;
            $t -> titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->linguagens = filter_input(INPUT_POST, 'linguagem', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $t -> texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->editar();

            header('Location:index.php');
            exit;
        }

        $page = 'editarTrecho';
        require 'template.php';
    }

    #Tags
    function inicialTag(){
        #definr a página
        $page = "inicialTag";

        $filtroTitulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);

        $tags = Tag::lista($filtroTitulo);

        # Incorporar o Template
        require 'template.php';
    }
}