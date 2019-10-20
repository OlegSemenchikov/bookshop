<?php


namespace Models;


class Book
{
    protected $db_connect;
    protected $name_db;


    public function __construct() {

        $this->name_db = 'book';

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

    public function createBook($title)
    {
        $sql = $this->db_connect->prepare("INSERT INTO ".$this->name_db." SET `title` = :title");
        $sql->execute(array('title' => $title));

        // Получаем id вставленной записи
        return $this->db_connect->lastInsertId() ;
    }
}