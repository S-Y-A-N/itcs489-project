<div class="container mt-5 extend-vh">
  <h1 class="mb-4">Register</h1>

  <p class="text-info-emphasis"><?= $errors['message'] ?? "" ?></p>
  <p class="text-danger-emphasis"><?= $errors['email'] ?? "" ?></p>
  <p class="text-danger-emphasis"><?= $errors['password'] ?? "" ?></p>
  <p class="text-danger-emphasis"><?= $errors['terms'] ?? "" ?></p>

  <form method="post" class="needs-validation" novalidate autocomplete="off">

    <div class="row g-2">
      <!-- first name (1-25 char long) -->
      <div class="col">
        <div class="form-floating">
          <input type="text" pattern="[\p{L}\-]+" name="fname" class="form-control" id="fname" placeholder="John"
            maxlength=25 required>
          <label for="fname">First Name</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>

      <!-- last name (1-25 char long) -->
      <div class="col mb-2">
        <div class="form-floating">
          <input type="text" pattern="[\p{L}\-]+" name="lname" class="form-control" id="lname" placeholder="Doe"
            maxlength=25 required>
          <label for="lname">Last Name</label>
          <div class="invalid-feedback"></div>
        </div>
      </div>
    </div>

    <!-- phone (validate with intl-tel-input) -->
    <div class="mb-2 col">
      <input type="tel" name="phone" class="form-control" id="phone" placeholder="" required>
      <div class="phone-feedback invalid-feedback" style="display: block"></div>
    </div>

    <!-- email -->
    <div class="form-floating mb-2 col">
      <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" required>
      <label for="email">Email Address</label>
      <div class="invalid-feedback"></div>
    </div>

    <!-- password -->
    <div class="form-floating mb-2 col">
      <input type="password" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W]).{8,40}" minlength="8" maxlength="40"
        name="password" class="form-control" id="password" placeholder="" autocomplete="new-password" required>
      <label for="password">Password</label>
      <div class="invalid-feedback"></div>
    </div>

    <!-- password2 -->
    <div class="form-floating mb-5 col">
      <input type="password" minlength="8" maxlength="40" name="password2" class="form-control" id="password2"
        placeholder="" aria-describedby="passwordHelp" required>
      <label for="password2">Confirm Password</label>
      <div class="invalid-feedback"></div>
      <div id="passwordHelp" class="form-text">
        Your password must be 8-40 characters long, and include at least one uppercase letter, lowercase letter, number,
        and special character
      </div>
    </div>


    <!-- agreement -->
    <div class="form-check mb-5">
      <input class="form-check-input" type="checkbox" name="agreeOnTerms" id="agreeOnTerms" required>
      <label class="form-check-label" for="agreeOnTerms">
        I agree to the <a href="/terms-and-conditions">terms and condtions</a>
      </label>
      <div class="invalid-feedback"></div>
    </div>


    <button type="submit" name="register" id="register" class="btn btn-primary">Register</button>
    <span class="ms-3">Already have an account? <a href="/login">Login</a></span>

  </form>

</div>