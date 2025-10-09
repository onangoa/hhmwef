@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Instructions') }}</div>

                <div class="card-body">
                    <p>Please follow the instructions below to complete the payment:</p>

                    <ol>
                        <li><strong>Access M-Pesa Menu:</strong> On your mobile phone, dial *334# or go to the M-Pesa app to access the M-Pesa menu.</li>
                        <li><strong>Select Pay Bill:</strong> Choose the "Lipa na M-Pesa" option from the menu, then select "Pay Bill".</li>
                        <li><strong>Enter Pay bill Number:</strong> 400200 for Co-op Bank deposits</li>
                        <li><strong>Enter Account Number:</strong> Enter your account number associated with the cooperative or the specific business.</li>
                        <li><strong>Enter Amount:</strong> Input the amount of money you wish to pay.</li>
                        <li><strong>Enter PIN:</strong> Enter your M-Pesa PIN when prompted.</li>
                        <li><strong>Confirm Transaction:</strong> Review the transaction details and confirm by pressing OK.</li>
                        <li><strong>Receive Confirmation:</strong> You will receive an SMS from M-Pesa and the Cooperative Bank confirming the successful transaction.</li>
                        <li><strong>Paste the confirmation message</strong></li>
                    </ol>

                    <form method="POST" action="{{ route('payment.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="confirmation_message" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="confirmation_message" class="form-control @error('confirmation_message') is-invalid @enderror" name="confirmation_message" required></textarea>

                                @error('confirmation_message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Payment') }}
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