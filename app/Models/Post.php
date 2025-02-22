<?php
require_once '../config/database.php';
class Post
{
    private $conn;
    private $table = 'posts';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function all()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $description)
{
    $query = "INSERT INTO " . $this->table . " (title, description) VALUES (:title, :description)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    return $stmt->execute();
}

public function update($id, $title, $description)
{
    $query = "UPDATE " . $this->table . " SET title = :title, description = :description WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}
public function delete($id)
{
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}
}