<?php

class Database
{
    private $db;

    public function __construct()
    {
        $this->db = $this->db_connect();
    }

    private function db_connect()
    {
        try {
            $string = "mysql:host=localhost;dbname=catalog_db;";
            return new PDO($string, 'root', '');
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function read($query, $data = [])
    {
        try {
            $stm = $this->db->prepare($query);

            if (count($data) > 0) {
                $stm->execute($data);
            } else {
                $stm->execute();
            }

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Read operation failed: " . $e->getMessage());
        }
    }

    public function write($query, $data = [])
    {
        try {
            $stm = $this->db->prepare($query);

            if (count($data) > 0) {
                $stm->execute($data);
            } else {
                $stm->execute();
            }

            return true;
        } catch (PDOException $e) {
            throw new Exception("Write operation failed: " . $e->getMessage());
        }
    }
}
