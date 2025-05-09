<div class="modal fade" id="bankCardModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="bankCardModalLabel">Card Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php render('forms/bank-card') ?>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" form="cardForm">Choose Card</button>
      </div>
    </div>
  </div>
</div>


<script>
  // For card form
  const cardForm = document.querySelector('#cardForm');

  cardForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    if (!formData.get('saveCard')) {
      event.stopPropagation();

      const cardBtns = document.querySelectorAll('.cardBtn');
      cardBtns.forEach((btn) => {
        btn.parentElement.classList.remove('text-info', 'border-info');
      });

      const selectedCardInfo = document.querySelector('#selectedCardInfo');
      selectedCardInfo.setAttribute('data-card', 'cookie');

      const card = Object.fromEntries(formData);
      selectedCardInfo.innerHTML = `
        <p>${card.card_number}</p>
      `;

      document.cookie = 'card=' + JSON.stringify(card);
      console.log(document.cookie)

      const cardModal = document.querySelector('#bankCardModal');
      const modal = bootstrap.Modal.getInstance(cardModal);
      modal.hide();

      return;
    }

    formData.append('action', 'add');

    // Send data to the server
    fetch('/bank-card', {
      method: 'POST',
      body: JSON.stringify(Object.fromEntries(formData)),
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          console.log('Card saved successfully with data: ', data);
          const cardModal = document.querySelector('#bankCardModal');
          const modal = bootstrap.Modal.getInstance(cardModal);
          modal.hide();
          location.reload();
        } else {
          console.error('Failed to save card: ', data);
        }
      })
      .catch(error => console.error('Error:', error));
  });
</script>