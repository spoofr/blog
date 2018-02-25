@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-large-medium">All Tag</h2>

        <table class="uk-table uk-table-justify uk-table-divider uk-table-small uk-margin">
            <thead>
                <tr>
                    <th class="uk-width-small">#</th>
                    <th>Tag Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($tags->count() > 0)
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tag.edit', $tag->id) }}" uk-icon="icon: pencil"></a>
                        <a href="" class="uk-icon-link" onclick="event.preventDefault();document.getElementById('delete-tag-form-{{ $tag->id }}').submit();"
                            uk-icon="icon: trash"></a>
                        <form id="delete-tag-form-{{ $tag->id }}" method="POST" action="{{ route('tag.destroy', $tag->id) }}"
                            style="display: none;">
                            @csrf {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <th colspan="6" class="uk-text-center">No tags yet.</th>
                </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>

@endsection