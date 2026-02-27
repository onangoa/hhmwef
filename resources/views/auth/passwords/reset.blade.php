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

                    <h5 class="text-center mb-4">{{ _lang('Update Your Password') }}</h5>

                    <form method="POST" action="{{ route('password.update') }}" class="form-signin">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ _lang('E-Mail Address') }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ _lang('Password') }}" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ _lang('Confirm Password') }}" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ _lang('Reset Password') }} <i class="fas fa-lock ml-2"></i>
                            </button>
                        </div>

                        <div class="form-group text-center">
                            <a class="btn-link" href="{{ route('login') }}">
                                <i class="fas fa-arrow-left mr-1"></i> {{ _lang('Back to Login') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
