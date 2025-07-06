<?php

namespace CodeSnape\Classes;

class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;

    // function __construct($id=null)
    // {
    //     if ($id){
    //         $conn = new Conexao();
    //         $trecho = $conn->query("SELECT trecho.*, GROUP_CONCAT(linguagem.nome SEPARATOR ', ') as linguagens
    //                                 FROM trecho
    //                                 LEFT JOIN linguagem ON linguagem.trecho_id = trecho.id
    //                                 WHERE trecho.id=$id
    //                                 GROUP BY trecho.id
    //                                 ORDER BY trecho.id DESC"
    //                         )->fetch();
    //         $tags = $conn->query("SELECT tag_id FROM tag_trecho WHERE trecho_id=$id ORDER BY tag_id");
    //         $selectedTagIds = $tags->fetchAll(\PDO::FETCH_COLUMN); 
    //         if ($trecho){
    //             $this->id=$trecho['id'];
    //             $this->titulo=$trecho['titulo'];
    //             $this->linguagens=$trecho['linguagens'];
    //             $this->texto=$trecho['texto'];
    //             $this->tags=$selectedTagIds;
    //         } 
    //         else{
    //             die ('Registro não Encontrado');
    //         }
    //     }
    // }

    function salvar(){
        $hash = password_hash($this->senha, PASSWORD_BCRYPT);
        $conn = new Conexao();

        $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$this->nome', '$this->email', '$hash') ";
        $conn->query($sql);
        return true;
    }


    // function deletar(){
    //         $conn = new Conexao();
    //         $conn->query("DELETE FROM linguagem WHERE trecho_id=$this->id")->fetch();
    //         $conn->query("DELETE FROM tag_trecho WHERE tag_id=$this->id")->fetch();
    //         $conn->query("DELETE FROM trecho WHERE id=$this->id")->fetch();
    //         return true;
    // }

}

?>