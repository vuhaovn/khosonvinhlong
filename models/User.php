<?php
// models/User.php
require_once 'config/db.php';

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Kiểm tra thông tin đăng nhập
    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Nếu người dùng tồn tại và mật khẩu khớp (đã mã hóa bằng password_hash)
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Thêm người dùng mới (register)
    public function register($username, $password, $role) {
        // Kiểm tra username đã tồn tại hay chưa
        $query = "SELECT COUNT(*) as count FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Tên người dùng đã tồn tại, không làm gì hết
        if ($row['count'] > 0) {
            return false;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO " . $this->table_name . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
