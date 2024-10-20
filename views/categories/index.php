<!-- views/categories/index.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Categories</h1>
<a class="btn btn-primary mb-3" href="index.php?controller=category&action=create">Add category</a>
<table class="table">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Category Parent ID</th>
            <th>Category Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        function getParentName($data, $parentId) {
            $filtered = array_filter($data, function($item) use ($parentId) {
                return $item['id'] == $parentId;
            });
            // Reset the array keys and get the first element if available
            $parent = reset($filtered);
            return $parent ? $parent['name'] : 'No parent';
        }
        ?>
        <?php foreach ($cateChild as $category): ?>
            <tr>
                <td>
                    <?= $category['name']; ?>
                </td>
                <td>
                    <?= getParentName($categories, $category['parent_id']); ?>
                </td>
                <td><img src="<?= $category['image']; ?>" width="100"></td>
                <td>
                    <a href="index.php?controller=category&action=edit&id=<?= $category['id']; ?>">Edit</a> |
                    <a href="index.php?controller=category&action=delete&id=<?= $category['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>
