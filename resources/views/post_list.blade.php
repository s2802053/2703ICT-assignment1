<?php
    // requires a title string ($title) and an array
    // of associative arrays representing posts ($posts)
?>


@extends('layouts/master')
@section('title')
    {{ $title }}
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/post.css')}}">
@endsection

@section('content')
    @forelse($posts as $post)
        <div class="post">
            <h4 class="post-author">{{ $post['author'] }}</h4>
            <p class="post-timestamp">{{ $post['date'] }}</p>
            <img src="{{asset('default-icon.png')}}">
            <div class="post-content">
                <h5 class="post-title">{{ $post['title'] }}</h5>
                <p class="post-message">{{ $post['message'] }}</p>
            </div>
        </div>
    @empty
        No posts found.
    @endforelse
@endsection
