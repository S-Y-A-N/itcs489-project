<main class="container mt-5 mb-5 mb-lg-0 extend-vh">
  <h1 class="mb-3">Checkout</h1>

  <p class="text-danger" id="addressError"></p>
  <div class="d-flex flex-column flex-lg-row gap-5">
    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mt-1">Shipping Information</h5>
        </div>
        <div class="card-body">

          <div>
            <?php if (empty($addresses)): ?>
              <p class="text-secondary">You do not have any saved addresses</p>
            <?php else: ?>
              <h5>Saved Addresses</h5>
              <div class="grid address-grid gap-3 mb-3">
                <?php foreach ($addresses as $address): ?>

                  <div class="card text-secondary">
                    <div class="card-body">
                      <h5 class="card-title fs-6"><?= $address['address_title'] ?></h5>
                    </div>
                    <a href="/checkout" id="<?= $address['address_id'] ?>" class="addressBtn stretched-link"></a>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div id="selectedAddressInfo">

            </div>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
              data-bs-target="#addressModal">
              New Address
            </button>
          </div>

        </div>
      </div>

      <p class="text-danger" id="paymentError"></p>
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mt-1">Payment Information</h5>
        </div>
        <div class="card-body">
          <h6>Payment Mehtod</h6>
          <div class="d-flex flex-column gap-3 flex-md-row align-items-md-center gap-md-5">

            <div class="form-check">
              <input class="form-check-input" name="paymentRadio" type="radio" id="cardRadio" value="card">
              <label class="form-check-label" for="cardRadio">
                <i class="bi bi-credit-card me-1"></i>
                Credit/Debit Card
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" name="paymentRadio" type="radio" id="benefitRadio" value="benefitpay">
              <label class="form-check-label" for="benefitRadio">
                <i class="me-1"><b>B</b></i>
                BenefitPay
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" name="paymentRadio" type="radio" id="appleRadio" value="applepay">
              <label class="form-check-label" for="appleRadio">
                <i class="bi bi-apple me-1"></i>
                Apple Pay
              </label>
            </div>

          </div>

          <div id="cards" class="mt-3" hidden>

            <?php if (empty($cards)): ?>
              <p class="text-secondary">You do not have any saved cards</p>
            <?php else: ?>
              <h5>Saved Cards</h5>
              <div class="grid address-grid gap-3 mb-3">
                <?php foreach ($cards as $card): ?>

                  <div class="card text-secondary">
                    <div class="card-body">
                      <h5 class="card-title fs-6">
                        <?= substr_replace($card['card_number'], ' **** **** ', 4, 10) ?>
                      </h5>
                    </div>
                    <a href="/checkout" id="<?= $card['card_id'] ?>" class="cardBtn stretched-link"></a>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div id="selectedCardInfo">

            </div>

            <button type="button" id="cardBtn" class="btn btn-primary float-end" data-bs-toggle="modal"
              data-bs-target="#bankCardModal">New Card</button>
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
            <p class="card-text"><?= $subtotal ?> BHD</p>
          </div>
          <div class="d-flex justify-content-between">
            <p>Shipping</p>
            <p class="card-text"><?= $delivery_cost ?> BHD</p>
          </div>
          <div class="d-flex justify-content-between">
            <p>Tax</p>
            <p class="card-text"><?= $subtotal * $tax_rate ?> BHD</p>
          </div>
        </div>


        <hr>

        <div class="d-flex justify-content-between fw-bold">
          <p>Total</p>
          <p class="card-text" id="cartTotalPrice"><?= $total_price ?> BHD</p>
        </div>
      </div>

      <div class="card-footer">
        <form id="payForm" method="POST" action="/payment-gateway">
          <input type="hidden" name="addressId" value="">
          <input type="hidden" name="paymentMethod" value="">
          <input type="hidden" name="amount" value="<?= $total_price ?>">
          <button type="submit" name="pay" class="btn btn-danger w-100" id="payBtn">
            Proceed to Payment
          </button>
        </form>
      </div>
    </div>


  </div>
