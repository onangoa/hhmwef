@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('M-Pesa Payment Confirmation') }}</h5>
                    <h6 class="card-subtitle mb-2">{{ __('Final Step: M-Pesa Payment Confirmation') }}</h6>
                </div>

                <div class="card-body">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="alert alert-info mb-4">
                        <h5 class="alert-heading">{{ __('Step-by-Step Guide') }}</h5>
                        <ol class="mb-0">
                            <li><strong>Access M-Pesa Menu:</strong> On your mobile phone, dial *334# or go to the M-Pesa app to access the M-Pesa menu.</li>
                            <li><strong>Select Pay Bill:</strong> Choose the "Lipa na M-Pesa" option from the menu, then select "Pay Bill".</li>
                            <li><strong>Enter Pay bill Number:</strong> 400200 for Co-op Bank deposits</li>
                            <li><strong>Enter Account Number:</strong> Enter your account number associated with the cooperative or the specific business.</li>
                            <li><strong>Enter Amount:</strong> Input the amount of money you wish to pay.</li>
                            <li><strong>Enter PIN:</strong> Enter your M-Pesa PIN when prompted.</li>
                            <li><strong>Confirm Transaction:</strong> Review the transaction details and confirm by pressing OK.</li>
                            <li><strong>Receive Confirmation:</strong> You will receive an SMS from M-Pesa and the Cooperative Bank confirming the successful transaction.</li>
                            <li><strong>Paste the confirmation message</strong> in the field below.</li>
                        </ol>
                    </div>

                    <form method="POST" action="{{ route('join.mpesa.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="confirmation_message">{{ __('M-Pesa Confirmation Message') }}</label>
                            <textarea id="confirmation_message" class="form-control" name="confirmation_message" rows="4" placeholder="{{ __('Paste the M-Pesa confirmation message you received via SMS here...') }}" required>{{ old('confirmation_message') }}</textarea>
                            @error('confirmation_message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">{{ __('Please copy and paste the exact confirmation message you received from M-Pesa') }}</small>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit Registration') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection