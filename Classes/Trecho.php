<?php

namespace Blog\Classes;

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
            return $conn->query("UPDATE `texto` SET `titulo`='$this->titulo',`texto`='$this->texto', `premium`='$this->premium', `valor_pago`='$this->valor_pago',`usuario_id`='$this->usuario_id' WHERE id=$this->id")->fetch();
    }

    function deletar(){
            $conn = new Conexao();
            return $conn->query("DELETE FROM texto WHERE id=$this->id")->fetch();
    }

    function getUsuario(){
        if ($this->usuario_id){
            $conn = new Conexao();
            $stmt = $conn->query("SELECT * FROM usuario WHERE id=$this->usuario_id");
            $stmt->setFetchMode(\PDO::FETCH_CLASS, "\Blog\Classes\Usuario");
            return $stmt->fetch();
        }
        return new Usuario();
    }

    static function listaPremium(){
        $conn = new Conexao();
        $sqlPremium = "SELECT * FROM texto WHERE premium='sim' ORDER BY valor_pago DESC";
        $stmtPremium = $conn->query($sqlPremium);

        # Arrary de objetos Texto
        return $stmtPremium->fetchAll(\PDO::FETCH_CLASS, "\Blog\Classes\Texto");
    }

    static function listaNormal(){
        $conn = new Conexao();
        $sqlNormal = "SELECT * FROM texto WHERE premium='nao' ORDER BY id DESC";
        $stmtNormal = $conn->query($sqlNormal);

        # Arrary de objetos Texto
        return $stmtNormal->fetchAll(\PDO::FETCH_CLASS, "\Blog\Classes\Texto");
    }
}

?>