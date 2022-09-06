<x-auth-layout>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Login Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="email" id="email" name="email" :value="old('email')" placeholder="Enter your email" required autofocus />
                                @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                @error('password') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Remember me
                                        <input type="checkbox" id="save-pass" name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a class="forget-pass" href="{{ route('password.request') }}">
                                        Forgot your password
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('register')}}" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form Section End -->
</x-auth-layout>
