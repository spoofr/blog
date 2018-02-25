@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-large-medium">All Category</h2>

        <table class="uk-table uk-table-justify uk-table-divider uk-table-small uk-margin">
            <thead>
                <tr>
                    <th class="uk-width-small">#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}" uk-icon="icon: pencil"></a>
                        <a href="" class="uk-icon-link" onclick="event.preventDefault();document.getElementById('delete-category-form-{{ $category->id }}').submit();"
                            uk-icon="icon: trash"></a>
                        <form id="delete-category-form-{{ $category->id }}" method="POST" action="{{ route('category.destroy', $category->id) }}"
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