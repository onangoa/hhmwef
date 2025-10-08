@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-signin my-5 p-3">              
				<div class="card-body">
				    <img class="logo" src="{{ get_logo() }}">
					
					<h5 class="text-center py-4">{{ _lang('Create Your Account Now') }}</h4> 

                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <span>{{ session('error') }}</span>
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success mb-4" role="alert">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif	
					
                    <form method="POST" class="form-signup" autocomplete="off" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
							<div class="col-lg-4 mb-3 mb-lg-0">
                                <input id="name" type="text" placeholder="{{ _lang('First Name') }}" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <input id="middle_name" type="text" placeholder="{{ _lang('Middle Name') }}" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name') }}">

                                @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
							<div class="col-lg-4">
                                <input id="last_name" type="text" placeholder="{{ _lang('Last Name') }}" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input id="email" type="email" placeholder="{{ _lang('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
						
						<div class="form-group row">
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <select class="form-control{{ $errors->has('country_code') ? ' is-invalid' : '' }} select2" name="country_code" required>
                                    <option value="">{{ _lang('Country Code') }}</option>
                                    @foreach(get_country_codes() as $key => $value)
                                    <option value="{{ $value['dial_code'] }}" {{ 254 == $value['dial_code'] ? 'selected' : '' }}>{{ $value['country'].' (+'.$value['dial_code'].')' }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country_code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <input id="mobile" type="text" placeholder="{{ _lang('Mobile') }}" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">

                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <input id="password" type="password" placeholder="{{ _lang('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                           <div class="col-lg-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="{{ _lang('Confirm Password') }}" name="password_confirmation" required>
                            </div>
                        </div>                       

                        <div class="form-group row">

                            <div class="col-lg-12">
                                <textarea id="address" type="text" placeholder="{{ _lang('Address') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>{{ old('address') }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input id="idno" type="text" placeholder="{{ _lang('ID Number') }}" class="form-control{{ $errors->has('idno') ? ' is-invalid' : '' }}" name="idno" value="{{ old('idno') }}" required>

                                @if ($errors->has('idno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('idno') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <input id="payrollno" type="text" placeholder="{{ _lang('Payroll Number') }}" class="form-control{{ $errors->has('payrollno') ? ' is-invalid' : '' }}" name="payrollno" value="{{ old('payrollno') }}" required>

                                @if ($errors->has('payrollno'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payrollno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4">
                                <input id="institution" type="text" placeholder="{{ _lang('Institution') }}" class="form-control{{ $errors->has('institution') ? ' is-invalid' : '' }}" name="institution" value="{{ old('institution') }}" required>

                                @if ($errors->has('institution'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <input id="workstation" type="text" placeholder="{{ _lang('Work station') }}" class="form-control{{ $errors->has('workstation') ? ' is-invalid' : '' }}" name="workstation" value="{{ old('workstation') }}" required>

                                @if ($errors->has('workstation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('workstation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <input id="department" type="text" placeholder="{{ _lang('Department') }}" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" value="{{ old('department') }}" required>

                                @if ($errors->has('department'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        


                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="hidden" class="{{ $errors->has('g-recaptcha-response') ? ' is-invalid' : '' }}" name="g-recaptcha-response" id="recaptcha">
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row mt-5">
							<div class="col-lg-12 text-center">
								<button type="submit" class="btn btn-primary btn-login">
								{{ _lang('Create My Account') }}
                                </button>
							</div>
						</div>
                        <div class="form-group row mt-5">
							<div class="col-lg-12 text-center">
							   {{ _lang('Already Have An Account?') }} 
                               <a href="{{ route('login') }}">{{ _lang('Log In Here') }}</a>
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
        grecaptcha.execute('{{ get_option('recaptcha_site_key') }}', {action: 'register'}).then(function(token) {
        if (token) {
            document.getElementById('recaptcha').value = token;
        }
        });
    });
</script>
@endif
@endsection
