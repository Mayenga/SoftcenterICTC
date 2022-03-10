<x-guest-layout>
    <div class="login-box">
        <div class="login-logo">
            <a href="/">
                <h3 class="text-white my-1 font-weight-bold rounded py-1" style="background: #106eea">SoftCenter</h3>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Please check your email, we have sent verification code for you.</p>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <h6 class="text-muted">If you did not receive verification code please click resend email or enter a correct email</h6>
                <form method="POST" action="{{ route('resend_code') }}">
                    @csrf
                    <input type="hidden" name="user_path" value="{{ $user_path }}" hidden>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$email}}" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block w-25 float-right">{{ __('Resend') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <form method="POST" action="{{ route('verify_email') }}" class="mt-5">
                    @csrf
                    <input type="hidden" name="user_path" value="{{ $user_path }}" hidden>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="verification_code" placeholder="Enter verification code" data-inputmask='"mask": "999999"' data-mask  required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Verify my Email') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="login">Login</a>
                </p>
                <p class="mb-0">
                    <a href="register" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

</x-guest-layout>
