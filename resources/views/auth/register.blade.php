<x-auth-layout>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Register</h2>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="username">User name *</label>
                                <input type="text" id="username" name="name" :value="old('name')" placeholder="Enter your name" required autofocus
                                    autocomplete="name" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="group-input">
                                <label for="email">Email address *</label>
                                <input type="email" id="email" name="email" :value="old('email')" placeholder="Enter your email" required autofocus />
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password" placeholder="Enter your password" required autocomplete="new-password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Confirm Password *</label>
                                <input type="password" id="pass" name="password_confirmation" placeholder="Enter your confirm-password" required
                                    autocomplete="new-password">
                                @error('password_confirmation') <span class="text-danger mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign Up</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('login')}}" class="or-login">Or Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
</x-auth-layout>
