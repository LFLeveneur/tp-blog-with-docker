<?php
class DB {
    private $host = 'database:3306';
    private $dbname = 'database_tp_blog_with_docker';
    private $username= 'root';
    private $password = 'password';
    private $db;

    public function connect_db() {
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}