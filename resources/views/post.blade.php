<?php
    // requires a title string ($title), a post associative 
    // array ($post) and an array of comments ($comments)
?>

@extends('layouts/master')
@section('title')
    {{ $title }}
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/comment.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/post.css')}}">
@endsection

@section('content')
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
    Comments:
    @forelse($comments as $comment)
        <div class="comment">
            <h5>{{$comment->name}}</h5>
            <p style="display: inline-block;">{{$comment->message}}</p>
            <a href="/deleteComment/{{$post->id}}/{{$comment->id}}" style="float: right; display: inline-block;">Delete comment</a>
        </div>
    @empty
        No comments found.
    @endforelse

    <div class="create-post">
            <form method="get" action="/add_comment" name="createPost">
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div id="container">
                    <div class="topRow">
                        <span id="username">Username</span>
                        <br>
                        <input type="text" placeholder="Enter username" name="username"> 
                    </div>
                </div>
                <div id="bottomRow">
                    Message
                    <br>
                    <input type="text" placeholder="Enter message" name="message">
                </div>
                <button type="submit">Add comment</button>
            </form>
        </div>
@endsection