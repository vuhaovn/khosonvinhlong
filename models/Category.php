<?php
// models/Category.php
require_once 'config/db.php';

class Category {
    private $conn;
    private $table_name = "categories";

    public $id;
    public $name;
    public $image;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy tất cả danh mục
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public function create($name, $image) {
        $query = "INSERT INTO " . $this->table_name . " (name, image) VALUES (:name, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Cập nhật danh mục
    public function update($id, $name, $image) {
        $query = "UPDATE " . $this->table_name . " SET name = :name, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Xóa danh mục
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
