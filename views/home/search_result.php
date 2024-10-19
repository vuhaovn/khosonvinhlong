<?php include 'includes/header.php';  ?>

<div class="container py-5">
  <h2 class="text-center text-danger mb-5">Kết quả tìm kiếm: <span class="fs-1"><?= $query; ?></span></h2>

  <div class="row">
    <?php if (!empty($products)): ?>
      <?php foreach ($products as $prod): ?>
        <div class="col-md-4 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="p-5" style="text-align: center;">
              <img src="<?= $prod['image']; ?>" alt="<?= $prod['name']; ?>" height="167">
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
    <?php else: ?>
      <div>Không có sản phẩm <span class="fw-bold fs-3"><?= $query ?></span> nào</div>
    <?php endif; ?>
  </div>
</div>

<?php include 'includes/contact.php'; ?>

<?php include 'includes/footer.php'; ?>
