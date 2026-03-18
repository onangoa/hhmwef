@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Spouse Details') }}</h5>
                    <h6 class="card-subtitle mb-2">{{ __('Step 3 of 6: Spouse Details') }}</h6>
                </div>

                <div class="card-body">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <form method="POST" action="{{ route('join.spouse.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spouse_first_name">{{ __('First Name') }}</label>
                                    <input id="spouse_first_name" type="text" class="form-control @error('spouse_first_name') is-invalid @enderror" name="spouse_first_name" value="{{ old('spouse_first_name') }}" autocomplete="given-name" autofocus>

                                    @error('spouse_first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spouse_last_name">{{ __('Last Name') }}</label>
                                    <input id="spouse_last_name" type="text" class="form-control @error('spouse_last_name') is-invalid @enderror" name="spouse_last_name" value="{{ old('spouse_last_name') }}" autocomplete="family-name">

                                    @error('spouse_last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spouse_surname">{{ __('Surname') }}</label>
                                    <input id="spouse_surname" type="text" class="form-control @error('spouse_surname') is-invalid @enderror" name="spouse_surname" value="{{ old('spouse_surname') }}" autocomplete="additional-name" placeholder="{{ __('Enter surname (optional)') }}">

                                    @error('spouse_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="spouse_address">{{ __('Address') }}</label>
                            <input id="spouse_address" type="text" class="form-control @error('spouse_address') is-invalid @enderror" name="spouse_address" value="{{ old('spouse_address') }}">

                            @error('spouse_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="spouse_id_number">{{ __('ID Number') }}</label>
                            <input id="spouse_id_number" type="text" class="form-control @error('spouse_id_number') is-invalid @enderror" name="spouse_id_number" value="{{ old('spouse_id_number') }}">

                            @error('spouse_id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <div class="form-group">
                            <label for="spouse_phone_number">{{ __('Phone Number') }}</label>
                            <input id="spouse_phone_number" type="text" class="form-control @error('spouse_phone_number') is-invalid @enderror" name="spouse_phone_number" value="{{ old('spouse_phone_number') }}">

                            @error('spouse_phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="spouse_email">{{ __('Email Address') }}</label>
                            <input id="spouse_email" type="email" class="form-control @error('spouse_email') is-invalid @enderror" name="spouse_email" value="{{ old('spouse_email') }}">

                            @error('spouse_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Continue') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection