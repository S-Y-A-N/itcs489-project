<main class="container mt-5">

  <p class="text-warning fw-bold"><?= $errors['max'] ?? "" ?></p>

  <?php if (!isset($errors['max'])): ?>
    <p class="text-info fw-bold"><?= $errors['success'] ?? "" ?></p>
  <?php endif; ?>


  <div class="grid product-details gap-4">

    <!-- Images -->
    <div class="col flex-fill">
      <img class="img-fluid" src="https://placehold.co/800x600/fffbcf/d4a900?text=Product" />
    </div>

    <!-- Product info -->
    <div class="col flex-fill d-flex flex-column justify-content-between">
      <div>
        <h1><?= $product['name'] ?></h1>
        <?php if ($product['offer'] > 0): ?>
          <p class="mb-0 text-secondary fs-5">
            <s><?= $product['price'] ?> <span class="fs-5">BHD</span></s>
            <span class="badge bg-danger"><?= $product['offer'] * 100 ?>%</span>
          </p>
        <?php endif; ?>
        <p class="lead fs-2">
          <strong><?= $product['new_price'] ?></strong> <span class="fs-4">BHD</span>
        </p>
        <p><strong>Description:</strong></p>
        <p><?= $product['description'] ?></p>
      </div>

      <form method="post">
        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
        <div class="d-flex">
          <select id="quantity" name="quantity" class="form-select mb-3 w-25 me-3">
            <option value="1" selected>Quantity: 1</option>
            <option value="2">Quantity: 2</option>
            <option value="3">Quantity: 3</option>
            <option value="4">Quantity: 4</option>
            <option value="5">Quantity: 5</option>
          </select>
          <p class="fs-2"><strong id="quantity_price"><?= $product['new_price'] ?></strong> <span
              class="fs-3">BHD</span></p>
        </div>
        <button type="submit" id="cart-btn" name="cart" class="btn btn-primary w-100 mb-2"><i
            class="bi bi-cart me-2"></i>Add to
          Cart</button>
        <button type="submit" id="wishlist-btn" name="wishlist" class="btn btn-outline-danger w-100"><i
            class="bi bi-heart me-2"></i>Add
          to Wishlist</button>
      </form>
    </div>

    <!-- TODO Toast message -->
    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        <?= $message ?>
        <div class="mt-2 pt-2 border-top">
          <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">Continue Shopping</button>
          <a href="" type="button" class="btn btn-secondary btn-sm">View Cart</a>
        </div>
      </div>
    </div>

  </div>
</main>

<script type="module">

  const quantity = document.querySelector('#quantity');
  const quantityPrice = document.querySelector('#quantity_price');
  const basePrice = Number(quantityPrice.textContent);

  quantity.addEventListener('change', () => {
    quantityPrice.textContent = (basePrice * quantity.value).toFixed(2);
  });

</script>