<div class="col card p-0 flex-fill">
  <img class="card-img-top w-100" src="https://placehold.co/60x40/fffbcf/d4a900?text=Product" alt="Title" />
  <div class="card-body">
    <h6 class="card-title mb-4"><?= $product_name ?? 'Product Name' ?></h6>
    <?php if ($offer > 0): ?>
      <p class="card-subtitle d-flex align-items-center gap-2 mb-1">
        <s><?= $old_price ?? '99.99' ?> BHD</s>
        <span class="badge bg-danger"><?= $offer * 100 ?>%</span>
      </p>
    <?php endif; ?>
    <p class="card-subtitle lead"><?= $new_price ?? '99.99' ?> BHD</p>
    <p class="card-subtitle mt-2"><a href=""><?= $brand_name ?? 'Brand Name' ?></a></p>
    <a href="<?= "/product?id=$product_id" ?? '#' ?>" class="stretched-link"></a>
  </div>
</div>