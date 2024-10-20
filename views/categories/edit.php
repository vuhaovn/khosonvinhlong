<!-- views/categories/edit.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Edit Category</h1>
<?php
    // echo "<pre>";
    // print_r($category);
    // echo "</pre>";
?>
<form method="POST" action="index.php?controller=category&action=update&id=<?= $category['id'] ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="name" value="<?= $category['name'] ?>" class="form-control" required>
    </div>
    <!-- Hiển thị hình ảnh hiện tại -->
    <?php if (!empty($category['image'])): ?>
        <div>
            <h3>Current Image</h3>
            <img src="<?= $category['image']; ?>" width="100">
        </div>
    <?php endif; ?>

    <!-- Cho phép người dùng upload hình ảnh mới -->
    <div class="form-group">
        <label>Upload New Category Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label>Parent Category</label>
        <select name="parent_id" class="form-control">
            <option value="">No Parent</option>
            <?php foreach ($parentCategories as $parent): ?>
                <option value="<?= $parent['id']; ?>" <?= $parent['id'] == $category['parent_id'] ? 'selected' : '' ?>>
                    <?= $parent['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php include 'views/layouts/footer.php'; ?>