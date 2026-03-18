@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9 col-sm-11">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Member Registration') }}</h5>
                    <h6 class="card-subtitle">{{ __('Step 1 of 6: Personal Information') }}</h6>
                </div>

                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 16.67%;" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <form method="POST" action="{{ route('join.join.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">{{ __('First Name') }}</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus placeholder="{{ __('Enter your first name') }}">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name" placeholder="{{ __('Enter your last name') }}">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="surname">{{ __('Surname') }}</label>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="additional-name" placeholder="{{ __('Enter your surname (optional)') }}">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_number">{{ __('ID Number') }}</label>
                                    <input id="id_number" type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required placeholder="{{ __('Enter ID number') }}">

                                    @error('id_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">{{ __('Date of Birth') }}</label>
                                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required placeholder="{{ __('Enter your date of birth') }}">

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="institution">{{ __('Ministry') }}</label>
                                    <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" value="{{ old('institution') }}" required placeholder="{{ __('Enter ministry name') }}">

                                    @error('institution')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state_department">{{ __('State Department') }}</label>
                            <select id="state_department" class="form-control select2 @error('state_department') is-invalid @enderror" name="state_department" required>
                                <option value="">{{ __('-- Select State Department --') }}</option>
                                @foreach(config('states.state_corporations') as $department)
                                    <option value="{{ $department }}" {{ old('state_department') == $department ? 'selected' : '' }}>{{ $department }}</option>
                                @endforeach
                            </select>
                            @error('state_department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payroll_number">{{ __('Payroll Number') }}</label>
                                    <input id="payroll_number" type="text" class="form-control @error('payroll_number') is-invalid @enderror" name="payroll_number" value="{{ old('payroll_number') }}" required placeholder="{{ __('Enter payroll number') }}">

                                    @error('payroll_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_numbers">{{ __('Phone Numbers') }}</label>
                                    <input id="phone_numbers" type="text" class="form-control @error('phone_numbers') is-invalid @enderror" name="phone_numbers" value="{{ old('phone_numbers') }}" required placeholder="{{ __('Enter phone number(s)') }}">

                                    @error('phone_numbers')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email_address">{{ __('E-Mail Address') }}</label>
                            <input id="email_address" type="email" class="form-control @error('email_address') is-invalid @enderror" name="email_address" value="{{ old('email_address') }}" required autocomplete="email" placeholder="{{ __('Enter your email address') }}">

                            @error('email_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="postal_address">{{ __('Postal Address') }}</label>
                            <input id="postal_address" type="text" class="form-control @error('postal_address') is-invalid @enderror" name="postal_address" value="{{ old('postal_address') }}" required placeholder="{{ __('Enter postal address') }}">

                            @error('postal_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="declaration_agree" id="declaration_agree" {{ old('declaration_agree') ? 'checked' : '' }}>

                                <label class="form-check-label" for="declaration_agree">
                                    {{ __('I swear to abide by the rules, regulations and Constitution of the Group.') }}
                                </label>
                            </div>
                            @error('declaration_agree')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0 mt-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Continue') }} <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection