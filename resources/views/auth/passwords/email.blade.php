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

                    <h5 class="text-center mb-4">{{ _lang('Reset Your Password') }}</h5>

                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="form-signin" action="{{ route('password.email') }}" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ _lang('Enter Your Email') }}" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ _lang('Submit') }} <i class="fas fa-paper-plane ml-2"></i>
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
