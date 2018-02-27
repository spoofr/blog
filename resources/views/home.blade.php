@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-secondary uk-card-body">
        <h2 class="uk-heading-bullet">Dashboard</h2>
        <p>Hello {{ Auth::user()->name }}!</p>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="uk-grid-match uk-grid-small uk-margin" uk-grid>
        <div class="uk-width-1-4@m">
            <div class="uk-card uk-card-primary uk-card-body">
                <h3>{{ $post_count }} Posts <span class="uk-float-right" uk-icon="icon: file-edit; ratio: 1.5"></span></h3>
            </div>
        </div>
        <div class="uk-width-1-4@m">
            <div class="uk-card uk-card-primary uk-card-body">
                <h3>{{ $category_count }} Category <span class="uk-float-right" uk-icon="icon: bookmark; ratio: 1.5"></span></h3>
            </div>
        </div>
        <div class="uk-width-1-4@m">
            <div class="uk-card uk-card-primary uk-card-body">
                <h3>{{ $tags_count }} Tags <span class="uk-float-right" uk-icon="icon: tag; ratio: 1.5"></span></h3>
            </div>
        </div>
        <div class="uk-width-1-4@m">
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3>{{ $users_count }} Users <span class="uk-float-right" uk-icon="icon: users; ratio: 1.5"></span></h3>
                </div>
            </div>
    </div>
</div>
@endsection