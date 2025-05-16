'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
const forms = document.querySelectorAll('.needs-validation');

// Loop over them and prevent submission
Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add('was-validated')
  });
});

// Input fields
const fnameInput = document.querySelector("#fname");
const fnameFeedback = document.querySelector("#fname ~ .invalid-feedback");

const lnameInput = document.querySelector("#lname");
const lnameFeedback = document.querySelector("#lname ~ .invalid-feedback");


const phoneInput = document.querySelector("[type=tel]");
const phoneFeedback = document.querySelector("#phone ~ .invalid-feedback");

const emailInput = document.querySelector("#email");
const emailFeedback = document.querySelector("#email ~ .invalid-feedback");

const pwInput1 = document.querySelector("#password");
const pwFeedback1 = document.querySelector("#password ~ .invalid-feedback");

const pwInput2 = document.querySelector("#password2");
const pwFeedback2 = document.querySelector("#password2 ~ .invalid-feedback");

// Submit button
const submitBtn = document.querySelector("[type=submit]");

// Events
if (emailInput) {
  emailInput.addEventListener("input", (event) => {
    if (emailInput.validity.valueMissing) {
      emailFeedback.textContent = "Please enter your email address";
    }

    else if (emailInput.validity.typeMismatch) {
      emailFeedback.textContent = "Please enter a valid email address";
    }

    else {
      emailFeedback.textContent = "";
    }
  });
}

if (fnameInput) {
  fnameInput.addEventListener("input", (event) => {
    if (fnameInput.validity.valueMissing) {
      fnameFeedback.textContent = "Please enter your first name";
    }

    else if (fnameInput.validity.patternMismatch) {
      fnameFeedback.textContent = "Please enter a valid name";
    }

    else {
      fnameFeedback.textContent = "";
    }
  });
}

if (lnameInput) {
  lnameInput.addEventListener("input", (event) => {
    if (lnameInput.validity.valueMissing) {
      lnameFeedback.textContent = "Please enter your last name";
    }

    else if (lnameInput.validity.patternMismatch) {
      lnameFeedback.textContent = "Please enter a valid name";
    }

    else {
      lnameFeedback.textContent = "";
    }
  });
}

// Passoword
if (pwInput1 && pwInput2) {
  pwInput1.addEventListener("input", (event) => {
    if (pwInput1.validity.valueMissing) {
      pwFeedback1.textContent = "Please enter a password";
    }

    else if (pwInput1.validity.tooShort) {
      pwFeedback1.textContent = "Your password must be at least 8 characters long";

    }

    else if (! /[A-Z]/.test(pwInput1.value)) {
      pwFeedback1.textContent = "Your password must contain at least 1 uppercase character";
      pwInput1.setCustomValidity('Password Must Contain a Uppercase Character.');
    }

    else if (! /[a-z]/.test(pwInput1.value)) {
      pwFeedback1.textContent = "Your password must contain at least 1 lowercase character";
      pwInput1.setCustomValidity('Password Must Contain a Lowercase Character.');
    }

    else if (! /[0-9]/.test(pwInput1.value)) {
      pwFeedback1.textContent = "Your password must contain at least 1 digit";
      pwInput1.setCustomValidity('Password Must Contain a Number.');
    }

    else if (! /[\W]/.test(pwInput1.value)) {
      pwFeedback1.textContent = "Your password must contain at least 1 special character";
      pwInput1.setCustomValidity('Password Must Contain a Special Character.');
    }

    // Valid password
    else {
      pwFeedback1.textContent = "";
      pwInput1.setCustomValidity('');
    }

    // To ensure password matching
    if (!passwordMatch(pwInput1.value, pwInput2.value)) {
      pwFeedback2.textContent = "Passwords do not match";
      pwInput2.setCustomValidity('Password Must be Matching.');
    } else {
      pwFeedback2.textContent = "";
      pwInput2.setCustomValidity('');
    }
  });

  // Confirm Password 
  pwInput2.addEventListener("input", (event) => {
    if (pwInput2.validity.valueMissing) {
      pwFeedback2.textContent = "Please confirm your password";
    }

    else if (!passwordMatch(pwInput1.value, pwInput2.value)) {
      pwFeedback2.textContent = "Passwords do not match";
      pwInput2.setCustomValidity('Password Must be Matching.');
    }

    else {
      pwFeedback2.textContent = "";
      pwInput2.setCustomValidity('');
    }
  });
}

// Validation Functions
function passwordMatch(p1, p2) {
  return p1 === p2;
}


// Phone Numbers
// intl-tel-input: Adds country code selector for every phone input field
if (phoneInput) {
  const iti = window.intlTelInput(phoneInput, {
    initialCountry: "auto",
    separateDialCode: true,
    strictMode: true,
    hiddenInput: (telInputName) => ({
      phone: "phone",
    }),
    geoIpLookup: callback => {
      fetch("https://ipapi.co/json")
        .then(res => res.json())
        .then(data => callback(data.country_code))
        .catch(() => callback("bh"));
    },
    loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
  });
  
  phoneInput.addEventListener('input', (event) => {
    if (phoneInput.validity.valueMissing) {
      phoneFeedback.textContent = "Please enter your phone number";
    }
  
    else if (!iti.isValidNumber()) {
      phoneFeedback.textContent = "Please enter a valid phone number";
      phoneInput.setCustomValidity('Invalid Phone Number.');
    }
  
    else {
      phoneFeedback.textContent = "";
      phoneInput.setCustomValidity('');
    }
  });
}