@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-10">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ get_logo() }}" class="logo" alt="Logo">
                    </div>

                    <h5 class="text-center mb-4">{{ _lang('Login To Your Account') }}</h5>

                    @if(Session::has('error'))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif

                    <form method="POST" class="form-signin" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ _lang('Email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ _lang('Password') }}" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="g-recaptcha-response" id="recaptcha">
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ _lang('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ _lang('Login') }} <i class="fas fa-sign-in-alt ml-2"></i>
                            </button>
                        </div>

                        <div class="form-group text-center">
                            @if(get_option('member_signup') == 1)
                                <div class="mb-2">
                                    <a class="btn-link" href="{{ route('join.join') }}">
                                        {{ _lang('Create Account') }} <i class="fas fa-user-plus ml-1"></i>
                                    </a>
                                </div>
                            @endif
                            <div>
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    {{ _lang('Forgot Password?') }} <i class="fas fa-key ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(get_option('enable_recaptcha', 0) == 1)
<script src="https://www.google.com/recaptcha/api.js?render={{ get_option('recaptcha_site_key') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ get_option('recaptcha_site_key') }}', {action: 'login'}).then(function(token) {
        if (token) {
            document.getElementById('recaptcha').value = token;
        }
        });
    });
</script>
@endif
@endsection