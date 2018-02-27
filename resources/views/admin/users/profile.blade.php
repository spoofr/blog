@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-margin-medium-bottom uk-text-center">Profile</h2>

        <h2 class="uk-heading-bullet uk-card-title uk-margin-medium-bottom">Profile Details</h2>
        <form class="uk-form-horizontal" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="uk-margin">
                <label class="uk-form-label">Name:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="name" value="{{ $user->name }}"> @if ($errors->has('name'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Email:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="email" name="email" value="{{ $user->email }}"> @if ($errors->has('email'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Upload Profile Image:</label>
                <div class="uk-form-controls">
                    <div uk-form-custom>
                        <input type="file" name="avatar">
                        <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
                    </div>
                    @if ($errors->has('featured_image'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('featured_image') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Twitter URL:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="twitter" value="{{ $user->profile->twitter }}"> @if ($errors->has('twitter'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('twitter') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">About:</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" rows="5" name="about">{{ $user->profile->about }}</textarea>
                    @if ($errors->has('about'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('about') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <hr>

            <h2 class="uk-heading-bullet uk-card-title uk-margin-medium-bottom">Change Password</h2>

            <div class="uk-margin">
                <label class="uk-form-label">New Password:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="password" name="password"> @if ($errors->has('password'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('password') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Confirm Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="password" name="password_confirmation" placeholder=""> @if ($errors->has('password_confirmation'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('password_confirmation') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-float-right">Update Profile!</button>
            </div>
        </form>
    </div>
</div>
@endsection