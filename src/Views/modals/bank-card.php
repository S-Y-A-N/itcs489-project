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
        <button type="button" class="btn btn-primary">Choose Address</button>
      </div>
    </div>
  </div>
</div>