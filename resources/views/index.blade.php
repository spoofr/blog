@extends('layouts.app') @section('content')

<div class="uk-section uk-section-muted" uk-height-viewport="expand: true">
    <div class="uk-container">
        <div class="uk-child-width-1-3@m" uk-grid>

            @foreach($posts as $post)

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ $post->title}}</h3>
                        <p class="uk-text-meta uk-margin-small-top">
                            <time datetime="2016-04-01T19:00">{{ $post->created_at->toFormattedDateString() }}</time>
                        </p>
                    </div>
                    <div class="uk-card-media">
                        <img src="{{ $post->featured_image }}" alt="">
                    </div>
                    <div class="uk-card-body">
                        <p>{!! $post->content !!}</p>
                        <a href="{{ route('post.single', $post->slug) }}" class="uk-button uk-button-text">Read more..</a>
                        <ul class="uk-subnav uk-subnav-pill uk-float-right uk-margin-remove-top" uk-margin>
                            <li class="uk-active">
                                <a href="{{ route('category.single', $post->category->id) }}">{{ $post->category->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>



@endsection