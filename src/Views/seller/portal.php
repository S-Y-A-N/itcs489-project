<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Portal</title>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"
    defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"
    defer></script>

  <!-- Bootstarp Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- International Telephone Input -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css">
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>
  <script src="/js/form-validation.js" type="module" defer></script>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="container mt-5 extend-vh">
    <div class="w-100">

      <!-- Header -->
      <div>
        <h1 class="mb-1"><i class="bi bi-shop-window me-2"></i>Seller Portal</h1>
        <p class="mb-2">Login or join us today to sell your products on Cheapy!</p>
      </div>

      <!-- Login/Register Tabs -->
      <ul class="nav nav-tabs nav-justified mt-4 px-3" id="portalTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTabPane"
            type="button" role="tab" aria-controls="loginTabPane" aria-selected="true">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerTabPane"
            type="button" role="tab" aria-controls="registerTabPane" aria-selected="false">
            <i class="bi bi-person-plus me-1"></i> Register
          </button>
        </li>
      </ul>


      <!-- Login -->
      <div class="tab-content p-4" id="portalTabContent">
        <div class="tab-pane fade show active" id="loginTabPane" role="tabpanel" aria-labelledby="login-tab"
          tabindex="0">

          <div class="text-center mb-3">
            <h2 class="mt-2">Login</h2>

            <p class="text-info-emphasis"><?= $errors['message'] ?? "" ?></p>
            <p class="text-danger-emphasis"><?= $errors['email'] ?? "" ?></p>
            <p class="text-danger-emphasis"><?= $errors['password'] ?? "" ?></p>
          </div>
          <form action="/seller-portal" method="POST">
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="loginEmail" name="email" required>
            </div>
            <div class="mb-5">
              <label for="loginPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          </form>
        </div>

        <!-- Register -->
        <div class="tab-pane fade" id="registerTabPane" role="tabpanel" aria-labelledby="register-tab" tabindex="0">

          <div class="text-center mb-3">
            <h2 class="mt-2">Register</h2>
          </div>

          <form action="/seller-portal" method="POST" autocomplete="off" class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="registerBrand" class="form-label">Brand Name</label>
              <input type="text" class="form-control" id="registerBrand" name="brand_name"
                placeholder="Your business's brand name" required>
              <div class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Business email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback"></div>

            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Business Contact Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" required placeholder="" required>
              <div class="invalid-feedback"></div>

            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder=""
                autocomplete="new-password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W]).{8,40}"
                title="Capital letter, small letter, number, special character. At least 8 characters." minlength="8"
                maxlength="40" required>
              <div class="invalid-feedback"></div>

            </div>

            <div class="mb-5">
              <label for="password2">Confirm Password</label>
              <input type="password" minlength="8" maxlength="40" name="password2" class="form-control" id="password2"
                placeholder="" aria-describedby="passwordHelp" required>
              <div class="invalid-feedback"></div>
              <div id="passwordHelp" class="form-text">
                Your password must be 8-40 characters long, and include at least one uppercase letter, lowercase letter,
                number, and special character.
              </div>
            </div>


            <button type="submit" name="register" class="btn btn-success w-100">Register</button>
          </form>
        </div>
      </div>
      <div class="text-center mt-5">
        <a href="/" class="btn btn-link link-body-emphasis fw-bold link-underline-opacity-0"><i
            class="bi bi-arrow-left me-2"></i> Back to Main Website</a>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>