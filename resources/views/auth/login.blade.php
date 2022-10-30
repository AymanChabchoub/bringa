<style>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 9%;
    background:#01030C;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
}
.login-form-2{
    padding: 9%;
    background: #f05837;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
}
.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
}
</style>
@extends('template_heritage_client')
@section('content')
<div class="container login-container">

<div class="row">
<div class="col-md-6 login-form-1">
<h3>Login</h3>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
        <div class="form-group">
        <a class="btnForgetPwd"><x-label for="email" :value="__('Email')" /></a>
            <x-input id="email" class="form-control" type="email" name="email" placeholder="Your Email *" :value="old('email')" required autofocus />
        </div>

            <!-- Password -->
            <div class="form-group">
            <a class="btnForgetPwd"><x-label for="password" :value="__('Password')" /></a>

                <x-input id="password" class="form-control" placeholder="Your Password *"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="btnForgetPwd">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-group">
                @if (Route::has('password.request'))
                    <a class="btnForgetPwd" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="btnSubmit">
                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
        </div>
</div>
</div>
@endsection