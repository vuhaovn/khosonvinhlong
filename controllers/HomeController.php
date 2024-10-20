<?php

class HomeController {
    private $productModel;
    private $categoryModel;
    private $contactModel;

    public function __construct() {
        // Khởi tạo model sản phẩm để lấy dữ liệu sản phẩm
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->contactModel = new Contact();
    }

    public function index() {
        // Lấy danh sách sản phẩm từ model
        $products = $this->productModel->getAll();
        $categories = $this->categoryModel->getParent();
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }

        // Gọi view để hiển thị trang chủ
        require_once "views/home/index.php";
    }

    public function about() {
        $categories = $this->categoryModel->getParent();
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }
        require_once "views/home/about.php";
    }

    public function contact() {
        $categories = $this->categoryModel->getParent();
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }
        require_once "views/home/contact.php";
    }

    public function detail($id) {
        // Gọi model để lấy thông tin sản phẩm theo ID
        $product = $this->productModel->getById($id);
        $categories = $this->categoryModel->getParent();
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            echo "Product not found!";
            return;
        }

        // Gọi view để hiển thị chi tiết sản phẩm
        require_once "views/home/detail.php";
    }

    public function listByCategory($categoryId) {
        $products = $this->productModel->getProductsByCategoryId($categoryId);
        $categories = $this->categoryModel->getParent();
        $categoryName = $this->categoryModel->getById($categoryId);
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }
        require_once 'views/home/product-list.php';
    }

    public function search() {
        if (isset($_POST['query'])) {
            $query = $_POST['query'];

            // Gọi model để lấy danh sách sản phẩm khớp với từ khóa tìm kiếm
            $products = $this->productModel->searchByName($query);
            $categories = $this->categoryModel->getParent();
            $cateChild = [];
            foreach ($categories as $category) {
                $children = $this->categoryModel->getChildren($category['id']);
                if (!empty($children)) {
                    $cateChild = array_merge($cateChild, $children);
                }
            }

            // Gửi dữ liệu sang view để hiển thị kết quả
            require 'views/home/search_result.php';
        }
    }

    public function insertContact() {
        // Lấy dữ liệu từ form
        $name = $_POST['contactName'];
        $phone = $_POST['contactPhone'];
        $message = $_POST['contactMessage'];

        $this->contactModel->add($name, $phone, $message);
        header('Location: index.php?controller=home&action=thankyou');
        exit();
    }

    public function thankyou() {
        $message = "Cảm ơn bạn đã gửi liên hệ!";
        $categories = $this->categoryModel->getParent();
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }
        require_once 'views/home/thankyou.php';
    }
}
