<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body">
                                <div class="app-brand justify-content-center">
                                    <a href="<?=Urls::authLogin()?>" class="app-brand-link gap-2 mb-3">
                                        <span class="app-brand-text demo text-heading fw-bold">Login</span>
                                    </a>
                                </div>
                                <h4 class="mb-1">Welcome Back 👋</h4>
                                <p class="mb-6">Please login to your account and start the adventure</p>

                                <form id="formAuthentication" class="mb-6" action="#">
                                    <div class="mb-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email-username" placeholder="Enter your email" autofocus="" required>
                                    </div>
                                    <div class="mb-6 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password" required>
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-8">
                                        <div class="d-flex justify-content-between mt-8">
                                            <div class="form-check mb-0 ms-2">
                                                <input class="form-check-input" type="checkbox" id="remember-me">
                                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                                            </div>
                                            <a href="#">
                                                <span>Forgot Password?</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                                    </div>
                                </form>

                                <p class="text-center">
                                    <span>New on our platform?</span>
                                    <a href="<?=Urls::authRegister()?>">
                                        <span>Create an account</span>
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