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

    public function getParent() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE parent_id IS NULL";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChildren($parentId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE parent_id = :parent_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':parent_id', $parentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParentCategoryName($parentId) {
        $stmt = $this->conn->prepare("SELECT name FROM categories WHERE id = :parent_id");
        $stmt->execute(['parent_id' => $parentId]);
        $parentCategory = $stmt->fetch(PDO::FETCH_ASSOC);
        return $parentCategory ? $parentCategory['name'] : 'No Parent'; // Trả về tên category cha hoặc null nếu không tìm thấy
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
    public function create($name, $image, $parentId = null) {
        $query = "INSERT INTO " . $this->table_name . " (name, image, parent_id) VALUES (:name, :image, :parent_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':parent_id', $parentId);
        return $stmt->execute();
    }

    // Cập nhật danh mục
    public function update($id, $name, $image, $parent_id) {
        $query = "UPDATE " . $this->table_name . " SET name = :name, image = :image, parent_id = :parent_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':parent_id', $parent_id);
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
