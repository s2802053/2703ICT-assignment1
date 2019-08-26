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
        @if ($showCreateForm)
        <div class="create-post">
            <form method="get" action="/add_post" name="createPost">
                <div id="container">
                    <div class="topRow">
                        <span id="username">Username</span>
                        <br>
                        <input type="text" placeholder="Enter username" name="username"> 
                    </div>
                    <div class="topRow">
                        <span>Title</span>
                        <br>                   
                        <input type="text" placeholder="Enter title" name="title"> 
                    </div>
                </div>
                <div id="bottomRow">
                    Message
                    <br>
                    <input type="text" placeholder="Enter message" name="message">
                </div>
                <button type="submit">Create post</button>
            </form>
        </div>
        @endif
    @forelse($posts as $post)
        <a href="/post/{{$post->id}}">
            <div class="post">
                <h4 class="post-author">{{ $post->name }}</h4>
                <p class="post-timestamp">{{ $post->timestamp }}</p>
                <img src="{{asset('default-icon.png')}}">
                <div class="post-content">
                    <h5 class="post-title">{{ $post->title }}</h5>
                    <p class="post-message">{{ $post->message }}</p>
                </div>
                <a href="/deletePost/{{$post->id}}">Delete Post</a>
                <a href="/editPost/{{$post->id}}">Edit Post</a>
            </div>
        </a>
    @empty
        No posts found.
    @endforelse
@endsection
