<div class="container mt-5 extend-vh">
  <h2><?= empty($title) ? "Products" : $title ?></h2>
  <div class="grid gap-2 mt-4">
    <?php if (!empty($products)) : ?>
      <?php foreach ($products as $p): ?>
        <?php render('common/product_card', [
          'product_id' => $p['product_id'],
          'product_name' => $p['name'],
          'old_price' => $p['price'],
          'new_price' => $p['new_price'],
          'offer' => $p['offer'],
          'brand_name' => $p['brand_name'],
        ]); ?>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center lead">No products found</p>
    <?php endif; ?>

  </div>
</div>