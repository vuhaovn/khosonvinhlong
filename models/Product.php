<?php
// models/Product.php
require_once 'config/db.php';

class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $price;
    public $introduce;
    public $category_id;
    public $description;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT products.*, categories.name as category_name FROM " . $this->table_name . "
                  LEFT JOIN categories ON products.category_id = categories.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT products.*, categories.name as category_name FROM " . $this->table_name . "
                  LEFT JOIN categories ON products.category_id = categories.id
                  WHERE products.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategoryId($categoryId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE category_id = :categoryId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm mới
    public function create($name, $price, $introduce, $category_id, $image, $description) {
        $query = "INSERT INTO " . $this->table_name . " (name, price, introduce, category_id, image, description) VALUES (:name, :price, :introduce, :category_id, :image, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':introduce', $introduce);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    // Cập nhật sản phẩm
    public function update($id, $name, $price, $introduce, $category_id, $image, $description) {
        $query = "UPDATE " . $this->table_name . " SET name = :name, price = :price, introduce = :introduce, category_id = :category_id, image = :image, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':introduce', $introduce);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
