<?php
// models/Contact.php
require_once 'config/db.php';

class Contact {
    private $conn;
    private $table_name = "contacts";

    public $id;
    public $name;
    public $phone;
    public $message;
    public $created_at;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($name, $phone, $message) {
        $query = "INSERT INTO " . $this->table_name . " (name, phone, message) VALUES (:name, :phone, :message)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();
    }
}
?>
