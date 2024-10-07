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

    public function detail($id) {
        // Gọi model để lấy thông tin sản phẩm theo ID
        $product = $this->productModel->getById($id);

        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            echo "Product not found!";
            return;
        }

        // Gọi view để hiển thị chi tiết sản phẩm
        require_once "views/home/detail.php";
    }
}
