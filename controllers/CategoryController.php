<?php
// controllers/CategoryController.php
require_once 'models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    // Hiển thị danh sách category
    public function index() {
        $categories = $this->categoryModel->getAll();
        $cateChild = [];
        foreach ($categories as $category) {
            $children = $this->categoryModel->getChildren($category['id']);
            if (!empty($children)) {
                $cateChild = array_merge($cateChild, $children);
            }
        }
        include 'views/categories/index.php';
    }

    public function show($id) {
        $category = $this->categoryModel->getById($id);
        include 'views/categories-list.php';
    }

    // Hiển thị form thêm category
    public function create() {
        $parentCategories = $this->categoryModel->getParent();
        include 'views/categories/create.php';
    }

    // Xử lý thêm category
    public function store() {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $parentId = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;

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
                    if ($this->categoryModel->create($name, $target_file, $parentId)) {
                        header("Location: index.php?controller=category&action=index");
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

    // Hiển thị form sửa category
    public function edit($id) {
        $category = $this->categoryModel->getById($id);
        $parentCategories = $this->categoryModel->getParent();
        include 'views/categories/edit.php';
    }

    // Xử lý cập nhật category
    public function update($id) {
        $category = $this->categoryModel->getById($id);
        // Xử lý tên, giá và category
        $name = $_POST['name'];
        $image = $_FILES['image'];
        $parentId = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;

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
            $image = $category['image'];
        }

        $this->categoryModel->update($id, $name, $image, $parentId);

        header("Location: index.php?controller=category&action=index");
        exit(); // Dừng script sau khi chuyển hướng
    }

    // Xóa category
    public function delete($id) {
        $this->categoryModel->delete($id);
        header('Location: index.php?controller=category&action=index');
    }
}
?>
