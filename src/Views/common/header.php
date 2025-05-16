<header class="sticky-top">

  <nav>

    <!------------------ Top Nav ------------------>
    <div class="p-3 text-center border-bottom bg-primary-subtle">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center gap-4">

          <!-- Logo -->
          <div>
            <?php render('common/brand', ['font_size' => 4, 'logo_size' => 30]) ?>
          </div>

          <!-- Search bar -->
          <div class="w-75">
            <form role="search" method="get" action="/products" class="mb-0">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for any product" name="search">
                <button class="btn btn-primary" type="submit" id="search-btn"><i
                    class="bi bi-search"></i></button>
              </div>
            </form>
          </div>

          <!-- Theme toggle -->
          <div class="d-flex align-items-center">
            <div>
              <button type="button" class="btn border-0" data-bs-toggle="button" id="theme-btn">
                <i class="bi" id="theme-icon"></i>
              </button>
            </div>

            <!-- Login & Register -->
            <?php if (isset($_SESSION['user_id'])): ?>
              <div class="btn-group" role="group">
                <a href="/logout" type="button" class="btn btn-outline-primary">Logout</a>
              </div>
            <?php else: ?>
              <div class="btn-group" role="group">
                <a href="/login" type="button" class="btn btn-outline-primary">Login</a>
                <a href="/register" type="button" class="btn btn-outline-primary">Register</a>
              </div>
            <?php endif; ?>
          </div>


        </div>
      </div>
    </div>

    <!------------------ Bottom Nav ------------------>
    <div class="p-3 text-center border-bottom bg-body-tertiary">

      <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
          <!-- Shop by Categories -->
          <div
            class="categories-nav container-fluid align-items-center justify-content-between gap-3 position-relative m-0 p-0">

            <!-- 1- Categories button -->
            <div class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
              <div class="d-flex justify-content-center align-items-center gap-1">
                <i class="bi bi-list h2 m-0"></i>
                <p class="m-0">Shop by Categories</p>
              </div>
              <button class="visually-hidden btn-link stretched-link"></button>
            </div>
          </div>
          <!-- 2- Categories menu -->
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Categories</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

              <div>
                <form class="d-flex mt-3 mb-3" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search for category" aria-label="Search">
                  <button class="btn btn-outline" type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>

              <div class="list-group">
                <a href="products" class="list-group-item list-group-item-action">All</a>
                <a href="electronics" class="list-group-item list-group-item-action">Electronics</a>
                <a href="women" class="list-group-item list-group-item-action">Women Fashion</a>
                <a href="men" class="list-group-item list-group-item-action">Men Fashion</a>
                <a href="babies" class="list-group-item list-group-item-action">Babies & Infants</a>
                <a href="girls" class="list-group-item list-group-item-action">Girls Fashion</a>
                <a href="boys" class="list-group-item list-group-item-action">Boys Fashion</a>
                <a href="furniture" class="list-group-item list-group-item-action">Home & Furniture</a>
              </div>

            </div>
          </div>


          <!-- Links (Offers, Brands...) -->
          <div>
            <ul class="nav d-flex justify-content-center">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/offers">Offers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/brands">Brands</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/membership">Cheapy Member</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">User Service</a>
              </li>
            </ul>
          </div>

          <!-- Icon Links (Profile, Wishlist...) -->
          <div class="d-flex gap-3 h4 m-0">
            <a href="/profile"><i class="bi bi-person-fill"></i></a>
            <a href="/wishlist"><i class="bi bi-bookmark-heart-fill"></i></a>
            <a href="/cart"><i class="bi bi-cart-fill"></i></a>
          </div>
        </div>
      </div>
    </div>

    </div>

  </nav>

</header>