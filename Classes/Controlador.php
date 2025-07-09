<?php

namespace CodeSnape\Classes;

# Cada método dp controlador é uma página ou funcionalidade so sistema
# Se for uma página, carrega uma view (pasta pages)

class Controlador{

    # Página Inicial
    function inicial(){
        #definr a página
        $page = "inicial";
        $tags = Tag::lista();

        $filtroTitulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $filtroLinguagens = filter_input(INPUT_POST, 'linguagem', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $filtroTags = filter_input(INPUT_POST, 'tag', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if (!$filtroLinguagens){
            $filtroLinguagens = [];
        }

        if (!$filtroTags){
            $filtroTags = [];
        }


        $trechos = Trecho::lista($filtroTitulo, $filtroLinguagens, $filtroTags);

        foreach ($trechos as $t){
            $t->texto = str_replace("&#13;&#10;", "<br />", $t->texto);
        }

        # Incorporar o Template
        require 'template.php';
    }

    function login(){
        $alertaSenha = '';
        $alertaEmail = '';

        if (filter_input(INPUT_POST, 'email')){
            $t = new Usuario();
            $t -> email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $salvar = true;
            if (!$t->verificarEmail()){
                $alertaEmail = "Email não cadastrado";
                $salvar = false;
            }

            if ($salvar){
                if ($t->logar()){
                    header('Location:index.php');
                    exit;
                }
                else{
                    $alertaSenha = "A senha está incorreta";
                }
            }
        }

        $page = 'login';
        require 'template.php';
    }

    function logout(){
        session_destroy();
        header('Location:index.php');
        require 'template.php';
    }
    
    function cadastro(){
        $alertaSenha = '';
        $alertaEmail = '';

        if (filter_input(INPUT_POST, 'email')){
            $t = new Usuario();
            $t -> nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha1 = filter_input(INPUT_POST, 'senha1', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha2 = filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_SPECIAL_CHARS);
            
            $salvar = true;
            if ($senha1 != $senha2){
                $alertaSenha = "As duas senhas não são iguais!";
                $salvar = false;
            }

            if ($t->verificarEmail()){
                $alertaEmail = "Email já cadastrado";
                $salvar = false;
            }

            if ($salvar){
                $t->senha = $senha1;
                if ($t->salvar()){
                    header('Location:index.php');
                    exit;
                };
            }
        }

        $page = 'cadastro';
        require 'template.php';
    }

    function novoTrecho(){
        $tags = Tag::lista();

        if (filter_input(INPUT_POST, 'texto')){
            $t = new Trecho();
            $t -> titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->linguagens = filter_input(INPUT_POST, 'linguagem', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $t -> texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->tags = filter_input(INPUT_POST, 'tag', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            if ($t->salvar()){
                header('Location:index.php');
                exit;
            };
        }

        $page = 'novoTrecho';
        require 'template.php';
    }

    function verTrecho(){
        $tags = Tag::lista();

        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Trecho($id);
            if (!$t->verificarUsuario($_SESSION['id'], $id)){
                header('Location:index.php');
            }
            $t->texto = str_replace("&#13;&#10;", "<br />", $t->texto);
        }

        $page = 'verTrecho';
        require 'template.php';
    }

    function deletarTrecho(){
        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Trecho($id);
            if (!$t->verificarUsuario($_SESSION['id'], $id)){
                header('Location:index.php');
            }
            else{
                $t->deletar();
            }
        }

        header('Location:index.php');
        exit;
    }

    function editarTrecho(){

        $tags = Tag::lista();
        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Trecho($id);
            if (!$t->verificarUsuario($_SESSION['id'], $id)){
                header('Location:index.php');
            }
            $selecionadas = array_map('trim', explode(',', $t->linguagens));
        }

        if (filter_input(INPUT_POST, 'texto')){
            $t = new Trecho();
            $t->id = $id;
            $t -> titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->linguagens = filter_input(INPUT_POST, 'linguagem', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $t -> texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->tags = filter_input(INPUT_POST, 'tag', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
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

        $filtroTag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_SPECIAL_CHARS);

        $tags = Tag::lista($filtroTag);

        # Incorporar o Template
        require 'template.php';
    }

    function novaTag(){
        if (filter_input(INPUT_POST, 'tag')){
            $t = new Tag();
            $t -> tag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($t->salvar()){
                header('Location:index.php?p=inicialTag');
                exit;
            };
        }

        $page = 'novaTag';
        require 'template.php';
    }

    function deletarTag(){
        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Tag($id);
            if (!$t->verificarUsuario($_SESSION['id'], $id)){
                header('Location:index.php');
            }
            else{
                $t->deletar();
            }
        }

        header('Location:index.php?p=inicialTag');
        exit;
    }

    function editarTag(){

        if (filter_input(INPUT_GET, 'id')){
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $t = new Tag($id);
            if (!$t->verificarUsuario($_SESSION['id'], $id)){
                header('Location:index.php?p=inicialTag');
            }
        }

        if (filter_input(INPUT_POST, 'tag')){
            $t = new Tag();
            $t->id = $id;
            $t -> tag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_SPECIAL_CHARS);
            $t -> color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS);
            $t->editar();

            header('Location:index.php?p=inicialTag');
            exit;
        }

        $page = 'editarTag';
        require 'template.php';
    }
}