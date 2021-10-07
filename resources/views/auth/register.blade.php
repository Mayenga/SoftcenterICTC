<x-guest-layout>
    <div class="register-box">
        <div class="login-logo">
            <a href="#">
                <h3 class="text-white my-1 font-weight-bold rounded py-1" style="background: #106eea">SoftCenter</h3>
            </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register</p>

                <form id="register_form" action="register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" id="full_name" class="form-control" placeholder="Full name" name="name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="phone number" name="phone" data-inputmask='"mask": "+255-999-999-999"' data-mask required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="user_email" type="email" class="form-control" placeholder="Email" name="email" required>
                        <input id="user_email_hold" type="hidden"  name="your_email" class="form-control">
                        <input id="user_code_hold" type="hidden" name="code" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#" class="btn btn-info sendVerificationCode">Get Code</a>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group mb-3">
                                <input type="text" maxlength="6" class="form-control" placeholder="verification code" name="verification_code" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control custom-select" name="role" required>
                            <option value="">..........choose...........</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" onKeyUp="checkPasswordStrength();" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="password-strength-status" ></span>
                    <div class="input-group mt-3">
                        <input id="cpassword" type="password" class="form-control" name="password_confirmation" placeholder="Retype password" onKeyUp="confirmPassword();" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="password-confirm-status" class="text-white" ></span>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            {{-- <button type="submit" class="btn btn-primary btn-block">Register</button> --}}
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center">
                        <button id="create_account" type="submit" class="btn btn-block btn-primary mt-4 register_btn ">
                            Create Account
                        </button>
                    </div>

                </form>

                <a href="/" style="font-size: 13px">Back To Website</a>
                <a href="login" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

</x-guest-layout>
