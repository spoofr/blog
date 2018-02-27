@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-default uk-card-body">
        <h2 class="uk-heading-bullet uk-card-title uk-margin-large-medium">Users</h2>

        <table class="uk-table uk-table-justify uk-table-divider uk-table-small uk-margin">
            <thead>
                <tr>
                    <th class="uk-width-small">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($users->count() > 0) @foreach($users as $user)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        <img class="uk-comment-avatar uk-border-rounded" src="{{ asset('/images/avatars/' . $user->profile->avatar) }}" width="80"
                            height="80" alt="">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        @if($user->admin)
                        <a href="{{ route('user.revokeAdmin', $user->id) }}" class="uk-button uk-button-danger uk-button-small">Revoke admin</a>
                        @else
                        <a href="{{ route('user.makeAdmin', $user->id) }}" class="uk-button uk-button-primary uk-button-small">Make an admin</a>
                        @endif
                    </td>
                    <td>
                        @if(Auth::id() !== $user->id)
                        <a href="" class="uk-icon-link" onclick="event.preventDefault();document.getElementById('delete-user-form-{{ $user->id }}').submit();"
                            uk-icon="icon: trash"></a>
                        <form id="delete-user-form-{{ $user->id }}" method="POST" action="{{ route('user.destroy', $user->id) }}" style="display: none;">
                            @csrf {{ method_field('DELETE') }}
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach @else
                <tr>
                    <th colspan="6" class="uk-text-center">No users yet.</th>
                </tr>
                @endif

            </tbody>
        </table>


    </div>
</div>
@endsection