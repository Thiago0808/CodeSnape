<?php

namespace CodeSnape\Classes;

class Tag{

    public $id;
    public $tag;
    public $color;


    function __construct($id=null)
    {
        if ($id){
            $conn = new Conexao();
            $tag = $conn->query("SELECT * FROM tag WHERE id=$id ")->fetch();
            if ($tag){
                $this->id=$tag['id'];
                $this->tag=$tag['tag'];
                $this->color=$tag['color'];
            } 
            else{
                die ('Tag não Encontrada');
            }
        }
    }

    function salvar(){
        $conn = new Conexao();
        $usuario_id = $_SESSION['id'];
        $sql = "INSERT INTO tag (tag, color, usuario_id) VALUES ('$this->tag', '$this->color', $usuario_id)";

        $conn->query($sql);
        return true;
    }

    function editar(){
            $conn = new Conexao();
            $conn->query("UPDATE `tag` SET `tag`='$this->tag', color='$this->color' WHERE id=$this->id")->fetch();
            return true;
    }

    function deletar(){
            $conn = new Conexao();
            $conn->query("DELETE FROM tag_trecho WHERE tag_id=$this->id")->fetch();
            $conn->query("DELETE FROM tag WHERE id=$this->id")->fetch();
            return true;
    }

    static function lista($filtroTag=null){
        $conn = new Conexao();
        $usuario_id = $_SESSION['id'];

        $sqlFiltro = '';
        if ($filtroTag){
            $sqlFiltro = "AND tag.tag LIKE '%$filtroTag%' ";
        }


        $sql = "SELECT * FROM tag WHERE usuario_id = $usuario_id  $sqlFiltro";
        $stmt = $conn->query($sql);

        # Arrary de objetos Texto
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "\CodeSnape\Classes\Tag");
    }

    function verificarUsuario($usuario_id, $tag_id){
        $conn = new Conexao();
        $trecho = $conn->query("SELECT id FROM tag WHERE id=$tag_id AND usuario_id = $usuario_id")->fetch();
        if ($trecho){
            return true;
        }
        else{
            return false;
        }
        return true;
    }
}

?>