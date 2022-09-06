<x-auth-layout>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Forget password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Forget password Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Forget password</h2>
                        <div class="mb-4 text-sm main-color text-center">
                            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <form action="{{route('password.email')}}" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="email">Enter your email address *</label>
                                <input type="email" id="email" name="email" :value="old('email')" required autofocus />
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="site-btn login-btn">Email Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Forget password Form Section End -->
</x-auth-layout>

