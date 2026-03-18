@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Parent/Guardian Details') }}</h5>
                    <h6 class="card-subtitle mb-2">{{ __('Step 5 of 6: Parent/Guardian Details') }}</h6>
                </div>

                <div class="card-body">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 83.33%;" aria-valuenow="83.33" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <form method="POST" action="{{ route('join.parents.store') }}">
                        @csrf

                         <div id="parents-container">
                            @if(old('parent_first_name'))
                                @foreach(old('parent_first_name') as $key => $value)
                                    <div class="form-row parent-entry mb-3">
                                        <div class="col-md-3">
                                            <label for="parent_first_name_{{ $key }}">{{ __('First Name') }}</label>
                                            <input id="parent_first_name_{{ $key }}" type="text" class="form-control" name="parent_first_name[]" value="{{ old('parent_first_name.'.$key) }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="parent_last_name_{{ $key }}">{{ __('Last Name') }}</label>
                                            <input id="parent_last_name_{{ $key }}" type="text" class="form-control" name="parent_last_name[]" value="{{ old('parent_last_name.'.$key) }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="parent_surname_{{ $key }}">{{ __('Surname') }}</label>
                                            <input id="parent_surname_{{ $key }}" type="text" class="form-control" name="parent_surname[]" value="{{ old('parent_surname.'.$key) }}" placeholder="{{ __('Optional') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="parent_relationship_{{ $key }}">{{ __('Relationship') }}</label>
                                            <input id="parent_relationship_{{ $key }}" type="text" class="form-control" name="parent_relationship[]" value="{{ old('parent_relationship.'.$key) }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label>&nbsp;</label>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm remove-parent">-</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-row parent-entry mb-3">
                                    <div class="col-md-3">
                                        <label for="parent_first_name_0">{{ __('First Name') }}</label>
                                        <input id="parent_first_name_0" type="text" class="form-control" name="parent_first_name[]">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="parent_last_name_0">{{ __('Last Name') }}</label>
                                        <input id="parent_last_name_0" type="text" class="form-control" name="parent_last_name[]">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="parent_surname_0">{{ __('Surname') }}</label>
                                        <input id="parent_surname_0" type="text" class="form-control" name="parent_surname[]" placeholder="{{ __('Optional') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="parent_relationship_0">{{ __('Relationship') }}</label>
                                        <input id="parent_relationship_0" type="text" class="form-control" name="parent_relationship[]">
                                    </div>
                                    <div class="col-md-1">
                                        <label>&nbsp;</label>
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm remove-parent">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="button" id="add-parent" class="btn btn-success btn-sm">{{ __('Add Parent') }}</button>
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

@section('js-script')
<script>
$(document).ready(function() {
    let parentCount = $('.parent-entry').length;
    
    $("#add-parent").click(function() {
        let newParentEntry = `
            <div class="form-group row parent-entry">
                <div class="col-md-3">
                    <label for="parent_first_name_${parentCount}" class="col-form-label">{{ __('First Name') }}</label>
                    <input id="parent_first_name_${parentCount}" type="text" class="form-control" name="parent_first_name[]">
                </div>
                <div class="col-md-3">
                    <label for="parent_last_name_${parentCount}" class="col-form-label">{{ __('Last Name') }}</label>
                    <input id="parent_last_name_${parentCount}" type="text" class="form-control" name="parent_last_name[]">
                </div>
                <div class="col-md-3">
                    <label for="parent_surname_${parentCount}" class="col-form-label">{{ __('Surname') }}</label>
                    <input id="parent_surname_${parentCount}" type="text" class="form-control" name="parent_surname[]" placeholder="{{ __('Optional') }}">
                </div>
                <div class="col-md-2">
                    <label for="parent_relationship_${parentCount}" class="col-form-label">{{ __('Relationship') }}</label>
                    <input id="parent_relationship_${parentCount}" type="text" class="form-control" name="parent_relationship[]">
                </div>
                <div class="col-md-1">
                    <label class="col-form-label">&nbsp;</label>
                    <div>
                        <button type="button" class="btn btn-danger btn-sm remove-parent">-</button>
                    </div>
                </div>
            </div>
        `;
        $("#parents-container").append(newParentEntry);
        parentCount++;
    });

    $(document).on('click', '.remove-parent', function() {
        $(this).closest('.parent-entry').remove();
    });
});
</script>
@endsection