</main>

<!-- Modals -->
<?php render('modals/address'); ?>
<?php render('modals/bank-card'); ?>


<script>
  const paymentRadio = document.querySelectorAll('input[name="paymentRadio"]');
  const cardRadio = document.querySelector('#cardRadio');
  const cards = document.querySelector('#cards');
  let paymentChoice;

  for (let i = 0; i < paymentRadio.length; i++) {
    paymentRadio[i].addEventListener('click', function () {
      paymentError.textContent = '';
      paymentChoice = paymentRadio[i].value;
      if (cardRadio.checked) {
        cards.removeAttribute('hidden');
      } else {
        cards.setAttribute('hidden', true);
      }
    });
  }


  // For choosing address from the list
  const addressBtns = document.querySelectorAll('.addressBtn');
  const selectedAddressInfo = document.querySelector('#selectedAddressInfo');
  let addressId = -1, cardId = -1;
  addressBtns.forEach((btn) => {

    btn.addEventListener('click', (e) => {
      e.preventDefault();

      addressError.textContent = '';

      addressId = e.target.id;
      console.log('Address ID:', addressId);

      addressBtns.forEach((btn) => {
        btn.parentElement.classList.remove('text-info', 'border-info');
      });

      fetch('/address', {
        method: 'POST',
        body: JSON.stringify({ action: 'get', addressId: addressId }),
        headers: {
          'Content-Type': 'application/json'
        }
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            btn.parentElement.classList.add('text-info');
            btn.parentElement.classList.add('border-info');
            selectedAddressInfo.setAttribute('data-address', addressId);
            selectedAddressInfo.innerHTML = `
              <h5>${data.address.address_title}</h5>
              <p>${data.address.address}</p>
              <p>${data.address.address2}</p>
              <p>${data.address.city}, ${data.address.country}</p>
              <p>Postal Code: ${data.address.postal}</p>
            `;
          } else {
            console.error('Failed to fetch address details');
          }
        })
        .catch(error => console.error('Error:', error));
    });
  });


  // For choosing card from the list
  const cardBtns = document.querySelectorAll('.cardBtn');
  const selectedCardInfo = document.querySelector('#selectedCardInfo');
  cardBtns.forEach((btn) => {

    btn.addEventListener('click', (e) => {
      e.preventDefault();

      paymentError.textContent = '';

      cardId = e.target.id;
      console.log('Card ID:', cardId);

      cardBtns.forEach((btn) => {
        btn.parentElement.classList.remove('text-info', 'border-info');
      });

      fetch('/bank-card', {
        method: 'POST',
        body: JSON.stringify({ action: 'get', cardId: cardId }),
        headers: {
          'Content-Type': 'application/json'
        }
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            btn.parentElement.classList.add('text-info');
            btn.parentElement.classList.add('border-info');
            selectedCardInfo.setAttribute('data-card', cardId);
          } else {
            console.error('Failed to fetch card details');
          }
        })
        .catch(error => console.error('Error:', error));
    });
  });

  const addressError = document.querySelector('#addressError');
  const paymentError = document.querySelector('#paymentError');
  const payBtn = document.querySelector('#payBtn');
  payBtn.addEventListener('click', (e) => {

    console.log('Address ID:', addressId);
    console.log('Card ID:', cardId);

    if (paymentChoice === undefined) {
      e.preventDefault();
      paymentError.textContent = 'Please choose a payment method';
    } else if (paymentChoice === 'card' && cardId === -1) {
      e.preventDefault();
      paymentError.textContent = 'Please add or select an existing card';
    } else {
      document.querySelector('#payForm > input[name="paymentMethod"]').value = paymentChoice;
    }

    if (addressId === -1) {
      e.preventDefault();
      addressError.textContent = 'Please add or select an existing address';
    } else {
      document.querySelector('#payForm > input[name="addressId"]').value = addressId;
    }
  });

</script>