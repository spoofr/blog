@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-large-medium">Trash</h2>

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
                @foreach($trashed_posts as $trashed_post)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>
                        <img height="50px" src="{{ $trashed_post->featured_image }}">
                    </td>
                    <td>{{ $trashed_post->title }}</td>
                    <td>{{ $trashed_post->content }}</td>
                    <td>
                        <a href="{{ route('post.restore', $trashed_post->id) }}" uk-icon="icon: refresh"></a>
                        <a href="" class="uk-icon-link" onclick="event.preventDefault();document.getElementById('empty-trash-form-{{ $trashed_post->id }}').submit();"
                            uk-icon="icon: trash"></a>
                        <form id="empty-trash-form-{{ $trashed_post->id }}" method="POST" action="{{ route('post.emptyTrash', $trashed_post->id) }}"
                            style="display: none;">
                            @csrf {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</div>
@endsection