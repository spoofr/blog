@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-margin-medium-bottom uk-text-center">Settings</h2>

        <form class="uk-form-horizontal" method="POST" action="{{ route('settings.update') }}">
            @csrf

            <div class="uk-margin">
                <label class="uk-form-label">Site's Name:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="site_name" value="{{ $setting->site_name }}"> @if ($errors->has('site_name'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('site_name') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Address:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="address" value="{{ $setting->address }}"> @if ($errors->has('address'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('address') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Contact Number:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="contact_number" value="{{ $setting->contact_number }}"> @if ($errors->has('contact_number'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('contact_number') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Contact Email:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="contact_email" value="{{ $setting->contact_email }}"> @if ($errors->has('contact_email'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('contact_email') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-float-right">Update Settings!</button>
            </div>
        </form>
    </div>
</div>
@endsection