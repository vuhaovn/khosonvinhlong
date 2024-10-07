<!-- views/product/index.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Product List</h1>
<a class="btn btn-primary mb-3" href="index.php?controller=product&action=create">Thêm sản phẩm</a>
<!-- Danh sách sản phẩm -->
<table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Introduce</th>
            <th>Category</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= $product['price']; ?></td>
                <td><?= $product['introduce']; ?></td>
                <td><?= $product['category_name']; ?></td>
                <td><img src="<?= $product['image']; ?>" width="100"></td>
                <td><?= $product['description']; ?></td>
                <td>
                    <a href="index.php?controller=product&action=edit&id=<?= $product['id']; ?>">Edit</a> |
                    <a href="index.php?controller=product&action=delete&id=<?= $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>
