@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Children Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('join.children.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <h5 class="text-center mb-4">{{ __('Child/Children Details') }}</h5>
                            </div>
                        </div>

                        <div id="children-container">
                            @if(old('child_name'))
                                @foreach(old('child_name') as $key => $value)
                                    <div class="form-group row child-entry">
                                        <div class="col-md-4">
                                            <label for="child_name_{{ $key }}" class="col-form-label">{{ __('Full Name') }}</label>
                                            <input id="child_name_{{ $key }}" type="text" class="form-control" name="child_name[]" value="{{ old('child_name.'.$key) }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="child_age_{{ $key }}" class="col-form-label">{{ __('Age') }}</label>
                                            <input id="child_age_{{ $key }}" type="number" class="form-control" name="child_age[]" value="{{ old('child_age.'.$key) }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="child_phone_{{ $key }}" class="col-form-label">{{ __('Contact') }}</label>
                                            <input id="child_phone_{{ $key }}" type="text" class="form-control" name="child_phone_number[]" value="{{ old('child_phone_number.'.$key) }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-form-label">&nbsp;</label>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm remove-child">-</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group row child-entry">
                                    <div class="col-md-4">
                                        <label for="child_name_0" class="col-form-label">{{ __('Full Name') }}</label>
                                        <input id="child_name_0" type="text" class="form-control" name="child_name[]">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="child_age_0" class="col-form-label">{{ __('Age') }}</label>
                                        <input id="child_age_0" type="number" class="form-control" name="child_age[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="child_phone_0" class="col-form-label">{{ __('Contact') }}</label>
                                        <input id="child_phone_0" type="text" class="form-control" name="child_phone_number[]">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-form-label">&nbsp;</label>
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm remove-child">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" id="add-child" class="btn btn-success btn-sm">{{ __('Add Child') }}</button>
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

@section('js-script')
<script>
$(document).ready(function() {
    let childCount = $('.child-entry').length;
    
    $("#add-child").click(function() {
        let newChildEntry = `
            <div class="form-group row child-entry">
                <div class="col-md-4">
                    <label for="child_name_${childCount}" class="col-form-label">{{ __('Full Name') }}</label>
                    <input id="child_name_${childCount}" type="text" class="form-control" name="child_name[]">
                </div>
                <div class="col-md-3">
                    <label for="child_age_${childCount}" class="col-form-label">{{ __('Age') }}</label>
                    <input id="child_age_${childCount}" type="number" class="form-control" name="child_age[]">
                </div>
                <div class="col-md-4">
                    <label for="child_phone_${childCount}" class="col-form-label">{{ __('Contact') }}</label>
                    <input id="child_phone_${childCount}" type="text" class="form-control" name="child_phone_number[]">
                </div>
                <div class="col-md-1">
                    <label class="col-form-label">&nbsp;</label>
                    <div>
                        <button type="button" class="btn btn-danger btn-sm remove-child">-</button>
                    </div>
                </div>
            </div>
        `;
        $("#children-container").append(newChildEntry);
        childCount++;
    });

    $(document).on('click', '.remove-child', function() {
        $(this).closest('.child-entry').remove();
    });
});
</script>
@endsection