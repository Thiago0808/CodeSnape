<?php

namespace CodeSnape\Classes;

class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;

    function __construct($id=null)
    {
        if ($id){
            $conn = new Conexao();
            $usuario = $conn->query("SELECT * FROM usuario WHERE id=$id ")->fetch();
            if ($usuario){
                $this->id=$usuario['id'];
                $this->nome=$usuario['nome'];
                $this->email=$usuario['email'];
                $this->senha=$usuario['senha'];
            } 
            else{
                die ('Usuário não Encontrado');
            }
        }
    }

    function logar(){
        $conn = new Conexao();
        $sql = "SELECT * FROM usuario WHERE email='$this->email' AND ativo=1";
        $u = $conn->query($sql)->fetch();

        #Verificar se a senha confere
        if (password_verify($this->senha, $u['senha'])){
            $_SESSION['id'] = $u['id'];
            return true;
        }
        else{
            return false;
        }

    }

    function salvar(){
        $hash = password_hash($this->senha, PASSWORD_BCRYPT);
        $conn = new Conexao();

        $sql = "INSERT INTO usuario (nome, email, senha, ativo) VALUES ('$this->nome', '$this->email', '$hash', 1) ";
        $conn->query($sql);
        return true;
    }

    function verificarEmail(){
        $conn = new Conexao();
        $u = $conn -> query("SELECT id FROM usuario WHERE email='$this->email' AND ativo=1");
        if ($u->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }


    function deletar(){
            $conn = new Conexao();
            $conn->query("UPDATE usuario SET ativo=0 WHERE id=$this->id")->fetch();
            return true;
    }

}

?>