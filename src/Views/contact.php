<div class="container mt-5">
  <h1 class="mb-4">Contact Us</h1>

  <form>

    <div class="row g-2">
      <!-- first name -->
      <div class="col">
        <div class="form-floating">
          <input type="text" name="fname" class="form-control" id="fname" placeholder="John">
          <label for="fname">First Name *</label>
        </div>
      </div>

      <!-- last name -->
      <div class="col mb-2">
        <div class="form-floating">
          <input type="text" name="lname" class="form-control" id="lname" placeholder="Doe">
          <label for="lname">Last Name *</label>
        </div>
      </div>
    </div>

    <!-- email -->
    <div class="form-floating mb-2 col">
      <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com">
      <label for="email">Email Address *</label>
    </div>

    <div class="form-floating mb-2 col">
      <input type="phone" name="phone" class="form-control" id="phone" placeholder="+973 1000 1000">
      <label for="phone">Phone Number *</label>
    </div>

    <div class="form-floating mb-2">
      <select class="form-select" id="contactMethod">
        <option value="email">Email</option>
        <option value="phone">Phone Number</option>
      </select>
      <label for="contactMethod">Preferred Contact Method</label>
    </div>

    <div class="form-floating mb-2">
      <select class="form-select" id="contactReason">
        <option value="issue">Report an issue</option>
        <option value="suggest">Suggest an improvement</option>
        <option value="other">Other</option>
      </select>
      <label for="contactReason">Reason for Contact</label>
    </div>

    <div class="form-floating mb-2">
      <textarea class="form-control" placeholder="Write your message here" id="message"
        style="height: 100px"></textarea>
      <label for="floatingTextarea2">Message</label>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>

  </form>
</div>