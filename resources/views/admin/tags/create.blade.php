@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-medium-bottom">Create Tag</h2>

        <form class="uk-form-horizontal" method="POST" action="{{ route('tag.store') }}">
            @csrf

            <div class="uk-margin">
                <label class="uk-form-label">Tag:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="name"> 
                    @if ($errors->has('name'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-float-right">Add!</button>
            </div>
        </form>
    </div>
</div>
@endsection