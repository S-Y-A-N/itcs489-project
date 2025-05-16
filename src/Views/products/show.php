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
          <strong id="basePrice"><?= $product['new_price'] ?></strong> <span class="fs-4">BHD</span>
        </p>
        <p><strong>Description:</strong></p>
        <p><?= $product['description'] ?></p>
      </div>

      <form method="post">
        <input type="hidden" name="product_id" id="productId" value="<?= $product['product_id'] ?>" />
        <div class="d-flex">
          <select id="quantity" name="quantity" class="form-select mb-3 w-25 me-3">
            <option disabled>Quantity</option>
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <p class="fs-2"><strong id="quantityPrice"><?= $product['new_price'] ?></strong> <span class="fs-3">BHD</span>
          </p>
        </div>
        <button type="button" id="cartSubmit" name="cart" value="" class="btn btn-primary w-100 mb-2"><i
            class="bi bi-cart me-2"></i>Add to
          Cart</button>
        <button type="button" id="wishlistSubmit" name="wishlist" value="" class="btn btn-outline-danger w-100"><i
            class="bi bi-heart me-2"></i>Add
          to Wishlist</button>
      </form>
    </div>

  </div>
</main>

<div aria-live="polite" aria-atomic="true" class="position-relative">

  <div class="toast-container position-fixed bottom-0 end-0 p-3">

    <!-- Cart Error Toast message -->
    <div id="cartErrorToast" class="toast align-items-center text-bg-warning" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="position-relative">
        <div class="fs-4 m-2 position-absolute top-0 start-0">
          <i class="bi bi-exclamation-circle-fill"></i>
          <strong>Warning</strong>
        </div>
        <button type="button" class="btn-close m-2 position-absolute top-0 end-0" data-bs-theme="light"
          data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body mt-5 fs-6">
        Due to limited stock, you cannot add more than 5 of this item to your cart.
      </div>
      <div class="d-flex justify-content-end">
        <a href="/cart" type="button" class="btn btn-dark m-2">View Cart</a>
      </div>
    </div>

    <!-- Cart Success Toast message -->
    <div id="cartSuccessToast" class="toast align-items-center text-bg-success" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="position-relative">
        <div class="fs-4 m-2 position-absolute top-0 start-0">
          <i class="bi bi-check-circle-fill"></i>
          <strong>Success</strong>
        </div>
        <button type="button" class="btn-close m-2 position-absolute top-0 end-0" data-bs-theme="dark"
          data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body mt-5 fs-6">
        Item added to cart successfully.
      </div>
      <div class="d-flex justify-content-end">
        <a href="/cart" type="button" class="btn btn-light m-2">View Cart</a>
      </div>
    </div>

    <!-- Wishlist Error Toast message -->
    <div id="wishlistErrorToast" class="toast align-items-center text-bg-warning" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="position-relative">
        <div class="fs-4 m-2 position-absolute top-0 start-0">
          <i class="bi bi-exclamation-circle-fill"></i>
          <strong>Warning</strong>
        </div>
        <button type="button" class="btn-close m-2 position-absolute top-0 end-0" data-bs-theme="light"
          data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body mt-5 fs-6">
        <!-- message. -->
      </div>
      <div class="d-flex justify-content-end">
        <a href="/wishlist" type="button" class="btn btn-dark m-2">View Wishlist</a>
      </div>
    </div>

    <!-- Wishlist Success Toast message -->
    <div id="wishlistSuccessToast" class="toast align-items-center text-bg-success" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="position-relative">
        <div class="fs-4 m-2 position-absolute top-0 start-0">
          <i class="bi bi-check-circle-fill"></i>
          <strong>Success</strong>
        </div>
        <button type="button" class="btn-close m-2 position-absolute top-0 end-0" data-bs-theme="dark"
          data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body mt-5 fs-6">
        <!-- message. -->
      </div>
      <div class="d-flex justify-content-end">
        <a href="/wishlist" type="button" class="btn btn-light m-2">View Wishlist</a>
      </div>
    </div>

  </div>
</div>

<script type="module">

  const productId = document.querySelector('#productId').value;

  const quantityInput = document.querySelector('#quantity');
  const quantityPrice = document.querySelector('#quantityPrice');
  const cartSubmit = document.querySelector('#cartSubmit');
  const wishlistSubmit = document.querySelector('#wishlistSubmit');

  quantityInput.addEventListener('change', () => {
    let basePrice = Number(document.querySelector('#basePrice').textContent);
    let quantity = Number(quantityInput.value);

    quantityPrice.textContent = (basePrice * quantity).toFixed(2);

  }, true);

  cartSubmit.addEventListener('click', () => {
    let quantity = Number(quantityInput.value);

    let data = {
      quantity: quantity,
      product_id: productId,
      cart: true
    };

    fetch('/product', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const successToast = document.querySelector('#cartSuccessToast');
          const toast = bootstrap.Toast.getOrCreateInstance(successToast);
          toast.show();
        } else {
          const errorToast = document.querySelector('#cartErrorToast');
          const toast = bootstrap.Toast.getOrCreateInstance(errorToast);
          toast.show();
        }
      })
      .catch(error => console.error('Error:', error));

  }, true);


  wishlistSubmit.addEventListener('click', () => {

    let data = {
      product_id: productId,
      wishlist: true
    };

    fetch('/product', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const successToast = document.querySelector('#wishlistSuccessToast');
          const toastMsg = successToast.querySelector('.toast-body');
          const toast = bootstrap.Toast.getOrCreateInstance(successToast);
          console.log(data.message);
          toastMsg.textContent = data.message;
          toast.show();
        } else {
          const errorToast = document.querySelector('#wishlistErrorToast');
          const toastMsg = errorToast.querySelector('.toast-body');
          const toast = bootstrap.Toast.getOrCreateInstance(errorToast);
          console.log(data.message);

          toastMsg.textContent = data.message;
          toast.show();
        }
      })
      .catch(error => console.error('Error:', error));

  }, true);


</script>