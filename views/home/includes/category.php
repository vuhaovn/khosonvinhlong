<div class="container-lg py-5">
  <h2 class="text-center text-danger">Các loại danh mục</h2>
  <div class="row">
    <?php foreach($categories as $category ): ?>
      <div class="col-md-4 col-sm-6 col-12 mb-4">
        <img src="<?= $category['image'] ?>" alt="<?= $category['name'] ?>" class="img-thumbnail">
        <div class="text-center"><?= $category['name'] ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>