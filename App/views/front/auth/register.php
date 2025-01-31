<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 mx-auto">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body">
                                <div class="app-brand justify-content-center">
                                    <a href="<?=Urls::authRegister()?>" class="app-brand-link gap-2 mb-3">
                                        <span class="app-brand-text demo text-heading fw-bold">Register</span>
                                    </a>
                                </div>
                                <p class="mb-6">Register your account and start the adventure</p>
                                <form id="registerForm" class="mb-6" action="<?= Urls::authRegisterStore() ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-6">
                                                <label for="first_name" class="form-label">First Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" data-field-name="First Name" autofocus="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-6">
                                                <label for="last_name" class="form-label">Last Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" data-field-name="Last Name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" data-field-name="Email" required>
                                    </div>

                                    <div class="mb-6">
                                        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" data-field-name="Phone Number" required>
                                    </div>

                                    <div class="mb-6 form-password-toggle">
                                        <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="············" data-field-name="Password" required>
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-6 form-password-toggle">
                                        <label class="form-label" for="confirm_password">Confirm Password<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="············" data-field-name="Confirm Password" required>
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>

                                    <div class="my-8">
                                        <div class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required>
                                            <label class="form-check-label" for="terms-conditions">
                                                I agree to
                                                <a href="javascript:void(0);">privacy policy &amp; terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <button class="btn btn-primary d-grid w-100" id="submitForm" type="button">Register</button>
                                    </div>
                                </form>

                                <p class="text-center">
                                    <span>Already have an account?</span>
                                    <a href="<?=Urls::authLogin()?>">
                                        <span>Login</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#submitForm").click(function (e) {
            e.preventDefault();

            var hasError = validateForm("registerForm");
            
            if (!hasError) {
                $.ajax({
                    url: "<?= Urls::authRegisterStore() ?>",
                    type: "POST",
                    data: $("#registerForm").serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('#submitForm').prop('disabled', true).text('Processing......');
                    },
                    success: function (response) {
                        if (response.status === "success") {
                            successToast('Registration successful!');
                            window.location.href = response.redirect;
                        } else {
                            errorToast(response.message);
                            $('#submitForm').prop('disabled', false).text('Register');
                        }
                    },
                    error: function (xhr) {
                        errorToast("Something went wrong. Please try again.");
                        $('#submitForm').prop('disabled', false).text('Register');
                        //console.error(xhr.responseText);
                    }
                });
            }
        });
    });

</script>


