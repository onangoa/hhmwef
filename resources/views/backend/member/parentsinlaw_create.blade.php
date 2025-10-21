@extends('layouts.wizard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Parent(s)-In-Law Details') }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ __('Step 6 of 6: Parent(s)-In-Law Details') }}</h6>
                </div>

                <div class="card-body">
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <form method="POST" action="{{ route('join.parentsinlaw.store') }}">
                        @csrf

                        <div id="parentsinlaw-container">
                            @if(old('parent_in_law_name'))
                                @foreach(old('parent_in_law_name') as $key => $value)
                                    <div class="form-row parentinlaw-entry mb-3">
                                        <div class="col-md-6">
                                            <label for="parent_in_law_name_{{ $key }}">{{ __('Full Name') }}</label>
                                            <input id="parent_in_law_name_{{ $key }}" type="text" class="form-control" name="parent_in_law_name[]" value="{{ old('parent_in_law_name.'.$key) }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="parent_in_law_relationship_{{ $key }}">{{ __('Relationship') }}</label>
                                            <input id="parent_in_law_relationship_{{ $key }}" type="text" class="form-control" name="parent_in_law_relationship[]" value="{{ old('parent_in_law_relationship.'.$key) }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label>&nbsp;</label>
                                            <div>
                                                <button type="button" class="btn btn-danger btn-sm remove-parentinlaw">-</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-row parentinlaw-entry mb-3">
                                    <div class="col-md-6">
                                        <label for="parent_in_law_name_0">{{ __('Full Name') }}</label>
                                        <input id="parent_in_law_name_0" type="text" class="form-control" name="parent_in_law_name[]">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="parent_in_law_relationship_0">{{ __('Relationship') }}</label>
                                        <input id="parent_in_law_relationship_0" type="text" class="form-control" name="parent_in_law_relationship[]">
                                    </div>
                                    <div class="col-md-1">
                                        <label>&nbsp;</label>
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm remove-parentinlaw">-</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="button" id="add-parentinlaw" class="btn btn-success btn-sm">{{ __('Add Parent-In-Law') }}</button>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Finish') }}
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