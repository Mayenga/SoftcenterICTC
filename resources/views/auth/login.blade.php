<x-guest-layout>
    <div class="login-box">
        <div class="login-logo">
          <a href="#"><h3 class="text-white my-1 font-weight-bold rounded py-1" style="background: #106eea">SoftCenter</h3></a>
        </div>
        <!-- /.login-logo -->
        <div class="card elevation-0 rounded">
          <div class="card-body login-card-body rounded">
            <p class="login-box-msg">Sign in to start your session</p>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form id="login_formTET" action="login" method="post">
              @csrf
              <div class="input-group mb-3">
                <input type="email" required class="form-control" placeholder="Username" name="email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user-circle"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" required class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="social-auth-links text-center mb-3 mt-4">
                <button type="submit" class="btn btn-block btn-primary border-0 login_btn" style="background: rgb(0, 153, 255)">
                  Continue to SoftCenter
                </button>
              </div>
              <div class="social-auth-links text-center mb-3 mt-1">
                <a href="/" style="font-size: 13px">Back To Website</a>
              </div>
              <div class="social-auth-links text-center mb-3 mt-1">
                <a href="register" style="font-size: 15px">Don't have account</a>
              </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
              <a href="forgot-password">Forgot password</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
</x-guest-layout>
