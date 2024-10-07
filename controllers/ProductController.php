<?php
// controllers/ProductController.php
require_once 'models/Product.php';
require_once 'models/Category.php';

class ProductController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = $this->productModel->getAll();
        include 'views/products/index.php';
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        $categories = $this->categoryModel->getAll();
        include 'views/products/create.php';
    }

    // Xử lý thêm sản phẩm
    // controllers/ProductController.php
    public function store()
    {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $introduce = $_POST['introduce'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];

        // Xử lý upload file
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_name = basename($_FILES['image']['name']);
            $target_dir = "uploads/"; // Thư mục lưu ảnh
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true); // Tạo thư mục với quyền truy cập 0777
            }
            $target_file = $target_dir . time() . '_' . $image_name;

            // Kiểm tra loại file (chỉ cho phép ảnh)
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];

            if (in_array($imageFileType, $allowed_types)) {
                // Upload file vào thư mục
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    // Lưu thông tin sản phẩm và đường dẫn hình ảnh vào cơ sở dữ liệu
                    if ($this->productModel->create($name, $price, $introduce, $category_id, $target_file, $description)) {
                        header("Location: index.php?controller=product&action=index");
                        exit(); // Dừng script sau khi chuyển hướng
                    } else {
                        echo "Failed to add product.";
                    }
                } else {
                    echo "Failed to upload image.";
                }
            } else {
                echo "Only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            echo "Please select an image.";
        }
    }


    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = $this->productModel->getById($id);
        $categories = $this->categoryModel->getAll();
        include 'views/products/edit.php';
    }

    // Xử lý cập nhật sản phẩm
    public function update($id)
    {
        $product = $this->productModel->getById($id);
        // Xử lý tên, giá và category
        $name = $_POST['name'];
        $price = $_POST['price'];
        $introduce = $_POST['introduce'];
        $category_id = $_POST['category_id'];
        $image = $_FILES['image'];
        $description = $_POST['description'];

        // Kiểm tra xem người dùng có upload hình ảnh mới không
        // Xử lý upload file
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_name = basename($_FILES['image']['name']);
            $target_dir = "uploads/"; // Thư mục lưu ảnh
            $target_file = $target_dir . time() . '_' . $image_name;

            // Kiểm tra loại file (chỉ cho phép ảnh)
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];

            if (in_array($imageFileType, $allowed_types)) {
                // Upload file vào thư mục
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file;
                } else {
                    echo "Failed to upload image.";
                }
            } else {
                echo "Only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            $image = $product['image'];
        }

        $this->productModel->update($id, $name, $price, $introduce, $category_id, $image, $description);

        header("Location: index.php?controller=product&action=index");
        exit(); // Dừng script sau khi chuyển hướng
    }

    // Xóa sản phẩm
    public function delete($id)
    {
        $this->productModel->delete($id);
        header('Location: index.php?controller=product&action=index');
    }
}
