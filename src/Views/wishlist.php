<?php if (!isset($_SESSION['user_id'])): ?>

  <main class="container mt-5 d-flex flex-column justify-content-center align-items-center extend-vh">
    <h1>Log in to create your wishlist</h1>
    <p>Join us now and begin your shopping adventure!</p>
    <a href="/login" class="btn btn-primary">Login</a>
  </main>

<?php elseif (empty($items)): ?>

  <main class="container mt-5 d-flex flex-column justify-content-center align-items-center extend-vh">
    <h1>Your wishlist is empty</h1>
    <p>Start browsing now and begin your shopping adventure!</p>
    <a href="/" class="btn btn-primary">Start Shopping</a>
  </main>

<?php else: ?>

  <main class="container mt-5 extend-vh">

    <h1>My Wishlist</h1>
    <p class="lead text-secondary" id="cartTotalQuantity">Wishlist (<?= count($items) ?> items)</p>

    <div class="d-flex flex-column flex-lg-row align-items-lg-start gap-5">

      <table class="table table-striped table-responsive">

        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col" class="text-end">Price</th>
          </tr>
        </thead>

        <tbody class="table-group-divider">

          <?php foreach ($items as $item): ?>
            <tr>
              <td scope="col">
                <div class="d-flex align-items-center gap-2">
                  <a href="/product?id=<?= $item['product_id'] ?>"
                    class="d-flex gap-2 link-underline link-underline-opacity-0 link-body-emphasis">
                    <img class="img-thumbnail" src="https://placehold.co/40x40/fffbcf/d4a900?text=Product" alt="Title" />
                    <p class="mt-2"><?= $item['name'] ?></p>
                  </a>
                </div>
              </td>
              <td class="text-end align-middle">
                <span class="price"><?= number_format((float) $item['new_price'], 2) ?></span> <span>BHD</span>
              </td>
              <td class="text-end align-middle">
                <div class="dropdown">
                  <button type="button" class="btn border-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
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
                      <strong>"<?= $item['name'] ?>"</strong>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to remove <strong>"<?= $item['name'] ?>"</strong> from your wishlist?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form>
                      <button class="btn btn-danger removeItemBtn" type="button"">
                      <i class=" bi bi-trash"></i>
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

    </div>


  </main>


  <script type="module">

    const idList = document.querySelectorAll('.product_id');
    const removeItemBtnList = document.querySelectorAll('.removeItemBtn');

    for (let i = 0; i < idList.length; i++) {

      removeItemBtnList[i].addEventListener('click', (event) => {
        let productId = idList[i].value;

        let data = {
          product_id: productId,
          action: 'remove'
        };

        // Send the request to remove the item from wishlist
        fetch('/wishlist', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
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