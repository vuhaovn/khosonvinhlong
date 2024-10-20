<!-- views/categories/create.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Create category</h1>
<form method="POST" action="index.php?controller=category&action=store" enctype="multipart/form-data">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Category Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Parent Category</label>
        <select name="parent_id" class="form-control">
            <option value="">No Parent</option>
            <?php foreach ($parentCategories as $parent): ?>
                <option value="<?= $parent['id']; ?>"><?= $parent['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create category</button>
</form>

<?php include 'views/layouts/footer.php'; ?>