<br>
<br>
<br>
<hr>
<div class="container mt-5">
    <footer>
        <div class="d-flex flex-wrap justify-content-between gap-2 gap-xl-5">
            <div>
                <p class="m-0 fw-bold">
                    Need Help?
                </p>
                <p>
                    <a href="/contact" class="fw-bold">Reach out to us</a> on any of our support channels
                </p>
            </div>
            <!-- Conatct icon links -->
            <div class="d-flex flex-wrap gap-4 gap-xl-5">
                <div class="d-flex align-items-center justify-content-center gap-2 position-relative">
                    <i class="bi bi-chat-left-text-fill h1 mt-2"></i>
                    <div class="d-flex flex-column m-0 p-0">
                        <p class="m-0 fw-bold">Feedback</p>
                        <p class="m-0">Send us suggestions</p>
                    </div>
                    <a href="/contact" class="stretched-link"></a>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-2 position-relative">
                    <i class="bi bi-telephone-fill h1 mt-2"></i>
                    <div class="d-flex flex-column m-0 p-0">
                        <p class="m-0 fw-bold">Get in Touch</p>
                        <p class="m-0">+973 1000 1000</p>
                    </div>
                    <a href="tel:+973 1000 1000" class="stretched-link"></a>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-2 position-relative">
                    <i class="bi bi-envelope-fill h1 mt-2"></i>
                    <div class="d-flex flex-column m-0 p-0">
                        <p class="m-0 fw-bold">Email us</p>
                        <p class="m-0">support@cheapy.com</p>
                    </div>
                    <a href="mailto:support@cheapy.com" class="stretched-link"></a>
                </div>
            </div>
        </div>

        <br>
        <hr>

        <div class="row mt-5 flex-wrap">
            <div class="col mb-3">
                <h6>Helpful Links</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="/faq" class="nav-link p-0 text-body-secondary">FAQ</a></li>
                    <li class="nav-item mb-2"><a href="/return-policy" class="nav-link p-0 text-body-secondary">Return Policy</a></li>
                    <li class="nav-item mb-2"><a href="/sellers" class="nav-link p-0 text-body-secondary">Sellers</a></li>
                    <li class="nav-item mb-2"><a href="/sell-with-us" class="nav-link p-0 text-body-secondary">Sell With Us</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h6>Company</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="/about" class="nav-link p-0 text-body-secondary">About Us</a></li>
                    <li class="nav-item mb-2"><a href="/team" class="nav-link p-0 text-body-secondary">Our Team</a></li>
                    <li class="nav-item mb-2"><a href="/contact" class="nav-link p-0 text-body-secondary">Contact Us</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h6>Payment</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <img decoding="async" src="https://assets.norbr.io/image/logo/BenefitPay_colorbg.svg" width="60">
                    </li>
                    <li class="nav-item mb-2">
                        <img decoding="async" src="https://assets.norbr.io/image/logo/ApplePay_colorbg.svg" width="60">
                    </li>
                    <li class="nav-item mb-2">
                        <img decoding="async" src="https://static-00.iconduck.com/assets.00/mastercard-icon-2048x1286-s6y46dfh.png" width="60">
                    </li>
                    <li class="nav-item mb-2">
                        <img decoding="async" src="https://static-00.iconduck.com/assets.00/visa-icon-2048x1313-o6hi8q5l.png" width="60">
                    </li>
                </ul>
            </div>

            <div class="col mb-3">
                <h6>Social</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="https://github.com/S-Y-A-N/itcs489-project" class="nav-link p-0 text-body-secondary" title="Check out the project repository on GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="social-icon nav-link p-0 text-body-secondary">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class=" nav-link p-0 text-body-secondary">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class=" nav-link p-0 text-body-secondary">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class=" nav-link p-0 text-body-secondary">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-5 mb-3 mt-5">
                <form>
                    <h6>Subscribe to our newsletter</h6>
                    <p>Get product recommendations and stay updated.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="email" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
            </div>


        </div>


        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2 py-4 my-4 border-top">
            <div>
            <?php render('common/brand', ['font_size' => 6, 'logo_size' => 20]) ?>
            </div>
            <p class="m-0">Copyright © 2025 Cheapy - All Rights Reserved</p>
            <p class="text-secondary m-0"><a href="/terms-and-conditions" class="link-secondary">Terms and Conditionas</a> | <a href="/privacy-policy" class="link-secondary">Privacy Policy</a></p>

        </div>
    </footer>
</div>