<?php

namespace CodeSnape\Classes;

class Trecho{

    public $id;
    public $titulo;
    public $linguagem;
    public $texto;



    function __construct($id=null)
    {
        if ($id){
            $conn = new Conexao();
            $trecho = $conn->query("SELECT * FROM trecho WHERE id=$id")->fetch();
            if ($trecho){
                $this->id=$trecho['id'];
                $this->titulo=$trecho['titulo'];
                $this->linguagem=$trecho['linguagem'];
                $this->texto=$trecho['texto'];
            } 
            else{
                die ('Registro não Encontrado');
            }
        }
    }

    function salvar(){
        $conn = new Conexao();
        $sql = "INSERT INTO trecho (titulo, linguagem, texto) VALUES ('$this->titulo',  '$this->linguagem', '$this->texto' )";

        $r = $conn->query($sql);
        if ($r){
            $this->id =  $conn ->lastInsertId();
        }
        return $r;
    }

    function atualizar(){
            $conn = new Conexao();
            return $conn->query("UPDATE `trecho` SET `titulo`='$this->titulo', `linguagem`='$this->linguagem', `texto`='$this->texto' WHERE id=$this->id")->fetch();
    }

    function deletar(){
            $conn = new Conexao();
            return $conn->query("DELETE FROM trecho WHERE id=$this->id")->fetch();
    }

    static function lista(){
        $conn = new Conexao();
        $sql = "SELECT * FROM trecho ORDER BY id DESC";
        $stmt = $conn->query($sql);

        # Arrary de objetos Texto
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "\CodeSnape\Classes\Trecho");
    }

    
}

?>