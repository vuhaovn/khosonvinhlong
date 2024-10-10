<!-- views/product/edit.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Edit Product</h1>
<form method="POST" action="index.php?controller=product&action=update&id=<?= $product['id'] ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Introduce</label>
        <textarea name="introduce" id="tiny_introduce"><?= htmlspecialchars($product['introduce']) ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>>
                    <?= $category['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- Hiển thị hình ảnh hiện tại -->
    <?php if (!empty($product['image'])): ?>
        <div>
            <h3>Current Image</h3>
            <img src="<?= $product['image']; ?>" width="100">
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label>Upload New Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label>Product Description</label>
        <textarea name="description" id="tiny"><?= htmlspecialchars($product['description']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<?php include 'views/layouts/footer.php'; ?>