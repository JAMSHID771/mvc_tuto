<?php
class Database
{
    protected $host = "localhost";
    protected $dbname = "Kim";
    //AFTER TABLE posts ADD COLUMN description TEXT;
    protected $dbport = "3306";
    protected $username = "root";
    protected $password = "";
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->dbport", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage()); // Завершает скрипт при ошибке
        }
        return $this->conn;
    }
    
}
