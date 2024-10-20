<div class="container-lg py-5">
  <h2 class="text-center text-danger">Các loại danh mục</h2>
  <div class="row">
    <?php foreach($categories as $category ): ?>
      <div class="col-md-4 col-sm-6 col-12 mb-4">
        <!-- <a href="index.php?controller=home&action=listByCategory&categoryId=<?= $category['id'] ?>"> -->
          <div class="img-thumbnail" style="text-align: center;">
            <img src="<?= $category['image'] ?>" alt="<?= $category['name'] ?>" style="height: 150px;">
          </div>
          <div class="text-center"><?= $category['name'] ?></div>
        <!-- </a> -->
      </div>
    <?php endforeach; ?>
  </div>
</div>