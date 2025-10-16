@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Parent/Guardian Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('join.parents.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <h5 class="text-center mb-4">{{ __('Parent/Guardian Details') }}</h5>
                            </div>
                        </div>

                        <div id="parents-container">
                            @if(old('parent_name'))
                                @foreach(old('parent_name') as $key => $value)
                                    <div class="form-group row parent-entry">
                                        <div class="col-md-6">
                                            <label for="parent_name_{{ $key }}" class="col-form-label">{{ __('Full Name') }}</label>
                                            <input id="parent_name_{{ $key }}" type="text" class="form-control" name="parent_name[]" value="{{ old('parent_name.'.$key) }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="parent_relationship_{{ $key }}" class="col-form-label">{{ __('Relationship') }}</label>
                                            <input id="parent_relationship_{{ $key }}" type="text" class="form-control" name="parent_relationship[]" value="{{ old('parent_relationship.'.$key) }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-form-label">&nbsp;</label>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm remove-parent">-</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group row parent-entry">
                                    <div class="col-md-6">
                                        <label for="parent_name_0" class="col-form-label">{{ __('Full Name') }}</label>
                                        <input id="parent_name_0" type="text" class="form-control" name="parent_name[]">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="parent_relationship_0" class="col-form-label">{{ __('Relationship') }}</label>
                                        <input id="parent_relationship_0" type="text" class="form-control" name="parent_relationship[]">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-form-label">&nbsp;</label>
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm remove-parent">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" id="add-parent" class="btn btn-success btn-sm">{{ __('Add Parent') }}</button>
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
    let parentCount = $('.parent-entry').length;
    
    $("#add-parent").click(function() {
        let newParentEntry = `
            <div class="form-group row parent-entry">
                <div class="col-md-6">
                    <label for="parent_name_${parentCount}" class="col-form-label">{{ __('Full Name') }}</label>
                    <input id="parent_name_${parentCount}" type="text" class="form-control" name="parent_name[]">
                </div>
                <div class="col-md-5">
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