<?php

namespace CodeSnape\Classes;

class Trecho{

    public $id;
    public $titulo;
    public $linguagens;
    public $texto;
    public $tags;



    function __construct($id=null)
    {
        if ($id){
            $conn = new Conexao();
            $trecho = $conn->query("SELECT trecho.*, GROUP_CONCAT(linguagem.nome SEPARATOR ', ') as linguagens
                                    FROM trecho
                                    LEFT JOIN linguagem ON linguagem.trecho_id = trecho.id
                                    WHERE trecho.id=$id
                                    GROUP BY trecho.id
                                    ORDER BY trecho.id DESC"
                            )->fetch();
            $tags = $conn->query("SELECT tag_id FROM tag_trecho WHERE trecho_id=$id ORDER BY tag_id");
            $selectedTagIds = $tags->fetchAll(\PDO::FETCH_COLUMN); 
            if ($trecho){
                $this->id=$trecho['id'];
                $this->titulo=$trecho['titulo'];
                $this->linguagens=$trecho['linguagens'];
                $this->texto=$trecho['texto'];
                $this->tags=$selectedTagIds;
            } 
            else{
                die ('Registro não Encontrado');
            }
        }
    }

    function salvar(){
        $conn = new Conexao();
        $sql = "INSERT INTO trecho (titulo, texto) VALUES ('$this->titulo', '$this->texto' )";

        $r = $conn->query($sql);
        if ($r){
            $this->id =  $conn ->lastInsertId();
        }
        foreach ($this->linguagens as $linguagem) {
            $sql = "INSERT INTO linguagem (nome, trecho_id) VALUES ('$linguagem', '$this->id' )";
            $r = $conn->query($sql);
        }
        foreach ($this->tags as $tag) {
            $sql = "INSERT INTO tag_trecho (tag_id, trecho_id) VALUES ($tag, '$this->id' )";
            $r = $conn->query($sql);
        }
        return true;
    }

    function editar(){
            $conn = new Conexao();
            $conn->query("UPDATE `trecho` SET `titulo`='$this->titulo', `texto`='$this->texto' WHERE id=$this->id")->fetch();

            #Linguagens
            $sql = "SELECT nome FROM linguagem WHERE trecho_id=$this->id";
            $stmt = $conn->query($sql);
            $linguagensBanco = $stmt->fetchAll(\PDO::FETCH_COLUMN);

            $inserir = array_diff($this->linguagens, $linguagensBanco);
            foreach ($inserir as $linguagem) {
                $sql = "INSERT INTO linguagem (nome, trecho_id) VALUES ('$linguagem', '$this->id' )";
                $conn->query($sql);
            }

            $deletar = array_diff($linguagensBanco, $this->linguagens);
            foreach ($deletar as $linguagem) {
                $sql = "DELETE FROM linguagem WHERE nome='$linguagem' AND trecho_id='$this->id'";
                $conn->query($sql);
            }

            #Tags
            $sql = "SELECT tag_id FROM tag_trecho WHERE trecho_id=$this->id";
            $stmt = $conn->query($sql);
            $tagsBanco = $stmt->fetchAll(\PDO::FETCH_COLUMN);

            if ($tagsBanco){
                $inserir = array_diff($this->tags, $tagsBanco);
                $deletar = array_diff($tagsBanco, $this->tags);
            }

            if ($tagsBanco){
                foreach ($inserir as $tag) {
                    $sql = "INSERT INTO tag_trecho (tag_id, trecho_id) VALUES ('$tag', '$this->id' )";
                    $conn->query($sql);
                }
            }
            else{
                foreach ($this->tags as $tag) {
                    $sql = "INSERT INTO tag_trecho (tag_id, trecho_id) VALUES ('$tag', '$this->id' )";
                    $conn->query($sql);
                }
            }


            if ($deletar){
                foreach ($deletar as $tag) {
                    $sql = "DELETE FROM tag_trecho WHERE tag_id=$tag AND trecho_id='$this->id'";
                    $conn->query($sql);
                }
            }

            return true;
    }

    function deletar(){
            $conn = new Conexao();
            $conn->query("DELETE FROM linguagem WHERE trecho_id=$this->id")->fetch();
            $conn->query("DELETE FROM tag_trecho WHERE tag_id=$this->id")->fetch();
            $conn->query("DELETE FROM trecho WHERE id=$this->id")->fetch();
            return true;
    }

    static function lista($filtroTitulo=null, $filtroLinguagens=null, $filtroTags=null){
        $conn = new Conexao();

        $whereOrAnd = ' WHERE ';

        $sqlTitulo = '';
        if ($filtroTitulo){
            $sqlTitulo = "$whereOrAnd trecho.titulo LIKE '%$filtroTitulo%' ";
            $whereOrAnd = ' AND ';
        }

        $sqlLinguagens = '';
        if ($filtroLinguagens) {
            $ids = implode("','", $filtroLinguagens);
            $sqlLinguagens = "$whereOrAnd trecho.id IN (
                SELECT trecho_id FROM linguagem WHERE nome IN ('$ids')
            )";
            $whereOrAnd = ' AND ';
        }

        $sqlTags = '';
        if ($filtroTags) {
            $ids = implode("','", $filtroTags);
            $sqlTags = "$whereOrAnd trecho.id IN (
                SELECT trecho_id FROM tag_trecho WHERE tag_id IN ('$ids')
            )";
            $whereOrAnd = ' AND ';
        }

        $sql = "
            SELECT trecho.*, GROUP_CONCAT(DISTINCT linguagem.nome SEPARATOR ', ') AS linguagens
            FROM trecho
            LEFT JOIN linguagem ON linguagem.trecho_id = trecho.id
            LEFT JOIN tag_trecho ON tag_trecho.trecho_id = trecho.id
            $sqlTags
            $sqlTitulo
            $sqlLinguagens
            GROUP BY trecho.id
            ORDER BY trecho.id DESC
        ";
        
        $stmt = $conn->query($sql);

        # Arrary de objetos Texto
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "\CodeSnape\Classes\Trecho");
    }

}

?>