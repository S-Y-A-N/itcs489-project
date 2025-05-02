<main class="container mt-5 mb-5 mb-lg-0 extend-vh">
  <h1 class="mb-3">Checkout</h1>

  <div class="d-flex flex-column flex-lg-row gap-5">
    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mt-1">Shipping Information</h5>
        </div>
        <div class="card-body">

          <div>
            <p class="text-secondary">You do not have any saved addresses</p>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addressModal">
              New Address
            </button>
          </div>

        </div>
      </div>


      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mt-1">Payment Information</h5>
        </div>
        <div class="card-body">
          <h6>Payment Mehtod</h6>
          <div class="d-flex flex-column gap-3 flex-md-row align-items-md-center gap-md-5">

            <div class="form-check">
              <input class="form-check-input" name="paymentRadio" type="radio" id="cardRadio">
              <label class="form-check-label" for="cardRadio">
                <i class="bi bi-credit-card me-1"></i>
                Credit/Debit Card
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" name="paymentRadio" type="radio" id="benefitRadio">
              <label class="form-check-label" for="benefitRadio">
                <i class="me-1"><b>B</b></i>
                BenefitPay
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" name="paymentRadio" type="radio" id="appleRadio">
              <label class="form-check-label" for="appleRadio">
                <i class="bi bi-apple me-1"></i>
                Apple Pay
              </label>
            </div>

          </div>

          <div id="cards" class="mt-3" hidden>
            <p class="text-secondary">You do not have any saved cards</p>
            <button type="button" id="cardBtn" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#bankCardModal">New Card</button>
          </div>

        </div>
      </div>
    </div>


    <div class="card col-lg-4">
      <div class="card-body">

        <div class="accordion" id="cartAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panel"
                aria-expanded="true" aria-controls="panel">
                My Order
              </button>
            </h2>
            <div id="panel" class="accordion-collapse collapse show">
              <div class="accordion-body">
                <?php foreach ($cart_items as $item): ?>
                  <div class="d-flex justify-content-between">
                    <p><?= $item['info']['name'] . " x" . $item['quantity'] ?></p>
                    <p class="card-text"><?= $item['total_price'] ?> BHD</p>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <hr>

        <div>
          <div class="d-flex justify-content-between">
            <p>Subtotal</p>
            <p class="card-text"><?= $total_price ?> BHD</p>
          </div>
          <div class="d-flex justify-content-between">
            <p>Shipping</p>
            <p class="card-text">2.00 BHD</p>
          </div>
          <div class="d-flex justify-content-between">
            <p>Tax</p>
            <p class="card-text"><?= $total_price * 0.1 ?> BHD</p>
          </div>
        </div>


        <hr>

        <div class="d-flex justify-content-between fw-bold">
          <p>Total</p>
          <p class="card-text" id="cartTotalPrice"><?= $total_price + $total_price * 0.1 + 2 ?> BHD</p>
        </div>
      </div>

      <div class="card-footer">
        <button type="button" class="btn btn-danger w-100">Proceed to Payment</button>
      </div>
    </div>


  </div>
</main>

<!-- Modals -->
<?php render('modals/address'); ?>
<?php render('modals/bank-card'); ?>


<script>
  const paymentRadio = document.querySelectorAll('[name=paymentRadio]');
  const cardRadio = document.querySelector('#cardRadio');
  const cards = document.querySelector('#cards');

  for (let i = 0; i < paymentRadio.length; i++) {
    paymentRadio[i].addEventListener('click', function () {
      if (cardRadio.checked) {
        cards.removeAttribute('hidden');
      } else {
        cards.setAttribute('hidden', true);
      }
    });
  }

</script>