    <?php include 'includes/header.php';  ?>

    <section>
      <div class="py-5">
        <div class="container">
          <div class="page-title">
            <h1 class="title"><span><?= $product['name']; ?></span></h1>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="p-5 text-center"><img src="<?= $product['image'] ?>" alt="<?= $product['name']; ?>" style="max-width: 100%; max-height: 300px;"></div>
            </div>
            <div class="col-sm-6">
              <div class="description">
                <p><?= $product['description'] ?></p>
                <p class="text-danger fs-3"><?= number_format($product['price'], 0, ',', '.') . ' VNĐ'; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include 'includes/contact.php'; ?>

    <?php include 'includes/footer.php'; ?>