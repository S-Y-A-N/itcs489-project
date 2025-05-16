<!-- Fake loading screen -->
<div id="loadingScreen" class="d-flex flex-column justify-content-center align-items-center extend-vh">
  <h2>Your payment is being processed</h2>
  <p>Do not leave or refresh this page</p>
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>




<script>
  setTimeout(() => {
    window.location.replace("/payment-success?paymentId=<?= $paymentId ?>&orderId=<?= $orderId ?>");
  }, 5000);
</script>