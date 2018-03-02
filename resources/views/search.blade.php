@extends('layouts.app') @section('content')

<div class="uk-section uk-section-muted uk-padding-remove-top" uk-height-viewport="expand: true">
    <div class="uk-section uk-section-primary uk-margin-medium">
        <div class="uk-container uk-text-center">
            <h3>Search result: {{ $search }}</h3>
        </div>
    </div>

    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-2-3@m">
                @if($posts->count() > 0)
                @foreach($posts as $post)
                <div>
                    <div class="uk-card uk-card-default uk-margin-medium">
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
                            <p>{{ $post->content }}</p>
                            <a href="{{ route('post.single', $post->slug) }}" class="uk-button uk-button-text">Read more..</a>
                            <ul class="uk-subnav uk-subnav-pill uk-float-right uk-margin-remove-top" uk-margin>
                                <li class="uk-active">
                                    <a href="#">{{ $post->category->name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    Opss.. Not post found.
                @endif
                
            </div>

            <div class="uk-width-expand@m">
                <div class="uk-card uk-card-body uk-card-default uk-margin-medium">
                    <h3 class="uk-card-title">Categories</h3>
                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('category.single', $category->id) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="uk-card uk-card-body uk-card-default">
                    <h3 class="uk-card-title">Tags</h3>
                    <div class="uk-grid-small" uk-grid>
                        @foreach($tags as $tag)
                        <div>
                            <a href="{{ route('tag.single', $tag->id) }}"><span class="uk-badge">{{ $tag->name }}</span></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection