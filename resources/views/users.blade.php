@extends('layouts/master')

@section('title')
    {{ $title }}
@endsection
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users.css') }}">
@section('style')

@endsection

@section('content')
    <div id="usersList">
        @forelse($users as $user)
            <div class="user">
                <p class="username"> {{ $user->name }} </p>
                <a class="show-posts-link" href="user_posts/{{$user->id}}">View Posts</a>
            </div>
            <br>
        @empty
            No users found.
        @endforelse
    </div>
@endsection
