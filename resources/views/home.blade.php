@extends('layouts.dashboard') @section('content')

<div class="uk-margin">
    <div class="uk-card uk-card-secondary uk-card-body">
        <h2 class="uk-heading-bullet">Dashboard</h2>
        <p>Hello {{ Auth::user()->name }}!</p>
        {{ $category_count }}
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
@endsection