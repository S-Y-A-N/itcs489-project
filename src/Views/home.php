<main>

  <!-- Promotional Content Carousel -->
  <div id="ads" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
      <button data-bs-target="#ads" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button data-bs-target="#ads" data-bs-slide-to="1"></button>
      <button data-bs-target="#ads" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img src="https://placehold.co/800x200/fffbcf/d4a900?text=Promotional\nContent+%231" class="w-100 d-block"
          alt="First slide" />
      </div>
      <div class="carousel-item">
        <img src="https://placehold.co/800x200/fffbcf/d4a900?text=Promotional\nContent+%232" class="w-100 d-block"
          alt="Second slide" />
      </div>
      <div class="carousel-item">
        <img src="https://placehold.co/800x200/fffbcf/d4a900?text=Promotional\nContent+%233" class="w-100 d-block"
          alt="Third slide" />
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#ads" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#ads" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>

  <br>

  <!-- Products -->
  <div class="container">
    <div class="grid gap-2">

      <?php foreach ($products as $p) : ?>
        <?php render('common/product_card', [
          'product_id' => $p['product_id'],
          'product_name' => $p['name'],
          'old_price' => $p['price'],
          'new_price' => $p['new_price'],
          'offer' => $p['offer'],
          'brand_name' => $p['brand_name'],
        ]); ?>
      <?php endforeach; ?>

    </div>
  </div>


</main>