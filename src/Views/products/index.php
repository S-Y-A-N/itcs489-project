  <div class="container mt-5">
    <h2>Result for ‘<?= $title ?>’</h2>
    <div class="grid gap-2">

      <?php foreach ($products as $p) : ?>
        <?php render('common/product_card', [
          'product_id' => $p['product_id'],
          'product_name' => $p['name'],
          'old_price' => $p['price'],
          'new_price' => $p['new_price'],
          'offer' => $p['offer'],
          'brand_name' => $p['brand_name'],
        ]); ?>
      <?php endforeach; ?>

    </div>
  </div>