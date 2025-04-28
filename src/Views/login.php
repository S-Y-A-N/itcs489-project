<div class="container mt-5 d-flex justify-content-between align-items-lg-stretch gap-5 flex-column-reverse flex-lg-row">

  <div class="d-flex flex-column justify-content-between">
    <h1 class="mt-3">Login to your Cheapy account</h1>
    <p class="fs-3 lead">Don't have an account? Join us now to shop for cheap & high quality clothing, furniture, and
      more!</p>
    <a href="/register" class="btn btn-secondary" role="button">Create Account</a>
  </div>

  <hr>



  <div class="w-100">
    <button type="button" id="login-switch" class="btn btn-sm w-100">
      <i class="bi bi-phone me-2"></i>
      <span>Login with Phone</span>
    </button>

    <p class="text-info-emphasis"><?= $errors['message'] ?? "" ?></p>
    <p class="text-danger-emphasis"><?= $errors['email'] ?? "" ?></p>
    <p class="text-danger-emphasis"><?= $errors['password'] ?? "" ?></p>

    <form method="post" class="needs-validation mb-0" novalidate autocomplete="off">
      <!-- email -->
      <div class="form-floating mb-2 col">
        <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" required>
        <label for="email">Email Address</label>
        <div class="invalid-feedback"></div>
      </div>
      
      <!-- phone -->
      <div class="mb-2 col visually-hidden">
        <input type="tel" name="phone" class="form-control" id="phone" placeholder="" required>
        <div class="phone-feedback invalid-feedback" style="display: block"></div>
      </div>

      <!-- password -->
      <div class="form-floating mb-4 col">
        <input type="password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W]).{8,40}" minlength="8" maxlength="40"
          name="password" class="form-control" id="password" placeholder="" autocomplete="new-password" required>
        <label for="password">Password</label>
        <div class="invalid-feedback"></div>
        <p class="mt-2"><a href="/reset-password">I forgot my password</a></p>
      </div>
      <!-- agreement -->
      <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="agreeOnTerms" id="agreeOnTerms" required>
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
    email.parentElement.classList.toggle('visually-hidden');
    phone.parentElement.parentElement.classList.toggle('visually-hidden');


    // change text based on chosen icon
    if (loginSwitchIcon.classList.contains('bi-envelope')) {
      loginSwitchText.textContent = 'Login with Email';
    } else {
      loginSwitchText.textContent = 'Login with Phone';
    }
  });

</script>