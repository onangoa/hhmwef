@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Spouse Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('join.spouse.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="spouse_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="spouse_name" type="text" class="form-control @error('spouse_name') is-invalid @enderror" name="spouse_name" value="{{ old('spouse_name') }}" autocomplete="name" autofocus>

                                @error('spouse_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="spouse_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="spouse_address" type="text" class="form-control @error('spouse_address') is-invalid @enderror" name="spouse_address" value="{{ old('spouse_address') }}">

                                @error('spouse_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="spouse_id_number" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="spouse_id_number" type="text" class="form-control @error('spouse_id_number') is-invalid @enderror" name="spouse_id_number" value="{{ old('spouse_id_number') }}">

                                @error('spouse_id_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="spouse_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="spouse_phone_number" type="text" class="form-control @error('spouse_phone_number') is-invalid @enderror" name="spouse_phone_number" value="{{ old('spouse_phone_number') }}">

                                @error('spouse_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="spouse_email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="spouse_email" type="email" class="form-control @error('spouse_email') is-invalid @enderror" name="spouse_email" value="{{ old('spouse_email') }}">

                                @error('spouse_email')
                                    <span class="invalid-feedback" role="alert">
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