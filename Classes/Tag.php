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
                die ('Registro não Encontrado');
            }
        }
    }

    function salvar(){
        $conn = new Conexao();
        $sql = "INSERT INTO tag (tag, color) VALUES ('$this->tag', '$this->color')";

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

        $sqlFiltro = '';
        if ($filtroTag){
            $sqlFiltro = "WHERE tag.tag LIKE '%$filtroTag%' ";
        }


        $sql = "SELECT * FROM tag $sqlFiltro";
        $stmt = $conn->query($sql);

        # Arrary de objetos Texto
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "\CodeSnape\Classes\Tag");
    }

}

?>