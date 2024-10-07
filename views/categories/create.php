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
    <button type="submit" class="btn btn-primary">Create category</button>
</form>

<?php include 'views/layouts/footer.php'; ?>