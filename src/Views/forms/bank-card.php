<form class="row g-2" id="cardForm">

  <div class="col-12">
    <label for="inputCardNumber" class="form-label">Card Number</label>
    <input type="text" class="form-control" id="inputCardNumber" name="card_number" placeholder="XXXX XXXX XXXX XXXX" required>
  </div>

  <div class="col-md-6">
    <label for="inputExpiry" class="form-label">Expiry Date</label>
    <input type="text" class="form-control" id="inputExpiry" name="expiry_date" placeholder="MM/YY" required>
  </div>

  <div class="col-md-6">
    <label for="inputCvv" class="form-label">Security Code (CVV)</label>
    <input type="password" maxlength="3" class="form-control" id="inputCvv" name="cvv" placeholder="XXX" required>
  </div>

  <div class="col-12">
    <label for="inputName" class="form-label">Name on Card</label>
    <input type="text" class="form-control" id="inputName" name="card_name" placeholder="John Doe" required>
  </div>

  <div class="col-12 mt-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="saveCard" name="saveCard">
      <label class="form-check-label" for="saveCard">
        Save this card
      </label>
    </div>
  </div>

</form>

<script>
  const inputCardNumber = document.querySelector('#inputCardNumber');
  const inputExpiry = document.querySelector('#inputExpiry');
  const inputCvv = document.querySelector('#inputCvv');

  inputCardNumber.addEventListener('input', (event) => {
    const value = event.target.value.replace(/\D/g, '');

    if (value.length > 16) {
      event.target.value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12) + ' ' + value.slice(12, 16);
    } else if (value.length > 12) {
      event.target.value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8, 12) + ' ' + value.slice(12);
    } else if (value.length > 8) {
      event.target.value = value.slice(0, 4) + ' ' + value.slice(4, 8) + ' ' + value.slice(8);
    } else if (value.length > 4) {
      event.target.value = value.slice(0, 4) + ' ' + value.slice(4);
    } else {
      event.target.value = value;
    }
  });

  inputExpiry.addEventListener('input', (event) => {
    const value = event.target.value.replace(/\D/g, '');

    if (value.length > 4) {
      event.target.value = value.slice(0, 2) + '/' + value.slice(2, 4);
    } else if (value.length > 2) {
      event.target.value = value.slice(0, 2) + '/' + value.slice(2);
    } else {
      event.target.value = value;
    }
  });

  inputCvv.addEventListener('input', (event) => {
    const value = event.target.value.replace(/\D/g, '');
    event.target.value = value;
  });

</script>