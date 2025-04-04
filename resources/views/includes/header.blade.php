<header class="sticky-top">

  <nav>

    <!-- Top Nav -->
    <div class="p-3 text-center border-bottom bg-primary-subtle">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center gap-4">

          <!-- Logo -->
          <div>
            <a class="navbar-brand lead fs-4 d-flex gap-1 align-items-center" href="/">
              <img src="{{ asset('storage/logo.png') }}" alt="Logo" width="30" class="d-inline-block">
              Cheapy
            </a>
          </div>

          <!-- Search bar -->
          <div class="w-75">
            <div class="input-group">
              <span class="input-group-text bg-body border-end-0"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control border-start-0" aria-label="Amount (to the nearest dollar)">
              <button class="btn btn-outline-secondary bg-body" type="button" id="button-addon2"><i class="bi bi-camera-fill" aria-hidden="true"></i></button>

            </div>

          </div>

          <!-- Theme toggle -->
          <div>
            <button type="button" class="btn border-0" data-bs-toggle="button" id="theme-btn">
              <i class="bi" id="theme-icon"></i>
            </button>
          </div>
          

        </div>
      </div>
    </div>

    <!-- Bottom Nav -->
    <div class="p-3 text-center border-bottom bg-body-tertiary">
      <div class="container-fluid">
        <div class="row">
          Nav
        </div>
      </div>
    </div>

  </nav>

</header>