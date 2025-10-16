@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Parent(s)-In-Law Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('join.parentsinlaw.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <h5 class="text-center mb-4">{{ __('Parent(s)-In-Law Details') }}</h5>
                            </div>
                        </div>

                        <div id="parentsinlaw-container">
                            @if(old('parent_in_law_name'))
                                @foreach(old('parent_in_law_name') as $key => $value)
                                    <div class="form-group row parentinlaw-entry">
                                        <div class="col-md-6">
                                            <label for="parent_in_law_name_{{ $key }}" class="col-form-label">{{ __('Full Name') }}</label>
                                            <input id="parent_in_law_name_{{ $key }}" type="text" class="form-control" name="parent_in_law_name[]" value="{{ old('parent_in_law_name.'.$key) }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="parent_in_law_relationship_{{ $key }}" class="col-form-label">{{ __('Relationship') }}</label>
                                            <input id="parent_in_law_relationship_{{ $key }}" type="text" class="form-control" name="parent_in_law_relationship[]" value="{{ old('parent_in_law_relationship.'.$key) }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-form-label">&nbsp;</label>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm remove-parentinlaw">-</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group row parentinlaw-entry">
                                    <div class="col-md-6">
                                        <label for="parent_in_law_name_0" class="col-form-label">{{ __('Full Name') }}</label>
                                        <input id="parent_in_law_name_0" type="text" class="form-control" name="parent_in_law_name[]">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="parent_in_law_relationship_0" class="col-form-label">{{ __('Relationship') }}</label>
                                        <input id="parent_in_law_relationship_0" type="text" class="form-control" name="parent_in_law_relationship[]">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-form-label">&nbsp;</label>
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm remove-parentinlaw">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" id="add-parentinlaw" class="btn btn-success btn-sm">{{ __('Add Parent-In-Law') }}</button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Finish') }}
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
    let parentInLawCount = $('.parentinlaw-entry').length;
    
    $("#add-parentinlaw").click(function() {
        let newParentInLawEntry = `
            <div class="form-group row parentinlaw-entry">
                <div class="col-md-6">
                    <label for="parent_in_law_name_${parentInLawCount}" class="col-form-label">{{ __('Full Name') }}</label>
                    <input id="parent_in_law_name_${parentInLawCount}" type="text" class="form-control" name="parent_in_law_name[]">
                </div>
                <div class="col-md-5">
                    <label for="parent_in_law_relationship_${parentInLawCount}" class="col-form-label">{{ __('Relationship') }}</label>
                    <input id="parent_in_law_relationship_${parentInLawCount}" type="text" class="form-control" name="parent_in_law_relationship[]">
                </div>
                <div class="col-md-1">
                    <label class="col-form-label">&nbsp;</label>
                    <div>
                        <button type="button" class="btn btn-danger btn-sm remove-parentinlaw">-</button>
                    </div>
                </div>
            </div>
        `;
        $("#parentsinlaw-container").append(newParentInLawEntry);
        parentInLawCount++;
    });

    $(document).on('click', '.remove-parentinlaw', function() {
        $(this).closest('.parentinlaw-entry').remove();
    });
});
</script>
@endsection