@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Member Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('join.join.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" autofocus>

                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_number" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="id_number" type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required>

                                @error('id_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('Institution') }}</label>

                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" value="{{ old('institution') }}" required>

                                @error('institution')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work_station" class="col-md-4 col-form-label text-md-right">{{ __('Work Station') }}</label>

                            <div class="col-md-6">
                                <input id="work_station" type="text" class="form-control @error('work_station') is-invalid @enderror" name="work_station" value="{{ old('work_station') }}" required>

                                @error('work_station')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state_department" class="col-md-4 col-form-label text-md-right">{{ __('State Department') }}</label>

                            <div class="col-md-6">
                                <select id="state_department" class="form-control @error('state_department') is-invalid @enderror" name="state_department" required>
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
                        </div>

                        <div class="form-group row">
                            <label for="payroll_number" class="col-md-4 col-form-label text-md-right">{{ __('Payroll Number') }}</label>

                            <div class="col-md-6">
                                <input id="payroll_number" type="text" class="form-control @error('payroll_number') is-invalid @enderror" name="payroll_number" value="{{ old('payroll_number') }}" required>

                                @error('payroll_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email_address" type="email" class="form-control @error('email_address') is-invalid @enderror" name="email_address" value="{{ old('email_address') }}" required autocomplete="email">

                                @error('email_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_numbers" class="col-md-4 col-form-label text-md-right">{{ __('Phone Numbers') }}</label>

                            <div class="col-md-6">
                                <input id="phone_numbers" type="text" class="form-control @error('phone_numbers') is-invalid @enderror" name="phone_numbers" value="{{ old('phone_numbers') }}" required>

                                @error('phone_numbers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postal_address" class="col-md-4 col-form-label text-md-right">{{ __('Postal Address') }}</label>

                            <div class="col-md-6">
                                <input id="postal_address" type="text" class="form-control @error('postal_address') is-invalid @enderror" name="postal_address" value="{{ old('postal_address') }}" required>

                                @error('postal_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
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
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection