<div class="container mt-5 d-flex justify-content-between align-items-lg-stretch gap-5 flex-column-reverse flex-lg-row">

  <div class="d-flex flex-column justify-content-between">
    <h1 class="mt-3">Login to your Cheapy account</h1>
    <p class="fs-3 lead">Don't have an account? Join us now to shop for cheap & high quality clothing, furniture, and
      more!</p>
    <a href="/register" class="btn btn-secondary" role="button">Create Account</a>
  </div>

  <hr>



  <div class="w-100">
    <p class="text-info-emphasis"><?= $errors['message'] ?? "" ?></p>
    <p class="text-danger-emphasis"><?= $errors['error'] ?? "" ?></p>

    <button type="button" id="login-switch" class="btn btn-sm w-100 mb-3">
      <i class="bi bi-phone me-2"></i>
      <span>Login with Phone</span>
    </button>

    <form method="post" class="mb-0">
      <!-- email -->
      <div class="form-floating mb-2 col">
        <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" required>
        <label for="email">Email Address</label>
        <div class="invalid-feedback"></div>
      </div>

      <!-- phone -->
      <div class="mb-2 col d-none">
        <input type="tel" class="form-control" id="phone" placeholder="">
        <div class="phone-feedback invalid-feedback" style="display: block"></div>
      </div>

      <!-- password -->
      <div class="form-floating mb-4 col">
        <input type="password" name="password" class="form-control" id="login-password" placeholder="" required>
        <label for="password">Password</label>
        <div class="invalid-feedback"></div>
        <p class="mt-2"><a href="/reset-password">I forgot my password</a></p>
      </div>

      <!-- keep login -->
      <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="keepLogin" id="keepLogin">
        <label class="form-check-label" for="agreeOnTerms">
          Keep me logged in
        </label>
        <div class="invalid-feedback"></div>
      </div>

      <button type="submit" name="login" id="login" class="btn btn-primary w-100">Login</button>

    </form>
  </div>
</div>


<script>

  const loginSwitch = document.querySelector('#login-switch');
  const loginSwitchIcon = document.querySelector('#login-switch > i');
  const loginSwitchText = document.querySelector('#login-switch > span');

  const email = document.querySelector('#email');
  const phone = document.querySelector('#phone');

  loginSwitch.addEventListener('click', () => {
    // toggle correct icon
    loginSwitchIcon.classList.toggle('bi-envelope');
    loginSwitchIcon.classList.toggle('bi-phone');
    email.parentElement.classList.toggle('d-none');
    phone.parentElement.parentElement.classList.toggle('d-none');
    email.toggleAttribute('required')
    phone.toggleAttribute('required')

    // change text based on chosen icon
    if (loginSwitchIcon.classList.contains('bi-envelope')) {
      loginSwitchText.textContent = 'Login with Email';
      phone.value = "";
    } else {
      loginSwitchText.textContent = 'Login with Phone';
      email.value = "";
    }
  });

</script>