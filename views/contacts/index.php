<!-- views/product/index.php -->
<?php include 'views/layouts/header.php'; ?>

<h1>Danh sách liên hệ</h1>
<!-- Danh sách sản phẩm -->
<table class="table">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Tin nhắn</th>
            <th>Thời gian gửi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $contact['name']; ?></td>
                <td><?= $contact['phone']; ?></td>
                <td><?= $contact['message']; ?></td>
                <td><?= $contact['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>
