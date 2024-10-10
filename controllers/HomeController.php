<?php

class HomeController {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        // Khởi tạo model sản phẩm để lấy dữ liệu sản phẩm
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index() {
        // Lấy danh sách sản phẩm từ model
        $products = $this->productModel->getAll();
        $categories = $this->categoryModel->getAll();

        // Gọi view để hiển thị trang chủ
        require_once "views/home/index.php";
    }

    public function about() {
        require_once "views/home/about.php";
    }

    public function contact() {
        require_once "views/home/contact.php";
    }

    public function detail($id) {
        // Gọi model để lấy thông tin sản phẩm theo ID
        $product = $this->productModel->getById($id);
        $categories = $this->categoryModel->getAll();

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
        $categories = $this->categoryModel->getAll();
        $categoryName = $this->categoryModel->getById($categoryId);
        require_once 'views/home/product-list.php';
    }
}
