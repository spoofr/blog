@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-medium-bottom">Create Post</h2>

        <form class="uk-form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('post.store') }}">
            @csrf

            <div class="uk-margin">
                <label class="uk-form-label">Title:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="title"> @if ($errors->has('title'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('title') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Featured Image:</label>
                <div class="uk-form-controls">
                    <div uk-form-custom>
                        <input type="file" name="featured_image">
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
                <label class="uk-form-label">Category:</label>
                <div class="uk-form-controls">
                    <select class="uk-select" name="category_id">
                        <option value="">Select..</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('category_id') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <span class="uk-form-label">Tag:</span>
                <div class="uk-form-controls uk-form-controls-text">
                    @foreach($tags as $tag)
                    <label class="uk-margin-small-right">
                        <input class="uk-checkbox" type="checkbox" name="name[]" value="{{ $tag->id }}"> {{ $tag->name }}</label>
                    @endforeach
                    @if ($errors->has('name'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Content:</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" rows="5" name="content"></textarea>
                    @if ($errors->has('content'))
                    <div class="uk-margin uk-text-danger">
                        <p>{{ $errors->first('content') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-float-right">Post!</button>
            </div>
        </form>
    </div>
</div>
@endsection