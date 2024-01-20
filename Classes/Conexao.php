<?php

namespace Blog\Classes;
use \PDO;
use \PDOException;

class Conexao extends PDO{
    private $banco = 'codesnape';
    private $user = 'root';
    private $password = '';

    function __construct()
    {
        $dns = 'mysql:host=localhost; dbname='.$this->banco;
        try {
            parent::__construct($dns, $this->user, $this->password);
        } catch (PDOException $e) {
            file_put_contents("log.txt", $e->getMessage(). "\n\n", FILE_APPEND | LOCK_EX);
            die("Erro ao conectar no banco de dados. Tente novamente mais tarde");        }
    }
}




?>