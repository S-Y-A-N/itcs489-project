<?php if (empty($cart_items)) : ?>

  <main class="container mt-5 d-flex flex-column justify-content-center align-items-center extend-vh">
  <h1>Your shopping cart is empty</h1>
  <p>Start browsing now and begin your shopping adventure!</p>
  <a href="/" class="btn btn-primary">Start Shopping</a>
</main>

<?php else : ?>

<main class="container mt-5 extend-vh">

  <h1>My Cart</h1>
  <p class="lead text-secondary" id="cartTotalQuantity">Cart (<?= $total_quantity ?> items)</p>

  <div class="d-flex flex-column flex-lg-row align-items-lg-start gap-5">

    <table class="table table-striped table-responsive">

      <thead>
        <tr>
          <th scope="col">Product</th>
          <th scope="col" class="text-end">Price</th>
          <th scope="col" class="text-end">Quantity</th>
          <th scope="col" class="text-end">Total</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">

        <?php foreach ($cart_items as $item): ?>
          <tr>
            <td scope="col">
              <div class="d-flex align-items-center gap-2">
                <a href="/product?id=<?= $item['product_id'] ?>"
                  class="d-flex gap-2 link-underline link-underline-opacity-0 link-body-emphasis">
                  <img class="img-thumbnail" src="https://placehold.co/40x40/fffbcf/d4a900?text=Product" alt="Title" />
                  <p class="mt-2"><?= $item['info']['name'] ?></p>
                </a>
              </div>
            </td>
            <td class="text-end align-middle">
              <span class="price"><?= number_format((float) $item['info']['new_price'], 2) ?></span> <span>BHD</span>
            </td>
            <td class="text-end align-middle">
              <form method="post" class="mb-0 ms-5">
                <input class="product_id" type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                <select name="quantity" class="quantity form-select w-100">
                  <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?= $i ?>" <?= $item['quantity'] === $i ? 'selected' : '' ?>><?= $i ?></option>
                  <?php endfor ?>
                </select>
              </form>
            </td>
            <td class="text-end align-middle">
              <span class="quantity_price"><?= $item['total_price'] ?></span> <span>BHD</span>
            </td>
            <td class="text-end align-middle">
              <div class="dropdown">
                <button type="button" class="btn border-0" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type="button">
                      <i class="bi bi-heart"></i>
                      <span class="ms-2">Add to Wishlist</span>
                    </button></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><button class="dropdown-item btn btn-danger" type="button" data-bs-toggle="modal"
                      data-bs-target="#removeModal">
                      <i class="bi bi-trash"></i>
                      <span class="ms-2">Remove</span>
                    </button></li>

                </ul>
              </div>
          </tr>

          <!-- Remove Item from Cart Modal -->
          <div class="modal fade" id="removeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Remove
                    <strong>"<?= $item['info']['name'] ?>"</strong>
                  </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to remove <strong>"<?= $item['info']['name'] ?>"</strong> from your cart?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <form>
                    <button class="btn btn-danger removeItemBtn" type="button"">
                      <i class="bi bi-trash"></i>
                      Remove
                    </button>
                    <input type="hidden" class="product_id" value="<?= $item['product_id'] ?>">
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </tbody>
    </table>

    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Cart Summary</h5>
        <div class="d-flex justify-content-between">
          <p>Total</p>
          <p class="card-text" id="cartTotalPrice"><?= $total_price ?> BHD</p>

        </div>
        <a href="/checkout" class="btn btn-primary w-100 mb-2">Procced to Checkout</a>
        <a href="/" class="btn btn-secondary w-100">Continue Shopping</a>
      </div>
    </div>

  </div>


</main>


<script type="module">

  const quantityList = document.querySelectorAll('.quantity');
  const quantityPriceList = document.querySelectorAll('.quantity_price');
  const priceList = document.querySelectorAll('.price');
  const idList = document.querySelectorAll('.product_id');
  const removeItemBtnList = document.querySelectorAll('.removeItemBtn');
  
  const cartTotalPrice = document.querySelector('#cartTotalPrice');
  const cartTotalQuantity = document.querySelector('#cartTotalQuantity');

  for (let i = 0; i < priceList.length; i++) {

    quantityList[i].addEventListener('change', (event) => {

      let quantity = Number(quantityList[i].value);
      let price = parseFloat(priceList[i].textContent);
      let productId = idList[i].value;

      // Update the item's total price dynamically
      quantityPriceList[i].textContent = (price * quantity).toFixed(2);

      let data = {
        quantity: quantity,
        product_id: productId,
        action: 'update'
      };

      // Send the updated quantity to the server
      fetch('/cart', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Update the total price and quantity dynamically
          cartTotalPrice.textContent = `${data.total_price} BHD`;
          cartTotalQuantity.textContent = `Cart (${data.total_quantity} items)`;
          console.log('Cart updated successfully:', data);
        } else {
          alert('Failed to update the cart. Please try again.');
        }
      })
      .catch(error => console.error('Error:', error));

    }, true);


    removeItemBtnList[i].addEventListener('click', (event) => {
      let productId = idList[i].value;

      let data = {
        product_id: productId,
        action: 'remove'
      };

      // Send the request to remove the item from the cart
      fetch('/cart', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Remove the item from the cart and update the total price and quantity
          cartTotalPrice.textContent = `${data.total_price} BHD`;
          cartTotalQuantity.textContent = `Cart (${data.total_quantity} items)`;
          location.reload();
        } else {
          alert('Failed to remove the item. Please try again.');
        }
      })
      .catch(error => console.error('Error:', error));

    }, true);


  }

</script>

<?php endif; ?>
