<!-- views/product/create.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Create Product</h1>
<form method="POST" action="index.php?controller=product&action=store" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Introduce</label>
        <textarea name="introduce" id="tiny_introduce"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea name="description" id="tiny"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

<?php include 'views/layouts/footer.php'; ?>