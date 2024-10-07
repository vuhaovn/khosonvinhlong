    <?php include 'includes/header.php';  ?>

    <section>
      <div class="py-5">
        <div class="container">
          <div class="page-title">
            <h1 class="title"><span><?= $product['name']; ?></span></h1>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="p-5"><img src="<?= $product['image'] ?>" alt="" width="200"></div>
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