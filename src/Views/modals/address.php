<div class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addressModalLabel">Shipping Address</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php render('forms/address') ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"form="addressForm">Choose Address</button>
      </div>
    </div>
  </div>
</div>


<script>
  // For address form
  const addressForm = document.querySelector('#addressForm');

  addressForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    if (!formData.get('saveAddress')) {
      event.stopPropagation();

      const addressBtns = document.querySelectorAll('.addressBtn');
      addressBtns.forEach((btn) => {
        btn.parentElement.classList.remove('text-info', 'border-info');
      });

      const selectedAddressInfo = document.querySelector('#selectedAddressInfo');
      selectedAddressInfo.setAttribute('data-address', 'cookie');

      const address = Object.fromEntries(formData);
      selectedAddressInfo.innerHTML = `
        <p>${address.address}</p>
        <p>${address.address2}</p>
        <p>${address.city}, ${address.country}</p>
        <p>Postal Code: ${address.postal}</p>
      `;

      document.cookie = 'address=' + JSON.stringify(address);
      console.log(document.cookie)

      const addressModal = document.querySelector('#addressModal');
      const modal = bootstrap.Modal.getInstance(addressModal); 
      modal.hide();

      return;
    }

    formData.append('action', 'add');

    // Send data to the server
    fetch('/address', {
      method: 'POST',
      body: JSON.stringify(Object.fromEntries(formData)),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          console.log('Address saved successfully with data: ', data);
          const addressModal = document.querySelector('#addressModal');
          const modal = bootstrap.Modal.getInstance(addressModal); 
          modal.hide();
          location.reload();
        } else {
          console.error('Failed to save address: ', data);
        }
      })
      .catch(error => console.error('Error:', error));
  });

</script>