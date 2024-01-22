<?php

namespace Blog\Classes;

class Texto{

    public $id;
    public $titulo;
    public $texto;
    public $premium;
    public $valor_pago;
    public $usuario_id;


    function __construct($id=null)
    {
        if ($id){
            $conn = new Conexao();
            $texto = $conn->query("SELECT * FROM texto WHERE id=$id")->fetch();
            if ($texto){
                $this->id=$texto['id'];
                $this->titulo=$texto['titulo'];
                $this->texto=$texto['texto'];
                $this->premium=$texto['premium'];
                $this->valor_pago=$texto['valor_pago'];
                $this->usuario_id=$texto['usuario_id'];
            } 
            else{
                die ('Registro não Encontrado');
            }
        }
    }

    function salvar(){
        $conn = new Conexao();
        if ($this->valor_pago){
            $sql = "INSERT INTO texto (titulo, texto, premium, valor_pago, usuario_id) VALUES ('$this->titulo', '$this->texto', '$this->premium', '$this->valor_pago', '$this->usuario_id' )";
        }
        else{
            $sql = "INSERT INTO texto (titulo, texto, premium, usuario_id) VALUES ('$this->titulo', '$this->texto', '$this->premium', '$this->usuario_id' )";
        }

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