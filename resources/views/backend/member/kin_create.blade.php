@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Next of Kin Details 2') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('join.kin.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kin_full_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="kin_full_name" type="text" class="form-control @error('kin_full_name') is-invalid @enderror" name="kin_full_name" value="{{ old('kin_full_name') }}" required autocomplete="name" autofocus>

                                @error('kin_full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kin_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="kin_address" type="text" class="form-control @error('kin_address') is-invalid @enderror" name="kin_address" value="{{ old('kin_address') }}" required>

                                @error('kin_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kin_id_number" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="kin_id_number" type="text" class="form-control @error('kin_id_number') is-invalid @enderror" name="kin_id_number" value="{{ old('kin_id_number') }}" required>

                                @error('kin_id_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kin_phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="kin_phone" type="text" class="form-control @error('kin_phone') is-invalid @enderror" name="kin_phone" value="{{ old('kin_phone') }}" required>

                                @error('kin_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kin_email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="kin_email" type="email" class="form-control @error('kin_email') is-invalid @enderror" name="kin_email" value="{{ old('kin_email') }}">

                                @error('kin_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kin_relationship" class="col-md-4 col-form-label text-md-right">{{ __('Relationship') }}</label>

                            <div class="col-md-6">
                                <input id="kin_relationship" type="text" class="form-control @error('kin_relationship') is-invalid @enderror" name="kin_relationship" value="{{ old('kin_relationship') }}" required>

                                @error('kin_relationship')
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