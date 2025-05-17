<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal</title>
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
        <h1 class="mb-1"><i class="bi bi-person me-2"></i>Admin Portal</h1>
        <p class="mb-2">For Cheapy adminstartors only</p>
      </div>


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
          <form action="/admin-portal" method="POST">
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