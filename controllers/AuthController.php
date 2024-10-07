<?php
// controllers/AuthController.php
require_once 'models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // Hiển thị form đăng nhập
    public function login()
    {
        include 'views/auth/login.php';
    }

    // Xử lý đăng nhập
    public function handleLogin()
    {
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                // Lưu thông tin người dùng vào session
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: index.php'); // Điều hướng đến trang chủ
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng";
                include 'views/auth/login.php';
            }
        }
    }

    // Đăng xuất
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
    }

    // Đăng ký người dùng mới
    public function register()
    {
        include 'views/auth/register.php';
    }

    public function handleRegister()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $auth = new User();

        if ($auth->register($username, $password, $role)) {
            // Chuyển hướng sau khi đăng ký thành công
            header("Location: index.php?controller=auth&action=login");
        } else {
            // Nếu có lỗi, set biến $error và hiển thị lại form
            $error = "Username already exists. Please choose another one.";
            require_once 'views/auth/register.php';
        }
    }
}
