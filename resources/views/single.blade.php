@extends('layouts.app') @section('content')

<div class="uk-section uk-section-muted" uk-height-viewport="expand: true">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-2-3@m">

                {{-- Article --}}
                <article class="uk-article uk-margin-medium">

                    <img class="uk-margin-medium-bottom uk-border-rounded" src="{{ $single_post->featured_image }}" alt="">

                    <h1 class="uk-article-title">
                        <a class="uk-link-reset" href="">{{ $single_post->title }}</a>
                    </h1>

                    <p class="uk-article-meta">Written by
                        <a href="#">Super User</a> on {{ $single_post->created_at->toFormattedDateString() }}. Posted in
                        <a href="#">{{ $single_post->category->name }}</a>
                    </p>

                    <p>{!! $single_post->content !!}</p>

                    <div class="uk-grid-small uk-margin-large-top" uk-grid>
                        @foreach($single_post->tags as $tag)
                        <div>
                            <a href=""><span class="uk-badge">{{ $tag->name }}</span></a>
                        </div>
                        @endforeach
                    </div>
                </article>

                <hr class="uk-margin-large"> {{-- Profile --}}
                <div class="uk-card uk-card-body uk-card-default uk-margin-medium uk-card-small">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto uk-margin-right">
                            <img class="uk-border-circle" src="https://getuikit.com/assets/uikit/tests/images/avatar.jpg" width="70" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title">Profile</h3>
                            <p class="uk-text-meta uk-margin-remove-top">
                                <time datetime="2016-04-01T19:00">Lorem ipsum sit amet, consectetur sadipscing</time>
                            </p>
                        </div>
                    </div>
                </div>

                <ul class="uk-pagination uk-margin-large">
                    @if($prev_post)
                    <li>
                        <a href="{{ route('post.single', $prev_post->slug) }}">
                            <span uk-icon="icon: arrow-left; ratio: 4"></span> Previous Post | {{ $prev_post->title }}</a>
                    </li>
                    @endif @if($next_post)
                    <li class="uk-margin-auto-left">
                        <a href="{{ route('post.single', $next_post->slug) }}">{{ $next_post->title }} | Next Post
                            <span uk-icon="icon: arrow-right; ratio: 4"></span>
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
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