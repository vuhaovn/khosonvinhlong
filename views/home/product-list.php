<?php include 'includes/header.php';  ?>

<div class="container py-5">
  <h2 class="text-center text-danger mb-5"><?php echo $categoryName['name']; ?></h2>

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
      <div>Không có sản phẩm nào</div>
    <?php endif; ?>
  </div>

  <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php //foreach($categories as $index => $category ): ?>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link <?php //echo $index === 0 ? 'active' : ''; ?>"
          id="<?php //$category['id'] ?>-tab"
          data-bs-toggle="tab"
          data-bs-target="#<?php //$category['id'] ?>"
          type="button"
          role="tab"
          aria-controls="<?php //$category['id'] ?>"
          aria-selected="<?php //echo $index === 0 ? 'true' : 'false'; ?>"
        >
          <?php //echo htmlspecialchars($category['name']); ?>
        </button>
      </li>
    <?php //endforeach; ?>
  </ul> -->

  <!-- <div class="tab-content py-5" id="myTabContent">
    <?php foreach($categories as $index => $category ): ?>
      <div
        class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>"
        id="<?= $category['id'] ?>"
        role="tabpanel"
        aria-labelledby="<?= $category['id'] ?>-tab"
      >
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
            <div>Không có sản phẩm nào</div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?> -->
  </div>

</div>

<?php include 'includes/contact.php'; ?>

<?php include 'includes/footer.php'; ?>
