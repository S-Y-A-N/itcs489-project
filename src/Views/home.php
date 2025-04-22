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

    <?php for ($i = 0; $i < 8; $i++): ?>
      <div class="col card p-0 flex-fill">
        <img class="card-img-top w-100" src="https://placehold.co/60x40/fffbcf/d4a900?text=Product" alt="Title" />
        <div class="card-body">
          <h6 class="card-title mb-4">Item Name</h6>
          <p class="card-subtitle"><s>BHD 99.99</s></p>
          <p class="card-subtitle lead">BHD 99.99</p>
          <p class="card-subtitle mt-2"><a href="">Brand Name</a></p>
          <a href="" class="stretched-link"></a>
        </div>
    </div>
    <?php endfor ?>

  </div>
  </div>


</main>
