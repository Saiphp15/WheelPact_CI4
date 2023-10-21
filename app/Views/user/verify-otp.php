<?php
/**
 * @var \CodeIgniter\View\View $this
 */
?>
<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<section class="section-spacing">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&quot;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb brand-breadcrumb">
                <li class="breadcrumb-item brand-breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item brand-breadcrumb-item active" aria-current="page">Verify OTP</li>
            </ol>
        </nav>
    </div>
</section>
<section class="section-spacing">
    <div class="container">
        <div class="modal-title text-center mb-3">
            <h5>OTP Verification</h5>
        </div>
        <div class="modal-notify">
            <p>Enter the OTP sent to your registered email inbox<span id="loginNumberShow"></span></p>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mx-auto">
                <form action="<?php echo base_url('api/customer/customer-login-verify-otp'); ?>" method="post" name="customer_login_verify_otp_form" id="customer_login_verify_otp_form" enctype="multipart/form-data">
                    <input type="hidden" name="contact_no" id="contact_no" value="<?php echo isset($contact_no)?$contact_no:''; ?>">
                    <div class="login-input mt-4">
                        <label class="brand-label mb-1">Enter OTP</label>
                        <input type="text" name="otp" id="otp" class="brand-input">
                    </div>
                    <div class="modal-otp-notify">
                        <p>Resend OTP in <span id="countdownTimer">30</span> seconds</p>
                    </div>
                    <div class="text-center mt-4 resend-otp-btn">
                        <a href="#" class="dg-brand-btn">Resend</a>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="dg-brand-btn" >Verify OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>