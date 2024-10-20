<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">

  <div class="offcanvas-header justify-content-between">
    <h4 class="fw-normal text-uppercase fs-6">Danh mục sản phẩm</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">
    <div class="accordion accordion-flush" id="accordionFlushExample">

      <?php foreach($categories as $category ): ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-<?= $category['name'] ?>">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#flush-<?= $category['id'] ?>"
              aria-expanded="false"
              aria-controls="flush-<?= $category['id'] ?>"
            >
              <?= $category['name'] ?>
            </button>
          </h2>

          <?php
            // Lọc các danh mục con có parent_id khớp với id của category hiện tại
            $filteredChildren = array_filter($cateChild, function($child) use ($category) {
                return $child['parent_id'] == $category['id'];
            });
          ?>
          <div
            id="flush-<?= $category['id'] ?>"
            class="accordion-collapse collapse"
            aria-labelledby="flush-<?= $category['name'] ?>"
            data-bs-parent="#accordionFlushExample"
          >
            <div class="accordion-body">
              <?php if (!empty($filteredChildren)) : ?>
                <?php foreach ($filteredChildren as $child) : ?>
                  <a
                    href="index.php?controller=home&action=listByCategory&categoryId=<?= $child['id'] ?>"
                    class="nav-link d-flex align-items-center gap-3 text-dark p-2"
                  >
                    <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#delivery"></use></svg>
                    <?= $child['name']; ?>
                  </a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>