<form class="row g-2" id="addressForm">

  <!-- <div class="col-md-6">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="John" required>
    <div class="invalid-feedback"></div>
  </div>

  <div class="col-md-6">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Doe" required>
    <div class="invalid-feedback"></div>
  </div> -->

  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Block 123, Street 456, Building 789" required>
    <div class="invalid-feedback"></div>
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartment, studio, or floor (optional)">
    <div class="invalid-feedback"></div>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Manama" required>
    <div class="invalid-feedback"></div>
  </div>
  <div class="col-md-4">
    <label for="inputCountry" class="form-label">Country</label>
    <input type="text" class="form-control" id="inputCountry" name="country" placeholder="Bahrain" value="Bahrain" readonly>
    <div class="invalid-feedback"></div>
  </div>
  <div class="col-md-4">
    <label for="inputPostal" class="form-label">Postal Code</label>
    <input type="text" class="form-control" id="inptutPostal" name="postal" placeholder="123" required>
    <div class="invalid-feedback"></div>
  </div>
  
  <div class="col-12 mt-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="saveAddress" id="saveAddress">
      <label class="form-check-label" for="saveAddress">
        Save this address
      </label>
    </div>
  </div>
  <div>
    <input type="hidden" class="form-control" id="addressTitle" name="addressTitle" placeholder="Adress Title (e.g. Home)">
    <div class="invalid-feedback"></div>
  </div>
</form>



<script>
  // For save address checkbox
  const saveAddress = document.querySelector('#saveAddress');
  const addressTitle = document.querySelector('#addressTitle');
  saveAddress.addEventListener('change', (event) => {
    if (event.target.checked) {
      addressTitle.setAttribute('type', 'text');
      addressTitle.required = true;
    } else {
      addressTitle.setAttribute('type', 'hidden');
      addressTitle.required = false;
      addressTitle.value = '';
    }
  });
</script>