<?php
namespace Models;

class Author
{
    protected $db_connect;
    protected $name_db;

    public function __construct() {

        $this->name_db = 'author';

        $dsn = 'mysql:host=127.0.0.1;dbname=bookshop;';

        try {
            $this->db_connect = new \PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function showAll()
    {
        $sql = 'SELECT * FROM '.$this->name_db;

        return $this->db_connect->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addAuthor($name)
    {
        $sql = $this->db_connect->prepare("INSERT INTO ".$this->name_db." SET `name` = :name");
        $sql->execute(array('name' => $name));

        // Получаем id вставленной записи
        return $this->db_connect->lastInsertId() ;
    }
}