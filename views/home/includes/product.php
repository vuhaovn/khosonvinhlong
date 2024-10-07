<div class="container py-5">
  <h2 class="text-center text-danger">Các sản phẩm</h2>
  <div class="row">
    <?php foreach ($products as $prod): ?>
      <div class="col-md-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="p-5">
            <img src="<?= $prod['image']; ?>" alt="<?= $prod['name']; ?>" class="w-100">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $prod['name']; ?></h5>
            <p style="margin: 0" class="card-text"><?= $prod['introduce']; ?></p>
            <p style="color: red; font-size: 25px;"><?= formatCurrency($prod['price']); ?></p>
            <a href="index.php?controller=home&action=detail&id=<?php echo $prod['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>