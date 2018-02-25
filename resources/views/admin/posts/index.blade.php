@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-large-medium">All Posts</h2>

        <table class="uk-table uk-table-justify uk-table-divider uk-table-small uk-margin">
            <thead>
                <tr>
                    <th class="uk-width-small">#</th>
                    <th>Featured Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($posts->count() > 0)
                @foreach($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>
                        <img class="uk-height-small uk-border-rounded" src="{{ $post->featured_image }}">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <a href="{{ route('post.edit', $post->id) }}" uk-icon="icon: pencil"></a>
                        <a href="" class="uk-icon-link" onclick="event.preventDefault();document.getElementById('delete-post-form-{{ $post->id }}').submit();"
                            uk-icon="icon: trash"></a>
                        <form id="delete-post-form-{{ $post->id }}" method="POST" action="{{ route('post.destroy', $post->id) }}" style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="6" class="uk-text-center">No published post yet.</th>
                </tr>
                @endif

            </tbody>
        </table>


    </div>
</div>
@endsection