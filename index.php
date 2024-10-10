<?php
// public/index.php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : null;

require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';

$productController = new ProductController();
$categoryController = new CategoryController();
$authController = new AuthController();
$homeController = new HomeController();

switch ($controller) {
    case 'home':
        switch ($action) {
            case 'index':
                $homeController->index();
                break;
            case 'detail':
                $homeController->detail($id);
                break;
            case 'listByCategory':
                $homeController->listByCategory($categoryId);
                break;
            case 'about':
                $homeController->about();
                break;
            case 'contact':
                $homeController->contact();
                break;
            default:
                header('Location: 404.php');
                break;
        }
        break;

    case 'product':
        if (isset($_SESSION['user_id'])) {
            switch ($action) {
                case 'index':
                    $productController->index();
                    break;
                case 'create':
                    $productController->create();
                    break;
                case 'store':
                    $productController->store();
                    break;
                case 'edit':
                    $productController->edit($id);
                    break;
                case 'update':
                    $productController->update($id);
                    break;
                case 'delete':
                    $productController->delete($id);
                    break;
                default:
                    echo "Invalid action";
                    break;
            }
        } else {
            header('Location: index.php?controller=auth&action=login');
        }
        break;

    case 'category':
        if (isset($_SESSION['user_id'])) {
            switch ($action) {
                case 'index':
                    $categoryController->index();
                    break;
                case 'create':
                    $categoryController->create();
                    break;
                case 'store':
                    $categoryController->store();
                    break;
                case 'edit':
                    $categoryController->edit($id);
                    break;
                case 'update':
                    $categoryController->update($id);
                    break;
                case 'delete':
                    $categoryController->delete($id);
                    break;
                default:
                    echo "Invalid action";
                    break;
            }
        } else {
            header('Location: index.php?controller=auth&action=login');
        }
        break;

    case 'auth':
        switch ($action) {
            case 'register':
                $authController->register();
                break;
            case 'handleRegister':
                $authController->handleRegister();
                break;
            case 'login':
                $authController->login();
                break;
            case 'handleLogin':
                $authController->handleLogin();
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                echo "Invalid action";
                break;
        }
        break;

    default:
        echo "Invalid controller";
        break;
}
