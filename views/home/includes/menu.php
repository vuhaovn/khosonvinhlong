<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">

  <div class="offcanvas-header justify-content-between">
    <h4 class="fw-normal text-uppercase fs-6">Danh mục sản phẩm</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
      <?php foreach($categories as $category ): ?>
        <li class="nav-item border-dashed">
          <a href="index.php?controller=home&action=listByCategory&categoryId=<?= $category['id'] ?>" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
            <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#delivery"></use></svg>
            <span><?= $category['name'] ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</div>