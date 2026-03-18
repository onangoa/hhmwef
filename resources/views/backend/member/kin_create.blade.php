@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Next of Kin Details') }}</h5>
                    <h6 class="card-subtitle mb-2">{{ __('Step 2 of 6: Next of Kin') }}</h6>
                </div>

                <div class="card-body">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 33.33%;" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <form method="POST" action="{{ route('join.kin.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kin_first_name">{{ __('First Name') }}</label>
                                    <input id="kin_first_name" type="text" class="form-control @error('kin_first_name') is-invalid @enderror" name="kin_first_name" value="{{ old('kin_first_name') }}" required autocomplete="given-name" autofocus>

                                    @error('kin_first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kin_last_name">{{ __('Last Name') }}</label>
                                    <input id="kin_last_name" type="text" class="form-control @error('kin_last_name') is-invalid @enderror" name="kin_last_name" value="{{ old('kin_last_name') }}" required autocomplete="family-name">

                                    @error('kin_last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kin_surname">{{ __('Surname') }}</label>
                                    <input id="kin_surname" type="text" class="form-control @error('kin_surname') is-invalid @enderror" name="kin_surname" value="{{ old('kin_surname') }}" autocomplete="additional-name" placeholder="{{ __('Enter surname (optional)') }}">

                                    @error('kin_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kin_address">{{ __('Address') }}</label>
                            <input id="kin_address" type="text" class="form-control @error('kin_address') is-invalid @enderror" name="kin_address" value="{{ old('kin_address') }}" required>

                            @error('kin_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kin_id_number">{{ __('ID Number') }}</label>
                            <input id="kin_id_number" type="text" class="form-control @error('kin_id_number') is-invalid @enderror" name="kin_id_number" value="{{ old('kin_id_number') }}" required>

                            @error('kin_id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kin_phone">{{ __('Phone Number') }}</label>
                            <input id="kin_phone" type="text" class="form-control @error('kin_phone') is-invalid @enderror" name="kin_phone" value="{{ old('kin_phone') }}" required>

                            @error('kin_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kin_email">{{ __('Email Address') }}</label>
                            <input id="kin_email" type="email" class="form-control @error('kin_email') is-invalid @enderror" name="kin_email" value="{{ old('kin_email') }}">

                            @error('kin_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kin_relationship">{{ __('Relationship') }}</label>
                            <input id="kin_relationship" type="text" class="form-control @error('kin_relationship') is-invalid @enderror" name="kin_relationship" value="{{ old('kin_relationship') }}" required>

                            @error('kin_relationship')
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